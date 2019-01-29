<!DOCTYPE html>

<?php include '../database/db_connect.php';

//If a user has forgotten their password they will be redirected to this page where they are required to first enter their email.
//When the form is submitted a check will be made on the user to see if it appears in the db and if it is then the user can change their password!

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
					  <h1 id="forms">Reset Password:</h1>
					</div>
				 </div>
			</div>
				
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<div class="well bs-component">
						<form action="emailCheck.php" method="POST" name="EMAILFORM" onsubmit="return validateEmail()"  class="form-horizontal">
							<h4><b>Enter your N4 Rentals registered email address below to reset your password:</b></h4>
							<p><font color="red">Fields marked with a * are required</font></p>
							<fieldset>			
									<div class="form-group">
										<label for="inputFName" class="col-lg-6 col-md-6 control-label">Email:<font color="red">*</font></label>
										<div class="col-lg-6 col-md-6">
											<input type="text" class="form-control" name="email" placeholder="Email">
										</div>
									</div> 
									<button type="submit" class="btn btn-primary">Submit</button>
							</fieldset>
						</form>
					</div>
				</div>
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

<script>
function validateEmail() {
	var x = document.forms["EMAILFORM"]["email"].value;
	if (x == null || x == "") {
		alert("Please enter your registered email address!");
		changePass.currentPass.focus();
		return false;
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