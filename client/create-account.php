<?php
// include_once 'config/database.php';

// global $connection;
if (isset($_POST['register'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	// Kiểm tra xem tài khoản đã tồn tại trong cơ sở dữ liệu chưa
	$checkquery = "SELECT * FROM taikhoan WHERE user = '$username'";
	$checkresult = pdo_query($checkquery);
	$tong=0;
	foreach($checkresult as $checkresult ){
		$tong+=$checkresult['id'];
	}
	if ($tong == 0) {
		// Tài khoản đã tồn tại
		$insertquery = "INSERT INTO taikhoan (user, email, pass,role,address,tel) VALUES ('$username','$email', '$password',2,'khongco','khongco')";
		pdo_query( $insertquery);
		//  echo "Đăng ký thành công!";
	} else {
		// Thêm tài khoản mới vào cơ sở dữ liệu
		echo "Tài khoản đã tồn tại!";
		// $test = mysqli_query($connection, $insertQuery);
		// var_dump($test);
		// if (pdo_query( $insertquery)) {
		// 	// echo "Đăng ký thành công!";
		// } else {
		// 	echo "Có lỗi khi đăng ký!";
		// }
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
					<h1>Đăng nhập/ Đăng ký</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php?pages=homepage">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
						<a href="index.php?pages=login">Đăng nhập/ Đăng ký</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="client/img/login.jpg" alt="">
						<div class="hover">
							<h4>Nếu bạn đã có tài khoản hãy đăng nhập</h4>
							<p>
								<a class="primary-btn" href="index.php?pages=login">Đăng nhập</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Đăng ký</h3>
						<form class="row login_form" action="" method="post" id="contactForm" novalidate="novalidate" enctype="multipart/form-data" onsubmit="return validateForm()">
							<div class="col-md-12 form-group">
								<input type="text" class="form-control"  name="username" placeholder="Nhập họ tên" id="nameInput">
								<div id="nameError" class="error" style="color: red;"></div>
								
							</div>
							<div class="col-md-12 form-group">
								<input type="email" class="form-control"  name="email" placeholder="Nhập Email" id="emailInput">
								<div id="emailError" class="error" style="color: red;"></div>
								
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control"  name="password" placeholder="Nhập Password" id="passwordInput">
								<div id="passwordError" class="error" style="color: red;"></div>
								
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" required name="confirmPassword" placeholder="Nhập lại Password" id="confirmPasswordInput">
								<div id="confirmPasswordError" class="error" style="color: red;"></div>
								
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" name="register" class="primary-btn">Đăng Ký</button>
							</div>
						</form>

						<script>
							function validateForm() {
								var nameInput = document.getElementById("nameInput");
								var emailInput = document.getElementById("emailInput");
								var passwordInput = document.getElementById("passwordInput");
								var confirmPasswordInput = document.getElementById("confirmPasswordInput");
								var nameError = document.getElementById("nameError");
								var emailError = document.getElementById("emailError");
								var passwordError = document.getElementById("passwordError");
								var confirmPasswordError = document.getElementById("confirmPasswordError");

								var isValid = true;

								if (nameInput.value.trim() === "") {
									nameError.innerHTML = "Vui lòng điền vào họ tên.";
									isValid = false;
								} else {
									nameError.innerHTML = "";
								}

								if (emailInput.value.trim() === "") {
									emailError.innerHTML = "Vui lòng điền vào email.";
									isValid = false;
								} else {
									emailError.innerHTML = "";
								}

								if (passwordInput.value.trim() === "") {
									passwordError.innerHTML = "Vui lòng điền vào mật khẩu.";
									isValid = false;
								} else {
									passwordError.innerHTML = "";
								}

								if (confirmPasswordInput.value.trim() === "") {
									confirmPasswordError.innerHTML = "Vui lòng điền vào mật khẩu xác nhận.";
									isValid = false;
								} else if (confirmPasswordInput.value.trim() !== passwordInput.value.trim()) {
									confirmPasswordError.innerHTML = "Mật khẩu xác nhận không khớp.";
									isValid = false;
								} else {
									confirmPasswordError.innerHTML = "";
								}

								return isValid;
							}
						</script>
	</section>
	<!--================End Login Box Area =================-->

	<!-- start footer Area -->
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