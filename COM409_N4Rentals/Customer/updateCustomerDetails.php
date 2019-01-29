<?php include '../database/db_connect.php';

session_start();
$_SESSION['userID'];

//This page will update the customer details that the customer inserted on the previous form.
//It will then get all the values that were submitted and assign these to variables.
//It will then perform an SQL Update to the customer table with all the details in the variables and set these to their respected fields on the customer table in the database.
//It will then redirect the customer back to the previous page


$CustomerID = $_GET['CustID'];
$custFirstName = $_POST["custFirstName"];
$custLastName = $_POST["custLastName"];
$address = $_POST["address"];
$town = $_POST["town"];
$county = $_POST["county"];
$pcode = $_POST["pcode"];
$country = $_POST["country"];

$sqlUpdateCustomer = "UPDATE customer SET custFirstName='$custFirstName', custLastName='$custLastName', address='$address', town='$town', county='$county', pcode='$pcode', country='$country'
WHERE '$CustomerID' = id";
$result = $conn->query($sqlUpdateCustomer);


if (mysqli_query($conn, $sqlUpdateCustomer)) {
    header("Location: updateCustDetails.php?CustID=$CustomerID");	
} else {
    echo "Error: " . $sqlUpdateCustomer . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>