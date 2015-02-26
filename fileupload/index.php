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
if(isset($_POST['submit']))
{
	$name = $_FILES['ffile']['name'];
	$temp = $_FILES['ffile']['tmp_name'];
	
	move_uploaded_file($temp,"uploaded/".$name);
	$url = "http://localhost/uploaded/$name";
	$sql = "INSERT INTO `videos` VALUE ('','$name','$url')";
        $result = $conn->query($sql);
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Video Upload And Playback Tutorial</title>
</head>

<body>

<a href="videos.php">Videos</a>
<form action="index.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="ffile" />
    <input type="submit" name="submit" value="Upload!" />
</form>

<?php

if(isset($_POST['submit']))
{
	echo "<br />".$name." has been uploaded";
}
 $conn->close();
?>

</body>
</html>