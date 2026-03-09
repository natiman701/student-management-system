<?php
session_start();
include("db.php");

if(!isset($_SESSION['user']))
{
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <style>
.developer-btn {
    background-color: #4CAF50; /* Green color */
    color: white;
    font-size: 16px;
    font-weight: bold;
    padding: 10px 20px;
    border-radius: 8px;
    border: none;
    transition: background-color 0.3s ease;
    cursor: pointer;
}

/* Hover Effect */
.developer-btn:hover {
    background-color: #45a049; /* Darker Green */
}

/* Focus Effect */
.developer-btn:focus {
    outline: none;
}
    </style>
<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<h2 class="mb-4">Student Management System</h2>

<a href="add_student.php" class="btn btn-success">Add Student</a>
<a href="export.php" class="btn btn-info">Export Excel</a>
<a href="logout.php" class="btn btn-secondary">Logout</a>

<br><br>
<?php
$sql = "SELECT COUNT(*) as total FROM students";
$result = mysqli_query($conn,$sql);
$data = mysqli_fetch_assoc($result);
?>

<div class="alert alert-info">
<b>Total Students:</b> <?php echo $data['total']; ?>
</div>
<form method="GET" class="mb-3">
<div class="input-group">

<input type="text" name="search" class="form-control" placeholder="Search student by name">

<button type="submit" class="btn btn-primary">Search</button>


</div>
</form>

<table class="table table-bordered table-striped">

<thead class="table-dark">

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Course</th>
<th>Photo</th>
<th>Action</th>
</tr>

</thead>

<tbody>

<?php

if(isset($_GET['search'])){
    $search = $_GET['search'];
    $sql = "SELECT * FROM students WHERE name LIKE '%$search%'";
}else{
    $sql = "SELECT * FROM students";
}
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo $row['course']; ?></td>
<td>
<img src="uploads/<?php echo $row['photo']; ?>" width="50">
</td>

<td>

<a href="edit_student.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
<a href="view_student.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">View</a>
<a href="delete_student.php?id=<?php echo $row['id']; ?>" 
class="btn btn-danger btn-sm"
onclick="return confirm('Are you sure you want to delete this student?');">
Delete
</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>
<!-- Developer Button -->
<button type="button" class="btn btn-primary developer-btn" data-bs-toggle="modal" data-bs-target="#developerModal">
    Developer Info
</button>

<!-- Developer Info Modal -->
<div class="modal fade" id="developerModal" tabindex="-1" aria-labelledby="developerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="developerModalLabel">Developer Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <div class="row">
                    <!-- Developer Photo -->
                    <div class="col-md-4 text-center">
                        <img src="uploads/natnaelW.png" alt="Developer Photo" class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
                    </div>
                    <!-- Developer Details -->
                    <div class="col-md-8">
                        <h4><b>Name: Natnael Wubshet</b></h4>
                        <p><strong>Email:</strong> Natanelwubshet408@gmail.com</p>
                        <p><strong>Phone:</strong> +251954355880</p>
                        <p><strong>Department:</strong> Information System</p>
                        <p><strong>Skills:</strong> PHP, JavaScript, HTML, CSS, Data Maining, MySQL</p>
                        <p><strong>Bio:</strong> A passionate web developer who loves building modern web applications with clean code and a great user experience.</p>
                    </div>
                </div>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>