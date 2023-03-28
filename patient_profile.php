<?php
	session_start();
	include("dbh-inc.php");
    include("functions.php");

    $user_data = check_login($conn);
    $user_id_fk = $user_data['user_ID'];

    $patient_name = "SELECT first_name FROM patient WHERE user_id = '$user_id_fk'";

    $first_name = mysqli_query($conn, $patient_name);

		if($first_name && mysqli_num_rows($first_name) > 0)
		{

			$name = mysqli_fetch_assoc($first_name);
			$output = $name['first_name'];
			echo $output;

		}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Patient Profile</title>
	<style>
		h1 {
			font-size: 40px;
			color: #333;
			margin-top: 30px;
			margin-bottom: 20px;
            background-color: #192841; 
		}
		p {
			font-size: 16px;
			color: #555;
			margin-bottom: 10px;
		}
	</style>
</head>
<body>
	<h1><center>Patient Profile</center></h1>
	<p><strong>Patient Name:</strong> John Doe</p>
    <p><strong>Gender:</strong> Male</p>
	<p><strong>Date of Birth:</strong> January 1, 1980</p>
	<p><strong>Address:</strong> 123 Main Street, Anytown, USA</p>
	<p><strong>Phone:</strong> 555-1234</p>
	<p><strong>Email:</strong> john.doe@email.com</p>
	<p><strong>Current Primary Doctor:</strong> Dr. Patel</p>
    <p><strong>Approval To See Specialist:</strong> No </p>
    <p><strong>Medical Conditions:</strong> Diabetes, High Blood Pressure</p>
	<p><strong>Allergies:</strong> Peanuts, Shellfish</p>
</body>

</html>
