<?php
require("library.php");

unset($_SESSION['khachhang']);

unset($_SESSION['cart']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập tài khoản Khách hàng</title>
    <link href="../css/login.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i&display=swap">
</head>

<body>
    <div class="login-container">

        <form class="login-form" action="../admhtml/UI/thaotacuser.php" method='post' enctype="multipart/form-data">

            <h2>Đăng nhập tài khoản Khách hàng </h2>
            <?php if (isset($_REQUEST['wronglogin'])) echo "<div><a style='color:red;'> Sai tên đăng nhập hoặc mật khẩu</a></div>" ?>
            <div class="input-group" style="width: 93%;">
                <label for="username">Tên đăng nhập </label>
                <input type="text" id="username" name="username" placeholder="Tên đăng nhập" required>
            </div>
            <div class="input-group" style="width: 93%;">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" placeholder="Mật khẩu" required>
            </div>
            <!-- <select name="role">
                       
                        <?php
                        //  $loaiTrangThai = ['Khách hàng', "Quản trị viên"];
                        //  for($i= 0;$i<count($loaiTrangThai);$i++){
                        //         echo " <option >".$loaiTrangThai[$i]."</option> ";
                        // } 
                        ?>
                    </select> -->
            <button type="submit">Đăng nhập</button>
            <div class="btn-regist">
                <a href="../admhtml/UI/register.php">
                    <p>Đăng ký</p>
                </a>
            </div>
            <style>
                .btn-regist {
                    width: 50%;
                    height: 30px;
                    background-color: wheat;
                    color: #fff;
                    border-radius: 0.3rem;
                }

                .btn-regist p {
                    padding: 5px;
                    align-items: center;
                    justify-content: center;
                    text-align: center;
                    color: #000000;
                }

                .btn-regist:hover {
                    transform: scale(1.1);
                }
            </style>
            <input type='hidden' name="typeForm" value="login">
            <input type='hidden' name="role" value="Khách hàng">
        </form>
    </div>
</body>

</html>