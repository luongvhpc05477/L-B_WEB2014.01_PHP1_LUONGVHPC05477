<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../public/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="https://kit.fontawesome.com/8c204d0fdf.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container-fluid main-page">
        <div class="app-main">
        <nav class="sidebar bg-info">

<ul>
    <li> <a href="index.php"><i class="fa-solid fa-house ico-side"></i>Shop Sneaker</a><hr></li>
    <li> <a href="/admin/index.php?act=add-category"><i class="fa-solid fa-folder-open ico-side"></i>Quản lí danh mục</a> </li>
    <li> <a href="index.php?act=add-product"><i class="fa-solid fas fa-archive ico-side"></i>Quản lí sản phẩm</a></li>
    <li> <a href="index.php?act=list-bill"><i class="fa-solid fas fa-comment-dollar ico-side"></i>Quản kí đơn hàng</a></li>
    <li> <a href="index.php?act=list-user"><i class="fa-solid fa-user ico-side"></i>Quản lí người dùng</a></li>
    <li> <a href="index.php?act=analytics"><i class="fa-solid fas fa-poll ico-side"></i>Thống kê</a></li>
    <li> <a href="index.php?act=list-comment"><i class="fa-solid far fa-comment-dots ico-side"></i>Quản lí bình luận</a></li>
    <?
        if (isset ($_SESSION ['id'])) {
            ?>
                <li> <a href="index.php?act=logaut"><i class=" fa fa-undo ico-side"></i>Đăng xuất</a></li>
            <?
        }
    ?>
</ul>
</nav>

            <div class="main-content">
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
   
  </nav>
                <h3 class="title-page"> Dashboards </h3>
              
                <section class="statis mt-4 text-center">
                    <div class="row">
                        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <div class="box bg-primary p-3">
                                <i class="uil-eye"></i>
                                <h3>0</h3>
                                <p class="lead"> Tổng doanh mục</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <div class="box bg-danger p-3">
                                <i class="uil-user"></i>
                                <h3>0</h3>
                                <p class="lead">Tổng thành viên</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                            <div class="box bg-warning p-3">
                                <i class="uil-shopping-cart"></i>
                                <h3>0</h3>
                                <p class="lead">Tổng sản phẩm</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="box bg-success p-3">
                                <i class="uil-feedback"></i>
                                <h3>0</h3>
                                <p class="lead">Tổng bình luận</p>
                            </div>
                        </div>
                    </div>
                </section>
            

</body>

</html>