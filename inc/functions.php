<?php
/**
 * Created by PhpStorm.
 * User: Yashmin
 * Date: 10/24/2016
 * Time: 8:12 PM
 */
include 'database.php';
try{
    $active = $db->query("SELECT `FirstName`, `LastName` FROM `users` WHERE 'status' = 'Active'; ");
    $inactive = $db->query("SELECT `FirstName`, `LastName` FROM `users` WHERE 'status' = 'Inactive';");
    $all = $db->query("SELECT `FirstName`, `LastName` FROM `users`");
}catch (Exception $e){
    echo "Data could not be retrieved from the database";
    exit;
}

$amembers = $active->fetchALL(PDO::FETCH_ASSOC);
$imembers = $inactive->fetchALL(PDO::FETCH_ASSOC);
$members = $all->fetchAll(PDO::FETCH_ASSOC);

function addNewJob($jobTitle,$jobDescription){
    try{
        $db= new PDO(
            "mysql:host=". DB_HOST .";dbname=". DB_NAME,
            DB_USER,
            DB_PASS
        );

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        try{
            $db->query("INSERT INTO `jobs`(JobTitle`, `JobDescription`, `JobContact`, `PostedBy`, `Time`) VALUES (".$jobTitle .",".$jobDescription.",NULL,NULL)");
            echo "Job has been posted to the database";
        }catch(Exception $e){
            echo "Data could not be entered to the database";
        }


    } catch (Exception $e){
        echo "Could not connect to the database.";
        exit;
    }

}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

