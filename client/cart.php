<?php

if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = [];
}
// Them vao gio hang
if (isset($_POST['addcart'])) {
  if (!isset($_SESSION['nguoiDung_id'])) {
    $_SESSION['error_message'] = '<center><h3><span style="color: red;"> Bạn chưa đăng nhập. Vui lòng đăng nhập để thêm vào giỏ hàng. </span></h3></center>';
    header('Location: index.php?pages=login');
  } else {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $img = $_POST['img'];
    $price = $_POST['price'];
    $qty = !empty($_POST['qty']) ? $_POST['qty'] : 1;

    $product = [
      'id' => $id,
      'name' => $name,
      'img' => $img,
      'price' => $price,
      'qty' => $qty
    ];
    $found = false;
    if (isset($_SESSION['cart'])) {
      foreach ($_SESSION['cart'] as $productId) {
        if ($id == $productId['id']) {
          $_SESSION['cart']["$id"]['qty']++;
          $found = true;
          break;
        }
      }
    }
    if (!$found) {
      $_SESSION['cart'][] = $product;
    }
    header('location: index.php?pages=cart');
  }
}
// xoa gio hang
if (isset($_POST['xoacart'])) {
  $id = $_POST['xoacart'];

  foreach ($_SESSION['cart'] as $key => $product) {
    if ($id == $product['id']) {
      unset($_SESSION['cart'][$key]);
      header('Location: index.php?pages=cart');
      break;
    }
  }
}
// chinh sua
if (isset($_POST['editcart'])) {
  if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as &$product) {
      if ($product['id'] == $_POST['id']) {
        $qtyedit = (int)$_POST['editqty'];
        if ($qtyedit >= 1) {
          $product['qty'] = $qtyedit;
          break;
        }
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
  <!-- Mobile Specific Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Favicon-->
  <link rel="shortcut icon" href="img/fav.png">
  <!-- Author Meta -->
  <meta name="author" content="CodePixar">
  <!-- Meta Description -->
  <meta name="description" content="">
  <!-- Meta Keyword -->
  <meta name="keywords" content="">
  <!-- meta character set -->
  <meta charset="UTF-8">
  <!-- Site Title -->
  <title>VHL STORE</title>

  <!--
            CSS
            ============================================= -->
  <link rel="stylesheet" href="/client/css/linearicons.css">
  <link rel="stylesheet" href="/client/css/owl.carousel.css">
  <link rel="stylesheet" href="/client/css/font-awesome.min.css">
  <link rel="stylesheet" href="/client/css/themify-icons.css">
  <link rel="stylesheet" href="/client/css/nice-select.css">
  <link rel="stylesheet" href="/client/css/nouislider.min.css">
  <link rel="stylesheet" href="/client/css/bootstrap.css">
  <link rel="stylesheet" href="/client/css/main.css">
</head>

<body>

  <!-- Start Header Area -->
  <?php
  include "header.php";
  ?>
  <!-- End Header Area -->

  <!-- Start Banner Area -->
  <section class="banner-area organic-breadcrumb">
    <div class="container">
      <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
        <div class="col-first">
          <h1>Giỏ hàng</h1>
          <nav class="d-flex align-items-center">
            <a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
            <a href="/client/category.php">Cửa hàng</a>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!-- End Banner Area -->

  <!--================Cart Area =================-->
  <div class="container px-3 my-5 clearfix">
    <div class="card">
      <div class="card-header bg-primary text-light">
        <h2>Giỏ hàng</h2>
      </div>
      <div class="card-body">
        <form action="index.php?pages=cart" method="post">
          <div class="table-responsive">
            <table class="table table-bordered m-0">
              <thead>
                <tr>
                  <th class="text-left py-3 px-4" style="min-width: 400px;">Thông tin chi tiết sản phẩm</th>
                  <th class="text-right py-3 px-4" style="width: 100px;">Giá</th>
                  <th class="text-center py-3 px-4" style="width: 120px;">Số lượng</th>
                  <th class="text-right py-3 px-4" style="width: 100px;">Tổng</th>
                  <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="" class="shop-tooltip float-none text-light" title="" data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
                </tr>
              </thead>
              <tbody>
                <? if (isset($_SESSION['cart'])) : ?>
                  <?php
                  $total_product = 0;
                  $total_bill = 0;
                  ?>
                  <?php foreach ($_SESSION['cart'] as $item) : ?>
                    <?php
                    $total_product = ($item['price'] * $item['qty']);
                    $total_bill += $total_product;
                    ?>
                    <tr>
                      <td class="p-4">
                        <div class="media align-items-center">
                          <img src="../upload/<?= $item['img'] ?>" width="50" class="d-block ui-w-40 ui-bordered mr-4" alt="">
                          <div class="media-body">
                            <a href="#" class="d-block text-dark text-decoration-none"><?= $item['name'] ?></a>
                          </div>
                        </div>
                      </td>
                      <td class="text-right font-weight-semibold align-middle p-4"><?=  number_format($item['price'], 0, ",", ".") ?? ''  ?>đ</td>
                      <form method="post">
                        <input type="hidden" name="id" value="<?= $item['id'] ?>">
                        <td class="text-right font-weight-semibold align-middle p-4"><input name="editqty" type="number" min="1" class="form-control text-center" value="<?= $item['qty'] ?>">
                          <button type="submit" name="editcart" class="btn btn-primary mt-2 mx-1 float-end">Cập nhập</button>
                        </td>
                      </form>
                      <td class="text-right font-weight-semibold align-middle p-4"><?= number_format($total_product, 0, ",", ".") ?? '' ?>đ</td>
                      <td class="text-center align-middle px-0"><button type=submit name="xoacart" value="<?= $item['id'] ?>" class="shop-tooltip close float-none  btn btn-danger">x</button></td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>

          <div class="d-flex flex-wrap justify-content-end align-items-center pb-4">
            <div class="d-flex gap-4">
              <div class="text-right mt-4">
                <label class="text-muted font-weight-normal">Tổng</label>
                <div class="text-large"><strong><?= isset($total_bill) ? (number_format($total_bill, 0, ",", ".")) : "" ?> đ</strong></div>
              </div>
            </div>
          </div>

          <div class="float-right">
            <a href="index.php?pages=category" class="btn btn-lg btn-danger mt-2 mx-1 float-end">Quay lại</a>
            <a href="index.php?pages=checkout" class="btn btn-lg btn-success mt-2 mx-1 float-end <?php echo empty($_SESSION['cart']) ? 'disabled' : false ?>">Thanh toán</a>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--================End Cart Area =================-->

  <?php
  include "footer.php"
  ?>
  </p>
  </div>
  </div>
  </footer>
  <!-- End footer Area -->

  <script src="js/vendor/jquery-2.2.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="js/vendor/bootstrap.min.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/jquery.nice-select.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/nouislider.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <!--gmaps Js-->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
  <script src="js/gmaps.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>