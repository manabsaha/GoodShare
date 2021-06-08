<?php 
   require('inc/config.php');
   echo $_GET['id'];
   
?>
<!DOCTYPE html>
<html>
<body style="background-color: #212F3C;color:#fff;">

<?php
 echo "<script type='text/javascript'>alert('hi')</script>";	
if(isset($_POST['submit'])){
	$user_id = $_SESSION['user_id'];
	$advt_id = mysqli_escape_string($db,$_POST['advt_id']);
	$query="INSERT INTO bookmarks VALUES ('$advt_id','$user_id')";
    
    $result = mysqli_query($db,$query);
    if($result){
       echo "<script type='text/javascript'>alert('Bookmark added!')</script>";	
       header("Location: purchase.php");
    }
    else{
    	echo "<script type='text/javascript'>alert('Failed! Try again')</script>";
    }

 
}

?>