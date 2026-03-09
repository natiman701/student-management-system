<?php
include("db.php");

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$course = $_POST['course'];

// Handle file upload
$photo = $_FILES['photo']['name'];  // Get the name of the uploaded file
$tmp = $_FILES['photo']['tmp_name']; // Temporary location of the uploaded file

// Define the target directory to store the uploaded file
$target_dir = "uploads/";
$target_file = $target_dir . basename($photo);

// Move the uploaded file to the target directory
if (move_uploaded_file($tmp, $target_file)) {
    echo "The file " . basename($photo) . " has been uploaded.";
} else {
    echo "Sorry, there was an error uploading your file.";
}

// Insert the student data into the database
$sql = "INSERT INTO students (name, email, phone, course, photo) 
        VALUES ('$name', '$email', '$phone', '$course', '$photo')";

if (mysqli_query($conn, $sql)) {
    // Redirect to dashboard after successful insertion
    header("Location: dashboard.php");
} else {
    echo "Error: " . mysqli_error($conn);
}
?>