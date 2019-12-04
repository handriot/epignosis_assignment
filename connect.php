<?php

session_start();

$email="";
$pass="";
$errors = array();

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = "vacationdb";

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

//when login button is clicked
if(isset($_POST['login'])) {
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$pass = mysqli_real_escape_string($conn, $_POST['pass']);
	
	if (empty($email)) {
		array_push($errors, "Email is required");		
    } 		
	if (empty($pass)) {
		array_push($errors, "Password is required");		
    }
					
	if(count($errors) == 0) {
		$query = "SELECT * FROM users WHERE email='$email' AND password='$pass'";		
		$result = mysqli_query($conn, $query);
		
		if(mysqli_num_rows($result) == 1){
			
			$signin = mysqli_fetch_assoc($result);
			//sign in as admin
			if ($signin['type_employee'] == 'Admin') {
				header('location: admin.php');		  
			}else{
				//sign in as employee
				$sql="SELECT e.employee_id FROM employee e 
						INNER JOIN users u 
						ON u.id=e.employee_id
						WHERE u.email='$email'";
				$res = $conn->query($sql);
							
				header('location: vacation_form.php?id='.$res->fetch_assoc()["employee_id"]);
			}			
		}else{
			array_push($errors, "wrong email or password");
			header('location: index.php');
		}		
	} 
}
?>