<?php
include("db.php");

$id = $_GET['id'];

$sql = "SELECT * FROM students WHERE id=$id";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<title>Student Details</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card p-4">

<h3 class="mb-4">Student Details</h3>

<img src="uploads/<?php echo $row['photo']; ?>" width="150" class="mb-3">

<p><b>Name:</b> <?php echo $row['name']; ?></p>
<p><b>Email:</b> <?php echo $row['email']; ?></p>
<p><b>Phone:</b> <?php echo $row['phone']; ?></p>
<p><b>Course:</b> <?php echo $row['course']; ?></p>

<a href="dashboard.php" class="btn btn-primary">Back</a>

</div>

</div>

</body>
</html>