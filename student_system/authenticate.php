<?php
session_start();
include("db.php");

$username = $_POST['username'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) == 1)
{
    $row = mysqli_fetch_assoc($result);

    $_SESSION['user'] = $username;
    $_SESSION['role'] = $row['role'];

    header("Location: dashboard.php");
}
else
{
    echo "Invalid login";
}
?>