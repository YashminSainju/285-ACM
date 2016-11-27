<?php
/**
 * Created by PhpStorm.
 * User: Yashmin
 * Date: 11/27/2016
 * Time: 11:25 AM
 */
include('../database.php');
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $query1=$db->query("delete from jobs where id='$id'");
    if($query1)
    {
        header('location: ../../admin.php');
    }
}
?>
