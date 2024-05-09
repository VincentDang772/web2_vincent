<?php
require_once('../../htmlnew/library.php');
if(!isset($_SESSION['userInfor'])) {
    header("location: login.php");
}
$productPerPage = 20;
$connDB = connectDB();
$errorSearch = false;
$sqlSearch ='';

$addition_filter = '';
if(isset($_REQUEST['nameProduct2Search']) && $_REQUEST['nameProduct2Search'] =='')
    $addition_filter = $addition_filter.'&nameProduct2Search='.$_REQUEST['nameProduct2Search'];
if(isset($_REQUEST['status2Search']))
    $addition_filter = $addition_filter.'&status2Search='.$_REQUEST['status2Search'];
if(isset($_REQUEST['category2Search']))
    $addition_filter = $addition_filter.'&category2Search='.$_REQUEST['category2Search'];
//nameProduct2Search=a&status2Search=Hiện+hành&category2Search=Điện+thoại&page
$sqlCount = "select count(*) as total from sanpham where trangthai = 1";

if(isset($_REQUEST['nameProduct2Search'])){
    if(!isset($_REQUEST['status2Search']) && !isset($_REQUEST['category2Search']) && $_REQUEST['nameProduct2Search'] ==''){
        $errorSearch = true;
    }else{
        $start = $_REQUEST['page'] * $productPerPage - $productPerPage;
        $end = $productPerPage;
        $condition1 = $condition2 = $condition3 = "";
        if(isset($_REQUEST["status2Search"])){
            if($_REQUEST["status2Search"]=="Đã xóa") $condition1 = " and trangthai = 0 ";
            else $condition1 = " and trangthai = 1";
        }
        if(isset($_REQUEST["category2Search"])){
            $MALoai = mapping_MALSP($_REQUEST["category2Search"]);
            $condition2 = " and sanpham.MALSP = '".$MALoai."' ";          
        }
        if($_REQUEST['nameProduct2Search'] !=''){
            $condition3 =" and tensp like '%".$_REQUEST['nameProduct2Search']."%' ";
        }
        $sqlSearch = "SELECT * FROM sanpham, loaisp
        where  sanpham.MALSP=loaisp.MALSP". $condition1. $condition2. $condition3." 
                      
                      limit " . $start . "," . $end;

        $sqlCount = "SELECT count(*) as total FROM sanpham, loaisp
        where  sanpham.MALSP=loaisp.MALSP". $condition1. $condition2. $condition3;
                      
        #echo $sqlSearch;
    }
}
#cho phân trang
$productAmount = $connDB->query($sqlCount);
$productAmount = $productAmount->fetch_assoc()["total"];
$totalPage = Ceil($productAmount / $productPerPage);

