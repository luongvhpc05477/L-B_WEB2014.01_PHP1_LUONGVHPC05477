<style>
    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 8px;
        border: 1px solid #ccc;
    }

    .table th {
        font-weight: bold;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .btn-action {
        margin-right: 5px;
    }




    input[type="text"],
    input[type="submit"] {
        padding: 10px;
        border: none;
        border-radius: 5px;
        font-size: 15px;
        color: #333;
    }

    input[type="text"] {
        background-color: #f2f2f2;
        margin-right: 5px;
    }

    input[type="submit"] {
        background-color: #62c2f7;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #9fd7f9;
    }

    <?php

    $server = "localhost";
    $username = "root";
    $password = "mysql";
    $database = "ShopSneaker";

    global $connection;


    $connection = mysqli_connect($server, $username, $password, $database);


    if (!$connection) {
        echo "lỗi kết nối cơ sở dữ lieu!";
        die();
    }

    $sql = "SELECT * FROM hoadon";
    $result = mysqli_query($connection, $sql);

    $data = [];
    $rowNum = 1;
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $data[] = array(
            'rowNum' => $rowNum, // sử dụng biến tự tăng để làm dữ liệu cột STT
            'id' => $row['bill_id'],
            'name' => $row['user_name'],
            'email' => $row['user_email'],
            'phone' => $row['user_phone'],
            'address' => $row['user_address'],
            'total' => $row['order_total'],
            'pay' => $row['order_payment'],
            'create_at' => $row['create_at']
        );
        $rowNum++;
    }

    ?>
</style>
<div class="row2">
    <div class="row2 font_title">
        <center>
            <h1>Danh sách đơn hàng</h1>
        </center>
    </div>
    <div class="row2 form_content" style="margin-top: 20px;">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">
                <table class="table table-head-fixed text-nowrap">
                    <tr>
                        <th>STT</th>
                        <th>Mã DH</th>
                        <th>Tên Khách Hàng</th>
                        <th>Email</th>
                        <th>SĐT</th>
                        <th>Địa Chỉ</th>
                        <th>Tổng Cộng</th>
                        <th>Thanh Toán</th>
                        <th>Ngày đặt</th>
                        <th>###</th>
                    </tr>
                    <?php
                    foreach ($data as $row) {
                        $deleteBill = "/admin/index.php?act=delete-bill&id=" . $row['id'];
                        // $editBill = "/admin/index.php?act=edit-bill&id=" . $row['id'];
                        // $amount = $serviceCart->getAmountCart($row['id']);
                        // $status = $serviceCart->getStatusBill($row['status']);
                        if ($row['pay'] == 0) {
                            $pay = 'Chuyển khoản';
                        } else {
                            $pay = 'Tiền mặt';
                        }
                    ?>
                        <tr>
                            <td><?php echo $row['rowNum']; ?></td>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><?php echo number_format($row['total'], 0, ",", "."); ?>đ</td>
                            <td><?php echo $pay; ?></td>
                            <td><?php echo $row['create_at']; ?></td>
                            <!-- <td>
                                <?= $status ?>
                            </td> -->
                            <td>
                                <!-- <a href="<?php echo $editBill ?>"><input type="button" class="btn btn-primary" value="Sửa" /></a>
                                <a href="<?php echo $deleteBill ?>"> <input type="button" class="btn btn-danger" value="Xóa" /></a> -->
                                <a href="./index.php?act=view-bill&id=<?php echo $row['id']; ?>" id="btnDelete" class="btn btn-danger">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
            <!-- <input class="mr20" type="button" value="CHỌN TẤT CẢ" />
                <input class="mr20" type="button" value="BỎ CHỌN TẤT CẢ" /> -->
            <!-- <a href="index.php?act=add-product"> <input class="btn btn-primary" type="button" value="NHẬP THÊM" /></a> -->
        </form>
    </div>
</div>