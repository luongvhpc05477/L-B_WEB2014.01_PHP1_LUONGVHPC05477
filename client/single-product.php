<?php
include "./module/product.php";


if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$listComment = $ProductService->selectComment($id);
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
	<link rel="stylesheet" href="/client/css/font-awesome.min.css">
	<link rel="stylesheet" href="/client/css/themify-icons.css">
	<link rel="stylesheet" href="/client/css/bootstrap.css">
	<link rel="stylesheet" href="/client/css/owl.carousel.css">
	<link rel="stylesheet" href="/client/css/nice-select.css">
	<link rel="stylesheet" href="/client/css/nouislider.min.css">
	<link rel="stylesheet" href="/client/css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="/client/css/ion.rangeSlider.skinFlat.css" />
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
					<h1>Trang chi tiết sản phẩm</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Cửa hàng<span class="lnr lnr-arrow-right"></span></a>
						<a href="single-product.php">Chi tiết sản phẩm</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Single Product Area =================-->

	<?php if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$data = $ProductService->selectProductOne($id);
	};
	if (isset($data)) : ?>
		<div class="product_image_area">
			<div class="container">
				<div class="row s_product_inner">
					<div class="col-lg-6">
						<div class="Product_carousel">
							<div class="single-prd-item">
								<img class="img-fluid" src="upload/<?= $data['img'] ?>" alt="">
							</div>
						</div>
					</div>

					<div class="col-lg-5 offset-lg-1">
						<div class="s_product_text">
							<h3><?= $data['name'] ?></h3>
							<h2><?= number_format($data['price'], 0, ",", ".") ?></h2>

							<ul class="list">
								<li><a class="active" href="#"><span>Category</span> : Nike</a></li>
								<li><a href="#"><span>Availibility</span> : Còn hàng</a></li>
							</ul>
							<p><?= $data['mota'] ?></p>
							<form action="index.php?pages=cart" method="post">
								<div class="product_count">
									<label for="qty">Quantity:</label>
									<input type="text" name="qty" id="sst" value="1" title="Quantity" class="input-text qty">
								</div>
								<div class="card_area d-flex align-items-center">
									<input type="hidden" name="id" value="<?= $data['id'] ?>">
									<input type="hidden" name="img" value="<?= $data['img'] ?>">
									<input type="hidden" name="name" value="<?= $data['name'] ?>">
									<input type="hidden" name="price" value="<?= $data['price'] ?>">
									<button type="submit" class="btn btn-warning" name="addcart">Thêm vào giỏ hàng</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

	<?php endif; ?>
	<!--================End Single Product Area =================-->

	<!--================Product Description Area =================-->
	<div class="container">


		<h4> Bình luận</h4>
		<div class="card">
			<form>
				<div class="">
					<div class="card-body">
						<div class="row mb10 formds_loai">
							<table class="table table-head-fixed text-nowrap">
								<tr>
									<th>Nội dung</th>
									<th>Tài khoản</th>
									<th>Ngày bình luận</th>
								</tr>
								<?php
								foreach ($listComment as $data => $value) {
								?>
									<tr>
										<td>
											<?= $value['noidung'] ?>
										</td>
										<td>
											<?= $value['user'] ?>
										</td>
										<td>
											<?= $value['ngaybinhluan'] ?>
										</td>
									</tr>
								<?php
								}
								?>
							</table>
						</div>
					</div>

				</div>
			</form>
		</div>
		<?php
		if (isset($_SESSION['nguoiDung_id']) ) {				
		?>
			<form id="comment-form" action="index.php?pages=comment" method="POST">
				<input type="hidden" name="id-pro" value="<?= $id ?>">
				<textarea class="form-control" name="content" id="content" rows="2" placeholder="Nhập bình luận của bạn"></textarea>
				<button type="submit" name="btn-comment" class="btn btn-primary">Gửi</button>
			</form>
		
		<?php
		} else {
			echo '<div class="primary" style="color: red; font-weight: bold;">Bạn cần đăng nhập để bình luận sản phẩm này!</div>';
		}
		?>
	</div>
	<br>
	<br>

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