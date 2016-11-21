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
