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
<title>Edit Student</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-6">

<div class="card shadow">

<div class="card-header text-center">
<h4>Edit Student</h4>
</div>

<div class="card-body">

<form method="POST" action="update_student.php">

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

<div class="mb-3">
<label class="form-label">Name</label>
<input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" required>
</div>

<div class="mb-3">
<label class="form-label">Email</label>
<input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" required>
</div>

<div class="mb-3">
<label class="form-label">Phone</label>
<input type="text" name="phone" class="form-control" value="<?php echo $row['phone']; ?>" required>
</div>

<div class="mb-3">
<label class="form-label">Course</label>
<input type="text" name="course" class="form-control" value="<?php echo $row['course']; ?>" required>
</div>

<button type="submit" class="btn btn-primary">Update Student</button>

<a href="dashboard.php" class="btn btn-secondary">Back</a>

</form>

</div>

</div>

</div>

</div>

</div>

</body>
</html>