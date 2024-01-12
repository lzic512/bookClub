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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['title']) && isset($_POST['author'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];

    $stmt = $conn->prepare("INSERT INTO allBooks12 (title, authors) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $author);

    if ($stmt->execute()) {
        echo "New book added successfully";
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
    <title>Add a New Book</title>
    <link rel="stylesheet" type="text/css" href="./myStyle.css">
</head>
<body>
<div class="button-group">
    <button type="button" onclick="location.href='form.html'">Back To Form</button>
</div>
<div class="container">
<form action="add.php" method="post">
    <label for="title">Book Title:</label>
    <input type="text" id="title" name="title" required><br><br>

    <label for="author">Author:</label>
    <input type="text" id="author" name="author" required><br><br>
<div class="button-group">
    <button type="submit">Submit</button>
</div>
</div>
</form>

</body>
</html>

