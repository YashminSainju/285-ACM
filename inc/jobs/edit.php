<?php
/**
 * Created by PhpStorm.
 * User: Yashmin
 * Date: 11/27/2016
 * Time: 11:10 AM
 */
include('../database.php');
?>

<html>
<body>
<?php
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    if(isset($_POST['submit']))
    {
        $title = trim(filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING));
        $description = trim(filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS));
        $contact = trim(filter_input(INPUT_POST, "contact", FILTER_SANITIZE_EMAIL));
        $query3 = "UPDATE `jobs` SET `title`=:title,`description`= :description,`contact`=:contact";
        $stmt = $db->prepare($query3);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":contact", $contact);
        if ($stmt->execute()) {
            header('location: ../../ui-sref="admin"');
        }
    }
    $query1=$db->query("select * from jobs where id='$id'");
    $query2=$query1->fetch();
    ?>
    <form method="post" action="">
        Job Title: <input type="text" name="title" value="<?php echo $query2['title']; ?>" /><br />
        Job Description:<input type="text" name="description" value="<?php echo $query2['description']; ?>" /><br />
        Contact info: <input type = "text" name = "contact" value="<?php echo $query2['contact']; ?>"/>
        <br />
        <br />
        <input type="submit" name="submit" value="update" />
    </form>
    <?php
}
?>
</body>
</html>
