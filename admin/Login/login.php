<?
  ob_start () ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://use.typekit.net/rjb4unc.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>
    <title>Document</title>
</head>
<style>
    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
        font-family: Arial, sans-serif;
        background: #9FD7F9;
    }

    .logo {
        font-size: 24px;
        color: #FF0000;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .login-item {
        background-color: #f5f5f5;
        padding: 40px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-field {
        margin-bottom: 15px;
    }

    .form-label {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .form-input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
    }

    .form-input:focus {
        outline: none;
        border-color: #6c63ff;
    }

    .form-error {
        color: red;
        font-size: 12px;
    }

    .form-submit {
        text-align: center;
    }



    .hihi {
        text-align: center;
    }
    
    .hihi input[type="submit"] {
        background-color: #6c63ff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 14px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    
    .hihi input[type="submit"]:hover {
        background-color: #554eeb;
    }
</style>
<body>




  <div class="container">
    <div class="logo">Đăng nhập</div>
    <div class="login-item">
    <form action="" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">

    <?php
    function checkLogin($user, $pass)
    {
        // Thực hiện kiểm tra với cơ sở dữ liệu hoặc bất kỳ cơ chế nào khác
        // Trong ví dụ này, sử dụng điều kiện đơn giản
        $validUsername = "example_user";
        $validPassword = "example_password";

        return ($user == $validUsername && $pass == $validPassword);
    }

    // Kiểm tra xem form đã được submit chưa
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Lấy dữ liệu từ form
        $username = isset($_POST['hoten']) ? $_POST['hoten'] : '';
        $password = isset($_POST['matkhau']) ? $_POST['matkhau'] : '';

        // Kiểm tra đăng nhập
        if (!empty($username) && !empty($password) && checkLogin($username, $password)) {
            // Đăng nhập thành công
            header("Location: admin/index.php"); // Chuyển hướng đến trang chào mừng
            exit();
        } else {
            // Hiển thị thông báo lỗi và quay lại trang đăng nhập
            echo '<span style="color: red;">Tên đăng nhập hoặc mật khẩu không đúng. Vui lòng thử lại.</span>';
        }
    }
    ?>




        <div class="form-field">
            <label class="user" for="login-username" class="hidden">Username</label>
            <input type="text" class="form-input" name="hoten" placeholder="Nhập họ tên" id="nameInput">
            <small id="nameError" style="color: red;"></small>
        </div>

        <div class="form-field">
            <label class="password" for="login-username" class="hidden">Password</label>
            <input type="password" class="form-input" name="matkhau" placeholder="Nhập Password" id="passwordInput">
            <small id="passwordError" style="color: red;"></small>
        </div>

        <div class="hihi">
            <input type="submit" name="submit" value="Login">
        </div>
    </form>
</div>
<script>
    function validateForm() {
        var nameInput = document.getElementById("nameInput");
        var passwordInput = document.getElementById("passwordInput");
        
        var nameError = document.getElementById("nameError");
        var passwordError = document.getElementById("passwordError");
        
        var isValid = true;

        if (nameInput.value.trim() === "") {
            nameError.innerHTML = "Vui lòng điền vào họ tên.";
            isValid = false;
        } else {
            nameError.innerHTML = "";
        }

        if (passwordInput.value.trim() === "") {
            passwordError.innerHTML = "Vui lòng điền vào password.";
            isValid = false;
        } else {
            passwordError.innerHTML = "";
        }

        return isValid;
    }
</script>

</div>
   







    <?
      class  connect {
        function pdo_get_connection () {
          $dburl = "mysql:host=localhost;dbname=ShopSneaker;charset=utf8";
          $username = 'root';
          $password = 'mysql';
          $conn = new PDO($dburl, $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          return $conn;
        }

        function pdo_query($sql){
          $sql_args = array_slice(func_get_args(), 1);
          try{
          $conn = $this -> pdo_get_connection();
          $stmt = $conn->prepare($sql);
          $stmt->execute($sql_args);
          $rows = $stmt->fetchAll();
          return $rows;
          }
          catch(PDOException $e){
          throw $e;
          }
          finally{
          unset($conn);
          }
        }
      }
  ?>

  <?
    class user_pdo {
      function getList ($matKhau , $name) {
        $db = new connect () ;
        $select = "SELECT * FROM taikhoan WHERE role = 1" ;
        return $db -> pdo_query ($select) ;
      }
    }
  ?>

  <?
    if (isset ($_POST ['submit'])) {
      $username = $_POST ['hoten'] ;
      $password = $_POST ['matkhau'] ;
      $user = new user_pdo () ;
      $checkUser = $user -> getList ($password , $username) ;
      foreach ($checkUser as $checkUser) {
          if ($checkUser ['user'] == $username && $checkUser ['pass'] == $password) {
            $_SESSION ['id'] = $checkUser ['id'] ;
            header ("Location: index.php") ;
          }
      }
    }
  ?>
</div>
</body>
</html>

<?
  ob_end_flush () ;
?>





