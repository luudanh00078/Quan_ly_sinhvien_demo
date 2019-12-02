<?php
session_start();
include_once("../model/entity/user.php");
$information = "";
if ($_SESSION['username'] != null)
    header("location:index.php");
//var_dump($_SESSION);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_REQUEST["username"];
    $password = $_REQUEST["pw"];
    //$user = User::authentication($userName);
    
    if ($userName == " " || $password == "")
    echo "ten dang nhap va mat khau khong dươc de trong!";
        //$information = "Tên đăng nhập hoặc mật khẩu không đúng";
    else {
        $conn = mysqli_connect('localhost', 'user_hoang', '12345', 'quanlysinhvien') or die ('Cant not connect to database');
        //thiết lập font chữ kết nối 
        mysqli_set_charset($conn, 'utf8');
        $sql = "SELECT * FROM users WHERE username = '$userName' AND password = '$password'";
        $query = mysqli_query($conn,$sql);
        $num_rows = mysqli_num_rows($query);
        if ($num_rows==0) {
            echo "tên đăng nhập hoặc mật khẩu không đúng !";
        }else{
            //tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
            $_SESSION['username'] = $userName;
            // Thực thi hành động sau khi lưu thông tin vào session
            // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
            header('Location: Quatrinhhoctap.php');
        }
        
        
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Login</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

    <div class="container">
        <div class="card card-login mx-auto mt-5">
            <div class="card-header">Login</div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Username" required="required" autofocus="autofocus">
                            <label for="inputEmail">Username</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="password" name="pw" id="inputPassword" class="form-control" placeholder="Password" required="required">
                            <label for="inputPassword">Password</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="remember-me">
                                Remember Password
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                    <?php if (strlen($information) != 0) { ?>
                        <div class="alert alert-danger">
                            <?php echo $information; ?>
                        </div>
                    <?php } ?>
                </form>
                <div class="text-center">
                    <a class="d-block small mt-3" href="#">Register an Account</a>
                    <a class="d-block small" href="#">Forgot Password?</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>