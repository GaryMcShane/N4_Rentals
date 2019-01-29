<!-- This file holds the header for all files which can then be used as an includes-->

<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>N4 Rentals</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="css/n4Rentals.css" media="screen">
  </head>
 
  <body>
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="index.php" class="navbar-brand"><img src="images/N4_Title.png" width="130" height="20"></a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            <li>
              <a href="index.php">Home</a>
            </li>
            <li>
              <a href="n4_DVD.php">DVDs</a>
            </li>
			<li>
              <a href="n4_BluRay.php">Blu-Ray</a>
            </li>
			<li>
              <a href="n4_Games.php">Games</a>
            </li>
          </ul>
		  
		  <?php //This part of the nav-bar is repeated twice as its part of an If statement. It will show a Login link if a user is not logged in (according to the userID)
				//however if the userID is present on the page like the first clause below, then it will show customer links such as  Logout, Update Passowrd etc..

if ($UserID){ 
			if ($custResult->num_rows > 0) {
				while($row = $custResult->fetch_assoc()) {
?>
    <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" ><?php echo $row['custFirstName'] ." " . $row['custLastName']; ?> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="Customer/custHome.php?id=<?php echo$row['id']; ?>">Customer Home</a></li>
                <li><a href="Customer/updateCustDetails.php?CustID=<?php echo$row['id']; ?>">Update Contact Information</a></li>
                <li><a href="Customer/updatePassword.php?CustID=<?php echo$row['id']; ?>">Change Passowrd</a></li>
                <li class="divider"></li>
                <li><a href="Customer/logoutCust.php">Logout</a></li>
              </ul>
            </li>
          </ul>

<?php
			}
			} else{
				echo "0 results";
}

 } else { ?>
    <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" >Login <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="Customer/customerLogin.php">Customer Login</a></li>
                <li class="divider"></li>
                <li><a href="Admin/AdminLogin.php">Admin Login</a></li>
              </ul>
            </li>
          </ul>
<?php }
?>	  
          
        </div>
      </div>
    </div>
	<br><br><br>