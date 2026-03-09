<?php
session_start();

if(!isset($_SESSION['user']))
{
    header("Location: login.php");
    exit();
}

if($_SESSION['role'] != 'admin')
{
    echo "Access Denied! Only Admin can add students.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Student</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-6">

<div class="card shadow">

<div class="card-header text-center">
<h4>Add Student</h4>
</div>

<div class="card-body">

<form method="POST" action="insert_student.php" enctype="multipart/form-data">

<div class="mb-3">
<label class="form-label">Name</label>
<input type="text" name="name" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Phone</label>
<input type="text" name="phone" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Course</label>
<input type="text" name="course" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Photo</label>
<input type="file" name="photo" class="form-control">
</div>

<button type="submit" class="btn btn-success">Save Student</button>

<a href="dashboard.php" class="btn btn-secondary">Back</a>

</form>

</div>

</div>

</div>

</div>

</div>

</body>
</html>