<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	$dbc = mysqli_connect('localhost', 'root', 'wnsdnjs1', 'Community') or die('Error occured');
	
	$username = $_POST['nickname'];
	$title = $_POST['title'];
	$content = $_POST['content'];
	
	$sub_query = "SELECT count(*) AS count FROM contents";
	
	$result_cnt = mysqli_query($dbc, $sub_query);
	$result_row = mysqli_fetch_row($result_cnt);
	$total_row = $result_row[0];
	
	$next_cnt = $total_row + 1;
	
	$query = "INSERT INTO contents (username, title, content, Q_No) VALUES ('$username', '$title', '$content', '$next_cnt')";
	
	mysqli_query($dbc, $query);
	
	echo "new write added \n";

	mysqli_close($dbc);
?>

<html>
	Go back to Lounge<br>
	<a href="http://localhost/lounge.php">Go</a>
</html>