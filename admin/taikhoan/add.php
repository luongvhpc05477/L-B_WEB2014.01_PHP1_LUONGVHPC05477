<center><h1>THÊM MỚI TÀI KHOẢN</h1></center>
<form action="index.php?act=add-user" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
    <div class="mb-3">
        <label for="" class="form-label">User</label>
        <input type="text" class="form-control" name="user" id="user" placeholder="Nhập tên người dùng">
        <span id="error_user" style="color: red;"></span>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Password</label>
        <input type="password" class="form-control" name="pass" id="pass" placeholder="nhập password">
        <span id="error_pass" style="color: red;"></span>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Nhập email">
        <span id="error_email" style="color: red;"></span>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Address</label>
        <input type="text" class="form-control" name="address" id="address" placeholder="Nhập địa chỉ">
        <span id="error_address" style="color: red;"></span>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Tel</label>
        <input type="text" class="form-control" name="tel" id="tel" placeholder="Nhập vào SDT">
        <span id="error_tel" style="color: red;"></span>
    </div>
    <div id="error_message" style="color: red;"></div>


    <div class="mb-3">
        <label for="">Role</label>
        <div class="form-control">
            <label for="" class="radio-inline"><input type="radio" name="role" value="0">Khách hàng</label>
            <label for="" class="radio-inline"><input type="radio" name="role" value="1" checked>Nhân viên</label>
        </div>
    </div>

    <button type="submit" name="btn-add" class="btn btn-primary">Submit</button>
    <button type="reset" class="btn btn-primary">Nhập lại</button>
    <a href="index.php?act=list-user"><input class="btn btn-primary" type="button" value="DANH SÁCH" /></a>
</form>

<script>
    function validateForm() {
        var user = document.getElementById("user").value;
        var pass = document.getElementById("pass").value;
        var email = document.getElementById("email").value;
        var address = document.getElementById("address").value;
        var tel = document.getElementById("tel").value;

        // Reset error messages
        document.getElementById("error_user").innerHTML = "";
        document.getElementById("error_pass").innerHTML = "";
        document.getElementById("error_email").innerHTML = "";
        document.getElementById("error_address").innerHTML = "";
        document.getElementById("error_tel").innerHTML = "";

        // Validate each field
        var hasErrors = false;

        if (user.trim() === "") {
            document.getElementById("error_user").innerHTML = "Vui lòng nhập họ tên";
            hasErrors = true;
        }

        if (pass.trim() === "") {
            document.getElementById("error_pass").innerHTML = "Vui lòng nhập mật khẩu";
            hasErrors = true;
        }

        if (email.trim() === "") {
            document.getElementById("error_email").innerHTML = "Vui lòng nhập địa chỉ email";
            hasErrors = true;
        }

        if (address.trim() === "") {
            document.getElementById("error_address").innerHTML = "Vui lòng nhập địa chỉ";
            hasErrors = true;
        }

        if (tel.trim() === "") {
            document.getElementById("error_tel").innerHTML = "Vui lòng nhập số điện thoại";
            hasErrors = true;
        } else {
            // Check if tel contains only numbers
            var telRegex = /^\d+$/;
            if (!telRegex.test(tel)) {
                document.getElementById("error_tel").innerHTML = "Số điện thoại chỉ được nhập số";
                hasErrors = true;
            }
        }
        // Return true if there are no errors, false otherwise
        return !hasErrors;
    }
</script>



