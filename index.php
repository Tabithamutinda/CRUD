<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" > 
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
</head>
<body>
    <?php require_once 'process.php'; ?>

<?php if (isset($_SESSION["message"])): ?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>">

<?php 
echo $_SESSION['message'];
unset($_SESSION['message']);
 ?>

</div>
<?php endif ?>

    <?php $mysqli= new mysqli('localhost','root','','crud') or die(mysli-error($mysqli));
    $result=$mysqli->query ("SELECT * FROM info") or 
    die($mysqli->error);
    // pre_r($result);F
    // pre_r($result->fetch_assoc());
    // pre_r($result->fetch_assoc());
    ?>

    <table class="table table-hover">
    <thead>
    <tr>
      <!-- <th scope="col">#</th> -->
      <th scope="col">Name</th>
      <th scope="col">Location</th>
      <th scope="col">Action</th>
        </tr>
</thead>

<!-- METHOD ONE -->
<?php

while($row=$result->fetch_assoc()): ?>
    <tr> 
        <!-- <th scope="row">1</th> -->
        <td><?php  echo $row['name']?></td>
        <td><?php  echo $row['location']?></td>
        <td>
            <a href="index.php?edit=<?php echo $row['id']; ?>"
            class="btn btn-info">Edit</a>
            <a href="process.php?delete=<?php echo $row['id']; ?>"
            class="btn btn-danger">Delete</a>
        </td>
    </tr>
<?php endwhile; ?>

    </table>
    <!-- function pre_r($array){
        echo '<pre>';
        print_r($array);
        echo '<pre>';
    }
   ?> -->
<div class="form-style-5">
<form action="process.php" method="POST">
<fieldset>
<legend><span class="number">1</span> Personal Info</legend>
<div class="center">
<input type="text" name="name" placeholder="Enter your Name *" value="<?php echo $name ?>">
<input type="text" name="location" placeholder="Enter your Location *" value="<?php echo $location ?>">
</div>
</fieldset>
<?php 
if ($update==true):?>
<button type="submit" class="btn btn-info" name="update">Update</button>
<?php else: ?>
<button type="submit" class="btn btn-info" name="save">Save</button>
<?php endif; ?>
</form>
</div>

<form>
  
</body>
</html>
