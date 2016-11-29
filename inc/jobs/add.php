<?php
/**
 * Created by PhpStorm.
 * User: Yashmin*/

include('../database.php');
if(isset($_POST['submit'])) {
    $title = trim(filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING));
    $description = trim(filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS));
    $contact = trim(filter_input(INPUT_POST, "contact", FILTER_SANITIZE_EMAIL));
    $query = "INSERT into jobs VALUES ('',:title,:description,:contact)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":title", $db->quote($title));
    $stmt->bindParam(":description", $db->quote($description));
    $stmt->bindParam(":contact", $db->quote($contact));
    if ($stmt->execute()) {
        header('location: ../../#/admin');
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
<div class="row register-form">
    <div class="col-md-8 col-md-offset-2">
        <form class="form-horizontal custom-form" method ="post" action = "">
            <h1 class="text-center">ADD</h1>
            <div class="form-group">
                <div class="col-sm-4 label-column">
                    <label class="control-label" for="title">Job Title</label>
                </div>
                <div class="col-sm-6 input-column">
                    <input class="form-control" type="text" name = "title">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4 label-column">
                    <label class="control-label" for="description">Job Description</label>
                </div>
                <div class="col-sm-6 input-column">
                    <textarea class="form-control" rows="10" name = "description"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4 label-column">
                    <label class="control-label" for="contact">Contact Info</label>
                </div>
                <div class="col-sm-6 input-column">
                    <input class="form-control" type="text" name = "contact">
                </div>
            </div>
            <input class="btn btn-default submit-button" type="submit" name = "submit"/>
        </form>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
