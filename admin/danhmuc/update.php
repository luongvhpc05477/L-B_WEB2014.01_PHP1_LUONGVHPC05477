<?php
if (is_array($result)) {
    extract($result);
}
?>
<center><h1>CẬP NHẬT LOẠI</h1></center>
<form action="index.php?act=update-category" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Mã loại</label>
    <input type="text" name="maloai" class="form-control" aria-describedby="" disabled value="<?php echo $id ?>">
    <input type="hidden" name="id" value="<?php echo $id ?>" />
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Tên loại</label>
    <input type="text" name="tenloai" class="form-control" value="<?php echo $name ?>">
  </div>
  <button type="submit" name="btn-update" class="btn btn-primary">Sửa</button>
  <button type="reset" class="btn btn-primary">Nhập lại</button>
  <a href="index.php?act=list-category"><input class="btn btn-primary" type="button" value="DANH SÁCH" /></a>
</form>