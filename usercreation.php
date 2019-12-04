<?php

include('connect.php');

$firstname="";
$lastname="";
$email="";
$pass="";
$errors = array();

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = "vacationdb";

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

//if create user button is clicked
if (isset($_POST['createUserBtn'])) {
	
	$firstname= mysqli_real_escape_string($conn, $_POST['firstname']);
	$lastname= mysqli_real_escape_string($conn, $_POST['lastname']);
	$email= mysqli_real_escape_string($conn, $_POST['email']);
	$pass= mysqli_real_escape_string($conn, $_POST['pass']);
	$usertype= mysqli_real_escape_string($conn, $_POST['usertype']);

	if (empty($firstname)) { 
		array_push($errors, "Firstname is required"); 
	}
	if (empty($lastname)) { 
		array_push($errors, "Lastname is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($pass)) { 
		array_push($errors, "Password is required"); 
	}	
	
	if (count($errors) == 0) {					
		$query = "INSERT INTO users (firstname, lastname, email, password, type_employee) 
				  VALUES('$firstname', '$lastname', '$email', '$pass', '$usertype')";					  
		$result = mysqli_query($conn, $query);						
		header('location: admin.php');		
	}	
}
$conn->close();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="styles.css" >
	
    <title>Epignosis Assignment - User Creation Page</title>
	
  </head>
  <body>
    <div class="container">
	
		<div class="logout">
			<a href= "admin.php">Back</a>
		</div>
				
        <div class="titleform">
            <h2>User Creation Form</h2>	
        </div>
		<div class="row">
            <div class="col-sm"> </div>
		
	     <div class="col-sm">   
		<form action="usercreation.php" method="POST">
				
        <!--Show validation errors for firstname, lastname, email and password-->					
			<?php if(count($errors) > 0) : ?>
				<div class="error">
				<?php foreach ($errors as $error): ?>
					<p><?php echo $error; ?></p>
				<?php endforeach ?>
				</div>
			<?php endif ?>
					
			<div class="form-group">
			  <label for="firstname">Firstname</label>
			  <input type="text" class="form-control" name="firstname" id="firstname" placeholder="firstname">					  
			</div>
			
			<div class="form-group">
			  <label for="lastname">Lastname</label>
			  <input type="text" class="form-control" name="lastname" id="lastname" placeholder="lastname" >					  
			</div>
		  
			<div class="form-group">
			  <label for="email">Email</label>
			  <input type="email" class="form-control" name="email" id="email" placeholder="e.g. maria@example.gr" > 					  
			</div>

			<div class="form-group">
			  <label for="pass">Password</label>
			  <input type="password" class="form-control" name="pass" id="pass" placeholder="Password" >					  
			</div>
			
			<div class="form-group">
				<label for="userTypeSelect">User Type</label>
				<select class="form-control" id="userTypeSelect" name="usertype">
				  <option>Admin</option>
				  <option>Employee</option>				 
				</select>
			 </div>
			<br/>
			<br/>
			<button type="submit" name="createUserBtn" class="btn btn-primary loginButton">Create</button>
		</form> 
		</div>
		<div class="col-sm"> </div>       	 
    </div>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>
  
</body>
</html>

