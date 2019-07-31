<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		table{
			align-content: center;
			text-align: center;
			width: 30%;
		}
		th,td{
			border-bottom: 1px solid #aaa;
			padding: 10px 10px;
			
		}
		form{
			width: 40%;
			padding: 5px 20px;
			text-align: center;
			transform: translate(65%,0px);
			margin-bottom: 50px;
		}
		form input{
			border: 1px solid #aaaaaa;
			height: 20px;
		}
	</style>
</head>
<body>
	<form action="" method="post">
        <h1>Insert Details</h1>
        <label>First Name:</label>
        <input type="text" name="first_name" id="firstName"><br><br>
    
        <label for="lastName">Last Name:</label>
        <input type="text" name="last_name" id="lastName"><br><br>
    
        <label for="emailAddress">Email Address:</label>
        <input type="email" name="email" id="emailAddress"><br><br>
    
    	<input type="submit" value="Save" name="save" style="height: 25px;"><br>
	</form>


	<table align="center">
	<tr><th>Id</th>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Email Id</th>
	<th>Operations</th></tr>
<?php
//error_reporting(0);
require 'db/connection.php';

	if (isset($_POST['save'])) {
	$first_name=addslashes($_POST['first_name']);
	$last_name=addslashes($_POST['last_name']);
	$email=addslashes($_POST['email']);
	
		$sql="INSERT INTO user (first_name,last_name,email) VALUES('$first_name','$last_name','$email')";
		if ($db->query($sql)==true) {
			echo "New Records Inserted Successfully...";
		}else{
			echo $db->error;
		}
	
}


	$result=$db->query("SELECT * FROM user");
		if ($result->num_rows) {
			while ($row=$result->fetch_assoc()) {
				$id = $row['id'];
				 ?>
	        <tr>
	            <td><?php echo $row['id']; ?></td> 
	            <td><?php echo $row['first_name']; ?></td> 
	            <td><?php echo $row['last_name']; ?></td> 
	            <td><?php echo $row['email']; ?></td> 
	            <td><a href="update.php?id=<?php echo $id; ?>">Edit</a>|<a href="delete.php?id=<?php echo $id; ?>">Delete</a></td> 
	        </tr>
        <?php
		}


		$result->free();
		mysqli_close($db);
	}
?>
</table>
</body>
</html>