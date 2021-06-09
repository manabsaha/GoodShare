<?php 
   require('inc/config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Products Bought</title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>	
  <link rel="stylesheet" type="text/css" href="css/advertise.css">
	<link rel="stylesheet" type="text/css" href="css/purchase.css">
</head>
<body style="background-color: #212F3C;padding: 0;">
 
	<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="home.php">GoodShare</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="home.php">HOME</a></li>
        <li><a href="my_products.php">MY PRODUCTS</a></li>
        <li><a href="bought_products.php">BOUGHT PRODUCTS</a></li>
        <li><a href="message.php">MESSAGES</a></li>
        <li><a href="about_us.php">ABOUT US</a></li>
        <li><a href="bookmarks.php">BOOKMARKS</a></li>
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

<?php
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM advertisements where buyer_id = '$user_id'";
$result = mysqli_query($db,$query);
if(mysqli_num_rows($result) == 0){
  //echo "<script type='text/javascript'>alert('You have not Bought any Product')</script>";?>
  <div>
    <br>
    <h1 style="padding: 0 5%;">You have not bought any products!</h1>
  </div>
<?php
}
while ($row = mysqli_fetch_assoc($result)) { ?>
      <div class="container" style=" width:60%; margin:auto">
            <div class="row row-margin-bottom">
            <div class="no-padding lib-item" data-category="view">
                <div class="lib-panel">
                    <div class="row box-shadow">
                        <div class="col-md-6">
                            <img class="lib-img-show" style="padding:20%" src="<?php echo $row["picture_url"]; ?>">
                        </div>
                        
                        <div class="col-md-6">
                            <div class="lib-row lib-price">
                            <p><b><?php echo $row["product_name"]; ?></b></p>
                            </div>
                            <div class="lib-row lib-data">
                            <p><?php echo $row["product_desc"]; ?></p>
                            </div>
                            <div class="lib-row lib-data">
                              <?php
                                $seller_id = $row["seller_id"];
                                $query2 = "SELECT email FROM users WHERE user_id = '$seller_id';";
                                $result2 =  mysqli_query($db,$query2);
                                $row2 = mysqli_fetch_assoc($result2);
                              ?>
                              <p>Sold by: <b><?php echo $row2["email"];?></b></p>
                            </div>
                            <div class="lib-row lib-data">
                              <p>Ad posted on: <?php echo $row["date_of_post"]; ?></p>
                            </div>
                            <div class="lib-row lib-price">
                              <p><b>Rs <?php echo $row["price"]; ?></b></p>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
            <!--<?php $_SESSION['ad_id']=$id; ?>-->        
           <!-- <a href="set_buyer.php?id=<?php echo $row["advt_id"]; ?>"><button type="submit" id="sold" name="sold" class="btn btn-primary">SOLD</button></a>-->
                   
        </div>
        
</div>
      
 <?php  
  }
  ?>


