<?php
//starts session
session_start();

require_once __DIR__ . "/funcs.php";
$con = db_conn();

//checks if connected to database
if( !$con ) {
  exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if ( !isset($_POST['email'], $_POST['password']) ) {
  exit('Please fill in both the username and password fields!');
}
if ($stmt = $con->prepare('SELECT id, password, Privelages FROM users WHERE email = ?')) {
  $stmt->bind_param('s', $_POST['email']);
  $stmt->execute();
  $stmt->store_result();

  var_dump($stmt);

  //tells page where to go if data is correct
  if ($stmt->num_rows > 0) {
    $stmt->bind_result($id, $password, $privelages);
    $stmt->fetch();
     if (md5($_POST['password']) === $password) {
       if ($privelages == 'Admin')  {
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['id'] = $id;
        header('Location: ../loggedin.php');
         
       } elseif ($privelages == 'Staff') {
        session_regenerate_id();
        $_SESSION['loggedin-staff'] = TRUE;
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['id'] = $id;
        header('Location: ../loggedin.php');
       } else {
        $_SESSION['message'] = '<h3>break</h3>';
       }

     } else {
       header('Location: ../login.php');
       $_SESSION['message'] = '<h3 style="text-align: center;">Sorry, Your Password was incorrect</h3>';
       

     }
  } else {
    header('Location: ../login.php');
    $_SESSION['message'] = '<h3 style="text-align: center;">Sorry, Your username or Password was incorrect</h3>';

  }
    $stmt->close();
}

 ?>
