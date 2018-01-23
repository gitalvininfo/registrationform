<?php
if(ISSET($_POST['register'])){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$gender = $_POST['gender'];
	$age = $_POST['age'];
	$address = $_POST['address'];
	$zip = $_POST['zip'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	$conn = new mysqli("localhost", "root", "", "student") or die(mysqli_error());
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	echo "Database is ok";

	$q1 = $conn->query ("SELECT * FROM `registration` WHERE `firstname` = '$firstname' && `lastname` = '$lastname	'") or die(mysqli_error());
	$f1 = $q1->fetch_array();
	$check = $q1->num_rows;
	if($check > 0){
		echo "<script> alert ('Name already exist!')</script>";
		echo "<script>document.location='index.php'</script>";
	}
	else {
		$conn->query("INSERT INTO `registration` VALUES('', '$firstname', '$lastname', '$gender', '$age', '$address', '$zip', '$username', '$password')") or die(mysqli_error());
		$conn->close();
		echo "<script type='text/javascript'>alert('Successfully added new record!');</script>";
		echo "<script>document.location='index.php'</script>";  
	}
}

?>

<fieldset>
	<h1>Registration Form</h1>
	<form method="post" action="index.php">
		First Name:     <input  type="text" name="firstname" /> <br> <br>
		Last Name:    <input  type="text" name="lastname" /><br> <br>
		Gender:
		<select name="gender" >
			<option>Select</option>
			<option value="Male">Male</option>
			<option value="Female">Female</option>
		</select><br> <br>
		Age:    <input  type="text" name="age" /><br> <br>
		Address:    <input  type="text" name="address" /><br> <br>
		ZIP:    <input  type="text" name="zip" /><br> <br>
		Username:    <input  type="text" name="username" /><br> <br>
		Password:    <input  type="password" name="password" /><br> <br>
		<button type="submit" name="register">Save</button> 
	</form>
</fieldset>