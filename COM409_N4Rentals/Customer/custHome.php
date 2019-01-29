<!DOCTYPE html>
<?php 
//This page is connecting to the database and getting the session ID of the logged in user 
include '../database/db_connect.php';
session_start();
$_SESSION['userID'];

//It's also getting the users information who just logged in.
$CustomerID = $_GET['id'];
$customerquery = "SELECT * FROM customer WHERE id = ".$CustomerID;
$result = $conn->query($customerquery);

//This statement is an SQL Join statement as its selecting from the rental note table and the products table. This is so we can populated the rental histroy information.
$rentalquery = "SELECT rental_note.Rental_ID, products.Product_ID, products.Title, products.Category, rental_note.Duration, products.Price, rental_note.Date_Rented 
FROM rental_note
INNER JOIN products
ON rental_note.Product_ID=products.Product_ID 
WHERE id=".$CustomerID;
$RentalResult = $conn->query($rentalquery);


$_SESSION['userID'] = $CustomerID; 

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>N4 Rentals</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="../css/n4Rentals.css" media="screen">
  </head>
 
 <?php
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					?> 
 
 
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
        </div>
      </div>
    </div>
	<br><br><br>
	
	<div class="container">
		<div class="bs-docs-section">
			
			
					
		<div class="row">
			<div class="col-lg-12">
				<div class="page-header">
				  <h1 id="forms">Welcome <?php echo $row["custFirstName"] . " " . $row["custLastName"];?>!</h1>
				</div>
			 </div>
		</div>
			
		
			
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="col-lg-8 col-md-8">
					<div class="well bs-component" align="center">
					<p>This is your account home page where you can manage your account.<br>
					View your rental histroy below, your contact details to the right or click an option below to manage your account:</p>
					
					
					<input type=button onClick="location.href='updateCustDetails.php?CustID=<?php echo$row['id']; ?>'" class="btn btn-primary btn-md" value='Update Contact Information'>
					<p class="divider"><p>
					<input type=button onClick="location.href='updatePassword.php?CustID=<?php echo$row['id']; ?>'" class="btn btn-primary btn-md" value='Change Password'>
					<p class="divider"><p>
					<input type=button onClick="location.href='logoutCust.php'" class="btn btn-danger btn-md" value='Logout'>

					</div>

				</div>
				
				<div class="col-lg-4 col-md-4">
					<div class="well bs-component">
					<h4><b><u>Your Details:</u></b></h4>
						<table>
							<body>
								<tr>
									<th>Name: </th>
									<td> <?php echo $row["custFirstName"] . " " . $row["custLastName"];?></td>	
								</tr>
								<tr>
									<th>Email: </th>
									<td> <?php echo $row["email"];?></td>
								</tr>
								<tr>
									<th>DOB: </th>
									<td> <?php echo $row["DOB"];?></td>
								</tr>
								<tr>
									<th>Address: </th>
									<td> <?php echo $row["address"].", ".$row["town"].", ".$row["county"].", ".$row["pcode"].", ".$row["country"];?></td>
								</tr>
							</body>
						</table>
					</div>
				</div>
			</div>
        </div>
			<?php
						}
						} else{
							echo "0 results";}
							?>
		
		
		
		<div class="row">
			  <div class="col-lg-12">
				<div class="page-header">
				  <p align="justify">View your rental history below listing the products you’ve rented in the past. To rent any of these products again, simply click ‘Book’!</p>
				</div>
			  </div>
			</div>
			
			<div class="bs-component">
				<table class="table table-striped table-hover ">
					<thead>
					<tr>
						<th>ID:</th>
						<th>Title</th>
						<th>Product Category</th>
						<th>Duration:</th>
						<th>Price:(£)</th>
						<th>Date Rented:</th>
						<th></th>
					</tr>
					
					<?php
			
			if ($RentalResult->num_rows > 0) {
				while($row = $RentalResult->fetch_assoc()) {
					?>  
					
					</thead>
					<tbody>
					<tr>
						<td><?php echo $row["Rental_ID"]; ?></td>
						<td><?php echo $row["Title"]; ?></td>
						<td><?php echo $row["Category"]; ?></td>
						<td><?php echo $row["Duration"]; ?> days</td>
						<td><?php echo $row["Price"]; ?></td>
						<td><?php echo $row["Date_Rented"]; ?></td>
						<td><a href="../bookProduct.php?id=<?php echo$row['Product_ID']; ?>">Book!</a></td>
					</tr>
					<?php
			}
			} else{
				echo "You have no rental history yet. After you rent a product it will appear in the table below:<br>";
}
$conn->close();
?> 
					
                </tbody>
              </table> 
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