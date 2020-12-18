<?php
session_start();
include "../db/connect.php";
$servername = "remotemysql.com";
$username = "8lryFLkefl";
$password = "LnfctzhjaZ";
$db = "8lryFLkefl";

// Create connection
$con = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$con) {
	die("Connection failed: " . mysqli_connect_error());
}
	if (isset($_POST["f_name"])) {

		$f_name = $_POST["f_name"];
		$email = $_POST["email"];
		$mobile = $_POST["phone"];
		$address1 = $_POST["subject"];
		$name = "/^[a-zA-Z ]+$/";
		$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
		$number = "/^[0-9]+$/";

		if (empty($f_name) || empty($email) || empty($address1) ||
			empty($mobile)) {

			echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
			</div>
		";
			exit();
		} else {
			if (!preg_match($name, $f_name)) {
				echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>this $f_name is not valid..!</b>
			</div>
		";
				exit();
			}
			if (!preg_match($emailValidation, $email)) {
				echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>this $email is not valid..!</b>
			</div>
		";
				exit();
			}
			if (!preg_match($number, $mobile)) {
				echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Mobile number $mobile is not valid</b>
			</div>
		";
				exit();
			}
			if (!(strlen($mobile) == 10)) {
				echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Mobile number must be 10 digit</b>
			</div>
		";
				exit();
			}
			//existing email address in our database
			$sql = "SELECT user_id FROM participent WHERE email = '$email' LIMIT 1";
			$check_query = mysqli_query($con, $sql);
			$count_email = mysqli_num_rows($check_query);
			if ($count_email > 0) {
				echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Email Address is already registered. Try Another email address</b>
			</div>
		";
				exit();
			} else {

				$sql = "INSERT INTO `participent` 
		(`user_id`, `fullname`,`email`,`mobile`) 
		VALUES (NULL, '$f_name', '$email', 
		 '$mobile')";
				$run_query = mysqli_query($con, $sql);
				$_SESSION["uid"] = mysqli_insert_id($con);
				$_SESSION["name"] = $f_name;
				$ip_add = getenv("REMOTE_ADDR");
				$sql = "UPDATE cart SET user_id = '$_SESSION[uid]' WHERE ip_add='$ip_add' AND user_id = -1";
				if (mysqli_query($con, $sql)) {
					echo "register_success";
					echo "<script> location.href='index.php'; </script>";
				}
				header("Location:https://vuwt.herokuapp.com/index.php");
				//http_redirect('../index.php');
				exit;
			}
		}

	}


?>






















































