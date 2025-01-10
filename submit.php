<?php
$servername = "db";
$username = "root";
$password = "24152415";
$dbname = "db";

$name = $_POST['name'];
$email = $_POST['email'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Record</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    if ($conn->query($sql) === TRUE) {
        echo "<h1>Data saved successfully!</h1>";
    } else {
        echo "<h1>Error: " . $conn->error . "</h1>";
    }
    $conn->close();
    ?>
    <hr>
    <form action="index.html" method="GET">
        <button type="submit">Back to Home</button>
    </form>
</body>
</html>
