<?php
$servername = getenv("DB_HOST");
$username = getenv("DB_USERNAME");
$password = getenv("DB_PASSWORD");
$dbname = getenv("DB_DATABASE");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `info_submits` WHERE DATE(`timestamp`) = CURDATE()";
$result = $conn->query($sql);

if (isset($result->num_rows) && $result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> id: ". $row["id"]. " - Name: ". $row["name"]. " " . $row["email"] . "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>