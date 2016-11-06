<?php
/**
 * Created by PhpStorm.
 * User: Wesley
 * Date: 11/5/2016
 * Time: 6:38 PM
 */
include ("config.php");
try{
    $db= new PDO(
        "mysql:host=". DB_HOST .";dbname=". DB_NAME,
        DB_USER,
        DB_PASS
    );

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (Exception $e){
    echo "Could not connect to the database.";
    exit;
}

try{
    $results = $db->query("SELECT * FROM users");
}catch (Exception $e){
    echo "Data could not be retrieved from the database";
    exit;
}

echo "<pre>";
var_dump($results->fetchAll(PDO::FETCH_ASSOC));