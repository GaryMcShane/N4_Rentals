<?php
session_start();
include '../database/db_connect.php';

$sql = "SELECT * FROM Customer";
$result = $conn->query($sql);

//This file will check the login of the customer.
//It will first select all the customer records from the db as seen above.
//It will then get the email and password value that the user inputs from the previous form.
//Using the if statement it will then check that if the values inputted are matching a record in the db, then the customer will be loggin in, starting a session 
//and being re-directed to the customer home page.
//However if the users details are not matched then these must be incorrect and the user will be redirected to a forgotten password page.

$username = $_POST["custEmail"];
$password = $_POST["custPassword"];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		 $dbUsername=$row["email"];
		 $dbPassword=$row["pword"];
		 $CustomerID=$row["id"];
		 $_SESSION['userID'] = $CustomerID; 
		 
		 
		if ($dbUsername == $username && $dbPassword == $password){
			$_SESSION['login'];
			header("Location: CustHome.php?id=$CustomerID ");			 
		}	 
	}
}
$conn->close();

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
                <li><a href="../Customer/customerLogin.php">Customer Login</a></li>
                <li class="divider"></li>
                <li><a href="AdminLogin.php">Admin Login</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
	<br><br><br><br><br><br>
	
	<div class="container">
		<div class="bs-docs-section">
			
			<div class="row">
			  <div class="col-lg-12">
				<div class="page-header">
				  <h1 align="center"> Incorrect Login! Please go <a href="customerLogin.php"><u>back</u></a> and enter correct login details. </h1>
				</div>
			  </div>
			</div>

			<div class="row">
			  <div class="col-lg-12">
				<div class="page-header">
				  <h1 align="center">If you've forgotten your username/password please <a href="forgottenpassword.php"></u>click here</u></a>.</h1>
				</div>
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

    <script src="../jquery/n4.min.js"></script>
    <script src="../jquery/n4_1.min.js"></script>
    
  <script type="text/javascript">
/* <![CDATA[ */
(function(){try{var s,a,i,j,r,c,l=document.getElementsByTagName("a"),t=document.createElement("textarea");for(i=0;l.length-i;i++){try{a=l[i].getAttribute("href");if(a&&a.indexOf("/cdn-cgi/l/email-protection") > -1  && (a.length > 28)){s='';j=27+ 1 + a.indexOf("/cdn-cgi/l/email-protection");if (a.length > j) {r=parseInt(a.substr(j,2),16);for(j+=2;a.length>j&&a.substr(j,1)!='X';j+=2){c=parseInt(a.substr(j,2),16)^r;s+=String.fromCharCode(c);}j+=1;s+=a.substr(j,a.length-j);}t.innerHTML=s.replace(/</g,"&lt;").replace(/>/g,"&gt;");l[i].setAttribute("href","mailto:"+t.value);}}catch(e){}}}catch(e){}})();
/* ]]> */
</script>
</body>
</html>