<?php 
// include database and object file 
include_once 'inc/database.php'; 
include_once 'inc/members/users.php'; 
 

// prepare members object
$members = new users($db);
 
// get id of members to be edited
$data = json_decode(file_get_contents("php://input"));     
 
// set ID property of members to be edited
$members->User_ID = $data->User_ID;
 
// set members property values
$members->FirstName = $data->FirstName;
$members->LastName = $data->LastName;
$members->Position = $data->Position;
$members->status = $data->status;
$members->class = $data->class;
 
// update the members
if($members->update()){
    echo "Member was updated.";
}
 
// if unable to update the member, tell the user
else{
    echo "Unable to update member.";
}
?>