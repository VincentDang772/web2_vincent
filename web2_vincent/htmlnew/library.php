<?php
session_start();


//$_SESSION["cart"];




class SP
{
  public $masp;
  public $tensp;
  public $gia;

  public $giamgia;
  public $khuyenmai;
  public $hinh;
  public $malsp;
  public $namsx;

  public $mota;
  public $bonhotrong;
  public $pin;
  public $uudai;

  public $soLuong;


  function set_masp($name)
  {
    $this->masp = $name;
  }
  function set_giamgia($name)
  {
    $this->giamgia = $name;
  }
  function set_malsp($name)
  {
    $this->malsp = $name;
  }
  function set_tensp($name)
  {
    $this->tensp = $name;
  }
  function set_gia($name)
  {
    $this->gia = $name;
  }
  function set_khuyenmai($name)
  {
    $this->khuyenmai = $name;
  }
  function set_hinh($name)
  {
    $this->hinh = $name;
  }
  function set_namsx($name)
  {
    $this->namsx = $name;
  }
  function set_mota($name)
  {
    $this->mota = $name;;
  }
  function set_bonhotrong($name)
  {
    $this->bonhotrong = $name;;
  }
  function set_pin($name)
  {
    $this->pin = $name;;
  }
  function set_uudai($name)
  {
    $this->uudai = $name;;
  }
  function set_soLuong($name)
  {
    $this->soLuong = $name;
  }
}


function TypeProduct($id)
{
  if ($id === '00001') return 'Điện thoại';
  if ($id === '00002') return 'Laptop';
  if ($id === '00003') return 'Đồng Hồ đeo tay';
  if ($id === '00004') return 'Tai nghe';
  return $id;
}

function ConnectDB()
{
  //$servername = "127.0.0.1";
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "projectforweb";
  //$port = 3309;
  $port = 3306;

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname, $port);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  return $conn;
}

function findSomeThing(&$input)
{
  $tag = "location:  ../htmlnew/sanpham.php?productType=find&page=1&nvn=" . $input;
  header($tag);
}
function findSomeThing2(&$input)
{
  $tag = "location:  ../admhtml/adm3-1.php?productType=find&page=1&nvn=" . $input;
  header($tag);
  // echo $tag;

}

function checkTypeAction(&$title, &$count)
{


  if (isset($_REQUEST['productType'])) {
    return checkTypeProduct($title, $count);
  }
}
function checkTypeProduct(&$title, &$count)
{
  $sql = "";
  $product_per_page = 6;
  if (isset($_REQUEST['page'])) {
    $start = $_REQUEST['page'] * $product_per_page - $product_per_page;
    $end = $product_per_page;
  } else {
    $start = 0;
    $end = 6;
  }


  if ($_REQUEST['productType'] == 'phone') {
    $sql = "SELECT * FROM sanpham, loaisp
            where trangthai = 1 and sanpham.MALSP=loaisp.MALSP and sanpham.MAlSP='00001'
                                order by MASP ASC
                                limit " . $start . "," . $end;
    $count = "SELECT count(*) as num FROM sanpham, loaisp
            where trangthai = 1 and sanpham.MALSP=loaisp.MALSP and sanpham.MAlSP='00001'";

    $title = "phone";
  } else if ($_REQUEST['productType'] == 'All') {

    $sql = "SELECT * FROM sanpham, loaisp
            where trangthai = 1 and sanpham.MALSP=loaisp.MALSP 
                                order by Rand()
                                limit " . $start . "," . $end;
    $count = "SELECT count(*) as num FROM sanpham, loaisp
             where trangthai = 1 and sanpham.MALSP=loaisp.MALSP ";
    // echo $sql;
    // exit;      
    $title = "All";
  } else if ($_REQUEST['productType'] == 'laptop') {
    $sql = "SELECT * FROM sanpham, loaisp
          where trangthai = 1 and sanpham.MALSP=loaisp.MALSP and sanpham.MAlSP='00002'
                              order by MASP ASC
                              limit " . $start . "," . $end;
    $count = "SELECT count(*) as num FROM sanpham, loaisp
           where trangthai = 1 and sanpham.MALSP=loaisp.MALSP and sanpham.MAlSP='00002'";

    $title = "laptop";
  } else if ($_REQUEST['productType'] == 'watch') {
    $sql = "SELECT * FROM sanpham, loaisp
          where trangthai = 1 and sanpham.MALSP=loaisp.MALSP and sanpham.MAlSP='00003'
                              order by MASP ASC
                              limit " . $start . "," . $end;
    $count = "SELECT count(*) as num FROM sanpham, loaisp
             where trangthai = 1 and sanpham.MALSP=loaisp.MALSP and sanpham.MAlSP='00003'";

    $title = "watch";
  } else if ($_REQUEST['productType'] == 'headphone') {
    $sql = "SELECT * FROM sanpham, loaisp
          where trangthai = 1 and sanpham.MALSP=loaisp.MALSP and sanpham.MAlSP='00004'
                              order by MASP ASC
                              limit " . $start . "," . $end;
    $count = "SELECT count(*) as num FROM sanpham, loaisp
             where trangthai = 1 and sanpham.MALSP=loaisp.MALSP and sanpham.MAlSP='00004'";

    $title = "headphone";
  } else if ($_REQUEST['productType'] == 'find') {
    if (strlen(str_replace(" ", "", $_GET["nvn"])) != 0) {
      $sql = " SELECT * FROM SANPHAM where trangthai = 1 and Tensp like '%" . str_replace(" ", "", $_REQUEST['nvn']) . "%'" . "order by MASP ASC
                limit " . $start . "," . $end;
      $count = " SELECT count(*) as num FROM SANPHAM where trangthai = 1 and Tensp like '%" . str_replace(" ", "", $_REQUEST['nvn']) . "%'";

      $title = str_replace(" ", "", $_REQUEST['nvn']);
    } else {
    }
  }
  if ($sql == '') header('C:\Users\Admin\Desktop\XAM\htdocs\ProjectForWeb\htmlnew\sanphamrong.php');
  return $sql;
}

