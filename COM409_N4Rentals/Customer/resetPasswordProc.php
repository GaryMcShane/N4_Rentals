<?php include '../database/db_connect.php';

session_start();
$_SESSION['userID'];

//This page will change the password for the user.
//It will first pull the values in from the previous form and assign these to variables.
//It will then perform a an SQL UPDATE to the customer table with the new password and confirm password fields.
//It will then redirect the customer back to the customer login page.

$CustomerID = $_GET['CustID'];
$custNewPass = $_POST["newPass"];
$custConfirmPass = $_POST["cNewPass"];

$sqlUpdatePassword = "UPDATE customer SET pword='$custNewPass', cPword='$custConfirmPass' WHERE '$CustomerID' = id";
$result = $conn->query($sqlUpdatePassword);


if (mysqli_query($conn, $sqlUpdatePassword)) {
    header("Location: customerLogin.php");	
} else {
    echo "Error: " . $sqlUpdatePassword . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>