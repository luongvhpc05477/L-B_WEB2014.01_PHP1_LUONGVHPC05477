<!DOCTYPE html>
<html lang="zxx" class="no-js">

<?
	include "./module/product.php" ;
?>

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
	<!-- Site Title --
	<title>Karma Shop</title>

	<!-- CSS ============================================= -->
	<link rel="stylesheet" href="/client/css/linearicons.css">
	<link rel="stylesheet" href="/client/css/owl.carousel.css">
	<link rel="stylesheet" href="/client/css/themify-icons.css">
	<link rel="stylesheet" href="/client/css/nice-select.css">
	<link rel="stylesheet" href="/client/css/nouislider.min.css">
	<link rel="stylesheet" href="/client/css/bootstrap.css">
	<link rel="stylesheet" href="/client/css/main.css">
</head>

<body id="category">

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
					<h1>Trang Sản phẩm</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
						<a href="index.php?pages=category">Sản phẩm<span ></span></a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-5">
				<div class="sidebar-categories">
					<div class="head">Danh mục</div>
					<ul class="main-categories">
						<li class="main-nav-list">
								<?
									include './module/category.php' ;
									$danhMuc = $category -> loadCategoryAll() ;
									foreach ($danhMuc AS $danhMuc) {
										?>
											<li class="main-nav-list child"><a href="index.php?pages=category&iddanhmuc=<?= $danhMuc ['id']?>"><?= $danhMuc ['name']?><span class="number"></span></a></li>
										<?
									}
								?>
							</ul>
						</li>
				</div>
				<div class="sidebar-filter mt-50">
					<div class="top-filter-head">Bộ lọc sản phẩm</div>
					<div class="common-filter">
						<div class="head">Nhãn hiệu</div>
						<form action="#">
							<ul>
								<li class="filter-list"><input class="pixel-radio" type="radio" id="Nike" name="brand"><label for="Nike">Nike<span>(12)</span></label></li>
								<li class="filter-list"><input class="pixel-radio" type="radio" id="Adidas" name="brand"><label for="Adidas">Adidas<span>(12)</span></label></li>
								<li class="filter-list"><input class="pixel-radio" type="radio" id="Sneaker" name="brand"><label for="Sneaker">Sneaker<span>(12)</span></label></li>
								<li class="filter-list"><input class="pixel-radio" type="radio" id="dungdichvesinh" name="brand"><label for="dungdichvesinh">Dung dịch vệ sinh giày<span>(5)</span></label></li>
							</ul>
						</form>
					</div>
					<div class="common-filter">
						<div class="head">màu sắc</div>
						<form action="#">
							<ul>
								<li class="filter-list"><input class="pixel-radio" type="radio" id="Đen" name="color"><label for="Đen">Đen<span>(29)</span></label></li>
								<li class="filter-list"><input class="pixel-radio" type="radio" id="trang" name="color"><label for="trang">Trắng<span>(29)</span></label></li>
								<li class="filter-list"><input class="pixel-radio" type="radio" id="vang" name="color"><label for="vang">Vàng<span>(19)</span></label></li>
								<li class="filter-list"><input class="pixel-radio" type="radio" id="xam" name="color"><label for="xam">Xám<span>(19)</span></label></li>
							</ul>
						</form>
					</div>
					<div class="common-filter">
						<div class="head">Price</div>
						<div class="price-range-area">
							<div id="price-range"></div>
							<div class="value-wrapper d-flex">
								<div class="price">Price:</div>
								<span>VND</span>
								<div id="lower-value"></div>
								<div class="to">Đến</div>
								<span>VND</span>
								<div id="upper-value"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-9 col-lg-8 col-md-7">
				<!-- Start Filter Bar -->
				<div class="filter-bar d-flex flex-wrap align-items-center">
					<div class="sorting">
						<select>
							<option value="1">Nike</option>
							<option value="1">Adidas</option>
							<option value="1">Sneaker</option>
						</select>
					</div>
					
					
				</div>

				<!-- End Filter Bar -->
				<!-- Start Best Seller -->
				<section class="lattest-product-area pb-40 category-list">
					<div class="row">
						<!-- single product -->
						<?php if (!isset ($_GET ['iddanhmuc'])): ?>
						<?php if (isset ($_SESSION ['nguoiDung_id']) || !isset ($_SESSION ['nguoiDung_id'])) :?>
						<?php 
							$data = $ProductService->selectProductAll();
							
						?>
						<?php foreach($data as $key): ?>
						<a href="index.php?pages=single-product&id=<?=  $key['id'] ?>">
						<div class="col-lg-4 col-md-6">
							<div class="single-product">
								<img class="img-fluid" src="../upload/<?= $key['img'] ?>" alt="" >
								<div class="product-details">
									<h6><?echo substr($key['name'] , 0 , 28) . '...'  ?></h6>
									<div class="price">
										<!-- <h6><= number_format($key['sale_price'],0,".",",") ?></h6> -->
										<h6 class=""><?= number_format($key['price'],0,".",".") ?>VND</h6>
									</div>
								</div>
							</div>
							</a>	
							<form action="index.php?pages=cart" method="post">
							<button type="submit" class="btn btn-primary" name="addcart" >Thêm vào giỏ hàng</button>
                                        <input type="hidden" name="id" value="<?= $key['id'] ?>">
                                        <input type="hidden" name="img" value="<?= $key['img'] ?>">
                                        <input type="hidden" name="name" value="<?= $key['name'] ?>">
                                        <input type="hidden" name="price" value="<?= $key['price'] ?>">                                    
							</form>
						</div>
						<?php endforeach; ?>
						<?php endif; ?>
						<?php endif; ?>

						<?php if (isset ($_GET ['iddanhmuc'])): ?>
						<?php if (isset ($_SESSION ['nguoiDung_id']) || !isset ($_SESSION ['nguoiDung_id'])) :?>
						<?php 
							$data = $ProductService->selectProductByCate($_GET ['iddanhmuc']);
						?>
						<?php foreach($data as $key): ?>
						<a href="index.php?pages=single-product&id=<?=  $key['id'] ?>">
						<div class="col-lg-4 col-md-6">
							<div class="single-product">
								<img class="img-fluid" src="../upload/<?= $key['img'] ?>" alt="" >
								<div class="product-details">
									<h6><?echo substr($key['name'] , 0 , 28) . '...'  ?></h6>
									<div class="price">
										<!-- <h6><= number_format($key['sale_price'],0,".",",") ?></h6> -->
										<h6 class=""><?= number_format($key['price'],0,".",",") ?>VND</h6>
									</div>
								</div>
							</div>
							</a>	
							<form action="index.php?pages=cart" method="post">
							<button type="submit" class="btn btn-primary" name="addcart" >Thêm vào giỏ hàng</button>
                                        <input type="hidden" name="id" value="<?= $key['id'] ?>">
                                        <input type="hidden" name="img" value="<?= $key['img'] ?>">
                                        <input type="hidden" name="name" value="<?= $key['name'] ?>">
                                        <input type="hidden" name="price" value="<?= $key['price'] ?>">                                    
							</form>
						</div>
						<?php endforeach; ?>
						<?php endif; ?>
						<?php endif; ?>
				</section>
				<br>
				<!-- End Best Seller -->
				<!-- Start Filter Bar -->
				<div class="filter-bar d-flex flex-wrap align-items-center">
					<div class="sorting">
						<select>
							<option value="1">Nike</option>
							<option value="1">Adidas</option>
							<option value="1">Sneaker</option>
							
						</select>
					</div>
					
					
					</div>
				</div>
				<!-- End Filter Bar -->
			</div>
		</div>
	</div>

	<!-- Start related-product Area -->
	<section class="related-product-area section_gap">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="section-title">
						<h1>Ưu đãi trong tuần</h1>
						<p>Cửa hàng VHL STORE có nhiều chương trình ưa đãi trong tuần với nhiều ưu đãi hấp dẫn</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-9">
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="#"><img src="/client/img/r1.jpg" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="#"><img src="img/r2.jpg" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="#"><img src="/client/img/r3.jpg" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="#"><img src="/client/img/r5.jpg" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="#"><img src="/client/img/r6.jpg" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="#"><img src="/client/img/r7.jpg" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="single-related-product d-flex">
								<a href="#"><img src="/client/img/r9.jpg" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="single-related-product d-flex">
								<a href="#"><img src="/client/img/r10.jpg" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="single-related-product d-flex">
								<a href="#"><img src="/client/img/r11.jpg" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="ctg-right">
						<a href="#" target="_blank">
							<img class="img-fluid d-block mx-auto" src="/client/img/category/c5.jpg" alt="">
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End related-product Area -->

	<!-- start footer Area -->
    <?php
        include "footer.php"
    ?>
