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
	$stmt->bindParam(":FirstName", $db->quote($FirstName));
	$stmt->bindParam(":LastName", $db->quote($LastName));
	$stmt->bindParam(":Email", $db->quote($Email));
	$stmt->bindParam(":Payment", $db->quote($Payment));
	$stmt->bindParam(":class", $db->quote($class));
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
					<label class="control-label" for="FirstName">First name</label>
				</div>
				<div class="col-sm-6 input-column">
					<input class="form-control" type="text" name="FirstName">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-4 label-column">
					<label class="control-label" for="LastName">Last name</label>
				</div>
				<div class="col-sm-6 input-column">
					<textarea class="form-control" rows="10" name="LastName"></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-4 label-column">
					<label class="control-label" for="Email">Email</label>
				</div>
				<div class="col-sm-6 input-column">
					<input class="form-control" type="text" name = "Email">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-4 label-column">
					<label class="control-label" for="Payment">Payment</label>
				</div>
				<div class="col-sm-6 input-column">
					<select name = "Payment">
						<option value="Full">Full</option>
						<option value="AUDI">Semester</option>
						<option value="AUDI">Unpaid</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-4 label-column">
					<label class="control-label" for="class">Status</label>
				</div>
				<div class="col-sm-6 input-column">
					<select name = "class">
						<option value="Freshman">Freshman</option>
						<option value="Sophomore">Sophomore</option>
						<option value="Junior">Junior</option>
						<option value="Senior">Senior</option>
						<option value="Alumni">Alumni</option>
						<option value="Other">Other</option>
					</select>
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
