<body>
<?php
$usn=$_GET["usn"];
$name=$_GET["name"];
$branch=$_GET["branch"];
$sem=$_GET["sem"];
$email=$_GET["email"];
$conn = mysqli_connect("localhost","root","","studentdb");
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql = "INSERT INTO student VALUES
 ('$usn', '$name', '$branch', $sem,'$email')";
if ($conn->query($sql) === TRUE) {
 echo "New record created successfully";
} else {
 echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
</body>