<?php
require_once("../../htmlnew/library.php");
if (!isset($_SESSION['userInfor'])) {
    header("location: login.php");
}
$connectDB = ConnectDB();
$mydate = getdate(date("U"));
$date = "$mydate[year]/$mydate[mon]/$mydate[mday]";

$sql1 = "select count(*) as amount_bill from bill where date='" . $date . "'";

$sql2 = "select sum(soluong) as revenue from bill where date='" . $date . "'";
$sql3 = "select count(*) as amount_new_user from user where role = 0 and dateCreated='" . $date . "'";
$sql4 = "select count(*) as amount_done from bill where status =1 and date='" . $date . "'";
$sql5 = "select count(*) as amount_booking from bill where status =0 and date='" . $date . "'";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template Quản Trị Viên</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i&display=swap">
</head>

<body>
    <div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li class="active">
                <a href="index.php">
                    <i class="fas fa-tachometer-alt">
                        <span>Trang chủ </span>
                    </i>
                </a>
            </li>
            <li>
                <a href="product_m.php?page=1">
                    <i class="fas fa-box">
                        <span>Quản Lý Sản Phẩm </span>
                    </i>
                </a>
            </li>
            <li>
                <a href="order_m.php?page=1">
                    <i class="fas fa-tag">
                        <span>Quản Lý Đơn Hàng </span>
                    </i>
                </a>
            </li>
            <li>
                <a href="report_m.php?page=1">
                    <i class="fas fa-chart-area">
                        <span>Báo cáo </span>
                    </i>
                </a>
            </li>
            <li class="logout">
                <a href="login.php">
                    <i class="fas fa-sign-out">
                        <span>Đăng xuất</span>
                    </i>
                </a>
            </li>
        </ul>
    </div>

    <div class="main-content">
        <div class="header-wrapper">
            <div class="header-title">
                <span>Hello</span>
                <h2>Trang chủ</h2>
            </div>
            <div class="user-info">
                <div class="dropdown">
                    <img src="<?php echo $_SESSION["userInfor"]["avatar"]; ?>" style="width: 50px; height: 50px;">
                    <div class="dropdown-item">
                        <!-- Nội dung của dropdown ở đây -->
                    </div>
                </div>
            </div>
        </div>

        <div class="card-container">
            <h3 class="main-title">Doanh thu hôm nay</h3>
            <div class="card-wrapper">
                <div class="payment-card light-red">
                    <div class="card-header">
                        <div class="amount">
                            <span class="title">
                                Tổng doanh thu ước tính
                            </span>
                            <span class="amount-value"><?php $revenue = $connectDB->query($sql2)->fetch_assoc()['revenue'];
                                                        if ($revenue == null) echo "0";
                                                        else echo $revenue; ?></span>
                        </div>
                        <i class="fas fa-dollar-sign icon"></i>
                    </div>

                    <span class="card-detail">
                        **** **** **** 1620
                    </span>
                </div>

                <div class="payment-card light-purple">
                    <div class="card-header">
                        <div class="amount">
                            <span class="title">
                                Tổng đơn hàng
                            </span>
                            <span class="amount-value"><?php $revenue = $connectDB->query($sql1)->fetch_assoc()['amount_bill'];
                                                        if ($revenue == 0) echo "0";
                                                        else echo $revenue; ?></span>
                        </div>
                        <i class="fas fa-list icon dark-purple"></i>
                    </div>

                    <span class="card-detail">
                        **** **** **** 1620
                    </span>
                </div>

                <div class="payment-card light-default-gray">
                    <div class="card-header">
                        <div class="amount">
                            <span class="title">
                                Khách hàng mới
                            </span>
                            <span class="amount-value"><?php $revenue = $connectDB->query($sql3)->fetch_assoc()['amount_new_user'];
                                                        if ($revenue == 0) echo "0";
                                                        else echo $revenue; ?></span>
                        </div>
                        <i class="fas fa-users icon dark-green"></i>
                    </div>

                    <span class="card-detail font-custom">
                        **** **** **** 1620
                    </span>
                </div>

                <div class="payment-card light-default-gray">
                    <div class="card-header">
                        <div class="amount">
                            <span class="title">
                                Đơn hàng đang chờ
                            </span>
                            <span class="amount-value"><?php $revenue = $connectDB->query($sql5)->fetch_assoc()['amount_booking'];
                                                        if ($revenue == 0) echo "0";
                                                        else echo $revenue; ?></span>
                        </div>
                        <i class="fas fa-solid fa-check icon dark-blue"></i>
                    </div>

                    <span class="card-detail font-custom">
                        **** **** **** 1620
                    </span>
                </div>

                <div class="payment-card light-default-gray">
                    <div class="card-header">
                        <div class="amount">
                            <span class="title">
                                Đơn hàng đã giao
                            </span>
                            <span class="amount-value"><?php $revenue = $connectDB->query($sql4)->fetch_assoc()['amount_done'];
                                                        if ($revenue == 0) echo "0";
                                                        else echo $revenue; ?></span>
                        </div>
                        <i class="fas fa-solid fa-house icon"></i>
                    </div>

                    <span class="card-detail font-custom">
                        **** **** **** 0000
                    </span>
                </div>
            </div>
            <br><br>
            <!-- Table ne -->
            <div class="table-container" style="background-color: yellowgreen;">
                <table>
                    <thead>
                        <tr>
                            <th>Ngày lập</th>
                            <th>Số lượng</th>
                            <th>Tên Khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Tình trạng</th>
                            <th>Ngày cập nhất cuối cùng</th>
                            <th style="width: 20px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $result = $connectDB->query("select * from bill where date ='" . $date . "' limit 10");


                        while ($row = $result->fetch_assoc()) { ?>
                            <tr style="font-size: 16px; font-weight: bold;">
                                <td><?= $row['date'] ?></td>
                                <td><?= $row['soluong'] ?></td>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['phone'] ?></td>
                                <td><?= $row['address'] ?></td>
                                <td><?= mapping_Status($row['status']) ?></td>
                                <td><?= $row['lastDateUpdated'] ?></td>
                                <td style="font-weight: normal;">
                                    <div class="dropdown">
                                        <button><i class="fas fa-edit"></i></button>
                                        <div class="dropdown-item">
                                            <a href="detail_order_form.php?mabill=<?= $row['id'] ?>">Xem chi tiết</a>
                                            <a href="thaotacorder.php?loaithaotacorder=cancel&mabill=<?= $row['id'] ?>">Hủy</a>
                                            <a href="thaotacorder.php?loaithaotacorder=done&mabill=<?= $row['id'] ?>">Hoàn thành</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>

<style>
    .btn-search-full {
        background-color: blue;
        padding: 10px;
        width: 30px;
        border-radius: 5px;
        width: 40px;
        align-items: center;
        text-align: center;
        cursor: pointer;
    }

    .btn-search-content {
        background-color: blue;
        color: #fff;
        cursor: pointer;
    }

    .btn-search-content :hover {
        transform: scale(1.2);
    }
</style>