$sql = getAllProductQuery($_REQUEST['page'], $productPerPage);
if($sqlSearch !='') $sql = $sqlSearch;
$result = $connDB->query($sql);



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
        <form class="product" action="product_m.php" method="get" enctype="multipart/form-data">
        <!-- Table ne -->
        <div class="table--wrapper">
            <div class="table-title">
                <div class="table-header">
                    <h3 class="main-title">Danh Sách Sản Phẩm</h3>
                </div>
                <div class="table-action">
                    <div class="gr-btn2">
                    <button type="submit" style="background-color: blue; color: #fff;"><i class="fa-solid fa-search" style="cursor: pointer; font-size: 18px;"></i></button>
                    </div>
                    <div class="gr-btn1">
                        <a class="btn-title" href="create_product_form.php">Tạo sản phẩm</a>
                    </div>
                </div>
            </div>
        

            <div class="filter-header">
                <div class="filter-content">
                    <input type="text" name="nameProduct2Search" value="<?php if(isset($_REQUEST['nameProduct2Search'])) echo $_REQUEST['nameProduct2Search'] ?>" placeholder="Tìm kiếm theo tên">
                    <select name="status2Search">
                        <!-- Label -->
                        <option value=""  disabled selected hidden>Trạng thái</option>

                        <!-- Du lieu -->
                        <?php
                         $loaiTrangThai = ['Hiện hành', "Đã xóa"];
                         for($i= 0;$i<count($loaiTrangThai);$i++){
                            if(isset($_REQUEST['status2Search']) && $_REQUEST['status2Search'] == $loaiTrangThai[$i]){
                                echo " <option  selected>".$loaiTrangThai[$i]."</option> ";
                            }else{
                                echo " <option >".$loaiTrangThai[$i]."</option> ";
                            }
                        } 
                        ?>
                    </select>
                    <select name="category2Search">
                        <!-- label -->
                        <option value=""  disabled selected hidden>Loại sản phẩm</option>

                        <!-- Du lieu -->
                        
                        <?php
                         $loaisp = ['Điện thoại', "Laptop", "Đồng Hồ đeo tay","Tai nghe"];
                         $MALSP = ['00001', '00002', '00003', '00004'];
                         for($i= 0;$i<count($loaisp);$i++){
                            if(isset($_REQUEST['category2Search']) && $_REQUEST['category2Search'] == $loaisp[$i]){
                                echo " <option  selected>".$loaisp[$i]."</option> ";
                            }else{
                                echo " <option >".$loaisp[$i]."</option> ";
                            }
                        } 
                        ?>
                    </select>
                    <?php if($errorSearch == true) echo "<h2 style='color:red;margin-left: 5%;'> Bạn tìm kiếm nhưng không chọn điều kiện! <h2>" ?>
                </div>
            </div>
            <!-- <input type='hidden' name='page' value = 1> -->
            

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 100px;">Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá vốn</th>
                            <th>Giá bán</th>
                            <th>Giá giảm</th>
                            <th>Mô tả</th>
                            <th>Bộ nhớ trong</th>
                            <th>Pin</th>
                            <th>Ưu đãi</th>
                            <th>Loại</th>
                            <th style="width: 20px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><img src="<?= $row['image'] ?>" style="width: 40px; height: 40px;"></td>
                                <td><?= $row['tensp'] ?></td>
                                <td><?= $row['giavon'] ?></td>
                                <td><?= $row['gia'] ?></td>
                                <td><?= $row['giamgia'] ?></td>
                                <td><?= $row['mota'] ?></td>
                                <td><?= $row['bonhotrong'] ?></td>
                                <td><?= $row['pin'] ?></td>
                                <td><?= $row['uudai'] ?></td>
                                <td><?= TypeProduct($row['MALSP']) ?></td>
                                <td>
                                    <div class="dropdown">
                                        <button><i class="fas fa-edit"></i></button>
                                        <div class="dropdown-item">
                                            <a href="thaotacsanpham.php?loaithaotacsanpham=xoa&idsp=<?= $row['masp'] ?>">Xóa</a>
                                            <a href="create_product_form.php?typePage=chinhsuasp&idsp=<?= $row['masp'] ?>">Sửa</a>
                                            <?php if($row['trangthai']==0){ 
                                                echo "<a href='thaotacsanpham.php?loaithaotacsanpham=khoiphuc&idsp=".$row['masp']."'>Khôi phục</a>";
                                             } ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>

            <ul class="pagination">
                <li><a href='product_m.php?page=1&<?php echo $addition_filter;?>'>
                        <<</a>
                </li>
                <?php
                if ($_REQUEST['page'] != 1)
                    echo sprintf("<li><a href='product_m.php?page=%d&%s'><</a></li>", $_REQUEST['page'] - 1,$addition_filter);
                else
                    echo sprintf("<li><a href='product_m.php?page=%d&%s'><</a></li>", $_REQUEST['page'],$addition_filter);
                ?>
                <li><a href="#"><?= $_REQUEST['page'] . '/' . $totalPage  ?></a></li>
                <?php
                if ($_REQUEST['page'] != $totalPage)
                    echo sprintf("<li><a href='product_m.php?page=%d&%s'>></a></li>", $_REQUEST['page'] + 1,$addition_filter);
                else
                echo sprintf("<li><a href='product_m.php?page=%d&%s'><</a></li>", $_REQUEST['page'],$addition_filter);
                ?>
                <li><a href='product_m.php?page=<?php echo $totalPage."&".$addition_filter; ?>'>>></a></li>

            </ul>
        </div>
    </div>
    <input type="hidden" name='page' value= 1>
    </form>
</body>

</html>


<style>
    .filter-content {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
    }

    .filter-content input[type="text"] {
        width: 200px;
        padding: 8px 12px;
        margin-right: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #fff;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .filter-content input[type="text"]:hover {
        border-color: #aaa;
    }

    .filter-content input[type="text"]:focus {
        border-color: #007bff;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .filter-content select {
        width: 200px;
        padding: 8px 12px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #fff;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        margin-left: 0.5rem;
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