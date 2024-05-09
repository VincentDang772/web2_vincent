<?php 
require("../../htmlnew/library.php");

unset($_SESSION['userInfor']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập tài khoản quản trị viên</title>
    <link href="../../css/login.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i&display=swap">
</head>

<body>
    <div class="login-container">
        
        <form class="login-form" action="thaotacuser.php" method='post' enctype="multipart/form-data">
        
            <h2>Đăng nhập tài khoản quản trị viên </h2>
            <?php if(isset($_REQUEST['wronglogin'])) echo "<div><a style='color:red;'> Sai tên đăng nhập hoặc mật khẩu</a></div>"; ?>
            <div class="input-group">
                <label for="username">Tên đăng nhập</label>
                <input style="width: 93%;" type="text" id="username" name="username" placeholder="Tên đăng nhập" required>
            </div>
            <div class="input-group">
                <label for="password">Mật khẩu</label>
                <input style="width: 93%;" type="password" id="password" name="password" placeholder="Mật khẩu" required>
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
            <input type='hidden' name="typeForm" value ="login">
            <input type='hidden' name="role" value ="Quản trị viên">
        </form>
    </div>
</body>

</html>