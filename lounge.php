<?php
	require_once("dbconfig.php");
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
		<title>자유게시판</title>
		<link rel="stylesheet" type="text/css" href="reset.css">
		<link rel="stylesheet" type="text/css" href="lounge.css">
		<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js" ></script>
		
		<script>
			function done_click() {
				alert("Clicked!");
				
			}		
		</script>
	</head>
	
	<body>
		<div class="header">
			<img src="Cloud_banner.jpg"/>
		</div>
		
		<div class="container">
			<table>
				<thead>
					<tr>
							<th>No.</th>
							<th>User Name</th>
							<th>Title</th>				
					</tr>				
				</thead>
				
				<tbody>
					<?php
						error_reporting(E_ALL);
						ini_set("display_errors", 1);
						$sql = 'select * from contents';
						$result = $db->query($sql);
						while($row=$result->fetch_assoc())
						{
					?>
						<tr>
							<td>
								<?php echo $row['Q_No'] ?>
							</td>
							
							<td>
								<?php echo $row['username'] ?>							
							</td>
							
							<td>
								<a href="view.php?Q_No=<?php echo $row['Q_No'] ?>"><?php echo $row['title'] ?></a>				
							</td>					
						</tr>
					<?php
					}
					?>				
				</tbody>			
			</table>
		</div>
		
		<div class="write_board">
			<h1>New write</h1>
			<br>
			<form method="post" action="add_content.php">
				Title <input type="text" name="title" id="title" /><br><br>
				Username <input type="nickname" name="nickname" id="nickname" /><br><br>
				Contents <textarea name="content" id="content"></textarea><br><br>
				<input type='submit' name="Done" value="Submit" />
			</form>
			
		</div>
	</body>
</html>