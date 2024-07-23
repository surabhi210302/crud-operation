<?php
require_once("dbConnection.php");

$result = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
?>

<html>
<head>	
	<title>Homepage</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<div class="heading">
	<h2>Homepage</h2>
	<p>
		<a href="add.php">Add New Data</a>
	</p>
	</div>
	<form action="fileupload.php" method="post" name="submit" enctype="multipart/form-data">
	<div class="fileupload">
		<label>Title</label>
		<input type="text" name="title">
		<label>file upload</label>
		<input type="file" name="file">
		<input type="submit" name="submit">
	</div>
</form>
	<div class="table">
	<table width='80%'>
		<tr>
			<td><strong>Name</strong></td>
			<td><strong>Email</strong></td>
			<td><strong>Action</strong></td>
		</tr>
</div>
		<?php
		
		while ($res = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>".$res['name']."</td>";
			echo "<td>".$res['email']."</td>";	
			echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | 
			<a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
		}
		?>
	</table>
</body>
</html>
