<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "lzic";
$password = "qwerty";
$dbname = "bookDatabase";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['title'])) {
    $title = $_POST['title'];

    $stmt = $conn->prepare("DELETE FROM allBooks12 WHERE title = ?");
    $stmt->bind_param("s", $title);

    if ($stmt->execute()) {
        echo "Book deleted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete a Book</title>
</head>
<body>
<div class="container">
<form action="delete.php" method="post">
    <label for="title">Book Title:</label>
    <input type="text" id="title" name="title" required><br><br>
<div class="button-group">
    <input type="submit" value="Delete Book">
</div>
</form>
</div>
</body>
</html>

