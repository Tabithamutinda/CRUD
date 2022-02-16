<?php

session_start();
$name='';
$location='';
$update=false;

$mysqli= new mysqli('localhost','root','','crud') or die(mysli-error($mysqli));

if(isset($_POST['save'])){
    $name=$_POST['name'];
    $location=$_POST['location'];

   $mysqli ->query ("INSERT INTO info (name, location) VALUES ('$name', '$location')") or 
   die($mysqli->error);

   $_SESSION['message']="Record has been saved!";
   $_SESSION['msg_type']="Success";

   header("location:index.php");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $mysqli->query("DELETE FROM info WHERE id=$id") or die($mysqli->error());

    $_SESSION['message']="Record has been deleted!";
    $_SESSION['msg_type']="deleted";

    header("location:index.php");
}

if (isset($_GET['edit'])) {
    $id=$_GET['edit'];
    $update=true;
    $result=$mysqli->query("SELECT * FROM info WHERE id=$id") or die($mysqli->error());
    if(count(array($result))==1){
        $row=$result->fetch_array();
        $name=$row['name'];
        $location=$row['location'];
    }
}

?>