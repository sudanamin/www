<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myvideo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
 }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Video Upload And Playback Tutorial</title>
</head>

<body>

<?php
$sql = "SELECT * FROM videos";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $id = $row['id'];
      $name = $row['name'];
      echo "<a href='watch.php?id=$id'>$name</a><br />";
}
} else {
    echo "0 results";
}
 $conn->close();


?>


</body>
</html>