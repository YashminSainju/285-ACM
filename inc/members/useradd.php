<?php
include('../database.php');
?>

<html>
<body>
<?php

	if (isset($_POST['submit'])) {
		try{
			$FirstName = trim(filter_input(INPUT_POST, "FirstName", FILTER_SANITIZE_STRING));
			$LastName = trim(filter_input(INPUT_POST, "LastName", FILTER_SANITIZE_SPECIAL_CHARS));
			$Email = trim(filter_input(INPUT_POST, "Email", FILTER_SANITIZE_EMAIL));
			$Payment = trim(filter_input(INPUT_POST, "Payment", FILTER_SANITIZE_STRING));
			$class = trim(filter_input(INPUT_POST, "class", FILTER_SANITIZE_STRING));
		}catch (Exception $e){
			echo "<p>Error in data</p>";
		}
		$query3 = "INSERT INTO `users` SET `FirstName`=:FirstName,`LastName`= :LastName,`Email`=:Email, `Payment`=:Payment, `class`=:class";
		$stmt = $db->prepare($query3);
		$stmt->bindParam(":FirstName", $FirstName);
		$stmt->bindParam(":LastName", $LastName);
		$stmt->bindParam(":Email", $Email);
		$stmt->bindParam(":Payment", $Payment);
		$stmt->bindParam(":class", $class);
		if ($stmt->execute()) {
			header('location: ../../#/admin');
		}
	}

	?>

	<fieldset style="width:300px;">
	<form method="post" action="">
		First Name: <input type="text" name="FirstName" /><br />
		Last Name:<input type="text" name="LastName" /><br />
		Email: <input type = "text" name = "Email"/><br />
		Payment: <select name = "Payment">
			<option value="Full">Full</option>
			<option value="AUDI">Semester</option>
			<option value="AUDI">Unpaid</option>
		</select>
		Status: <select name = "class">
			<option value="Freshman">Freshman</option>
			<option value="Sophomore">Sophomore</option>
			<option value="Junior">Junior</option>
			<option value="Senior">Senior</option>
			<option value="Alumni">Alumni</option>
			<option value="Other">Other</option>
		</select>
		<input type="submit" name="submit">
	</form>
	</fieldset>
	</body>
</html>
