<?php 
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	require_once("dbconfig.php");
	$Q_No = $_GET['Q_No'];
	
	$sql = "SELECT username, title, content FROM contents WHERE Q_NO = $Q_No";
	$result = $db->query($sql);
	$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>User's contents</title>
		<link rel="stylesheet" href="reset.css" />
		<link rel="stylesheet" href="view.css" />	
	</head>
	
	<body>
		<div class="container">
		<h1>User's Question</h1>
		<br><br>
			<table>
				<thead>
					<tr>
							<th>User Name</th>
							<th>Title</th>
							<th>Contents</th>			
					</tr>				
				</thead>
				
				<tbody>
					<tr>
						<td>
							<?php echo $row['username'] ?>							
						</td>
							
						<td>
							<?php echo $row['title'] ?>
						</td>					
						
						<td>
							<?php echo $row['content'] ?>						
						</td>
					</tr>		
				</tbody>
			</table>		
			</div>
			
			<div class="comment">
			<br><br>
			<?php
				error_reporting(E_ALL);
				ini_set("display_errors", 1);
				$sql_reply = "SELECT reply.content, reply.username FROM reply, contents WHERE reply.Q_No = $Q_No";
				$result_reply = $db->query($sql_reply);
				while($row2=$result_reply->fetch_assoc()) {
			?>
					username : 
			<?php					
					echo $row2['username'];
			?>
					<br><br>
					content : 
			<?php
					echo $row2['content'];
			?>
				<hr>
			<?php
				}
			?>
			</div>
	
			<div class="new_comment">
			<h1>Other User's Comments</h1>
			<br><br>
			<form action="comment_update.php" method="POST">
				<table>
					<tbody>
						<tr>
							<th scope="row">username</th>
							<td><input type="text" name="username" id="username" /></td>
						</tr>
						<br><br>
						<tr>
							<th scope="row">comment</th>
							<td><textarea name="comment" id="comment"></textarea></td>	
						</tr>
					</tbody>
				</table>
				<input type="hidden" name="q_num" id="q_num" value="<?=$Q_No?>" />
				<br><br>
				<div class="btn_set">
					<input type="submit" value="writing">
				</div>
			</form>		
			</div>	
	</body>
</html>
