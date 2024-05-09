<?php

require_once('..\htmlnew\library.php');


$conn = connectDB();
// $title="??";
// $sql = checkFind();
// $check=true;
// echo "ket qua= " .$sql;
// if($sql!='kocogi'){
//   $tag="Location: sanpham.php?&page=1&sql=".$sql;
//   echo($tag);
//   header($tag);
// }else{
//   $check=false;
// }
// $result = $conn->query($sql);






$sql2 = "select * from sanpham where malsp=00001 order by rand()";

$result = $conn->query($sql2);




?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="StyleSheet" href='../css/nhap-1.css'>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

  <title>Trang chủ</title>
  <script>
    function validateForm() {
      var u = document.getElementById("nvn").value;
      if (u.trim() == "") {
        alert("xin vui lòng hãy nhập gì đó!");
        return false;
      }


      return true;
    }
  </script>
</head>


<style>
  .carousel {
    width: 100%;
    overflow: hidden;
    position: relative;


  }

  .carousel-content {
    display: flex;
    transition: transform 0.5s ease;
  }

  .carousel-item {
    flex: 0 0 100%;
    max-width: 100%;
  }

  .p2 {
    position: relative;
  }

  .option {
    display: none;
    position: absolute;
    top: 0;
    right: 0;

  }

  /* Thiết lập hiển thị option khi hover */
  .p2:hover .option {
    display: block;
  }

  /* Tạo phần tử select với chiều rộng 100% */
  .option select {
    width: 100px;
  }
</style>

