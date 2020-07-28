<?php
require_once 'app/db.php';
require_once 'app/functions.php';

if(isset($_GET['delete_id'])){
  $id = $_GET['delete_id'];
  $p_name = $_GET['p_name'];

  $sql = "DELETE FROM users WHERE id = '$id'";
  $connection -> query($sql);

  unlink('students/'.$p_name);

  $mess = '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Successfully deleted.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
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

	<div class="container mt-5">
    <a href="index.php" class="btn btn-info">Add Data</a>
    <?php
    if(isset($mess)){
      echo $mess;
    }
     ?>
    <table class="table table-hover table-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Full Name</th>
        <th scope="col">Email</th>
        <th scope="col">Cell</th>
        <th scope="col">Username</th>
        <th scope="col">Location</th>
        <th scope="col">Image</th>
        <th scope="col">Age</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $sql = "SELECT * FROM users";
        $data = $connection -> query($sql);
        $i = 1;
        while($all_data = $data -> fetch_assoc()):
       ?>
        <tr>
          <th scope="row"><?php echo $i;$i++; ?></th>
          <td><?php echo $all_data['name']; ?></td>
          <td><?php echo $all_data['email']; ?></td>
          <td><?php echo $all_data['cell']; ?></td>
          <td><?php echo $all_data['username']; ?></td>
          <td><?php echo $all_data['location']; ?></td>
          <td><img src="students/<?php echo $all_data['image']; ?>" alt="" class="img-fluid custom-image"></td>
          <td><?php echo $all_data['age']; ?></td>
          <td>
            <a href="show.php?id=<?php echo $all_data['id']; ?>" class="btn btn-info">View</a>
            <a href="#" class="btn btn-warning">Edit</a>
            <a href="all-data.php?delete_id=<?php echo $all_data['id']; ?>&&p_name=<?php echo $all_data['image']; ?>" class="btn btn-danger" id="delete-btn">Delete</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
	</div>
	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script>
    $(document).on('click', '#delete-btn', function(){
      let del = confirm('Are u sure to delete this?');

      if(del == true){
        return true;
      }else{
        return false;
      }
    });
  </script>
</body>
</html>
