<?php 
require_once('../../htmlnew/library.php');
require_once('../../htmlnew/util.php');
if(isset($_REQUEST["loaithaotacsanpham"])){
    if($_REQUEST["loaithaotacsanpham"] == 'them'){
        $masp = randomUUID();
        $tensanpham = $_REQUEST['product-name'];
        $gia = $_REQUEST['price'];
        $giagiam = $_REQUEST['discount'];
        $giavon = $_REQUEST['pre-price'];
        $ngaysx = $_REQUEST['date-up'];
        $mota = $_REQUEST['mota'];
        $bonhotrong = $_REQUEST['bonhotrong'];
        $pin = $_REQUEST['Pin'];
        $uudai = $_REQUEST['uudai'];
        $MALSP = mapping_MALSP($_REQUEST['product-type']);
        $image = $_FILES['fileToUpload']['name'];
        doFile($image);
        $conn=ConnectDB();
        $sql=sprintf("insert into sanpham values('%s','%s',%d,%d,'%s','%s','%s',%d,1,'%s','%s','%s','%s')",$masp,$tensanpham,$gia, $giagiam,$ngaysx,$image,$MALSP,$giavon,$mota,$bonhotrong,$pin,$uudai);
        echo $sql;
        $result=$conn->query($sql);
        if ($result == false) {
           echo "error!";
            exit();
        }
        $conn->close();
        header("location: product_m.php?page=1");
    }
    if($_REQUEST["loaithaotacsanpham"] == 'sua'){
        $masp = $_REQUEST['idsp'];
        $tensanpham = $_REQUEST['product-name'];
        $gia = $_REQUEST['price'];
        $giagiam = $_REQUEST['discount'];
        $giavon = $_REQUEST['pre-price'];
        $ngaysx = $_REQUEST['date-up'];
        $mota = $_REQUEST['mota'];
        $bonhotrong = $_REQUEST['bonhotrong'];
        $pin = $_REQUEST['Pin'];
        $uudai = $_REQUEST['uudai'];
        $MALSP = mapping_MALSP($_REQUEST['product-type']);
        $image = $_FILES['fileToUpload']['name'];
        $conn=ConnectDB();
       
        $sql=sprintf("update sanpham set tensp ='%s', gia = %d, giamgia = %d, ngaysx = '%s', MALSP='%s', giavon = %d, mota = '%s', bonhotrong = '%s', pin = '%s', uudai = '%s' where masp ='%s'",$tensanpham,$gia,$giagiam,$ngaysx,$MALSP,$giavon,$mota,$bonhotrong,$pin,$uudai,$masp);
        if($image != ''){
             doFile($image);
             $sql=sprintf("update sanpham set tensp ='%s', gia = %d, giamgia = %d, ngaysx = '%s', image ='%s', MALSP='%s', giavon = %d, mota = '%s', bonhotrong = '%s', pin = '%s', uudai = '%s' where masp ='%s'",$tensanpham,$gia,$giagiam,$ngaysx,$image,$MALSP,$giavon,$mota,$bonhotrong,$pin,$uudai,$masp);
        }
        echo $sql;
      
        $result=$conn->query($sql);
        if ($result == false) {
           echo "error!";
            exit();
        }
        $conn->close();
        header("location: product_m.php?page=1");
    }
    if($_REQUEST["loaithaotacsanpham"] == 'xoa'){
        $masp = $_REQUEST['idsp'];
        echo "update sanpham set trangthai = 0 where masp ='". $masp ."'";
        $conn=ConnectDB();
        $result=$conn->query("update sanpham set trangthai = 0 where masp ='". $masp ."'");
        if ($result == false) {
           echo " error! ". $conn->error;
            exit();
        }
        $conn->close();
        header("location: product_m.php?page=1");
    }
    if($_REQUEST["loaithaotacsanpham"] == 'khoiphuc'){
        
        $masp = $_REQUEST['idsp'];
        echo "update sanpham set trangthai = 1 where masp ='". $masp ."'";
        $conn=ConnectDB();
        $result=$conn->query("update sanpham set trangthai = 1 where masp ='". $masp ."'");
        if ($result == false) {
           echo " error! ". $conn->error;
            exit();
        }
        $conn->close();
        header("location: product_m.php?page=1");
    }
}





function doFile(&$FileInput){
    
   
    $target_dir = "../images/";
   
    //$target_file = $target_dir . basename($_FILES["image"]["name"]);
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    //echo basename($_FILES["fileToUpload"]["name"]);
    if(isset($_REQUEST["click"])){
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !==false){
            $uploadOk = 1;
        }
        else{
            $uploadOk = 0;
        }
    }
   

    if(file_exists($target_file)){
        $uploadOk = 2;//exist
    }
    if($_FILES["fileToUpload"]["size"]>50000000){
        $uploadOk = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif")
        $uploadOk = 0;

    if($uploadOk==0){

    }
    else if($uploadOk==2){
        $FileInput = $target_file;

    }else{
        if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
            $FileInput =$target_file;
        }
    }
    return $uploadOk;
   
}

?>