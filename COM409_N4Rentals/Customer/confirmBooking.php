<?php
//Again this page is connecting to the database and getting the session ID of the logged in user 
include '../database/db_connect.php';
session_start();

$UserID = $_SESSION['userID'];
$sql = "SELECT * FROM customer WHERE id = ". $UserID;
$custResult = $conn->query($sql);

//This page also gets the product details of the product that they've just previously clicked to rent so information can be outtputted here about it!
$productID = $_GET['ProductID'];
$productquery = "SELECT * FROM Products WHERE Product_ID=".$productID;
$result = $conn->query($productquery);

//We then get the duration value also submitted from the previous form
$days = $_POST["duration"];

//Once we have this information we can now insert it into the Rental_Note table, inserting the Customers ID, the Products ID and the duration.
if ($_SESSION['userID']){
	$sql = "INSERT INTO rental_note(id,Product_ID,duration) VALUES('$UserID','$productID','$days')";

	if (mysqli_query($conn, $sql)) {
		header("Success");	
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}	
}else{
	header("Location: customerLogin.php");	
}

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>N4 Rentals</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="../css/n4Rentals.css" media="screen">
  </head>
 
  <body>
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="../index.php" class="navbar-brand"><img src="../images/N4_Title.png" width="130" height="20"></a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            <li>
              <a href="../index.php">Home</a>
            </li>
            <li>
              <a href="../n4_DVD.php">DVDs</a>
            </li>
			<li>
              <a href="../n4_BluRay.php">Blu-Ray</a>
            </li>
			<li>
              <a href="../n4_Games.php">Games</a>
            </li>
          </ul>
                    		  <?php 

if ($UserID){ 
			if ($custResult->num_rows > 0) {
				while($row = $custResult->fetch_assoc()) {
?>
    <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" ><?php echo $row['custFirstName'] ." " . $row['custLastName']; ?> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="custHome.php?id=<?php echo$row['id']; ?>">Customer Home</a></li>
                <li><a href="updateCustDetails.php?CustID=<?php echo$row['id']; ?>">Update Contact Information</a></li>
                <li><a href="updatePassword.php?CustID=<?php echo$row['id']; ?>">Change Passowrd</a></li>
                <li class="divider"></li>
                <li><a href="logoutCust.php">Logout</a></li>
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
	
	<div class="container">
		<div class="bs-docs-section">
		
		<?php
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					?> 		
			<div class="row">
			  <div class="col-lg-12 col-md-12">
			 
				<div class="page-header">
				  <div class="col-lg-12 col-md-12">
					<div class="col-lg-8 col-md-8">
						<h1>Confirmation of booking for <?php echo $row["Title"]; ?>! </h1>
					</div>
					<div class="col-lg-4 col-md-4">
						<h3>REF: <b>N4Rentals-<?php echo $_SESSION['userID']."-".$row["Category"].  $row["Product_ID"]; ?></b></h3>
					</div>
				  </div>
				</div>
			  </div>
			</div>
			
			<div class="row">
				<div class="col-lg-12 col-md-12">
					 <div class="col-lg-3 col-md-3">
						<div class="well bs-component">
							<img src="../images/<?php echo $row["Image"]; ?>" style="width:300px;height:250px;">
							<h1> <b><?php echo $row["Title"]; ?></b></h1>
						</div>
					</div>
					
					<div class="col-lg-9 col-md-9">
						<div class="well bs-component" align="center">
							<h3>Congratulations! You have successfully rented <?php echo $row["Title"]; ?> for <?php echo "$days" ?> days! </h3><br>
							<p>Please quote your reference number: <u><b>N4Rentals-<?php echo $_SESSION['userID']."-".$row["Category"].  $row["Product_ID"]; ?></b></u>
							when you come to collect your <?php echo $row["Category"]; ?> by visiting us at:</p><br>
							
							<p><b>N4 Rentals, 3-5 Hill St, Newry, Co. Down, BT34 6GF.</b></p><br>
							
							<p>By the end of the <?php echo "$days" ?> days please return the <?php echo $row["Category"]; ?> by posting or 
							dropping back to us using the same address as above.</p>
							
							<p>If you have any issues with your <?php echo $row["Category"]; ?> then please contact us via email to: info@N4Rentals.com</p><br>
							<p>Enjoy your viewing!</p>

							<input type=button onClick="location.href='../index.php'" class="btn btn-primary btn-md" value='Continue Browsing'>
							<p class="divider"><p>
							<input type=button onClick="location.href='logoutCust.php'" class="btn btn-danger btn-md" value='Logout'>							
						</div>					
					</div>
				</div>
			</div>
			<?php
						}
						} else{
							echo "0 results";}
							$conn->close();?>
		</div>
	</div>

		
		<footer>
        <div class="row">
          <div class="col-lg-md">
            <p align="center">&copy; 2016 COM409 Group 3</p>
          </div>
        </div>
      </footer> 	  
	</div>

    <script src="../jquery/n4.min.js"></script>
    <script src="../jquery/n4_1.min.js"></script>
    
  <script type="text/javascript">
/* <![CDATA[ */
(function(){try{var s,a,i,j,r,c,l=document.getElementsByTagName("a"),t=document.createElement("textarea");for(i=0;l.length-i;i++){try{a=l[i].getAttribute("href");if(a&&a.indexOf("/cdn-cgi/l/email-protection") > -1  && (a.length > 28)){s='';j=27+ 1 + a.indexOf("/cdn-cgi/l/email-protection");if (a.length > j) {r=parseInt(a.substr(j,2),16);for(j+=2;a.length>j&&a.substr(j,1)!='X';j+=2){c=parseInt(a.substr(j,2),16)^r;s+=String.fromCharCode(c);}j+=1;s+=a.substr(j,a.length-j);}t.innerHTML=s.replace(/</g,"&lt;").replace(/>/g,"&gt;");l[i].setAttribute("href","mailto:"+t.value);}}catch(e){}}}catch(e){}})();
/* ]]> */
</script>
</body>
</html>
