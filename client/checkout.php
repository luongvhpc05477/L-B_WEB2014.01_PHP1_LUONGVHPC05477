<?php

// session_start();
include 'config/mail.php';
include './module/cart.php';
if (isset($_POST['Pay'])) { 
    $user_id = $_SESSION['nguoiDung_id'];
    $user_name = $_POST['kh_ten'];
    $user_address = $_POST['kh_diachi'];
    $user_phone = $_POST['kh_dienthoai'];
    $user_email = $_POST['kh_email'];
    $total_bill = $_POST['total_bill'];
    $httt_ma = $_POST['httt_ma'];
    // $title = 'Don hang tu shop VHL STORE';
    // $content = "
    //         <h3>Thông tin khách hàng </h3>
    //         <p> <b>Tên:</b> " . $user_name . " </p>  
    //         <p> <b>Địa chỉ:</b> " . $user_address . " </p>  
    //         <p> <b>Số điện thoại:</b> " . $user_phone . " </p>  
    //         Đơn hàng của bạn đã đặt thành công
    //     ";
    
    $ServiceCart = new ServiceCart();
    $bill_id = $ServiceCart->insertBill($user_id, $user_name, $user_email, $user_phone, $user_address, $total_bill, $httt_ma);
    if ($bill_id) {
        for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
            $product_id = $_SESSION['cart'][$i]['id'];
            $price = $_SESSION['cart'][$i]['price'];
            $qty = $_SESSION['cart'][$i]['qty'];
            $total_product = $price * $qty;
            $ServiceCart->insertCart($product_id, $bill_id, $qty, $total_product);
        }
        $body = array();
        $title = "Don Hang Duoc Dat Tu Shop Sneaker...";
        $total_porduct = 0;
        $total_bill = 0;
        foreach ($_SESSION['cart'] as $data) {
          $total_product = ($data['price'] * $data['qty']);
          $total_bill += $total_product;
          $body[] = "
          <tr class='order_item'>
            <td class='td text-center' style='color: #636363;border: 1px solid #e5e5e5;padding: 12px;text-align: left;vertical-align: middle;font-family: ' Helvetica Neue', Helvetica, Roboto, Arial, sans-serif' align='left'>
            $data[name] </td>
            <td class='td text-center' style='color: #636363;border: 1px solid #e5e5e5;padding: 12px;text-align: left;vertical-align: middle;font-family: ' Helvetica Neue', Helvetica, Roboto, Arial, sans-serif' align='left'>
            $data[qty] </td>
            <td class='td text-center' style='color: #636363;border: 1px solid #e5e5e5;padding: 12px;text-align: left;vertical-align: middle;font-family: ' Helvetica Neue', Helvetica, Roboto, Arial, sans-serif' align='left'>
              <span class='woocommerce-Price-amount amount'>" . number_format($data['price'] * $data['qty'], 0) . "<span class='woocommerce-Price-currencySymbol'>₫</span></span>
            </td>
          </tr>
          ";
        }
        $item = implode($body);
        $content = "<table width='100%' id='outer_wrapper' style='background-color: #f7f7f7' 'bgcolor='#f7f7f7'>
        <tbody>
          <tr>
          
            <td><!-- Deliberately empty to support consistent sizing and layout across multiple email clients. --></td>
            <td width='600'>
              <div id='wrapper' dir='ltr' style='margin: 0 auto;padding: 70px 0;width: 100%;max-width: 600px'>
                <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                  <tbody>
                    <tr>
                      <td align='center' valign='top'>
                        <div id='template_header_image'>
                        </div>
                        <table border='0' cellpadding='0' cellspacing='0' width='100%' id='template_container' style='background-color: #fff;border: 1px solid #dedede;border-radius: 3px' bgcolor='#fff'>
                          <tbody>
                            <tr>
                              <td align='center' valign='top'>
                                <!-- Header -->
                                <table border='0' cellpadding='0' cellspacing='0' width='100%' id='template_header' style='background-color: #7f54b3;color: #fff;border-bottom: 0;font-weight: bold;line-height: 100%;vertical-align: middle;font-family: &quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;border-radius: 3px 3px 0 0' bgcolor='#7f54b3'>
                                  <tbody>
                                    <tr>
                                      <td id='header_wrapper' class='bg-dark' style='padding: 36px 48px;display: block'>
                                        <h1 style='font-family: &quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size: 30px;font-weight: 300;line-height: 150%;margin: 0;text-align: left;color: #fff;'>Cảm ơn bạn đã đặt hàng</h1>
                                      </td>
                                    </tr>
                                  </tbody>
    </table>
                                <!-- End Header -->
                              </td>
                            </tr>
                            <tr>
                              <td align='center' valign='top'>
                                <!-- Body -->
                                <table border='0' cellpadding='0' cellspacing='0' width='100%' id='template_body'>
                                  <tbody>
                                    <tr>
                                      <td valign='top' id='body_content' style='background-color: #fff' bgcolor='#fff'>
                                        <!-- Content -->
                                        <table border='0' cellpadding='20' cellspacing='0' width='100%'>
                                          <tbody>
                                            <tr>
                                              <td valign='top' style='padding: 48px 48px 32px'>
                                                <div id='body_content_inner' style='color: #636363;font-family: &quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size: 14px;line-height: 150%;text-align: left' align='left'>
    
                                                  <p style='margin: 0 0 16px'><b>Shop Sneaker</b> xin chào</p>
                                                  <p style='margin: 0 0 16px'>Đơn hàng đang được xử lí và sẽ gửi đi sớm!</p>
    
                                                  <div style='margin-bottom: 40px'>
                                                    <table class='td' cellspacing='0' cellpadding='6' border='1' style='color: #636363;border: 1px solid #e5e5e5;vertical-align: middle;width: 100%;font-family: ' Helvetica Neue', Helvetica, Roboto, Arial, sans-serif' width='100%'>
                                                      <thead>
                                                        <tr>
                                                          <th class='td' scope='col' style='color: #636363;border: 1px solid #e5e5e5;vertical-align: middle;padding: 12px;text-align: left' align='left'>Sản phẩm</th>
                                                          <th class='td' scope='col' style='color: #636363;border: 1px solid #e5e5e5;vertical-align: middle;padding: 12px;text-align: left' align='left'>Số lượng</th>
                                                          <th class='td' scope='col' style='color: #636363;border: 1px solid #e5e5e5;vertical-align: middle;padding: 12px;text-align: left' align='left'>Giá</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                        $item
                                                      </tbody>
                                                      <tfoot>
                                                        <tr>
    <th class='td' scope='row' colspan='2' style='color: #636363;border: 1px solid #e5e5e5;vertical-align: middle;padding: 12px;text-align: left;border-top-width: 4px' align='left'>Tổng số phụ:</th>
                                                          <td class='td' style='color: #636363;border: 1px solid #e5e5e5;vertical-align: middle;padding: 12px;text-align: left;border-top-width: 4px' align='left'><span class='woocommerce-Price-amount amount'>" . number_format($total_bill, 0) . "<span class='woocommerce-Price-currencySymbol'>₫</span></span></td>
                                                        </tr>
                                                        <tr>
                                                          <th class='td' scope='row' colspan='2' style='color: #636363;border: 1px solid #e5e5e5;vertical-align: middle;padding: 12px;text-align: left' align='left'>Tổng cộng:</th>
                                                          <td class='td' style='color: #636363;border: 1px solid #e5e5e5;vertical-align: middle;padding: 12px;text-align: left' align='left'><span class='woocommerce-Price-amount amount'>" . number_format($total_bill, 0) . "<span class='woocommerce-Price-currencySymbol'>₫</span></span></td>
                                                        </tr>
                                                      </tfoot>
                                                    </table>
                                                  </div>
    
                                                  <table id='addresses' cellspacing='0' cellpadding='0' border='0' style='width: 100%;vertical-align: top;margin-bottom: 40px;padding: 0' width='100%'>
                                                    <tbody>
                                                      <tr>
                                                        <td valign='top' width='50%' style='text-align: left;font-family: ' Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;border: 0;padding: 0' align='left'>
                                                          <h2 style='color: #7f54b3;display: block;font-family: &quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size: 18px;font-weight: bold;line-height: 130%;margin: 0 0 18px;text-align: left'>Địa chỉ thanh toán</h2>
                                                          <address class='address' style='padding: 12px;color: #636363;border: 1px solid #e5e5e5'>
                                                          $user_name <br>
                                                          $user_address <br>
                                                            <a href='tel:$user_phone' style='color: #7f54b3;font-weight: normal;text-decoration: underline'>$user_phone</a> 
                                                            <br>$user_email
                                                          </address>
                                                        </td>
    </tr>
                                                    </tbody>
                                                  </table>
                                                  <p style='margin: 0 0 16px'>Cảm ơn bạn đã tin dùng dịch vụ của Shop Sneaker!</p>
                                                </div>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <!-- End Content -->
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                                <!-- End Body -->
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </td>
            <td><!-- Deliberately empty to support consistent sizing and layout across multiple email clients. --></td>
          </tr>
        </tbody>
      </table> ";
      thanhToanVaGuiEmail($user_email, $title, $content);
        
        header("Location: /index.php?pages=camon");
    }
    unset($_SESSION['cart']);
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
    <link rel="stylesheet" href="/client/css/themify-icons.css">
    <link rel="stylesheet" href="/client/css/font-awesome.min.css">
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
                    <h1>Thanh toán</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                        <a href="single-product.php">Thanh toán</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Checkout Area =================-->
    <div class="container mt-4 my-5">
        <form class="needs-validation" name="formthanhtoan" method="post" action="index.php?pages=checkout">
            <input type="hidden" name="kh_tendangnhap" value="dnpcuong">
            <div class="py-5 text-center">
                <i class="fa fa-credit-card fa-4x" aria-hidden="true"></i>
                <h2>Thanh toán</h2>
                <p class="lead">Vui lòng kiểm tra thông tin Khách hàng, thông tin Giỏ hàng trước khi Đặt hàng.</p>
            </div>

            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span>Giỏ hàng</span>
                    </h4>
                    <?php if (isset($_SESSION['cart'])) : ?>
                        <?php
                        $total_product = 0;
                        $total_bill = 0;
                        $i = 0;
                        ?>
                        <ul class="list-group mb-3">
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">Số lượng</h6>
                                    <small>
                                        <?php foreach ($_SESSION['cart'] as $item) : ?>
                                            <?php $i++; ?>
                                        <?php endforeach ?>
                                        <?= $i; ?>
                                    </small>
                                </div>
                            </li>
                            <?php foreach ($_SESSION['cart'] as $item) : ?>
                                <?php
                                $total_product = ($item['price'] * $item['qty']);
                                $total_bill += $total_product;
                                ?>
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div class=""><?= $item['name'] ?></div>
                                    <div class=""><?= isset($item['price']) ? (number_format($total_bill, 0, ",", ".")) : "" ?>đ
                                    </div>
                                </li>
                            <?php endforeach; ?>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Tổng thành tiền</span>
                                <strong><?= isset($total_bill) ? (number_format($total_bill, 0, ",", ".")) : "" ?>đ</strong>
                                <input type="hidden" name="total_bill" value="<?= $total_bill ?>">
                            </li>
                        </ul>
                    <?php endif; ?>
                </div>
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Thông tin khách hàng</h4>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="kh_ten">Họ tên</label>
                            <input type="text" class="form-control my-2" name="kh_ten" id="kh_ten" value=''>
                        </div>
                        <div class="col-md-12">
                            <label for="kh_diachi">Địa chỉ</label>
                            <input type="text" class="form-control my-2" name="kh_diachi" id="kh_diachi" value="">
                        </div>
                        <div class="col-md-12">
                            <label for="kh_dienthoai">Điện thoại</label>
                            <input type="text" class="form-control my-2" name="kh_dienthoai" id="kh_dienthoai" value="">
                        </div>
                        <div class="col-md-12">
                            <label for="kh_email">Email</label>
                            <input type="text" class="form-control my-2" name="kh_email" id="kh_email" value="">
                        </div>
                    </div>

                    <h4 class="mb-3">Hình thức thanh toán</h4>

                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            <input id="httt-2" name="httt_ma" type="radio" class="custom-control-input" required="" value="2">
                            <label class="custom-control-label" for="httt-2">Chuyển khoản</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="httt-3" name="httt_ma" type="radio" class="custom-control-input" required="" value="1" checked>
                            <label class="custom-control-label" for="httt-3">Ship COD</label>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-success" type="submit" name="Pay">Đặt hàng</button>
                </div>
            </div>
        </form>
    </div>

    <!-- start footer Area -->
    <?php
    include "footer.php";
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