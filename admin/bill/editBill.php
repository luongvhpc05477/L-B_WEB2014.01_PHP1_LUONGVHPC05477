<div class="row2">
    <div class="row2 font_title">
        <center><h1>Chỉnh sửa đơn hàng</h1></center>
    </div>
    <div class="row2 form_content" style="margin: 10px 0; float: left;">
        <form action="/admin/index.php?act=update-bill" method="POST">
            <div>
                <label>ID:</label><input type="text" value="<?= $bill['id'] ?>" disabled>
                <input type="hidden" value="<?= $bill['id'] ?>" name="id">
                <label>Trạng thái: <select name="status" id="">
                        <?php
                        $listStatus = ['Đơn mới', 'Xử lý', 'Vân chuyển', 'Hoàn tất'];
                        foreach ($listStatus as $key => $value) {
                            ?>
                            <option <?= $bill['status'] == $key ? 'selected' : '' ?> value="<?= $key ?>">
                                <?= $value ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select></label>
            </div>
            <div class="row mb10" style="margin: 10px 0;">
                <input class="mr20" type="submit" value="Cập nhập" name="btn-update-bill" />
            </div>
        </form>
    </div>
</div>