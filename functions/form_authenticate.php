<?php
if(!isset($_SESSION)) { 
session_start(); 
} 
if (!isset($_SESSION['loggedin']) && !isset($_SESSION['loggedin-staff'])) {
    header('Location: login.php');
    exit;
}

require_once __DIR__ . "/funcs.php";
$con = db_conn();

if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$stmt = $con->prepare('SELECT password, id FROM users WHERE email = ?');
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();

?>
