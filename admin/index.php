<?php
session_start();
include_once('../module/pdo.php');
include_once('../module/category.php');
include_once('../module/auth.php');
include_once('../module/cart.php');
include_once('../module/product.php');
include_once('../module/user.php');
if (isset($_SESSION['id']) && !isset($_GET['act'])) {
    include_once('./header.php');
}


if (isset($_SESSION['id']) && isset($_GET['act'])) {
    include_once('./header_slide.php');
}

$act = 'home';

if (isset($_GET['act'])) {
    $act = $_GET['act'];
}

if (!isset($_SESSION['id'])) {
    $act = 'login';
}

switch ($act) {
    case "home":
        include_once('./home.php');
        break;
    case "login":
        include "Login/login.php";
        break;
    case "logaut":
        unset($_SESSION['id']);
        header("Location: index.php");
        break;
}

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'add-category':
            if (isset($_POST['add-new']))
            $listCategory = $category ->insertCategory($_POST['tenloai']);
            include_once('./danhmuc/add.php');
            break;
        case 'list-category':
            $listCategory = $category -> loadCategoryAll();
            include_once('./danhmuc/index.php');
            break;
        case 'delete-category':
            if (isset($_GET['id']) && $_GET['id'] > 0)
            $category -> deleteCategory($_GET['id']);
            $listCategory = $category -> loadCategoryAll();
            include_once('./danhmuc/index.php');
            break;
        case 'edit-category':
            if (isset($_GET['id']) && $_GET['id'] > 0)
                $result = $category -> loadOne($_GET['id']);
            include_once('./danhmuc/update.php');
            break;
        case 'update-category':
            if (isset($_POST['btn-update']))
                $category -> updateCategory($_POST['id'], $_POST['tenloai']);
            $listCategory = $category -> loadCategoryAll();
            include_once('./danhmuc/index.php');
            break;
        case 'add-product':
            $listCategory = $category -> loadCategoryAll();
            if (isset($_POST['btn-add'])) {
                $name = $_POST['name'];
                $price = $_POST['price'];
                $img = $_FILES['img'];
                $nameImg = $img['name'];
                $tmpImg = $img['tmp_name'];
                move_uploaded_file($tmpImg, '../upload/' . $nameImg);
                $description = $_POST['description'];
                $idCategory = $_POST['id-category'];
                $ProductService->insertProduct($name, $price, $nameImg, $description, $idCategory);
            }
            include_once('./sanpham/add.php');
            break;
        case "list-product":
            $sql = "SELECT * FROM SANPHAM";
            $listProduct = pdo_query($sql);
            include_once('./sanpham/index.php');
            break;
        case "edit-product":
            if (isset($_GET['id'])) {
                $product = $ProductService->selectProductOne($_GET['id']);
                $listCategory = $category -> loadCategoryAll();
                include_once('./sanpham/update.php');
            }
            break;
        case "delete-product":
            if (isset($_GET['id'])) {
                $ProductService->deleteCommentByProduct($_GET['id']);
                $ProductService->deleteProduct($_GET['id']);
            }
            $listProduct = $ProductService->selectProductAll();
            include_once('./sanpham/index.php');
            break;
        case "update-product":
            if (isset($_POST['btn-update'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $price = $_POST['price'];
                $description = $_POST['description'];
                // $idCategory = $_POST['id-category'];
                $img = $_FILES['img'];
                $ProductService->updateProduct($name, $price, $img, $description,  $id);
            }
            $sql = "SELECT * FROM SANPHAM";
            $listProduct = pdo_query($sql);
            include_once('./sanpham/index.php');
            break;
        case "list-user":
            $listUser = $UserService->selectUserAll();
            include_once('./taikhoan/index.php');
            break;
        case 'add-user':
            if (isset($_POST['btn-add'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $role = $_POST['role'];
                $UserService->insertUser($user, $pass, $email, $address, $tel, $role);
            }
            include_once('./taikhoan/add.php');
            break;
        case "edit-user":
            if (isset($_GET['id'])) {
                $user = $UserService->selectUserOne($_GET['id']);
                include_once('./taikhoan/update.php');
            }
            break;
        case "delete-user":
            if (isset($_GET['id'])) {
                $UserService->deleteUser($_GET['id']);
            }
            $listUser = $UserService->selectUserAll();
            include_once('./taikhoan/index.php');
            break;
        case "update-user":
            if (isset($_POST['btn-update'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $role = $_POST['role'];
                $id = $_POST['id'];
                $UserService->updateUser($user, $pass, $email, $address, $tel, $role, $id);
            }
            $sql = "SELECT * FROM TAIKHOAN";
            $listUser = pdo_query($sql);
            include_once('./taikhoan/index.php');
            break;

        case "list-comment":
            $listComment = $ProductService->selectCommentAll();
            include_once('./binhluan/index.php');
            break;
        case "delete-comment":
            if (isset($_GET['id'])) {
                $ProductService->deleteComment($_GET['id']);
            }
            $listComment = $ProductService->selectCommentAll();
            include_once('./binhluan/index.php');
            break;

        case "list-bill":
            include_once "./bill/index.php";
            break;
        case "view-bill":
            include_once "./bill/view.php";
            break;
        case "delete-bill":
            if (isset($_GET['id'])) {
                $serviceCart->deleteBill($_GET['id']);
                header('location: /admin/index.php?act=list-bill');
            }
            break;
        case "edit-bill":
            if (isset($_GET['id'])) {
                $bill = $serviceCart->queryBill($_GET['id']);
            }
            include_once('./bill/editBill.php');
            break;
        case "update-bill":
            if (isset($_POST['btn-update-bill'])) {
                $status = $_POST['status'];
                $id = $_POST['id'];
                $serviceCart->updateBill($id, $status);
                header('location: /admin/index.php?act=list-bill');
            }
            break;
        case "analytics":
            $listPro = $serviceCart->analytics();
            include_once('./thongke/index.php');
            break;
        case "chart":
            $listPro = $serviceCart->analytics();
            include_once('./thongke/chart.php');
            break;
        default:
            include_once('./home.php');
            break;
    }
}
// else {
//     include_once('./home.php');
// }
if (isset($_SESSION['id'])) {
    include_once('./footer.php');
}
