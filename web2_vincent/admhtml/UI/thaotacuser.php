<?php
// session_start();
require_once("../../htmlnew/library.php");
require_once("../../htmlnew/util.php");

if($_REQUEST['typeForm'] == "login"){
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];
    $role = $_REQUEST["role"];
    $connectDB = ConnectDB();
    $result = $connectDB->query("select * from user where username ='". $username."'");
    if($result->num_rows == 0 && $row["role"] == 0) header("location: ../../htmlnew/login.php?wronglogin=1");
    if($result->num_rows == 0 && $row["role"] == 1) header("location: login.php?wronglogin=1");
    $row = $result->fetch_assoc();
    if($row["password"] != $password){
        header("location: login.php?wronglogin=1");
    }
    else{

        if($role != mapping_userRole($row["role"])) 
        {   
            header("location: ../../htmlnew/login.php?wronglogin=1");
            
        }
        else {
            if($role == 'Quản trị viên'){
                $_SESSION['userInfor'] = $row;
                header("location: index.php");
                return;
                
            }
            else{
                $_SESSION['khachhang'] = $row;
                header("location: ../../htmlnew/nhap.php");
                
            }
        }
    }
}

if($_REQUEST['typeForm'] == "regist"){
    $mydate = getdate(date("U"));
    $date = "$mydate[year]/$mydate[mon]/$mydate[mday]";
    $username = $_REQUEST["username"];
    $connectDB = ConnectDB();

    $result = $connectDB->query("select * from user where username ='". $username."'");
    if($result->num_rows > 0) {
        header("location: register.php?existusername=1");
        return;
    }

    $password = $_REQUEST["password"];
    $fullname = $_REQUEST["fullname"];
    $phone = $_REQUEST["phone"];
    $address = $_REQUEST["address"];
    $image = $_FILES['avatar']['name'];
    doFile($image);
    $sql=sprintf("insert into user values('%s','%s','%s','%s','%s','%s',%d,'%s','%s')",randomUUID(),$username,$password, $fullname,$phone,$address,0,$date,$image);
    echo $sql;
    $result=$connectDB->query($sql);
    if ($result == false) {
       echo "error!";
        exit();
    }
    $connectDB->close();
    header("location: ../../htmlnew/login.php?");
}


function doFile(&$FileInput){
    
   
    $target_dir = "../images/";
   
    //$target_file = $target_dir . basename($_FILES["image"]["name"]);
    $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    //echo basename($_FILES["fileToUpload"]["name"]);
    if(isset($_REQUEST["click"])){
        $check = getimagesize($_FILES["avatar"]["tmp_name"]);
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
    if($_FILES["avatar"]["size"]>50000000){
        $uploadOk = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif")
        $uploadOk = 0;

    if($uploadOk==0){

    }
    else if($uploadOk==2){
        $FileInput = $target_file;

    }else{
        if(move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)){
            $FileInput =$target_file;
        }
    }
    return $uploadOk;
   
}

?>