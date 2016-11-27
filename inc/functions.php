<?php
/**
 * Created by PhpStorm.
 * User: Yashmin
 * Date: 10/24/2016
 * Time: 8:12 PM
 */
/*include 'database.php';
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
}*/

include_once ("config.php");

function sec_session_start() {
    $session_name = 'sec_session_id';   // Set a custom session name
    /*Sets the session name.
     *This must come before session_set_cookie_params due to an undocumented bug/feature in PHP.
     */
    session_name($session_name);

    $secure = true;
    // This stops JavaScript being able to access the session id.
    $httponly = true;
    // Forces sessions to only use cookies.
    if (ini_set('session.use_only_cookies', 1) === FALSE) {
        header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
        exit();
    }
    // Gets current cookies params.
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"],
        $cookieParams["path"],
        $cookieParams["domain"],
        $secure,
        $httponly);

    session_start();            // Start the PHP session
    session_regenerate_id(true);    // regenerated the session, delete the old one.
}
