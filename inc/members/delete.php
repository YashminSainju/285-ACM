<?php 
// include database and object file 
include_once 'inc/database.php'; 
include_once 'inc/members/users.php'; 
 
// prepare product object
$members = new users($db);
 
// get product id
$data = json_decode(file_get_contents("php://input"));     
 
// set product id to be deleted
$members->id = $data->id;
 
// delete the product
if($product->delete()){
    echo "Product was deleted.";
}
 
// if unable to delete the product
else{
    echo "Unable to delete object.";
}
?>