<?php
$servername = "localhost";
$username = "root";
$password = "24152415";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "UPDATE users SET name='$name', email='$email' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully. <a href='read.php'>View All Records</a>";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
    exit;
}
?>

<form action="update.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
    <label for="name">Name:</label>
    <input type="text" name="name" value="<?php echo $user['name']; ?>" required><br><br>
    <label for="email">Email:</label>
    <input type="email" name="email" value="<?php echo $user['email']; ?>" required><br><br>
    <button type="submit">Update</button>
</form>
