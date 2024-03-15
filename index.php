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
	<title>ShopSneaker</title>
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
	<link rel="stylesheet" href="/client/css/magnific-popup.css">
	<link rel="stylesheet" href="/client/css/main.css">
</head>

<body>
	<?php
	session_start();
	include "module/pdo.php";
	if (isset($_GET["pages"])) {
		switch ($_GET["pages"]) {
			case "index":

				break;

			default:
				include "client/homepage.php";
				break;


			case "login":

				include "client/login.php";
				break;

			case "logout":
				unset($_SESSION['nguoiDung_id']);
				header("Location: index.php");
				break;

			case "dangky":
				include "client/create-account.php";
				break;

			case "cart":
				include "client/cart.php";
				break;
			case "addcart":
				include "client/cart.php";
				break;

			case "xoacart":
				include "client/cart.php";
				break;

			case "editcart":
				include "client/cart.php";
				break;

			case "camon":
			    include "client/camon.php";
				break;


			case "checkout":

				include "client/checkout.php";
				break;

			case "blog":

				include "client/blog.php";
				break;
			case "category":

				include "client/category.php";
				break;

			case "contact":

				include "client/contact.php";
				break;
			case "contact_process":

				include "client/contact.php";
				break;

			case "elements":

				include "client/elements.php";
				break;
			case "login":

				include "client/login.php";
				break;
			case "single-blog":

				include "client/single-blog.php";
				break;

			case "single-product":

				include "client/single-product.php";
				break;


			case "comment":
				if (isset($_POST['btn-comment'])) {
					$content = $_POST['content'];
					$idPro = $_POST['id-pro'];
					$idUser = $_SESSION['nguoiDung_id'];
					include "./module/product.php";
					$ProductService->insertComment($content, $idUser, $idPro);
					header('location: index.php?pages=single-product&id=' . $idPro);
				} else
					header('location: index.php');
				break;
		}
	} else {
		include "client/homepage.php";
	}
	?>

	<!-- start footer Area -->

	<!-- End footer Area -->

	<script src="./client/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="./client/js/vendor/bootstrap.min.js"></script>
	<script src="./client/js/jquery.ajaxchimp.min.js"></script>
	<script src="./client/js/jquery.nice-select.min.js"></script>
	<script src="./client/js/jquery.sticky.js"></script>
	<script src="./client/js/nouislider.min.js"></script>
	<script src="./client/js/countdown.js"></script>
	<script src="./client/js/jquery.magnific-popup.min.js"></script>
	<script src="./client/js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="./client/js/gmaps.min.js"></script>
	<script src="./client/js/main.js"></script>
</body>

</html>