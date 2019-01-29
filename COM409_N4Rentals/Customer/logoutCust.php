<?php

//This page will simply destroy the session when the customer logs out.. it will then redirect them back to the home page.

session_start();
session_destroy();
header("location: ../index.php");

?>