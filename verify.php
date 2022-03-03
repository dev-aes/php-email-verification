<?php 
require 'db.php';

if(isset($_GET['token'])) 
{
    $token = $_GET['token'];

    $sql = "SELECT id, name FROM users WHERE token = '$token'";
    $select = mysqli_query($conn, $sql);

    $user = mysqli_fetch_assoc($select);

    if(!$user) {
        $_SESSION['error'] = "Invalid Token";
        header('location:index.php');
    }

    // empty token

    $update_sql = "UPDATE users SET token='null' WHERE id= $user[id]";

    if(mysqli_query($conn, $update_sql)) {
        $_SESSION['name'] = $user['name'];
        header('location:home.php');
    }

}

?>