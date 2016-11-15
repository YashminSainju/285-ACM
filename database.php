<?php
/**
 * Created by PhpStorm.
 * User: Yashmin
 * Date: 11/5/2016
 * Time: 6:38 PM
 */
include ("config.php");
try{
    $db= new PDO(
        "mysql:host=". DB_HOST .";port=3307;dbname=". DB_NAME,
        DB_USER,
        DB_PASS
    );

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (Exception $e){
    echo "Could not connect to the database.";
    exit;
}

try{
    $active = $db->query("SELECT `FirstName`, `LastName` FROM `users` WHERE 'status' = 'active'; ");
    $inactive = $db->query("SELECT `FirstName`, `LastName` FROM `users` WHERE 'status' = 'Inactive';");
    $all = $db->query("SELECT `FirstName`, `LastName` FROM `users`");
}catch (Exception $e){
    echo "Data could not be retrieved from the database";
    exit;
}

$amembers = $active->fetch(PDO::FETCH_ASSOC);
$imembers = $inactive->fetch(PDO::FETCH_ASSOC);
$members = $all->fetchAll(PDO::FETCH_ASSOC);
