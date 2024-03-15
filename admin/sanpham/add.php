<div class="card" style="padding:4%;">
    <center><h4>THÊM MỚI SẢN PHẨM</h4></center>
    <form action="index.php?act=add-product" method="POST" enctype="multipart/form-data"
        onsubmit="return validateForm()">
        <!-- <div class="mb-3">
            <label for="" class="form-label">Mã SP</label>
            <input type="text" name="maloai" placeholder="" disabled class="form-control" aria-describedby="">
        </div> -->
        <div class="mb-3">
            <label for="" class="form-label">Tên SP</label>
            <input type="text" class="form-control" name="name" placeholder="Nhập vào tên" id="nameInput">
            <small id="nameError" style="color: red;"></small>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Giá SP</label>
            <input type="number" class="form-control" name="price" placeholder="Nhập vào giá" id="priceInput">
            <small id="priceError" style="color: red;"></small>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Ảnh SP</label>
            <input class="form-control" type="file" name="img">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
            <textarea class="form-control" name="description" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Danh Mục</label> <br />
            <select name="id-category" id="categorySelect" class="form-control" style="padding: 4px;">
                <option value='' checked hidden>Chọn danh mục</option>
                <?php
                foreach ($listCategory as $value) {
                    extract($value);
                    echo "<option value='$id'>$name</option>";
                }
                ?>
            </select>
            <small id="categoryError" style="color: red;"></small>
        </div>
        <button type="submit" name="btn-add" class="btn btn-primary">Thêm sp</button>
        <button type="reset" class="btn btn-primary">Nhập lại</button>
        <a href="index.php?act=list-product"><input class="btn btn-primary" type="button" value="Danh sách" /></a>
    </form>
</div>
<script>
    function validateForm() {
        var nameInput = document.getElementById("nameInput");
        var priceInput = document.getElementById("priceInput");
        var categorySelect = document.getElementById("categorySelect");
        var nameError = document.getElementById("nameError");
        var priceError = document.getElementById("priceError");
        var categoryError = document.getElementById("categoryError");
        var isValid = true;

        if (nameInput.value.trim() === "") {
            nameError.innerHTML = "Vui lòng điền vào tên sản phẩm.";
            isValid = false;
        } else {
            nameError.innerHTML = "";
        }

        if (priceInput.value.trim() === "") {
            priceError.innerHTML = "Vui lòng điền vào giá sản phẩm.";
            isValid = false;
        } else {
            priceError.innerHTML = "";
        }

        if (categorySelect.value === "") {
            categoryError.innerHTML = "Vui lòng chọn danh mục.";
            isValid = false;
        } else {
            categoryError.innerHTML = "";
        }

        return isValid;
    }
</script>