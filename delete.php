<?php

require 'db/connection.php';
      if((!isset($_GET['id']))||trim($_GET['id'])==""){
      echo "No post like that !";
      }else{

$del_id=$_GET['id'];

$sql = "DELETE FROM user WHERE id='$del_id'";

if ($db->query($sql) === TRUE) {
    echo "Record deleted successfully";
    echo '<script language="Javascript">';
        echo 'document.location.replace("./operation.php")'; // -->
        echo '</script>';
} else {
    echo "Error deleting record: " . $db->error;
}

}

?>