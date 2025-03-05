<?php
session_start();

require_once __DIR__ . "/funcs.php";
$con = db_conn();


  //checks db connection
  if( mysqli_connect_errno() ) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
  }
  if ( !isset($_POST['code']) ) {
    exit('Please enter the correct code that you were emailed');
  } //work
  if ($stmt = $con->prepare('SELECT id, code FROM codes WHERE code = ?')) {
    $stmt->bind_param('s', $_POST['code']);
    $stmt->execute();
    $stmt->store_result();


  print_r($stmt);

  //tells page where to go if details are correct
  if ($stmt->num_rows > 0) {
    $stmt->bind_result($id, $code);
    $stmt->fetch();
    if ($_POST['code'] = $code) {
      session_regenerate_id();
      $_SESSION['loggedin'] = TRUE;
      $_SESSION['id'] = $id;
      header('Location: ../change-password.php');
    } else {
      header('Location: ../change-password.php');

    }
  } else {
    header('Location: ../login.php');

  }
    $stmt->close();
  }


 ?>
