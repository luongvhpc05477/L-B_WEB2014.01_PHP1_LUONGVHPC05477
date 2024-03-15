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
</style>
<div class="row2">
    <div class="row2 font_title">
        <center><h1>BẢNG THỐNG KÊ</h1></center>
    </div>
    <div class="row2 form_content" style="margin-top: 20px;">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">
                <table class="table table-head-fixed text-nowrap">
                    <tr>
                        <th>STT</th>
                        <th>Loại Hàng</th>
                        <th>Số Lượng</th>
                        <th>Giá Cao Nhất</th>
                        <th>Giá Thấp Nhất</th>
                        <th>Giá Trung Bình</th>
                    </tr>
                    <?php
                    foreach ($listPro as $key => $value) {
                        extract($value);
                    ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $NAMEDM ?></td>
                            <td><?= $COUNTSP ?></td>
                            <td><?= $MAXPRICE ?></td>
                            <td> <?= $MINPRICE ?> </td>
                            <td><?= $AVGPRICE ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
            <div class="row mb10">
                <a href="index.php?act=chart"> <input class="btn btn-primary" type="button" value="Biểu đồ" /></a>
            </div>
        </form>
    </div>
</div>