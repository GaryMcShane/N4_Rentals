<?php include '../database/db_connect.php';

session_start();

//This page will update the product based on the value that the previous form submitted. 
//It will first get the product ID of the selected product and the new price that has been inputted.
//It will then carry out an SQL UPDATE statement with the new price and update the products table with this. 
//Finially it will re-direct back to the products management page.

$Product = $_GET['ProductID'];
$ProductPrice = $_POST["Price"];

$sqlUpdateProduct = "UPDATE products SET Price='$ProductPrice' WHERE Product_ID =" . $Product;
$result = $conn->query($sqlUpdateProduct);


if (mysqli_query($conn, $sqlUpdateProduct)) {
    header("Location: prodUpdate.php");	
} else {
    echo "Error: " . $sqlUpdateProduct . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>