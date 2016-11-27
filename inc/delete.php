<?php 
// include database and object file 
include_once 'database.php';
include_once 'members/users.php';
 
// prepare members object
$members = new users($db);
 
// get product id
$data = json_decode(file_get_contents("php://input"));     
 
// set product id to be deleted
$members->id = $data->id;
 
// delete the product
if($members->delete()){
    echo "Product was deleted.";
}
 
// if unable to delete the product
else{
    echo "Unable to delete object.";
}
?>