<?php 
require_once("library.php");
require_once("util.php");

if(isset($_REQUEST["code"])){
    if(!isset($_SESSION["cart"])){
        $_SESSION["cart"]=array();
    }
    
        $conn= ConnectDB();
        $sql="select gia, giamgia from sanpham where masp='".$_REQUEST["code"]."'";
        echo $sql;
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
        $code = $_REQUEST["code"];
        $gia =0;
        $giamgia =0;
        if($row!=null){
            $gia=$row['gia'];
            $giamgia=$row['giamgia'];
        }
        $temp=new SP();
        $temp->set_masp($code);
        $temp->set_Soluong("1");
        
        $temp->set_gia($gia);
        $temp->set_giamgia($giamgia);
        addToCart($temp);

        echo count($_SESSION["cart"]);
        echo "<br>".$_SESSION["cart"][0]->masp;
        echo "<br>".$_SESSION["cart"][0]->gia;
        echo "<br>".$_SESSION["cart"][0]->giamgia;
        
        header("location: giohang.php");
}

if(isset($_REQUEST['SPbiXoa'])){
    echo count($_SESSION["cart"]);
    if($_SESSION["cart"]!=null){
        $temp=$_SESSION["cart"];
        var_dump($temp);
        //var_dump($temp[0]);
        for($i=0;$i<count($temp);$i++){
            if($temp[$i]->masp == $_REQUEST['SPbiXoa']){
                $temp[$i]=$temp[$i+1];
                unset($temp[count($temp)-1]);
                
                
                // unset($temp[$i]);
                // for($j=0;$j<count($temp)+1;$j++){
                    
                // }
                break;
            }
        }
        $_SESSION["cart"]=$temp;
        

    }
    header("location: giohang.php");

}

if(isset($_POST["mua"])){
    if(!isset($_SESSION['khachhang'])){
        header("location: giohang.php?loginRequired=1");
        return;
    }
    if(!isset($_SESSION["cart"]) || count($_SESSION["cart"])==0){
        header("location: giohang.php?amount=0");
        return;
    }
    $mydate=getdate(date("U"));
    $date="$mydate[year]/$mydate[mon]/$mydate[mday]";
    echo($date);
    $conn=ConnectDB();
    $sum=0;
    $address = $_SESSION['khachhang']['address'];
    if(isset($_REQUEST['addressRecieve']) && $_REQUEST['addressRecieve']!=''){
        $address = $_REQUEST['addressRecieve'];
    }
    
    $bill_id = randomUUID();

    if(count($_SESSION["cart"])!=0){
        foreach($_SESSION["cart"] as $i){
            $sum = $sum + ($i->giamgia * $i->soLuong);
        }

      
        $sql1=sprintf("insert into bill values('%s','%s',%d,'%s','%s','%s','0','%s','%s')",$bill_id,$date,$sum,$_SESSION['khachhang']['fullname'],$_SESSION['khachhang']['phone'],$address,$date,$_SESSION['khachhang']['id']);
        
        $result=$conn->query($sql1);
        if ($result == false) {
           echo "error!";
            exit();
        }


        foreach($_SESSION["cart"] as $i){
            $id_chitiet = randomUUID();
            $sql2=sprintf("insert into chitietbill values('%s','%s','%s','%s')",$id_chitiet,$bill_id,$i->masp,$i->soLuong);
            $result=$conn->query($sql2);
        }
        $_SESSION['cart']=array();

        $conn->close();
        $path = "location: detail_in_history.php?mabill=".$bill_id."";
        echo $path;
        header($path);
     }
     else{
        header("location: giohang.php?done=2");
     }
}






?>





<?php

function addToCart(&$item){
    if(count($_SESSION["cart"])==0){
       return firstItem($item);
    }
    else{
        $check=checkExisted($item);
        if($check==true){
            return true;
        }else{
            array_push($_SESSION["cart"],$item);
            return true;
        }
        return false;
    }
}


function firstItem(&$i){
    if(count($_SESSION["cart"])==0){
        $i->set_Soluong("1");
        
        array_push($_SESSION["cart"],$i);
        return true;
    }
    return false;
}

function checkExisted($temp){
foreach($_SESSION["cart"] as $i){
    if($i->masp==$temp->masp){
        $amount= $i->soLuong+1;
        $i->set_Soluong($amount);
        return true;
    }
}
return false;
}
?>