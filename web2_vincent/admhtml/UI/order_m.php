<?php
require("../../htmlnew/library.php");
if (!isset($_SESSION['userInfor'])) {
    header("location: login.php");
}
$productPerPage = 20;

$errorSearch = false;

$addition_filter = '';
if(isset($_REQUEST['fromDate']))
    $addition_filter = $addition_filter.'&fromDate='.$_REQUEST['fromDate'];
if(isset($_REQUEST['toDate']))
    $addition_filter = $addition_filter.'&toDate='.$_REQUEST['toDate'];
if(isset($_REQUEST['status2Search']))
    $addition_filter = $addition_filter.'&status2Search='.$_REQUEST['status2Search'];
//fromDate=2024-05-01&toDate=2024-05-01&status2Search=%C4%90%C3%A3+giao+h%C3%A0ng&page=1

$sqlSearch = '';
$queryCount = "select count(*) as total from bill";
if (isset($_REQUEST['fromDate'])) {

    if ($_REQUEST['fromDate'] == '' && $_REQUEST['toDate'] == '' && !isset($_REQUEST['status2Search'])) {
        $errorSearch = true;
    } else {
        $start = $_REQUEST['page'] * $productPerPage - $productPerPage;
        $end = $productPerPage;
        $condition1 = $condition2 = $condition3 = "";
        if (isset($_REQUEST["status2Search"])) {
            $condition1 = " and status = " . mapping_Status_revert($_REQUEST["status2Search"]);
        }
        if ($_REQUEST['fromDate'] != '') {
            $condition2 = " and bill.lastDateUpdated >= '" . $_REQUEST['fromDate'] . "' ";
        }
        if ($_REQUEST['toDate'] != '') {
            $condition3 = " and bill.lastDateUpdated <= '" . $_REQUEST['toDate'] . "' ";
        }
        $sqlSearch = "SELECT * FROM bill
        where 1 " . $condition1 . $condition2 . $condition3 . "    
                      limit " . $start . "," . $end;

        $sqlCount = "SELECT count(*) as total FROM bill
        where 1 " . $condition1 . $condition2 . $condition3;
    }
}
$connDB = connectDB();
#cho phân trang
$productAmount = $connDB->query($queryCount);
$productAmount = $productAmount->fetch_assoc()["total"];

$totalPage = Ceil($productAmount / $productPerPage);
$sql = getAllOrderQuery($_REQUEST['page'], $productPerPage);
if ($sqlSearch != '') $sql = $sqlSearch;




$result = $connDB->query($sql);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý đơn đặt hàng</title>
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
    </div>

    <div class="main-content">
        <div class="header-wrapper">
            <div class="header-title">
                <span>Danh mục</span>
                <h2>Quản lý đơn đặt hàng</h2>
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

        <form class="product" action="order_m.php" method="get" enctype="multipart/form-data">
            <!-- Table ne -->
            <div class="table--wrapper">
                <div class="table-title">
                    <div class="table-header">
                        <h3 class="main-title">Danh Sách Đơn Đặt Hàng</h3>
                    </div>
                    <div class="table-action">
                        <div class="gr-btn2">
                        <button type="submit" style="background-color: blue; color: #fff;"><i class="fa-solid fa-search" style="cursor: pointer; font-size: 18px;"></i></button>
                        </div>
                        <!-- <div class="gr-btn1">
                            <a class="btn-title" href="detail_order_form.php">Tạo đơn hàng</a>
                        </div> -->
                    </div>
                </div>

                <div class="filter-header">
                    <div class="filter-content">
                        <label for="fromDate" name="fromdate">Từ ngày:</label>
                        <input type="date" id="fromDate" value="<?php if (isset($_REQUEST['fromDate'])) echo $_REQUEST['fromDate'];  ?>" name="fromDate">
                        <label for="toDate" name="toDate">Đến ngày:</label>
                        <input type="date" id="toDate" value="<?php if (isset($_REQUEST['toDate'])) echo $_REQUEST['toDate'];  ?>" name="toDate">
                        <select name="status2Search">
                            <option value="" disabled selected hidden>Trạng Thái</option>
                            <?php
                            $loaiTrangThai = ['Đã hủy', "Đã giao hàng", "Đang đặt"];
                            for ($i = 0; $i < count($loaiTrangThai); $i++) {
                                if (isset($_REQUEST['status2Search']) && $_REQUEST['status2Search'] == $loaiTrangThai[$i]) {
                                    echo " <option  selected>" . $loaiTrangThai[$i] . "</option> ";
                                } else {
                                    echo " <option >" . $loaiTrangThai[$i] . "</option> ";
                                }
                            }
                            ?>
                        </select>
                        <?php if ($errorSearch == true) echo "<h2 style='color:red;margin-left: 5%;'> Bạn tìm kiếm nhưng không chọn điều kiện! <h2>" ?>

                    </div>
                </div>

                <div class="table-container">
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
                            <?php while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td><?= $row['date'] ?></td>
                                    <td><?= $row['soluong'] ?></td>
                                    <td><?= $row['name'] ?></td>
                                    <td><?= $row['phone'] ?></td>
                                    <td><?= $row['address'] ?></td>
                                    <td><?= mapping_Status($row['status']) ?></td>
                                    <td><?= $row['lastDateUpdated'] ?></td>
                                    <td>
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
                
                <ul class="pagination">
                    <li><a href='order_m.php?page=1&<?php echo $addition_filter;?>'>
                            <<</a>
                    </li>
                    <?php
                    if ($_REQUEST['page'] != 1)
                        echo sprintf("<li><a href='order_m.php?page=%d&%s'><</a></li>", $_REQUEST['page'] - 1,$addition_filter);
                    else
                        echo sprintf("<li><a href='order_m.php?page=%d&%s'><</a></li>", $_REQUEST['page'],$addition_filter);;
                    ?>
                    <li><a href="#"><?= $_REQUEST['page'] . '/' . $totalPage  ?></a></li>
                    <?php
                    if ($_REQUEST['page'] != $totalPage)
                        echo sprintf("<li><a href='order_m.php?page=%d&%s'>></a></li>", $_REQUEST['page'] + 1,$addition_filter);
                    else
                        echo sprintf("<li><a href='order_m.php?page=%d&%s'>></a></li>", $_REQUEST['page'],$addition_filter);
                    ?>
                    <li><a href='order_m.php?page=<?php echo $totalPage."&".$addition_filter; ?>'>>></a></li>

                </ul>
            </div>
    </div>
    <input type="hidden" name='page' value=1>
    </form>
</body>

</html>


<style>
    .filter-content {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
    }

    .filter-content label {
        margin-right: 10px;
    }

    .filter-content input[type="date"] {
        padding: 8px 12px;
        margin-right: 10px;
        /* Add margin between inputs */
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #fff;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .filter-content input[type="date"]:hover {
        border-color: #aaa;
    }

    .filter-content input[type="date"]:focus {
        border-color: #007bff;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .filter-content select {
        width: 150px;
        padding: 8px 12px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #fff;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .filter-content select:hover {
        border-color: #aaa;
    }

    .filter-content select:focus {
        border-color: #007bff;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
</style>