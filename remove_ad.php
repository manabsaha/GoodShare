<?php
	echo $_POST['adv_id'];
   	require('inc/config.php');
	if(isset($_POST['adv_id'])){
		$seller_id = $_SESSION["user_id"];
		$ad_id = $_POST['adv_id'];
		$query = "UPDATE advertisements SET availability='unavailable' WHERE ad_id = '$ad_id'";
		$result = mysqli_query($db,$query);
		if($result){
			echo "<script type='text/javascript'>alert('Removed Succesfully')</script>";	
       		header("Location: my_products.php");
		}
		else{
    		echo "<script type='text/javascript'>alert('Failed! Try again')</script>";
		}
	}
?>