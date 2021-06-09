<?php 
   require('inc/config.php');
   $empty_flag=1;
?>


<!DOCTYPE html>
<html>
<head>
	<title>Bookmarks</title>
	
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/footer.css">
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/advertise.css">
		<link rel="stylesheet" type="text/css" href="css/purchase.css">
</head>
<body style="background-color: #212F3C;padding: 0;"><!--#CCD1D1  #5D6D7E -->
 
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
        <li class="dropdown"><a href="purchase.php" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['email']; ?><span class="caret"></span></a>
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
$query = "SELECT * FROM advertisements WHERE availability = 'available'  ORDER BY ad_id DESC";
$result = mysqli_query($db,$query);
while ($row = mysqli_fetch_assoc($result)) {
    $ad_id=$row["ad_id"];
    $query="SELECT * FROM bookmarks WHERE user_id = '$user_id' AND ad_id = '$ad_id'";
    $bookmarked = mysqli_query($db,$query);
    if(mysqli_num_rows($bookmarked) > 0){
        $empty_flag=0;?>
    	<div class="container">
            <div class="row row-margin-bottom" style="width:60%; margin:auto">
            <div class="no-padding lib-item" data-category="view">
                <div class="lib-panel">
                    <div class="row box-shadow">
                        <div class="col-md-6">
                            <img class="lib-img-show" style="padding:20%" src="<?php echo $row["picture_url"]; ?>">
                        </div>
                        
                        <div class="col-md-6">
                            <div class="lib-row lib-header">
                                <b><?php echo $row["product_name"]; ?></b>
                                <div class="lib-header-seperator"></div>
                            </div>
                            <div class="lib-row lib-data">
                            	<p>Posted on: <?php echo $row["date_of_post"]; ?></p>
                            </div>
                            <div class="lib-row lib-data">
                            	<p>Year Of Purchase: <?php echo $row["year_of_purchase"]; ?></p>
                            </div>
                            <div class="lib-row lib-desc">
                                <p><?php echo $row["product_desc"]; ?> </p>
                                <hr>
                            </div>
                            <div class="lib-row lib-price">
                            	<p>Rs <?php echo $row["price"]; ?></p>
                            </div>
                            <?php
                                $seller_id = $row["seller_id"];
                                $query = "SELECT name,email,department FROM users WHERE user_id = '$seller_id'";
                                $result2 = mysqli_query($db,$query);
                                $row2 = mysqli_fetch_assoc($result2);
                            ?>
                            <div class="lib-row lib-data">
                                <p><?php echo $row2["name"];?></p>
                                <p><?php echo $row2["email"];?></p>
                            	<p>Department of <?php echo $row2["department"];?></p>
                            </div>
                            <div class="lib-row lib-price" style="margin-bottom: 8px;">
                            <form action="remove_bookmark.php" method="post">
                                  <input type="hidden" name="advt_id" value="<?php echo $row['ad_id']; ?>">
                                  <input type="hidden" name="bookmark" value="1">
                                    <button name='remove' type="submit" class="btn btn-success" style="margin-bottom: 8px;">Remove Bookmark</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
            
        </div>
</div>
<?php
    }
}
if($empty_flag)
{
?>
<h2 style='color:white; text-align:center;padding: 0 5%;'>NO BOOKMARKS FOUND</h2>
<?php
}
?>


<!-- <footer class="container-fluid bg-4 text-center">
  <p>@ 2018 Copyright: <a href="home.php">www.adsells.com </a>| Designed by Prajwal Ghoradkar</p> 
</footer> -->