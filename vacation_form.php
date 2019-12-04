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

$sql = "SELECT submission_date, date_request_start, date_request_end, st.status_name 
         FROM `employee` e 
		 INNER JOIN `status` st ON e.status=st.id 
		 INNER JOIN users u ON u.id=e.employee_id
		 WHERE e.employee_id=".htmlspecialchars($_GET["id"]).
		 " ORDER BY submission_date DESC";
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
	
    <title>Epignosis Assignment - Vacation Form</title>
  </head>
  <body>
    <div class="container">
	
		<div class="logout">
			<a href= "logout.php">Sign Out</a>
		</div>
			
        <div class="titleform">
            <h2>Past Applications for Vacation Leave</h2>	
        </div>
                                             
        <form>
            <button type="button" class="btn btn-primary requestBtn" data-toggle="modal" data-target="#submissionFormModal">Submit Request</button>
        </form> 

			<table class="table table-striped">
				<thead>
				  <tr>					
					<th scope="col">Submission Date</th>
					<th scope="col">Vacation-StartDate</th>
					<th scope="col">Vacation-EndDate</th>
					<th scope="col">Status</th>
				  </tr>
				</thead>
				<tbody>                        
					  <?php 
					  if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
								echo "<tr><td>" . $row["submission_date"]. "</td><td>" . $row["date_request_start"]. "</td><td>" . $row["date_request_end"]. "</td><td>" . $row["status_name"]. "</td></tr>";										
							}
						} else {
							echo "0 results";
						}
					  ?>	
				</tbody>
			</table>     
    </div>

    <!-- Modal -->
    <div class="modal fade" id="submissionFormModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="submissionFormModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="submissionFormModalLabel">Submission Form for Vacation Leave</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="myform">
			  <div style="font-size: 16px">Vacation Starts</div>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input class="form-control" id="date" name="date" placeholder="DD/MM/YYYY" type="text"/>
                </div>
                <br/>	
				<hr/>
				<br/>
				<div style="font-size: 16px">Vacation Ends</div>
                <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input class="form-control" id="date" name="date" placeholder="DD/MM/YYYY" type="text"/>
                </div>
                <br/>
                <div class="form-group">
                        <label for="message-text" class="col-form-label">Reason:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-primary" name="modalsubmit">Submit</button>
            </div>
          </div>
        </div>
      </div>


    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>   
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

    <script>
        $(document).ready(function(){
            var date_input=$('input[name="date"]'); 
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            date_input.datepicker({
                format: 'dd/mm/yyyy',
                container: container,
                todayHighlight: true,
                autoclose: true,             
            })
        })
    </script>

</body>
</html>

