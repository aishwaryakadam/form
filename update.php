<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Record Form</title>
</head>
<body>

<?php
      require 'db/connection.php';
      if((!isset($_GET['id']))||trim($_GET['id'])==""){
      echo "No post like that !";
      }else{

    $post_id = addslashes($_GET['id']);
      $result = mysqli_query($db, "SELECT * FROM user WHERE id = '$post_id'");
      $rows = mysqli_num_rows($result);

      if($rows){
        while($post = mysqli_fetch_assoc($result)) {
      $post_id= $post["id"];
       $first_name= $post["first_name"];
       $last_name=$post["last_name"];
       $email = $post["email"];
      
  ?>


<form action="" method="post">
    <p>
        <h1>Update Details</h1>
    </p>
    <p>
        <label for="firstName">First Name:</label>
        <input type="text" name="first_name" id="firstName" value="<?php echo $first_name; ?>">
    </p>
    <p>
        <label for="lastName">Last Name:</label>
        <input type="text" name="last_name" id="lastName" value="<?php echo $last_name; ?>">
    </p>
    <p>
        <label for="emailAddress">Email Address:</label>
        <input type="email" name="email" id="emailAddress" value="<?php echo $email; ?>">
    </p>
    
    <input type="submit" value="Update" name="update"><br>
</form>
<?php
}
}
}


if (isset($_POST['update'])) {

$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];

      $sql="UPDATE user SET first_name='$first_name',last_name ='$last_name',email='$email'  WHERE id='$post_id'";
        if($db->query($sql)==true){
            echo "Records added successfully.";
        echo '<script language="Javascript">';
        echo 'document.location.replace("./operation.php")'; // -->
        echo '</script>';

        } else{
            echo "ERROR: Could not able to execute $sql. " . $db->error();
      }
    }
?>
</body>
</html>