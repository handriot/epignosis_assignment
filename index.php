<?php include('connect.php'); ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css" >

    <title>Epignosis Assignment - Sign in</title>

  </head>

  <body>
    <div class="container-fluid">       
        <div class="row">
            <div class="col-sm"> </div>

            <div class="col-sm">  
              
                <div class="header">
                    <h2>Welcome</h2>
                 </div>
                 
                <form action="index.php" method="POST">
				
                  <!--Show validation errors for email and password-->				  
					<?php if(count($errors) > 0) : ?>
						<div class="error">
						<?php foreach ($errors as $error): ?>
							<p><?php echo $error; ?></p>
						<?php endforeach ?>
						</div>
					<?php endif ?>

				  
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="e.g. maria@example.gr" 
								value="<?php echo $email ?>" > 					  
                    </div>

                    <div class="form-group">
                      <label for="pass">Password</label>
                      <input type="password" class="form-control" name="pass" id="pass" placeholder="Password" >					  
                    </div>
                    
                    <button type="submit" name="login" class="btn btn-primary loginButton">Login</button>
                </form> 
            </div>

            <div class="col-sm"> </div>
        </div>
    </div>

    <!-- JavaScript -->   
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>
  </body>
</html>
