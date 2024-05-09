<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="register.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i&display=swap">
</head>

<body>
    <!DOCTYPE html>
    <html lang="vi">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form Đăng Ký</title>
        <link rel="stylesheet" href="styles.css">
    </head>

    <body>
        <div class="container">
            <h2 style="text-align: center;">Đăng ký tài khoản</h2> <!-- Tiêu đề ở đây -->
            <?php if(isset($_REQUEST['existusername'])) echo "<h2 style='color:red'>Tên đăng nhập đã tồn tại !</h2>"; ?>
            <form id="registration-form" action="thaotacuser.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="username">Tên đăng nhập:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="fullname">Họ và tên:</label>
                    <input type="text" id="fullname" name="fullname" required>
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại:</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ:</label>
                    <input type="text" id="address" name="address" required>
                </div>
                <!-- <div class="form-group">
                    <label for="role">Vai trò:</label>
                    <select id="role" name="role" required style="width: 50%;">
                        <option value="user">Khách hàng</option>
                        <option value="admin">Quản trị viên</option>
                    </select>
                </div> -->
                <div class="form-group">
                    <label for="avatar">Ảnh đại diện:</label>
                    <input type="file" id="avatar" name="avatar" required>
                </div>
                <button type="submit">Đăng Ký Ngay</button>
                <input type='hidden' name="typeForm" value ="regist">
            </form>
        </div>
    </body>

    </html>

</body>

</html>