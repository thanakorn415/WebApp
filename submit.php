
<?php
$servername = "localhost";
$username = "root";
$password = "24152415";
$dbname = "my_database";

$name = $_POST['name'];
$email = $_POST['email'];


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "Data saved successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>


index.html
<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Website</title>
</head>
<body>
    <h1>Submit Your Data</h1>
    <form action="submit.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>


        <button type="submit">Submit</button>
    </form>
</body>
</html>


