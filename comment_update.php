<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	$dbc = mysqli_connect('localhost', 'root', 'wnsdnjs1', 'Community') or die('Error occured');
	
	$username = $_POST['username'];
	$content = $_POST['comment'];
	$Q_No = $_POST['q_num'];
	
	echo "username : " . $username . ", content : " . $content . ", Q_No : " . $Q_No . " .";
	$sub_query = "SELECT count(*) AS count FROM reply";
	
	$result_cnt = mysqli_query($dbc, $sub_query);
	$result_row = mysqli_fetch_row($result_cnt);
	$total_row = $result_row[0];
	
	$next_cnt = $total_row + 1;	
	
	$query = "INSERT INTO reply (username, content, Q_No, Reply_No) VALUES ('$username', '$content', '$Q_No', '$next_cnt')";	
	
	mysqli_query($dbc, $query);
	
	echo "new reply added \n";

	mysqli_close($dbc);
?>

<html>
	Go back to View<br>
	<a href="http://localhost/lounge.php">Go</a>
</html>