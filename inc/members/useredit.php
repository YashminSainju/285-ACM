<?php
include('../database.php');
?>

<html>
<body>
<?php
if(isset($_GET['ID']))
{
    $ID=$_GET['ID'];
    if(isset($_POST['submit']))
    {
        $FirstName = trim(filter_input(INPUT_POST, "FirstName", FILTER_SANITIZE_STRING));
        $LastName = trim(filter_input(INPUT_POST, "LastName", FILTER_SANITIZE_SPECIAL_CHARS));
        $Email = trim(filter_input(INPUT_POST, "Email", FILTER_SANITIZE_EMAIL));
        $Payment = trim(filter_input(INPUT_POST, "Payment", FILTER_SANITIZE_STRING));
        $class = trim(filter_input(INPUT_POST, "class", FILTER_SANITIZE_STRING));
        $query3 = "UPDATE `users` SET `FirstName`=:FirstName,`LastName`= :LastName,`Email`=:Email, `Payment`=:Payment, `class`=:class";
        $stmt = $db->prepare($query3);
        $stmt->bindParam(":FirstName", $FirstName);
        $stmt->bindParam(":LastName", $LastName);
        $stmt->bindParam(":Email", $Email);
        $stmt->bindParam(":Payment", $Payment);
        $stmt->bindParam(":class", $class);
        if ($stmt->execute()) {
            header('location: ../../admin.php');
        }
    }
    $query1=$db->query("select * from users where ID='$ID'");
    $query2=$query1->fetchAll();
    ?>
    <form method="post" action="">
        First Name: <input type="text" name="FirstName" value="<?php echo $query2['FirstName']; ?>" /><br />
        Last Name:<input type="text" name="LastName" value="<?php echo $query2['LastName']; ?>" /><br />
        Email: <input type = "text" name = "Email" value="<?php echo $query2['Email']; ?>"<br />
        Payment: <select name = "Payment">
            <option value="Full">Full</option>
            <option value="AUDI">Semester</option>
            <option value="AUDI">Unpaid</option>
        </select>
        <input type="submit" value="<?php echo $query2['Payment']; ?>">
        Status: <select name = "Status">
            <option value="Freshman">Freshman</option>
            <option value="Sophomore">Sophomore</option>
            <option value="Junior">Junior</option>
            <option value="Senior">Senior</option>
            <option value="Alumni">Alumni</option>
            <option value="Other">Other</option>
        </select>
        <input type="submit" value="<?php echo $query2['class']; ?>">

        <br />
        <input type="submit" name="submit" value="update" />
    </form>
    <?php
}
?>
</body>
</html>