<body>
  <form action="" method="get" name="frm1" onsubmit="return validateForm()">

    <div class="menutren">
      <nav>
        <ul>
          <li class="logo"><a href="#"><i class="fas fa-home"></i> Logo</a></li>
          <li><a href="#"><i class="fas fa-dolly"></i> Hệ Thống phân phối</a></li>
          <li><a href="#"><i class="fas fa-shopping-cart"></i> Giỏ hàng</a></li>
          <li class="user"><a href="#"><i class="fas fa-user"></i> Đăng nhập</a></li>
          <li><a href="#"><i class="fas fa-user-plus"></i> Đăng ký</a></li>
          <li><a href="#"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
        </ul>
      </nav>
    </div>


    <style>
      nav {
        background-color: #333;
      }

      ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
      }

      li {
        display: inline;
        margin-right: 100px;
        /* Thay đổi khoảng cách giữa các mục menu */
      }

      a {
        display: inline-block;
        color: white;
        text-align: center;
        padding: 14px 8px;
        /* Thay đổi padding ngang và dọc */
        text-decoration: none;
      }

      .fa-user:before {
        content: "\f007";
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        font-size: 20px;
      }
    </style>

    <script>
      // Lấy phần tử select
      var selectOption = document.getElementById("selectOption");

      // Thêm sự kiện onchange
      selectOption.onchange = function() {
        // Lấy giá trị của option được chọn
        var selectedValue = this.value;
        // Chuyển hướng đến trang được chọn
        window.location.href = selectedValue;
      };
    </script>
    <div class="sidebar">
      <div class="logo"> <a href="../htmlnew/nhap.php"> <img class="aa" src="../image/ganmac.jpg" alt=""></a></div>
      <nav>
        <ul>
          <li> <a href="../htmlnew/gioithieu.php" class="b1">Giới thiệu</a>
          </li>
          <li><a href="../htmlnew/sanpham.php?productType=All&page=1" class="b2">Sản Phẩm</a>
            <ul class="cap_2">
              <li> <a href="../htmlnew/sanpham.php?productType=phone&page=1"> Phone</a> </li>
              <li> <a href="../htmlnew/sanpham.php?productType=laptop&page=1"> Latop</a> </li>
              <li> <a href="../htmlnew/sanpham.php?productType=watch&page=1"> Watch</a> </li>
              <li> <a href="../htmlnew/sanpham.php?productType=headphone&page=1"> HeadPhone</a> </li>
            </ul>
          </li>
          <li><a href="../htmlnew/tuyendung.php">Tuyển Dụng</a></li>
          <li><a href="../htmlnew/tintuc.php">Tin Tức</a></li>
          <li> <input type="text" class="a6" placeholder=" <?php if (isset($_GET["nvn"])) {
                                                              if (strlen(str_replace(" ", "", $_GET["nvn"])) == 0)
                                                                echo "bạn chưa nhập gì cả!";
                                                              else
                                                                findSomeThing($_GET["nvn"]);
                                                            } else echo "Bạn tìm gì?"; ?>" name="nvn" id="nvn" style="height: 30px; padding-top: 5px; border:none;width:auto;"><input type="submit" name="find" value="" class="b21" /></li>
          <input type="hidden" name="productType" value="find" />
        </ul>
      </nav>
    </div>
  </form>

  <div class="slideShow" style="position: relative; bottom: 17px;">
    <img class="mySlides fade" src="../image/anhdong1.jpg" style="width:100%;height: 500px;">
    <img class="mySlides fade" src="../image/anhdong2.jpg" style="width:100%;height: 500px;">
    <img class="mySlides fade" src="../image/anhdong4.jpg" style="width:100%;height: 500px;">
    <button class="btn btnPrev" onclick="plusDivs(-1)">&#10094;</button>
    <button class="btn btnNext" onclick="plusDivs(1)">&#10095;</button>
  </div>
  <!-- menu3 -->

  <br>
  <br>
  <div class="menu3">

    <div class="a7-7">
      <a style="text-decoration: none" href="../htmlnew/tragop.php">
        <div class="a7">
          <div class="trai-a"><img src="../image/ic3.png" alt="" class="a7-1"></div>
          <div class="phai-a">

            <h3>Trả góp</h3>
            <h4>Mua hàng với lãi suất 0%</h4>
          </div>

        </div>
      </a>

    </div>

    <div class="a7-8">
      <a style="text-decoration: none" href="../htmlnew/vanchuyen.php
            ">
        <div class="a7">
          <div class="trai-a"><img src="../image/ic4.png" alt="" class="a7-1"></div>
          <div class="phai-a">
            <h3>vận chuyển</h3>
            <h4>Chuyên nghiệp-Tốc độ</h4>
          </div>

        </div>
      </a>

    </div>

    <div class="a7-9">
      <a style="text-decoration: none" href="../htmlnew/baohanh.php">
        <div class="a7">
          <div class="trai-a"><img src="../image/ic5.png" alt="" class="a7-1"></div>
          <div class="phai-a">
            <h3>bảo hành</h3>
            <h4>Hiệu quả-Chất lượng</h4>

          </div>

        </div>
      </a>
    </div>

    <div class="a7-9">
      <a style="text-decoration: none" href="../htmlnew/daily.php">
        <div class="a7">
          <div class="trai-a"><img src="../image/ic6.png" alt="" class="a7-1"></div>
          <div class="phai-a">
            <h3>đại lý</h3>
            <h4>Trải rộng khắp Việt Nam </h4>

          </div>

        </div>
      </a>
    </div>
  </div>
  <!-- menu4 -->

  <?php $row = $result->fetch_assoc();
  if ($row != null) {
  
  ?>
    <h2>SmartPhone</h2>
    <div class="menu4">
      <a href="../htmlnew/sanpham1.php?&code=<?= $row['masp'] ?>">
        <table width="265px" height="325px" background="<?php echo '../admhtml/'.str_replace('../', '', $row["image"])?>" cellpadding="5" cellspacing="0">
          <tr>
            <td valign="bottom">
              <p><b>
                  <a style="text-decoration: none" class="a11"> <?= $row["tensp"] ?> </a>
                </b></p>
            </td>
          </tr>
        </table>
      </a>
    <?php }
    ?>
    <?php $row = $result->fetch_assoc();
    if ($row != null) {
    ?>
      <a href="../htmlnew/sanpham1.php?&code=<?= $row['masp'] ?>" style="margin-left: 25px">

        <table width="265px" height="325px" background="<?php echo '../admhtml/'.str_replace('../', '', $row["image"]) ?>" cellpadding="5" cellspacing="0">
          <tr>
            <td valign="bottom">
              <p><b>
                  <a style="text-decoration: none" href="" class="a11"> <?= $row["tensp"] ?> </a>

                </b></p>
            </td>
          </tr>
        </table>
      </a>

    <?php }
    ?>
    <?php $row = $result->fetch_assoc();
    if ($row != null) {
    ?>

      <a href="../htmlnew/sanpham1.php?&code=<?= $row['masp'] ?>" style="margin-left: 25px;">

        <table width="265px" height="325px" background="<?php echo '../admhtml/'.str_replace('../', '', $row["image"]) ?>" cellpadding="5" cellspacing="0">
          <tr>
            <td valign="bottom">
              <p><b>
                  <a style="text-decoration: none" href="" class="a11"><?= $row["tensp"] ?></a>
                </b></p>
            </td>
          </tr>
        </table>
      </a>
    <?php }
    ?>
    <?php $row = $result->fetch_assoc();
    if ($row != null) {
    ?>
      <a href="../htmlnew/sanpham1.php?&code=<?= $row['masp'] ?>" style="margin-left: 30px;">
        <table width="265px" height="325px" background="<?php echo '../admhtml/'.str_replace('../', '', $row["image"]) ?>" cellpadding="5" cellspacing="0">
          <tr>
            <td valign="bottom">
              <p><b>
                  <a style="text-decoration: none" href="" class="a11"><?= $row["tensp"] ?></a>
                </b></p>
            </td>
          </tr>
        </table>
      </a>
    </div>

  <?php } ?>
  <br>

  <?php
  $sql2 = "select * from sanpham where malsp=00002 order by rand()";

  $result = $conn->query($sql2);



  $row = $result->fetch_assoc();
  if ($row != null) { ?>
    <h2>Laptop</h2>
    <div class="menu4">
      <a href="../htmlnew/sanpham1.php?&code=<?= $row['masp'] ?>">
        <table width="265px" height="325px" background="<?php echo '../admhtml/'.str_replace('../', '', $row["image"]) ?>" cellpadding="5" cellspacing="0">
          <tr>
            <td valign="bottom">
              <p><b>
                  <a style="text-decoration: none" class="a11"> <?= $row["tensp"] ?> </a>
                </b></p>
            </td>
          </tr>
        </table>
      </a>

    <?php } ?>
    <?php $row = $result->fetch_assoc();
    if ($row != null) {
    ?>
      <a href="../htmlnew/sanpham1.php?&code=<?= $row['masp'] ?>" style="margin-left: 25px;">
        <table width="265px" height="325px" background="<?php echo '../admhtml/'.str_replace('../', '', $row["image"]) ?>" cellpadding="5" cellspacing="0">
          <tr>
            <td valign="bottom">
              <p><b>
                  <a style="text-decoration: none" href="" class="a11"><?= $row["tensp"] ?> </a>

                </b></p>
            </td>
          </tr>
        </table>
      </a>

    <?php } ?>
    <?php $row = $result->fetch_assoc();
    if ($row != null) {
    ?>
      <a href="../htmlnew/sanpham1.php?&code=<?= $row['masp'] ?>" style="margin-left: 25px;">
        <table width="265px" height="325px" background="<?php echo '../admhtml/'.str_replace('../', '', $row["image"]) ?>" cellpadding="5" cellspacing="0">
          <tr>
            <td valign="bottom">
              <p><b>
                  <a style="text-decoration: none" href="" class="a11"><?= $row["tensp"] ?></a>
                </b></p>
            </td>
          </tr>
        </table>
      </a>
    <?php } ?>
    <?php $row = $result->fetch_assoc();
    if ($row != null) {
    ?>
      <a href="../htmlnew/sanpham1.php?&code=<?= $row['masp'] ?>" style="margin-left: 30px;">

        <table width="265px" height="325px" background="<?php echo '../admhtml/'.str_replace('../', '', $row["image"]) ?>" cellpadding="5" cellspacing="0">
          <tr>
            <td valign="bottom">
              <p><b>
                  <a style="text-decoration: none" href="" class="a11"><?= $row["tensp"] ?></a>
                </b></p>
            </td>
          </tr>
        </table>
      </a>


    <?php }  ?>
    </div>
    <br>
    <h2>Watch</h2>
    <?php
    $sql2 = "select * from sanpham where malsp=00003 order by rand()";

    $result = $conn->query($sql2);



    $row = $result->fetch_assoc();
    if ($row != null) { ?>

      <div class="menu4">
        <a href="../htmlnew/sanpham1.php?&code=<?= $row['masp'] ?>">
          <table width="265px" height="325px" background="<?php echo '../admhtml/'.str_replace('../', '', $row["image"]) ?>" cellpadding="5" cellspacing="0">
            <tr>
              <td valign="bottom">
                <p><b>
                    <a style="text-decoration: none" class="a11"> <?= $row["tensp"] ?> </a>
                  </b></p>
              </td>
            </tr>
          </table>
        </a>

      <?php } ?>
      <?php $row = $result->fetch_assoc();
      if ($row != null) {
      ?>
        <a href="../htmlnew/sanpham1.php?&code=<?= $row['masp'] ?>" style="margin-left: 25px;">
          <table width="265px" height="325px" background="<?php echo '../admhtml/'.str_replace('../', '', $row["image"]) ?>" cellpadding="5" cellspacing="0">
            <tr>
              <td valign="bottom">
                <p><b>
                    <a style="text-decoration: none" href="" class="a11"> <?= $row["tensp"] ?> </a>

                  </b></p>
              </td>
            </tr>
          </table>
        </a>

      <?php } ?>
      <?php $row = $result->fetch_assoc();
      if ($row != null) {
      ?>
        <a href="../htmlnew/sanpham1.php?&code=<?= $row['masp'] ?>" style="margin-left: 30px;">
          <table width="265px" height="325px" background="<?php echo '../admhtml/'.str_replace('../', '', $row["image"]) ?>" cellpadding="5" cellspacing="0">
            <tr>
              <td valign="bottom">
                <p><b>
                    <a style="text-decoration: none" href="" class="a11"><?= $row["tensp"] ?></a>
                  </b></p>
              </td>
            </tr>
          </table>
        </a>
      <?php } ?>
      <?php $row = $result->fetch_assoc();
      if ($row != null) {
      ?>
        <a href="../htmlnew/sanpham1.php?&code=<?= $row['masp'] ?>" style="margin-left: 30px;">
          <table width="265px" height="325px" background="<?php echo '../admhtml/'.str_replace('../', '', $row["image"]) ?>" cellpadding="5" cellspacing="0">
            <tr>
              <td valign="bottom">
                <p><b>
                    <a style="text-decoration: none" href="" class="a11"><?= $row["tensp"] ?></a>
                  </b></p>
              </td>
            </tr>
          </table>
        </a>

      <?php } ?>
      </div>
      <br>
      <?php
      $sql2 = "select * from sanpham where malsp=00004 order by rand()";

      $result = $conn->query($sql2);



      $row = $result->fetch_assoc();
      if ($row != null) { ?>
        <h2>AIRPOD_headphone</h2>
        <div class="menu4">
          <a href="../htmlnew/sanpham1.php?&code=<?= $row['masp'] ?>">
            <table width="265px" height="325px" background="<?php echo '../admhtml/'.str_replace('../', '', $row["image"]) ?>" cellpadding="5" cellspacing="0">
              <tr>
                <td valign="bottom">
                  <p><b>
                      <a style="text-decoration: none" class="a11"> <?= $row["tensp"] ?> </a>
                    </b></p>
                </td>
              </tr>
            </table>
          </a>

        <?php } ?>
        <?php $row = $result->fetch_assoc();
        if ($row != null) {
        ?>
          <a href="../htmlnew/sanpham1.php?&code=<?= $row['masp'] ?>" style="margin-left: 25px;">
            <table width="265px" height="325px" background="<?php echo '../admhtml/'.str_replace('../', '', $row["image"]) ?>" cellpadding="5" cellspacing="0">
              <tr>
                <td valign="bottom">
                  <p><b>
                      <a style="text-decoration: none" href="" class="a11"> <?= $row["tensp"] ?> </a>

                    </b></p>
                </td>
              </tr>
            </table>
          </a>

        <?php } ?>
        <?php $row = $result->fetch_assoc();
        if ($row != null) {
        ?>
          <a href="../htmlnew/sanpham1.php?&code=<?= $row['masp'] ?>" style="margin-left: 30px;">
            <table width="265px" height="325px" background="<?php echo '../admhtml/'.str_replace('../', '', $row["image"]) ?>" cellpadding="5" cellspacing="0">
              <tr>
                <td valign="bottom">
                  <p><b>
                      <a style="text-decoration: none" href="" class="a11"><?= $row["tensp"] ?></a>
                    </b></p>
                </td>
              </tr>
            </table>
          </a>
        <?php } ?>
        <?php $row = $result->fetch_assoc();
        if ($row != null) {
        ?>
          <a href="../htmlnew/sanpham1.php?&code=<?= $row['masp'] ?>" style="margin-left: 33px;">

            <table width="265px" height="325px" background="<?php echo '../admhtml/'.str_replace('../', '', $row["image"]) ?>" cellpadding="5" cellspacing="0">
              <tr>
                <td valign="bottom">
                  <p><b>
                      <a style="text-decoration: none" href="" class="a11"><?= $row["tensp"] ?></a>
                    </b></p>
                </td>
              </tr>
            </table>
          </a>

        <?php } ?>
        </div>
        <br>
        <br>
        <br>
        </form>

        <table style="width: 100%;background-color:rgba(0,0,0,0.8);">
          <tr>
            <td class="a1112">THÔNG TIN SINH VIÊN TECHNOLOGY </td>

            <td class="a1113">HƯỚNG DẪN CHUNG</td>

            <td class="a1112">HỖ TRỢ KHÁCH HÀNG</td>

            <td class="a1113">TSOCIAL </td>

          </tr>

          <tr>
            <td class="a111"><a href="">Giới thiệu công ty</a></td>
            <td class="a112"><a href="">Giao hàng - Đổi trả</a></td>

            <td class="a111">Gọi mua hàng:<a href="" class="cuoi"> 0901083627</a> (Miễn Phí)</td>
            <td rowspan="2">
              <a href=""> <img src="../image/aaa.jpg" alt="" class="a13"></a>
              <a href=""> <img src="../image/zalo.jfif" alt="" class="a13"></a>
              <a href=""><img src="../image/z3065110575113_cbb8e61010a4ed39f408fc1a754fb038.jpg" alt="" class="a13"></a>

            </td>
          </tr>

          <tr>
            <td class="a111"><a href=""> Hệ thống showroom, đại lý </a></td>

            <td class="a112"><a href="">Hướng dẫn mua hàng</a></td>

            <td class="a111">Khiếu nại, Bảo hành:<a href="" class="cuoi"> 0901083627</a></td>
          </tr>

          <tr>
            <td class="a111"><a href="">Liên Hệ / Góp Ý</a> </td>

            <td class="a112"><a href="">Thanh toán và bảo mật</a></td>

            <td class="a111">Thời gian phục vụ: 8h-22h</td>

            <td class="a1114">HỆ THỐNG WEBSITE </td>
          </tr>

          <tr>

            <td class="a111"><a href="">Mua trả góp</a></td>

            <td class="a112"><a href="">Chính sách bảo hành</a></td>
            <td class="a111">Email: svt@gmail.vn</td>
            <td> </td>
          </tr>

          <tr>
            <td class="a111"><a href="">Chương trình Khách hàng thân thiết</a> </td>

            <td class="a112"><a href="">Bảo trì sản phẩm</a></td>

            <td> </td>

            <td class="a112"><a href="">SVT Shop</a></td>
          </tr>

          <tr>
            <td class="a111"><A href="">Điều khoản sử dụng website</A> </td>

            <td class="a112"><A href="">Kích hoạt bảo hành</A></td>
            <td> </td>

            <td class="a112"><a href="">Sinh Viên Technology</a></td>
          </tr>
          <tr>
            <td class="a111"><a href="tuyendung.html">Tuyển dụng</a></td>
            <td> </td>
            <td> </td>
            <td class="a112"><a href="">SVT Hồ Chí Minh</a></td>
          </tr>

          <tr class="a15">
            <td><br><br></td>
            <td><br><br></td>
            <td><br><br></td>
            <td><br><br></td>

          </tr>

          <tr>
            <td colspan="2" class="a16"> CÔNG TY CỔ PHẦN TM-DV-SVT </td>
            <td></td>
            <td class="a20">CÁCH THỨC THANH TOÁN</td>
          </tr>

          <tr>

          </tr>
          <tr>
            <td> </td>
            <td>

            </td>
            <td>
              <a href=""> <img src="https://vietthuong.vn/assets/frontend/images/thanhtoan.png" alt=""></a>
            <td><br></td>

            </td>
          </tr>
          <tr>
            <td class="a1115"> Địa chỉ: 89 Trần Đình Xu, Q1, TP.HCM </td>
          </tr>

          <tr>
            <td class="a1115"> Điện thoại: <a class="a1-1">09412355169</a></td>
          </tr>
          <tr>
            <td class="a1115"> Hotline: <a class="a1-1">0785073528</a></td>
          </tr>
          <tr>
            <td class="a1119"> Email: svt@gmail.com</td>
          </tr>

        </table>
        <button onclick="topFunction()" id="myBtn" title="Go to top">&#8593;</button>
<?php $conn->close(); ?>

</body>

<script>
  var slideIndex = 1;
  showDivs(slideIndex);

  function plusDivs(n) {
    showDivs(slideIndex += n);
  }

  function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    if (n > x.length) {
      slideIndex = 1
    }
    if (n < 1) {
      slideIndex = x.length
    };
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    x[slideIndex - 1].style.display = "block";
  }
</script>

<script>
  var myIndex = 0;
  carousel();

  function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {
      myIndex = 1
    }
    x[myIndex - 1].style.display = "block";
    setTimeout(carousel, 3000); // Change image every 3 seconds
  }
</script>


<script>
  var mybutton = document.getElementById("myBtn");

  window.onscroll = function() {
    scrollFunction()
  }; /* function trong function*/

  function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      mybutton.style.display = "block";
    } else {
      mybutton.style.display = "none";
    }
  }

  function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }
</script>
<script src="../js/link.js"></script>

</html>