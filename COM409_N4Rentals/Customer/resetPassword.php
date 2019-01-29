<!DOCTYPE html>
<?php include '../database/db_connect.php';

//This page will allow the user to enter thier new password after their email has been checked with the database.
//The user will be able to enter thier new password and then confirm this.
//Validation is on this form to ensure that both fields are entered and also the password policy from previous is applied here!

session_start();
$_SESSION['userID'];

$CustomerID = $_GET['id'];
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
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" >Login <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="Customer/customerLogin.php">Customer Login</a></li>
                <li class="divider"></li>
                <li><a href="Admin/AdminLogin.php">Admin Login</a></li>
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
					  <h1 id="forms"><?php echo $row["custFirstName"];?> change your password here!</h1>
					</div>
				 </div>
			</div>
				
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<div class="well bs-component">
						<form action="resetPasswordProc.php?CustID=<?php echo$row['id'];?>" method="POST" name="changePass" onsubmit="return validateChangePass()"  class="form-horizontal">
							<h4><b>Update Password:</b></h4>
							<p>You can change your password below:</p><p><font color="red">Fields marked with a * are required</font></p>
							<fieldset>			
									<div class="form-group">
										<label for="inputLName" class="col-lg-6 col-md-6 control-label">New Password:<font color="red">*</font></label>
										<div class="col-lg-6 col-md-6">
											<input type="password" class=" form-control" name="newPass" placeholder="New Password">
										</div>
									</div>
									<div class="form-group">
										<label for="inputLName" class="col-lg-6 col-md-6 control-label">Confirm New Password:<font color="red">*</font></label>
										<div class="col-lg-6 col-md-6">
											<input type="password" class=" form-control" name="cNewPass" placeholder="Confirm Password">
										</div>
									</div>
									<button type="submit" class="btn btn-primary">Change Password</button>
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

<script>
function validateChangePass() {
	var x = document.forms["changePass"]["newPass"].value;
	if (x == null || x == "") {
		alert("Please confirm your new password!");
		changePass.newPass.focus();
		return false;
	}
	
	var x = document.forms["changePass"]["cNewPass"].value;
	if (x == null || x == "") {
		alert("Please confirm your new password!");
		changePass.cNewPass.focus();
		return false;
	}
	
	
	var pass1 = document.forms["changePass"]["newPass"].value;
	var pass2 = document.forms["changePass"]["cNewPass"].value;
	if (pass1 != pass2){
		alert("Passwords do not match! Please enter these are the same");
		changePass.newPass.focus();
		return false;
	}

	
	if(changePass.newPass.value != "" && changePass.newPass.value == changePass.cNewPass.value) {
      if(changePass.newPass.value.length < 6) {
        alert("Password must contain at least six characters!");
        changePass.newPass.focus();
        return false;
      }

      re = /[0-9]/;
      if(!re.test(changePass.newPass.value)) {
        alert("Password must contain at least one number (0-9)!");
        changePass.newPass.focus();
        return false;
      }
      re = /[a-z]/;
      if(!re.test(changePass.newPass.value)) {
        alert("Password must contain at least one lowercase letter (a-z)!");
        changePass.newPass.focus();
        return false;
      }
      re = /[A-Z]/;
      if(!re.test(changePass.newPass.value)) {
        alert("Password must contain at least one uppercase letter (A-Z)!");
        changePass.newPass.focus();
        return false;
      }
    }
}

</script>


	
    <script src="../jquery/n4.min.js"></script>
    <script src="../jquery/n4_1.min.js"></script>

	
	<script type="text/javascript">
/* <![CDATA[ */
(function(){try{var s,a,i,j,r,c,l=document.getElementsByTagName("a"),t=document.createElement("textarea");for(i=0;l.length-i;i++){try{a=l[i].getAttribute("href");if(a&&a.indexOf("/cdn-cgi/l/email-protection") > -1  && (a.length > 28)){s='';j=27+ 1 + a.indexOf("/cdn-cgi/l/email-protection");if (a.length > j) {r=parseInt(a.substr(j,2),16);for(j+=2;a.length>j&&a.substr(j,1)!='X';j+=2){c=parseInt(a.substr(j,2),16)^r;s+=String.fromCharCode(c);}j+=1;s+=a.substr(j,a.length-j);}t.innerHTML=s.replace(/</g,"&lt;").replace(/>/g,"&gt;");l[i].setAttribute("href","mailto:"+t.value);}}catch(e){}}}catch(e){}})();
/* ]]> */
</script>
</body>
</html>