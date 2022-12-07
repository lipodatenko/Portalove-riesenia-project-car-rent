<?php
include_once "db_connect.php";
$db=$GLOBALS['db'];

if (isset($_POST['submit'])){
    $update=$db->updateBookingInfo($_POST['id'],$_POST['getDate'],$_POST['returnDate'],$_POST['fullName'],$_POST['phone'],$_POST['email'],$_POST['status']);
    if($update){
        header("Location:adminpanel.php");
    } else {echo "ERROR!!!";}

} else {header("Location: adminpanel.php");}
