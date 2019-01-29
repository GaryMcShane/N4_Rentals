<!DOCTYPE html>
<?php
include '../database/db_connect.php';

$sql = "SELECT * FROM Customer";
$result = $conn->query($sql);

$email = $_POST["email"];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		 $dbEmail=$row["email"];
		 $CustomerID=$row["id"];
		 
		if ($dbEmail == $email){
			header("Location: resetPassword.php?id=$CustomerID");			 
		}else{
			header("Location: forgottenPassword.php");
		}	 
	}
}

$conn->close();
?>
