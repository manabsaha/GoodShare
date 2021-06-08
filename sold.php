<?php
require('inc/config.php');
if(isset($_POST['ad_id'])){
	$user_id = $_SESSION['user_id'];
	$advt_id = mysqli_escape_string($db,$_POST['ad_id']);
  echo $advt_id;
	$buyer_email = mysqli_escape_string($db,$_POST['buyer_email']);
	//check if buyer id is not same to the id which is logged in
	if($_SESSION['email'] == $buyer_email){
		echo "<script type='text/javascript'>alert('Buyer ID cannot be same as Logged in ID')</script>";
	}
  else{
    $advt_id_num = (int)$advt_id;
    //echo gettype($advt_id_num);
    echo $advt_id;
    $query = "SELECT user_id FROM users WHERE email = '$buyer_email'";
    $result = mysqli_query($db,$query);
    $row = mysqli_fetch_assoc($result);
    $buyer_id = $row['user_id'];
    $query = "UPDATE advertisements SET buyer_id = '$buyer_id',availability='sold' WHERE ad_id = '$advt_id_num' AND seller_id = '$user_id'";
    echo $query;
    $result = mysqli_query($db,$query);
    if($result){
       echo "<script type='text/javascript'>alert('Updated Succesfully')</script>";	
       header("Location: my_products.php");
    }
    else{
    	echo "<script type='text/javascript'>alert('Failed! Try again')</script>";
    }
  }
}

?>