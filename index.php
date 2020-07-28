<?php
require_once 'app/db.php';
require_once 'app/functions.php';

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP Form Validation</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<?php

		// student data form setup

		if(isset($_POST['submit'])){
			// value get

			$name = $_POST['name'];
			$email = $_POST['email'];
			$cell = $_POST['cell'];
			$username = $_POST['username'];
			$location = $_POST['location'];
			$gender = $_POST['gender'];
			$age = $_POST['age'];
			$status = $_POST['status'];

			if(empty($name) || empty($email) || empty($cell) || empty($location) || empty($gender) || empty($age) || empty($username)){
				$mess = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
							  <strong>Warning!</strong> Field must not be empty.
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
			}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$mess = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
							  <strong>Warning!</strong> Invalid Email.
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
			}elseif(dataCheck($connection, 'users', 'email', $email) === false){
        $mess = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
							  <strong>Warning!</strong> Email already exists.
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
      }elseif(dataCheck($connection, 'users', 'username', $username) === false){
        $mess = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
							  <strong>Warning!</strong> Username already exists.
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
      }elseif(dataCheck($connection, 'users', 'cell', $cell) === false){
        $mess = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
							  <strong>Warning!</strong> Cell already exists.
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
      }else{
        //file upload
        $file = fileUpload($_FILES['image'], 'students/', ['jpg', 'jpeg', 'gif', 'png'], 1024);

        $file_name = $file['file_name'];
        $file_mess = $file['mess'];

        if(!empty($file_mess)){
          $mess = $file_mess;
        }else{
          $sql = "INSERT INTO users(name, email, cell, username, image, location, gender, age) VALUES('$name', '$email', '$cell', '$username', '$file_name', '$location', '$gender', '$age')";
          $connection -> query($sql);
          $mess = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success!</strong> Stident added successful.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
        }
			}
		}

	 ?>
	<div class="custom_signup">
		<a href="all-data.php" class="btn btn-info">All Data</a>
		<h2 class="text-center">Sign Up</h2>
		<div class="message">
			<?php if(isset($mess)){
				echo $mess;
			} ?>
		</div>
		<form method="POST" enctype="multipart/form-data">
		  <div class="form-group">
		    <label for="exampleInputName1">Full Name</label>
		    <input name="name" type="text" class="form-control" id="exampleInputName1" aria-describedby="emailHelp">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Email</label>
		    <input name="email" type="text" class="form-control" id="exampleInputEmail1">
		  </div>
		   <div class="form-group">
		    <label for="cell">Cell</label>
		    <input name="cell" type="text" class="form-control" id="cell">
		  </div>
      <div class="form-group">
       <label for="username">Username</label>
       <input name="username" type="text" class="form-control" id="username">
     </div>
		  <div class="form-group">
		    <label for="image">Image</label>
		    <input name="image" type="file" class="form-control" id="image">
		  </div>
			<div class="form-group">
		    <label for="location">Location</label>
				<select name="location" id="location" class="form-control">
					<option value="Mirpur">Mirpur</option>
					<option value="Uttara">Uttara</option>
					<option value="Dhanmondi">Dhanmondi</option>
					<option value="Gazipur">Gazipur</option>
					<option value="Bonani">Bonani</option>
				</select>
		  </div>
			<div class="form-group">
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="gender" id="male" value="Male" checked="checked">
				  <label class="form-check-label" for="male">Male</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="gender" id="famale" value="Famale">
				  <label class="form-check-label" for="famale">Famale</label>
				</div>
			</div>
		  <div class="form-group">
		    <label for="age">Age</label>
		    <input name="age" type="text" class="form-control" id="age">
		  </div>
			<div class="form-group">
		   <input type="checkbox" name="status" id="status" value="Published" checked="checked">
			 <label for="status">Published</label>
		  </div>
		  <button name="submit" type="submit" class="btn btn-primary" value="Add">Submit</button>
		</form>
	</div>
	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
