<?php
// include_once 'config/database.php';



if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];



	// Kiểm tra xem tài khoản đã tồn tại trong cơ sở dữ liệu chưa
	$query = "SELECT * FROM taikhoan WHERE user = '$username' AND pass = '$password' ";

	$result = pdo_query_one($query);
	if (!empty($result)) {
		$_SESSION['nguoiDung_id'] = $result['id'];
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
						<a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
						<a href="index.php?pages=login">Đăng nhập/ Đăng ký</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	
	<?php 
	if (isset($_SESSION['error_message'])) {
		echo $_SESSION['error_message'];
		unset($_SESSION['error_message']); // Clear the error message after displaying
	  }
	?>
	<!-- End Banner Area -->

	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="client/img/login.jpg" alt="">
						<div class="hover">
							<h4>Nếu bạn là khách hàng mới hãy tạo tài khoản ngay?</h4>

							<a class="primary-btn" href="index.php?pages=dangky">Tạo tài khoản </a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Đăng nhập</h3>
						<form class="row login_form" action="" method="post" id="contactForm" novalidate="novalidate" enctype="multipart/form-data" onsubmit="return validateForm()">
							<?php
							function checkLogin($user, $pass)
							{
								// Thực hiện kiểm tra với cơ sở dữ liệu hoặc bất kỳ cơ chế nào khác
								// Trong ví dụ này, sử dụng điều kiện đơn giản
								$validusername = "example_username";
								$validpassword = "example_password";

								if ($user == $validusername &&  $pass == $validpassword) {
									return true;
								} else {
									return false;
								}
							}

							// Kiểm tra xem form đã được submit chưa
							if ($_SERVER['REQUEST_METHOD'] === 'POST') {
								// Lấy dữ liệu từ form
								$username = isset($_POST['username']) ? $_POST['username'] : '';
								$password = isset($_POST['password']) ? $_POST['password'] : '';

								// Kiểm tra đăng nhập
								if (!empty($username) && !empty($password) && checkLogin($username, $password)) {
									// Đăng nhập thành công
									header("Location: index.php"); // Chuyển hướng đến trang chủ
									exit();
								} else {
									// Hiển thị thông báo lỗi và quay lại trang đăng nhập
									$error_message = '<span style="color: red;">Tên đăng nhập hoặc mật khẩu không đúng. Vui lòng thử lại.</span>';
								}
							}
							?>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="nameInput" name="username" placeholder="Nhập Họ Tên">
								<span id="nameError" style="color: red;"></span>
							</div>

							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="passwordInput" name="password" placeholder="Nhập Password">
								<span id="passwordError" style="color: red;"></span>
							</div>

							<div class="col-md-12 form-group">
								<?php if (isset($error_message)) echo $error_message; ?>
							</div>

							<div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="f-option2" name="selector">
									<label for="f-option2">Luôn Đăng Nhập</label>
								</div>
							</div>

							<div class="col-md-12 form-group">
								<button type="submit" value="submit" name="login" class="primary-btn">Đăng nhập</button>
								<a href="#">Quên mật khẩu?</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<script>
			function validateForm() {
				var nameInput = document.getElementById("nameInput");
				var passwordInput = document.getElementById("passwordInput");

				var nameError = document.getElementById("nameError");
				var passwordError = document.getElementById("passwordError");

				var isValid = true;

				if (nameInput.value.trim() === "") {
					nameError.innerHTML = "Vui lòng điền vào họ tên.";
					isValid = false;
				} else {
					nameError.innerHTML = "";
				}

				if (passwordInput.value.trim() === "") {
					passwordError.innerHTML = "Vui lòng điền vào password.";
					isValid = false;
				} else {
					passwordError.innerHTML = "";
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