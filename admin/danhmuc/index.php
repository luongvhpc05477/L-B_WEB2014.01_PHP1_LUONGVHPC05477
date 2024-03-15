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
<div class="row">
    <div class="row2 font_title">
        <center><h1>DANH SÁCH LOẠI HÀNG HÓA</h1></center>
    </div>
    <div class="row form_content">
        <form action="#" method="POST">
            <div class="row mb10 formds_loai">
                <table class="table table-head-fixed text-nowrap">
                    <tr>

                        <th>Mã loại</th>
                        <th>Tên loại</th>

                        <th>Hành động</th>
                    </tr>
                    <?php
                    foreach ($listCategory as $key => $value) {
                        $deleteCategory = '/admin/index.php?act=delete-category&id=' . $value['id'];
                        $editCategory = '/admin/index.php?act=edit-category&id=' . $value['id'];
                    ?>

                        <td><?php echo $value['id'] ?></td>
                        <td><?php echo $value['name'] ?></td>
                        <td>
                            <a href="<?php echo $editCategory ?>"><input class="btn btn-primary" type="button" value="Sửa" /></a>
                            <a href="<?php echo $deleteCategory ?>" onclick="return confirmDelete()"><input class="btn btn-danger" type="button" value="Xóa" /></a>
                        </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
            <!-- <input class="btn btn-primary" type="button" value="CHỌN TẤT CẢ" />
            <input class="btn btn-primary" type="button" value="BỎ CHỌN TẤT CẢ" /> -->
            <a href="index.php?act=add-category"> <input class="btn btn-primary" type="button" value="NHẬP THÊM" /></a>
        </form>
    </div>
</div>

<script>
    function confirmDelete() {
        return confirm("Bạn có chắc chắn muốn xóa không?");
    }
</script>