<?php
$servername = "db";
$username = "root";
$password = "24152415";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "DELETE FROM users WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: read.php");
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
