<?php
include('../database.php');
if(isset($_GET['ID']))
{
    $ID=$_GET['ID'];
    $query1=$db->query("delete from users where ID='$ID'");
    if($query1)
    {
        header('location: ../../admin.php');
    }
}
?>