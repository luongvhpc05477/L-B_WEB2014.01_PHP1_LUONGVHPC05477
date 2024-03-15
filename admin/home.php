<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dashboard | Simple - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets\images\favicon.ico">
    <!-- App css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="assets\css\icons.min.css" rel="stylesheet" type="text/css">

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div>
                    <h4 class="header-title mb-3">Welcome !</h4>
                </div>
            </div>
        </div>
        <!-- end row -->
       
        <!--end row -->

        <div class="row">         
            <div class="col-lg-6">
                <div class="card-box">
                   <center> <h5 class="mt-0 font-14">Thống kê doanh thu</h5></center>
                    <div class="text-center">
                        
                    </div>
                    <div id="dashboard-bar-stacked" class="morris-chart" dir="ltr" style="height: 300px;"></div>
                    <center><ul class="list-inline chart-detail-list">
                            <li class="list-inline-item">
                                <p class="font-weight-semibold"><i class="fa fa-circle mr-2 text-primary"></i>Slip–on
                                </p>
                            </li>
                            <li class="list-inline-item">
                                <p class="font-weight-semibold"><i class="fa fa-circle mr-2 text-muted"></i>High–top</p>
                            </li>
                        </ul></center>
                </div>
            </div>
            <!-- end col -->

            <div class="col-lg-6">
                <div class="card-box">
                    <center><h5 class="mt-0 font-14">Phân tích</h5></center>
                    <div class="text-center">
                        
                    </div>
                    <div id="dashboard-line-chart" class="morris-chart" dir="ltr" style="height: 300px;"></div>
                    <center><ul class="list-inline chart-detail-list">
                            <li class="list-inline-item">
                                <p class="font-weight-semibold"><i class="fa fa-circle mr-2 text-primary"></i>Slip–on
                                </p>
                            </li>
                            <li class="list-inline-item">
                                <p class="font-weight-semibold"><i class="fa fa-circle mr-2 text-info"></i>High–top</p>
                            </li>
                        </ul></center>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <script src="assets\js\vendor.min.js"></script>

    <script src="assets\libs\morris-js\morris.min.js"></script>
    <script src="assets\libs\raphael\raphael.min.js"></script>

    <script src="assets\js\pages\dashboard.init.js"></script>

    <!-- App js -->
    <script src="assets\js\app.min.js"></script>

</body>

</html>