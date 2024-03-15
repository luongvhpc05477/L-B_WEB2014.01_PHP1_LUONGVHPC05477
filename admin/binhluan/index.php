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
        <h1>DANH SÁCH BÌNH LUẬN</h1>
    </div>
    <div class="row2 form_content">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">
                <table class="table table-head-fixed text-nowrap">
                    <tr>
                       
                        <th>ID</th>
                        <th>Nội dung</th>
                        <th>ID KH</th>
                        <th>ID SP</th>
                        <th>Thời gian</th>
                        <th>Hành động</th>
                    </tr>
                    <?php
                    foreach ($listComment as $key => $value) {
                        $deleteComment = "index.php?act=delete-comment&id=" . $value['id'];
                    ?>
                        <tr>
                            <td><?php echo $value['id'] ?></td>
                            <td><?php echo $value['noidung'] ?></td>
                            <td><?php echo $value['iduser'] ?></td>
                            <td><?php echo $value['idpro'] ?></td>
                            <td><?php echo $value['ngaybinhluan'] ?></td>
                            <td>
                                <!-- <a href=""><input type="button"class="btn btn-primary" value="Sửa" /></a> -->
                                <a href="#" onclick="confirmDelete('<?= $deleteComment ?>'); return false;"><input type="button"class="btn btn-danger" value="Xóa" /></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </form>
    </div>
</div>

<script>
    function confirmDelete(deleteUrl) {
        if (confirm("Bạn có chắc muốn xóa bình luận không?")) {
            window.location.href = deleteUrl;
        }
    }
</script>