<?php
include('../database.php');
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $query1=$db->query("delete from users where ID='$id'");
    if($query1)
    {
        header('location: ../../#/admin');
    }
}
?>
