<?php
/**
 * Created by PhpStorm.
 * User: Yashmin
 * Date: 11/27/2016
 * Time: 10:16 AM
 */

include('../database.php');
    if(isset($_POST['submit'])) {
        $title = trim(filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING));
        $description = trim(filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS));
        $contact = trim(filter_input(INPUT_POST, "contact", FILTER_SANITIZE_EMAIL));
        $query = "INSERT into jobs VALUES ('',:title,:description,:contact)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":contact", $contact);
        if ($stmt->execute()) {
            header('location: ../../#/admin');
        }
    }
?>
<html>
    <body>
    <fieldset style="width:300px;">
        <form method="post" action="">
            Job title: <input type="text" name="title"><br>
            Job Description: <input type="text" name="description"><br>
            Contact info: <input type = "text" name="contact"><br>
            <br>
            <input type="submit" name="submit">
        </form>/
    </fieldset>
    </body>
</html>
