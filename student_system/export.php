<?php
include("db.php");

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=students.xls");

echo "ID\tName\tEmail\tPhone\tCourse\n";

$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result))
{
    echo $row['photo']."\t".$row['id']."\t".$row['name']."\t".$row['email']."\t".$row['phone']."\t".$row['course']."\n";
}
?>