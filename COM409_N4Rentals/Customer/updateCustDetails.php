<!DOCTYPE html>

<?php include '../database/db_connect.php';
session_start();
$_SESSION['userID'];

//This page will allow a customer already logged in to change thier current contact information. This is an advanced feature added to the site.
//The user will change thier details in the pre-populated form that holds their current information, to the new information.
//The form will then submit to another PHP file that will carry out the Update.
//Validation occurs on this page to ensure all fields are populated.

$CustomerID = $_GET['CustID'];
$customerquery = "SELECT * FROM customer WHERE id = ".$CustomerID;
$result = $conn->query($customerquery);


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
                <li><a href="#" onclick="window.history.back();return false;">Customer Home</a></li>
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
					  <h1 id="forms"><?php echo $row["custFirstName"];?> change your contact details here!</h1>
					</div>
				 </div>
			</div>
				
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<div class="well bs-component">
						<form  action="updateCustomerDetails.php?CustID=<?php echo$row['id'];?>"  method="POST" class="form-horizontal">
							<h4><b>Update Information:</b></h4>
							<p>You can update your contact address etc. here by changing the details below and clicking Update! 
							<br><font color="red">Fields marked with a * are required</font></p>
							<fieldset>			
									<div class="form-group">
										<label for="inputFName" class="col-lg-6 col-md-6 control-label">Firstname:<font color="red">*</font></label>
										<div class="col-lg-6 col-md-6">
											<input type="text" class="form-control" value="<?php echo $row["custFirstName"]?>" name="custFirstName" placeholder="Firstname">
										</div>
									</div>
								  
									<div class="form-group">
										<label for="inputLName" class="col-lg-6 col-md-6 control-label">Lastname:<font color="red">*</font></label>
										<div class="col-lg-6 col-md-6">
											<input type="text" class=" form-control" value="<?php echo $row["custLastName"]?>" name="custLastName" placeholder="Lastname">
										</div>
									</div>
									
									<div class="form-group">
										<label for="inputAddress" class="col-lg-6 col-md-6 control-label">Address:<font color="red">*</font></label>
										<div class="col-lg-6 col-md-6">
											<input type="text" class="form-control" value="<?php echo $row["address"]?>" name="address" placeholder="Address">
										</div>
									</div>
									
									<div class="form-group">
										<label for="inputTown" class="col-lg-6 col-md-6 control-label">Town/City:<font color="red">*</font></label>
										<div class="col-lg-6 col-md-6">
											<input type="text" class="form-control" value="<?php echo $row["town"]?>" name="town" placeholder="Town/City">
										</div>
									</div>
									
									<div class="form-group">
										<label for="inputCounty" class="col-lg-6 col-md-6 control-label">County:<font color="red">*</font></label>
										<div class="col-lg-6 col-md-6">
											<input type="text" class="form-control" value="<?php echo $row["county"]?>" name="county" placeholder="County">
										</div>
									</div>
									
									<div class="form-group">
										<label for="inputPCode" class="col-lg-6 col-md-6 control-label">Postcode:<font color="red">*</font></label>
										<div class="col-lg-6 col-md-6">
											<input type="text" class="form-control" value="<?php echo $row["pcode"]?>" name="pcode" placeholder="Postcode">
										</div>
									</div>
									
									<div class="form-group">
										<label for="inputCountry" class="col-lg-6 col-md-6 control-label">Country:<font color="red">*</font></label>
										<div class="col-lg-6 col-md-6">
											<input type="text" class="form-control" value="<?php echo $row["country"]?>" name="country" placeholder="Country">
										</div>
									</div>
									
									<button type="submit" class="btn btn-primary">Update</button>
								
							</fieldset>
						</form>
					</div>
				</div>
			</div>
			
				<?php
							}
							} else{
								echo "0 results";}
								$conn->close();?>
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