<?php 
// include database and object file 
include_once 'inc/database.php'; 
include_once 'inc/members/users.php'; 
 
// instantiate member object
$members = new users($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input")); 
 
// set member property values
$members->FirstName = $data->FirstName;
$members->LastName = $data->LastName;
$members->Position = $data->Position;
$members->status = $data->status;
$members->class = $data->class;
// create the member
if($members->create()){
    echo "Member was created.";
}
 
// if unable to create the member, tell the user
else{
    echo "Unable to create member.";
}
?>