function productDetail()
{
  $sql = "select * From sanpham,loaisp where sanpham.MALSP=LOAISP.MALSP and sanpham.masp = '" . $_REQUEST['code'] . "'";
  return $sql;
}



?>


<!-- other.php -->
<?php
function checkFind()
{
  $sql = 'kocogi';
  if (isset($_REQUEST['find'])) {
    if (isset($_REQUEST['nvn'])) {
      if (strlen(str_replace(" ", "", $_REQUEST['nvn'])) != 0) {
        $sql = $_REQUEST['nvn'];
        return $sql;
      }
    }
  }
  return $sql;
}

function checkConnectFromAnotherPHP(&$sql, &$title)
{
  if (isset($_REQUEST['sql'])) {
    $sql = " SELECT * FROM SANPHAM where Tensp like '%" . $_REQUEST['sql'] . "%'" . "order by MASP ASC
        limit " . '0' . "," . '6';

    $title = $_REQUEST['sql'];
  }
}

function getAllProductQuery($current_page, $product_per_page)
{

  $start = $current_page * $product_per_page - $product_per_page;
  $end = $product_per_page;

  $sql = "SELECT * FROM sanpham, loaisp
  where trangthai = 1 and sanpham.MALSP=loaisp.MALSP 
                      
                      limit " . $start . "," . $end;
  return $sql;
}


function getAllOrderQuery($current_page, $order_per_page)
{
  $start = $current_page * $order_per_page - $order_per_page;
  $end = $order_per_page;

  $sql = "SELECT * FROM bill limit " . $start . "," . $end;
  return $sql;
}




function mapping_MALSP($tenloai)
{
  if ($tenloai == 'Điện thoại') {
    return '00001';
  } else if ($tenloai == 'Laptop') {
    return '00002';
  } else if ($tenloai == 'Đồng Hồ đeo tay') {
    return '00003';
  } else {
    return '00004';
  }
}

function mapping_Status($status)
{
  if ($status == 0) {
    return 'Đang đặt hàng';
  } else if ($status == 1) {
    return 'Đã giao hàng';
  } else if ($status == 2) {
    return 'Đã hủy';
  } else {
    return 'lỗi';
  }
}

function mapping_Status_revert($status)
{
  if ($status == 'Đang đặt hàng') {
    return 0;
  } else if ($status == 'Đã giao hàng') {
    return 1;
  } else if ($status == 'Đã hủy') {
    return 2;
  } else {
    return 0;
  }
}

function mapping_userRole($role)
{
  if ($role == 0) {
    return 'Khách hàng';
  } else {
    return 'Quản trị viên';
  }
}


?>