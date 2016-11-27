
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once 'members/Database.php';
include_once 'members/users.php';

// instantiate database and members object
$database = new Database();
$db = $database->getConnection();

// initialize object
$members = new users($db);

// query products
$stmt = $members->readAll();
$num = $stmt->rowCount();

$data="";

// check if more than 0 record found
if($num>0){

    $x=1;

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
        //.html_entity_decode($var) to convert html entities to string values
        $data .= '{';
        $data .= '"FirstName":"'  . html_entity_decode($FirstName) . '",';
        $data .= '"LastName":"' . html_entity_decode($LastName) . '",';
        $data .= '"Email":"' . html_entity_decode($Email) . '"';
        $data .= '"Payment":"' . $Payment . '",';
        $data .= '"class":"' . $class . '"';
        $data .= '}';

        $data .= $x<$num ? ',' : ''; $x++; }
}

// json format output
echo '{"records":[' . $data . ']}';
?>