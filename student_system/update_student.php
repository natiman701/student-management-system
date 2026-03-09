<?php
include("db.php");

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$course = $_POST['course'];

$sql = "UPDATE students
SET name='$name',
email='$email',
phone='$phone',
course='$course'
WHERE id=$id";

mysqli_query($conn,$sql);

header("Location: dashboard.php");

?>