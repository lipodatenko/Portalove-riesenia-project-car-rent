<?php
include_once "db_connect.php";

    $db=$GLOBALS['db'];
    $insert =$db->sendMessage($_GET['fullName'],$_GET['email'],$_GET['subject'],$_GET['message']);

    if($insert){
        header("Location:contact.php");
    } else {echo "FATAL ERROR !!!";}

