<?php
include_once "db_connect.php";


if(isset ($_GET['id'])){
    $db=$GLOBALS['db'];
    $delete =$db->deleteBooking($_GET['id']);

    if($delete){
        header("Location:adminpanel.php");
    } else {echo "ERROR!!!";}


} else {
    header("Location: adminpanel.php");
}
