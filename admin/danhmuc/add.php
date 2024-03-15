
<center>
  <h1>THÊM MỚI LOẠI</h1>
</center>
<form action="index.php?act=add-category" method="POST" onsubmit="return validateForm()">
  <div class="mb-3">
    <?php 
    if (isset($error_name)) {
      echo '<small class="text-danger"> ' . $error_name . ' </small>';
  }
	?>

    <label for="exampleInputEmail1" class="form-label">Mã loại</label>
    <input type="text" name="maloai" class="form-control" aria-describedby="" disabled placeholder="Tự động">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Tên loại</label>
    <input type="text" name="tenloai" id="tenloai" class="form-control" placeholder="Nhập vào loại">
    <div id="error_message" style="color: red;"></div>
  </div>
  <button type="submit" name="add-new" class="btn btn-primary">Thêm</button>
  <button type="reset" class="btn btn-primary">Nhập lại</button>
  <a href="index.php?act=list-category"><input class="btn btn-primary" type="button" value="DANH SÁCH" /></a>
</form>

<script>
  function validateForm() {
    var tenloai = document.getElementById("tenloai").value;

    if (tenloai.trim() === "") {
      document.getElementById("error_message").innerHTML = "Vui lòng nhập vào tên loại";
      return false;
    }

    return true;
  }
</script>

