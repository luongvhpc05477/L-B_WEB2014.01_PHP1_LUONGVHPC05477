<div class="card" style="padding: 2%;">
    <center>
        <h4>THÊM MỚI SẢN PHẨM</h4>
    </center>
    <form action="index.php?act=update-product" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
        <div class="mb-3">
            <label for="" class="form-label">Mã SP</label>
            <input type="text" name="maloai" placeholder="Auto tăng" disabled class="form-control" aria-describedby="">
            <input type="hidden" name="id" value="<?php echo $product['id'] ?>" />
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Tên SP</label>
            <input type="text" class="form-control" name="name" placeholder="Nhập vào tên" id="nameInput"
                value="<?php echo $product['name'] ?>">
            <span id="nameError" style="color: red;"></span>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Giá SP</label>
            <input type="number" class="form-control" name="price" placeholder="Nhập vào giá" id="priceInput"
                value="<?php echo $product['price'] ?>">
            <span id="priceError" style="color: red;"></span>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Ảnh SP</label>
            <img src="/upload/<?php echo $product['img'] ?>" width="140px" alt="">
            <input class="form-control" type="file" name="img">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
            <textarea class="form-control" name="description" rows="3"><?php echo $product["mota"] ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">ID Danh Mục</label> <br />
            <select name="id-category" id="categorySelect" class="form-control" style="padding: 4px;">
                <?php foreach ($listCategory as $value) {
                    extract($value);
                ?>
                    <option <?php echo $product['iddm'] == $id ? 'selected' : '' ?> value='<?php echo $id ?>'>
                        <?php echo $name ?>
                    </option>
                <?php
                } ?>
            </select>
            <span id="categoryError" style="color: red;"></span>
        </div>
        <button type="submit" name="btn-update" class="btn btn-primary">Sửa</button>
        <button type="reset" class="btn btn-primary">Nhập lại</button>
        <a href="index.php?act=list-product"><input class="btn btn-primary" type="button" value="DANH SÁCH" /></a>
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