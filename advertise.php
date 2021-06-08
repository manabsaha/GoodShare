<?php
  require('inc/config.php');
?>
<!DOCTYPE html>
<html>
<style type="text/css">
  .logo{

  }
</style>
<head>
	<title>Post Ad</title>
	<link rel="stylesheet" type="text/css" href="css/advertise.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #212F3C;color: #fff;"">

	<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <div class="logo">
      <a class="navbar-brand" href="home.php"><span >Good</span><span >Share</span></a>
      </div>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="home.php">HOME</a></li>
        <li><a href="my_products.php">MY PRODUCTS</a></li>
        <li><a href="bought_products.php">BOUGHT PRODUCTS</a></li>
        <li><a href="message.php">MESSAGES</a></li>
        <li><a href="about_us.php">ABOUT US</a></li>
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['email']; ?><span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="change_password.php">Change Password</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

  <div class="container">
  <h2 class="color-white">Post an Advertisement</h2>
  <form class="form-horizontal" action="" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2 color-white" for="product_name" >Product Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="product_name" placeholder="Product Name" name="product_name" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2 color-white" for="yop">Year of Purchase</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="yop" placeholder="Year of Purchase" name="yop" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2 color-white" for="description">Ad description</label>
      <div class="col-sm-10">          
        <textarea class="form-control" id="description" placeholder="Ad description" name="description"></textarea>  
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2 color-white" for="expected_price">Expected Price</label>
      <div class="col-sm-10">          
        <input type="number" class="form-control" id="expected_price" placeholder="Expected Price" name="expected_price" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="photos">Photo for your Ad</label>
      <div class="col-sm-10">          
        <input type="file" class="form-control" id="photos" placeholder="Photos for your Ad" name="photos" >
      </div>
    </div>
    <!--<div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox" name="remember"> Remember me</label>
        </div>
      </div>
    </div>-->
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
</div>

</div> 

</body>

<?php
    /*$date = date("Y-m-d");
    $timestamp = strtotime($date);
    if ($timestamp === FALSE) {
        $timestamp = strtotime(str_replace('/', '-', $date));
     }*/
    //echo $timestamp;
    
    if(isset($_POST['submit'])){
      $today =  date("Y-m-d");
      $owner = $_SESSION['user_id'];
      $productName = mysqli_escape_string($db,$_POST['product_name']);
      $yearOfPurchase = mysqli_escape_string($db,$_POST['yop']);
      $description = mysqli_escape_string($db,$_POST['description']);
      $expectedPrice = mysqli_escape_string($db,$_POST['expected_price']);
      $picture = "";

      $query1 = "INSERT INTO advertisements (seller_id,date_of_post,product_name,product_desc,year_of_purchase,picture_url,price) 
                VALUES ('$owner','$today','$productName','$description','$yearOfPurchase','$picture','$expectedPrice')";
      $result1 = mysqli_query($db,$query1);
      if($result1){
        echo "<script type='text/javascript'>alert('Successfully Advertised')</script>";      
      }
      else{
        echo "<script type='text/javascript'>alert('Failed! Please try again')</script>";
      }
    }


?>