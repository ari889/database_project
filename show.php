<?php
require_once 'app/db.php';
require_once 'app/functions.php';

if(isset($_GET['id'])){
  $id = $_GET['id'];

  $sql = "SELECT * FROM users WHERE id = '$id'";
  $data = $connection -> query($sql);

  $show_data = $data -> fetch_assoc();
}
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
	<div class="custom_signup">
		<a href="all-data.php" class="btn btn-info">All Data</a>
    <div class="card mt-3">
      <div class="card-body">
        <img src="students/<?php echo $show_data['image']; ?>" alt="" class="user-image shadow-sm">
        <h3 class="text-center"><?php echo $show_data['name']; ?></h3>
        <table class="table">
          <tr>
            <td>Email:</td>
            <td><?php echo $show_data['email']; ?></td>
          </tr>
          <tr>
            <td>Cell:</td>
            <td><?php echo $show_data['cell']; ?></td>
          </tr>
          <tr>
            <td>Address:</td>
            <td><?php echo $show_data['location']; ?></td>
          </tr>
          <tr>
            <td>Age:</td>
            <td><?php echo $show_data['age']; ?></td>
          </tr>
          <tr>
            <td>Username:</td>
            <td><?php echo $show_data['username']; ?></td>
          </tr>
        </table>
      </div>
    </div>
	</div>
	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
