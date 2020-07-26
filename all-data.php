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
		$connection = new mysqli('localhost', 'root', '', 'awd416');
		$sql = "INSERT INTO users (name, email, cell) VALUES ('Arijit Banarjee', 'arijitbanarjee889@gmail.com', '+8801733163337')";
		$connection -> query($sql);
	?>
	<div class="container mt-5">
    <a href="index.php" class="btn btn-info">Add Data</a>
    <table class="table table-hover table-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Full Name</th>
        <th scope="col">Email</th>
        <th scope="col">Cell</th>
        <th scope="col">Image</th>
        <th scope="col">Age</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Arijit Banarjee</td>
        <td>a@gmail.com</td>
        <td>+8801700000000</td>
        <td><img src="images/image.jpg" alt="" class="img-fluid custom-image"></td>
        <td>25</td>
      </tr>
      <tr>
        <th scope="row">1</th>
        <td>Arijit Banarjee</td>
        <td>a@gmail.com</td>
        <td>+8801700000000</td>
        <td><img src="images/image.jpg" alt="" class="img-fluid custom-image"></td>
        <td>25</td>
      </tr>
      <tr>
        <th scope="row">1</th>
        <td>Arijit Banarjee</td>
        <td>a@gmail.com</td>
        <td>+8801700000000</td>
        <td><img src="images/image.jpg" alt="" class="img-fluid custom-image"></td>
        <td>25</td>
      </tr>
      <tr>
        <th scope="row">1</th>
        <td>Arijit Banarjee</td>
        <td>a@gmail.com</td>
        <td>+8801700000000</td>
        <td><img src="images/image.jpg" alt="" class="img-fluid custom-image"></td>
        <td>25</td>
      </tr>
    </tbody>
  </table>
	</div>
	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
