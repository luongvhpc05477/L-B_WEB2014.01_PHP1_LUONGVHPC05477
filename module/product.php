<?php
class Product
{
    function insertProduct($name, $price, $nameImg, $description, $idCategory)
    {
        $sql = "INSERT SANPHAM VALUES(NULL, '$name', '$price', '$nameImg','$description', 0, '$idCategory' )";
        pdo_execute($sql);
    }

    function deleteProduct($id)
    {
        $sql = "DELETE FROM SANPHAM WHERE ID=$id";
        pdo_execute($sql);
    }
    function updateProduct($name, $price, $fileImg, $description, $id)
    {
        if ($fileImg['name']) {
            $nameImg = $fileImg['name'];
            $tmpImg = $fileImg['tmp_name'];
            move_uploaded_file($tmpImg, '../upload/' . $nameImg);
            $sql = "UPDATE SANPHAM SET  NAME='$name', PRICE=$price, IMG='$nameImg', MOTA='$description' WHERE ID=$id";
            pdo_execute($sql);
        } else {
            $sql = "UPDATE SANPHAM SET  NAME='$name', PRICE=$price, MOTA='$description' WHERE ID=$id";
            pdo_execute($sql);
        }
    }
    function selectProductAll()
    {
        $sql = "SELECT * FROM SANPHAM  ORDER BY ID DESC LIMIT 0,9";
        return  pdo_query($sql);
    }

    function selectTop()
    {
        $sqlTop = "SELECT * FROM SANPHAM  ORDER BY LUOTXEM DESC LIMIT 0,5";
        return pdo_query($sqlTop);
    }

    function selectProductByCate($iddm)
    {
        $sql = "SELECT * FROM SANPHAM WHERE IDDM = $iddm";
        return pdo_query($sql);
    }

    function selectProductOne($id)
    {
        $sql = "SELECT * FROM SANPHAM WHERE ID = $id";
        return pdo_query_one($sql);
    }

    function selectProSameCate($iddm, $id)
    {
        $sql = "SELECT * FROM SANPHAM WHERE IDDM = $iddm AND ID <> $id";
        return pdo_query($sql);
    }

    function selectComment($id)
    {
        $sqlComment = "SELECT * FROM BINHLUAN JOIN TAIKHOAN ON BINHLUAN.IDUSER = TAIKHOAN.ID WHERE IDPRO = $id ORDER BY BINHLUAN.ID DESC";
        return pdo_query($sqlComment);
    }
    function selectCommentAll()
    {
        $sql = "SELECT * FROM BINHLUAN ORDER BY ID DESC";
        return pdo_query($sql);
    }
    function deleteComment($id)
    {
        $sql = "DELETE FROM BINHLUAN WHERE ID = $id";
        pdo_execute($sql);
    }
    function deleteCommentByProduct($idPro)
    {
        $sql = "DELETE FROM BINHLUAN WHERE IDPRO = $idPro";
        pdo_execute($sql);
    }
    function insertComment($content, $idUser, $idPro)
    {
        $sql = "INSERT BINHLUAN (noidung,iduser,idpro) VALUES('$content', $idUser, $idPro )";
        pdo_execute($sql);
    }
    function searchProduct($value)
    {
        $sql = "SELECT * FROM SANPHAM WHERE NAME LIKE '%$value%'";
        return  pdo_query($sql);
    }


   




}

$ProductService = new Product();
