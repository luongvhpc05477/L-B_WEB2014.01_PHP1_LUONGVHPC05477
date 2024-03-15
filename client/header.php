<header class="header_area sticky-header">
	<div class="main_menu">
		<nav class="navbar navbar-expand-lg navbar-light main_box">
			<div class="container">
				<a class="navbar-brand logo_h" href="index.php"><img src="/client/img//logoshop.jpg" style="width:100px ;height:100px"  alt=""></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
				 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
					<ul class="nav navbar-nav menu_nav ml-auto">
						<li class="nav-item "><a class="nav-link" href="index.php?pages=homepage">Trang chủ</a></li>
						<li class="nav-item "><a class="nav-link" href="index.php?pages=category">Sản phẩm</a></li>						
						<li class="nav-item"><a class="nav-link" href="index.php?pages=blog">Tin tức</a></li>
						<li class="nav-item"><a class="nav-link" href="index.php?pages=contact">Liên hệ</a></li>
						
						<!-- Conditional rendering based on user session -->
						<?
							if (isset ($_SESSION ['nguoiDung_id'])) {
								?>
									<li class="nav-item"><a class="nav-link" href="index.php?pages=logout">Đăng xuất</a></li>
								<?
							} else {
								?>
									<li class="nav-item"><a class="nav-link" href="index.php?pages=login">Đăng nhập</a></li>
								<?
							}
						?>										
					</ul>

					<ul class="nav navbar-nav navbar-right">
						<li class="nav-item"><a href="index.php?pages=cart" class="cart"><span class="ti-bag"></span></a></li>
						<li class="nav-item">
							<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
						</li>
						<?
						if (isset ($_SESSION ['nguoiDung_id'])) {
							
							$id = $_SESSION ['nguoiDung_id'] ;
							$select = pdo_query_one( "SELECT * FROM taikhoan WHERE id = '$id'")['user'] ;
									echo"<li style='margin-top:auto; margin-bottom:auto;' class='nav-item'><a class='nav-link' href='index.php?pages=login'> 
									$select </a></li>";
									
						}
						?>	
					</ul>
				</div>				
			</div>
		</nav>
	</div>
	<div class="search_input" id="search_input_box">
		<div class="container">
			<form class="d-flex justify-content-between">
				<input type="text" class="form-control" id="search_input" placeholder="Search here">
				<button type="submit" class="btn"></button>
				<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
			</form>
		</div>
	</div>
</header>