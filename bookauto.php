<?php
include_once "db_connect.php";

    $db=$GLOBALS['db'];
    $insert =$db->insertBook($_GET['getDate'],$_GET['returnDate'],$_GET['fullName'],$_GET['phone'],$_GET['email']);

    if($insert){
        header("Location:offers.php");
    } else {echo "FATAL ERROR !!!";}

