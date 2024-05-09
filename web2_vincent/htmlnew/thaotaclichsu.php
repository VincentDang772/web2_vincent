<?php
require_once("library.php");

if(isset($_REQUEST['loaithaotacorder'])){
    if($_REQUEST['loaithaotacorder'] == 'cancel'){
        $mabill = $_REQUEST["mabill"];
        $mydate=getdate(date("U"));
        $date="$mydate[year]/$mydate[mon]/$mydate[mday]";
        echo($date);
        $conn=ConnectDB();
        $result=$conn->query(sprintf("update bill set status = 2, lastDateUpdated ='%s' where id ='%s'",$date,$mabill));
          if ($result == false) {
           echo " error! ". $conn->error;
            exit();
        }   
        $conn->close();
        header("location: history.php");
    }
}

?>