<?php
session_start();

include '../database/db_connect.php';

//This script is launched when the admin submits the add product form.
//It first gets all the values submitted from the form and sets them to variables.
//It will then perform an SQL INSERT statement inserting each variable to its repected field in the database

$title = $_GET["title"];
$description = $_GET["description"];
$image = $_GET["image"];
$category = $_GET["Category"];
$price = $_GET["Price"];
$rating = $_GET["Rating"];


$sql = "INSERT INTO Products(Title,Description,Image,Category,Price,Rating)
VALUES('$title','$description','$image','$category','$price','$rating')";

if (mysqli_query($conn, $sql)) {
    header("location: addProd.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>