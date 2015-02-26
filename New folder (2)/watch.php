<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "v-u-a-p";

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

if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$sql = "SELECT * FROM `videos` WHERE id='$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$name = $row['name'];
		$url = $row['url'];
	}

	echo "You are watching ".$name."<br />";
	echo "<embed src='$url' width='560' height='315'></embed>";
}else {}
}
else
{
	echo "Error!";
}
 $conn->close();

?>

</body>
</html>