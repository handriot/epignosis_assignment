<?php

include('connect.php');

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = "vacationdb";

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection      
if($conn->connect_error) {
    die('Unable to connect with the database: ' . $conn->connect_error);
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

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
	
    <title>Epignosis Assignment - Administration Page</title>
  </head>
  <body>
    <div class="container">
	
		<div class="logout">
			<a href= "logout.php">Sign Out</a>
		</div>
		   
        <div class="titleform">
            <h2>All Users</h2>	
        </div>
                                             
        <form>
            <button type="button" class="btn btn-primary usercreationBtn"><a href="usercreation.php">Create User</a></button>
        </form> 

			<table class="table table-striped">
				<thead>
				  <tr>					
					<th scope="col">Firstname</th>
					<th scope="col">Lastname</th>
					<th scope="col">Email</th>
					<th scope="col">Type</th>
				  </tr>
				</thead>
				<tbody>                        
					  <?php 
					  if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
								echo "<tr><td>" . $row["firstname"]. "</td><td>" . $row["lastname"]. "</td><td>" . $row["email"]. "</td><td>" . $row["type_employee"]. "</td></tr>";										
							}
						} else {
							echo "0 results";
						}
					  ?>	
				</tbody>
			</table>     
    </div>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>

</body>
</html>

