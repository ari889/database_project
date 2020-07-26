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
      <?php
        $sql = "SELECT * FROM users";
        $data = $connection -> query($sql);

        while($all_data = $data -> fetch_assoc()):
       ?>
        <tr>
          <th scope="row">1</th>
          <td><?php echo $all_data['name']; ?></td>
          <td><?php echo $all_data['email']; ?></td>
          <td><?php echo $all_data['cell']; ?></td>
          <td><img src="images/image.jpg" alt="" class="img-fluid custom-image"></td>
          <td>25</td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
	</div>
	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
