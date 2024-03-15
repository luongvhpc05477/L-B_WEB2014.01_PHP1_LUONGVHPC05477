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
    <div class="row font_title">
        <h1>DANH SÁCH THÀNH VIÊN</h1>
    </div>
    <div class="row form_content">
        <form action="#" method="POST">
            <div class="row mb10 formds_loai">
                <table class="table table-head-fixed text-nowrap">
                    <tr>
                    
                        <th>ID</th>
                        <th>Tên đăng nhập</th>
                        <th>Email</th>
                        <th>Mật khẩu</th>
                        <th>Địa chỉ</th>
                        <th>SĐT</th>
                        <th>Vai trò</th>
                        <th>Hành động</th>
                        <th></th>
                    </tr>
                    <?php
                    foreach ($listUser as $key => $value) {
                        $deleteUser = "/admin/index.php?act=delete-user&id=" . $value['id'];
                        $editUser = "/admin/index.php?act=edit-user&id=" . $value['id'];
                    ?>
                        <tr>
                          
                            <td>
                                <?php echo $value['id'] ?>
                            </td>
                            <td>
                                <?php echo $value['user'] ?>
                            </td>
                            <td>
                                <?php echo $value['email'] ?>
                            </td>
                            <td>
                                <?php echo md5($value['pass']) ?>
                            </td>
                            <td>
                                <?php echo $value['address'] ?>
                            </td>
                            <td>
                                <?php echo $value['tel'] ?>
                            </td>
                            <td>
                                <?php
                                if ($value['role'] == 1) {
                                    echo "Nhân viên";
                                } else {
                                    echo "khách hàng";
                                }
                                ?>
                            </td>

                            <td>
                                <a href="<?php echo $editUser ?>"><input class="btn btn-primary" type="button" value="Sửa" /></a>
                                <a href="#" onclick="confirmDelete('<?php echo $deleteUser ?>')"><input class="btn btn-danger" type="button" value="Xóa" /></a>
                            </td>
                        </tr>

                    <?php
                    }
                    ?>

                </table>
            </div>
            <a href="index.php?act=add-user"> <input class="btn btn-primary" type="button" value="NHẬP THÊM" /></a>
        </form>
    </div>
</div>

<script>
    function confirmDelete(deleteUrl) {
        if (confirm("Bạn có chắc muốn xóa không?")) {
            window.location.href = deleteUrl;
        }
    }
</script>