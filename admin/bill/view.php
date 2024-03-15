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
</style>
<?php
$server = "localhost";
$username = "root";
$password = "mysql";
$database = "ShopSneaker";
global $connection;
$connection = mysqli_connect($server, $username, $password, $database);
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT cthoadon.id as id, cthoadon.qty as qty, cthoadon.total_product as total_product, 
        sanpham.name as name, sanpham.img as img, sanpham.price as price FROM cthoadon, sanpham WHERE cthoadon.bill_id = '$id' AND cthoadon.product_id = sanpham.id";
    $result = mysqli_query($connection, $sql);
    $rows = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
}
?>
<div class="row2">
    <div class="row2 font_title">
        <center>
            <h1>Chi Tiết Đơn Hàng</h1>
        </center>
    </div>
    <div class="row2 form_content" style="margin-top: 20px;">
        <table class="table table-head-fixed text-nowrap">
            <tr>
                <th>STT</th>
                <th>Mã Đơn</th>
                <th>Tên</th>
                <th>Hình ảnh</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng cộng</th>
            </tr>
            <tbody>
                <?php foreach ($rows as $key => $item) : ?>
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo $id ?></td>
                        <td><?php echo $item['name']; ?></td>
                        <td><img src="../upload/<?php echo $item['img']; ?>" width="75" alt=""></td>
                        <td><?php echo number_format($item['price'], 0, ",", "."); ?></td>
                        <td><?php echo $item['qty']; ?></td>
                        <td><?php echo number_format($item['total_product'], 0, ",", "."); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>