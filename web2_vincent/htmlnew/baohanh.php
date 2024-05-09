<?php require_once("library.php")
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="StyleSheet" href='../css/baohanh.css'>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

  <title>Bảo Hành</title>
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

<body>
  <form action="" method="get" name="frm1" onsubmit="return validateForm()">

    <div class="menutren">
      <ul class="menungang">
        <li class="a2"><a href=""><img class="a5" src="../image/icon1.png" alt="erro"> SVT@gmail.com</a> </li>
        <li class="a1"><a class="hi" href=""><img class="a5-1" src="../image/icon2.png" alt=""> 0941235169</a> </li>
        <li class="p1"><a href="daily.php">Hệ thống phân phối </a> </li>
        <li class="p2"><a href="giohang.php"> <img class="a5-2" src="../image/cart-73-24.png" alt="">Giỏ Hàng </a> </li>
      </ul>

    </div>
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
  <br>


  <!-- mainbaohanh -->


  <div class="a10"><a class="a15" href="../html/nhap.php">Trang chủ </a> > <a class="a15" href="../htmlnew/baohanh.php">Bảo Hành </a></div>
  <h2 class="bh1">I - CHÍNH SÁCH BẢO HÀNH</h2>

  <h4 class="bh2">Nhằm tạo điều kiện và đảm bảo quyền lợi cho Quý khách hàng khi mua Nhạc cụ tại Sinh Viên Music, chúng tôi xin Thông tin đến Quý khách Chính sách bảo hành sản phẩm.</h4>
  <h4 class="bh2">Trong thời gian sử dụng sản phẩm, nếu sản phẩm bị lỗi do nhà sản xuất Quý khách có thể liên hệ trực tiếp với Trung tâm chăm sóc khách hàng của Công ty VSM để được trợ giúp.</h4>


  <h2 class="bh1">II - ĐIỀU KIỆN BẢO HÀNH</h2>
  <li class="bh4">Sản phẩm sẽ được bảo hành nếu thỏa mãn đầy đủ các điều kiện sau:</li>
  <li class="bh4"> Sản phẩm còn trong hạn bảo hành tại thời điểm khách hàng yêu cầu.</li>
  <li class="bh4">Hư hỏng do chất lượng linh kiện hay lỗi kỹ thuật trong quy trình sản xuất. </li>
  <li class="bh4"> Sản phẩm phải còn nguyên dạng, nhãn sản phẩm, số sê ri (S / N).
  </li>
  <li class="bh4">Phải có phiếu bảo hành và phiếu bảo hành phải ghi đầy đủ thông tin .</li>
  <li class="bh4">Số sê ri trên sản phẩm và trên phiếu bảo hành phải giống nhau.</li>



  <h2 class="bh1">III - ĐIỀU KIỆN TỪ CHỐI BẢO HÀNH</h2>

  <h3 class="bh3">Sản phẩm thuộc một trong những điều kiện sau sẽ mất quyền bảo hành:</h3>

  <li class="bh4">Sản phẩm không còn thời gian bảo hành.</li>
  <li class="bh4"> Phiếu bảo hành bị rách, tẩy xóa, sửa đổi hoặc thông tin không trùng khớp với sp.</li>
  <li class="bh4">Phiếu bảo hành không có họ tên, chữ ký và con dấu của đại lý hoặc cửa hàng trưởng. </li>
  <li class="bh4"> Tem bảo hành bị rách, hoặc có dấu hiệu tẩy xóa, sửa đổi.
  </li>
  <li class="bh4">Sản phẩm bị hư do thiên tai, hỏa hoạn, lụt lội, sét đánh, côn trùng, động vật vào.</li>
  <li class="bh4">Sản phẩm được đặt nơi bụi bẩn, ẩm ướt, bị vào nước, bị thấm nước.</li>
  <li class="bh4">Sản phẩm bị biến dạng do tác động nhiệt, tác động bên ngoài.</li>
  <li class="bh4">Sản phẩm có vết mốc, rỉ sét hoặc bị ăn mòn, oxy hóa bởi hóa chất.</li>
  <li class="bh4">Sản phẩm bị hư do dùng sai điện thế và dòng điện chỉ định.</li>
  <li class="bh4">Sản phẩm được đặt nơi bụi bẩn, ẩm ướt, bị vào nước, bị thấm nước</li>
  <li class="bh4">Khách hàng gây nên những khuyết tật như biến dạng, nứt vỡ, trầy xước.</li>
  <li class="bh4">Sản phẩm lắp đặt, bảo trì, sử dụng không đúng theo hướng dẫn của nhà sản xuất gây ra hư hỏng.</li>


  <h3 class="bh3"> Những lưu ý đối với khách hàng:</h3>

  <li class="bh6">
    <b class="bh6"> Lưu ý 1:</b> Quý khách mang sản phẩm và phiếu bảo hành/ phiếu mua hàng đến Trung tâm bảo hành của công ty VSM để được bảo hành.
  </li>

  <h3 class="bh3">Đối với những sản phẩm sau đây, VSM sẽ xem xét bảo hành tận nhà:</h3>

  <li class="bh4"> Piano cơ: Tất cả các dòng Upright Piano và Grand Piano</li>
  <li class="bh4">Piano điện: Roland, Kawai và Casio dòng celviano, privia</li>
  <li class="bh4">Đàn Organ nhà thờ</li>
  <li class="bh4"> Digital Mixer: Roland , Allen & Heath</li>

  <li class="bh6">
    <b class="bh6"> Lưu ý 2:</b> Hàng gửi đi bảo hành phải được đóng gói cẩn thận tránh bị hư hỏng trong quá trình vận chuyển.VSM có thể từ chối bảo hành đối với các sản phẩm thuộc diện bảo hành nếu sản phẩm đó bị hư hỏng trong quá trình vận chuyển do lỗi của nhà cung cấp dịch vụ vận chuyển
  </li>

  <li class="bh6">
    <b class="bh6">Lưu ý 3:</b> Quý khách vui lòng thanh toán phí vận chuyển cho chiều gửi đến TTBH VSM, VSM sẽ chịu chi phí gửi trả lại sản phẩm sau khi bảo hành xong đến nhà quý khách trong phạm vi Việt Nam.
  </li>

  <li class="bh6">
    <b class="bh6"> Lưu ý 4:</b> Bảo hành/ bảo trì không bao gồm:
  </li>

  <li class="bh4"> Chuyên chở, giao hàng, sửa chữa tận nơi và các chi phí phát sinh</li>
  <li class="bh4"> Dữ liệu trong sản phẩm</li>

  <li class="bh4"> Chi phí đi lại, ăn ở của nhân viên, kỹ thuật viên</li>

  <h3 class="bh3">Vui lòng liên hệ Trung Tâm Bảo Hành VSM để biết thêm thông tin</h3>


  <h2 class="bh1">IV - ĐỊA ĐIỂM BẢO HÀNH</h2>


  <h3 class="bh3">Trung Tâm Bảo Hành VSM</h3>
  <li class="bh6">89 Trần Đình Xu, Q1, TP.HCM</li>
  <li class="bh6"><b> Điện thoại: </b>09412355169.</li>

  <br>
  <br>
  <br>
  <br>
  <br>
  <br>

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
        <a href=""> <img src="../admhtml/images/aaa.jpg" alt="" class="a13"></a>
        <a href=""> <img src="data:image/png;base64,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" alt="" class="a13"></a>
        <a href=""><img src="../admhtml/images/z3065110575113_cbb8e61010a4ed39f408fc1a754fb038.jpg" alt="" class="a13"></a>

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
      <td class="a111"><a href="tuyendung.php">Tuyển dụng</a></td>
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
  </footer>
  <button onclick="topFunction()" id="myBtn" title="Go to top">&#8593;</button>

</body>



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