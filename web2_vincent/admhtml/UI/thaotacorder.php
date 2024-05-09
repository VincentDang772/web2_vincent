<?php 
require_once('../../htmlnew/library.php');
require_once('../../htmlnew/util.php');
if(isset($_REQUEST["loaithaotacorder"])){
    $mabill = $_REQUEST["mabill"];
    $mydate=getdate(date("U"));
    $date="$mydate[year]/$mydate[mon]/$mydate[mday]";
    echo($date);
    if($_REQUEST["loaithaotacorder"] == 'cancel'){
        $conn=ConnectDB();
        $result=$conn->query(sprintf("update bill set status = 2, lastDateUpdated ='%s' where id ='%s'",$date,$mabill));
          if ($result == false) {
           echo " error! ". $conn->error;
            exit();
        }   
        $conn->close();
        header("location: order_m.php?page=1");
    }
    if($_REQUEST["loaithaotacorder"] == 'done'){
        $conn=ConnectDB();
        $result=$conn->query(sprintf("update bill set status = 1, lastDateUpdated ='%s' where id ='%s'",$date,$mabill));
        if ($result == false) {
           echo " error! ". $conn->error;
            exit();
        }
        $conn->close();
        header("location: order_m.php?page=1");
    }
    if($_REQUEST["loaithaotacorder"] == 'book'){
        $conn=ConnectDB();
        $result=$conn->query(sprintf("update bill set status = 0, lastDateUpdated ='%s' where id ='%s'",$date,$mabill));
          if ($result == false) {
           echo " error! ". $conn->error;
            exit();
        }   
        $conn->close();
        header("location: order_m.php?page=1");
    }
       
        
}



