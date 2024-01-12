<!DOCTYPE html>
<html>
<head>
    <title>Database Data</title>
    <link rel="stylesheet" type="text/css" href="./myStyle.css">
</head>

<body>
<head>
<title>My Database</title>
</head>
<div class="button-group">
    <button type="button" onclick="location.href='add.php'">Add</button>
    <button type="button" onclick="location.href='delete.php'">Remove</button>
</div>
<div class="container">
<h1>Below is our selection</h1>
<?php

$servername = "localhost";
$username = "lzic";
$password = "qwerty";
$dbname = "bookDatabase";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT authors, title FROM allBooks12";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Authors: " . $row["authors"]. " - Title: " . $row["title"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();

?>
</div>
</body>
</html>

