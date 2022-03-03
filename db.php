<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$db = "test_email_verification";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

!$conn ? die("Connection failed: " . mysqli_connect_error()) :  "";