</p>
            </div>
        </div>
    </footer>
	<!-- End footer Area -->

	<!-- Modal Quick Product View -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="container relative">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="product-quick-view">	
					<div class="row align-items-center">
						<div class="col-lg-6">
							<div class="quick-view-carousel">
								<div class="item" style="background: url(img/organic-food/q1.jpg);">

								</div>
								<div class="item" style="background: url(img/organic-food/q1.jpg);">

								</div>
								<div class="item" style="background: url(img/organic-food/q1.jpg);">

								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="quick-view-content">
								<div class="top">
									<h3 class="head">Mill Oil 1000W Heater, White</h3>
									<div class="price d-flex align-items-center"><span class="lnr lnr-tag"></span> <span class="ml-10">$149.99</span></div>
									<div class="category">Category: <span>Household</span></div>
									<div class="available">Availibility: <span>In Stock</span></div>
								</div>
								<div class="middle">
									<p class="content">Mill Oil is an innovative oil filled radiator with the most modern technology. If you are
										looking for something that can make your interior look awesome, and at the same time give you the pleasant
										warm feeling during the winter.</p>
									<a href="#" class="view-full">View full Details <span class="lnr lnr-arrow-right"></span></a>
								</div>
								<div class="bottom">
									<div class="color-picker d-flex align-items-center">Color:
										<span class="single-pick"></span>
										<span class="single-pick"></span>
										<span class="single-pick"></span>
										<span class="single-pick"></span>
										<span class="single-pick"></span>
									</div>
									<div class="quantity-container d-flex align-items-center mt-15">
										Quantity:
										<input type="text" class="quantity-amount ml-15" value="1" />
										<div class="arrow-btn d-inline-flex flex-column">
											<button class="increase arrow" type="button" title="Increase Quantity"><span class="lnr lnr-chevron-up"></span></button>
											<button class="decrease arrow" type="button" title="Decrease Quantity"><span class="lnr lnr-chevron-down"></span></button>
										</div>

									</div>
									<div class="d-flex mt-20">
										<a href="#" class="view-btn color-2"><span>Add to Cart</span></a>
										<a href="#" class="like-btn"><span class="lnr lnr-layers"></span></a>
										<a href="#" class="like-btn"><span class="lnr lnr-heart"></span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
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