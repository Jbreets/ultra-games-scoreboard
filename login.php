<?php include("includes/header.php"); ?>

<?php

/*
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
if ($stmt = $con->prepare('SELECT id, password FROM users WHERE email = ?')) {
  $stmt->bind_param('s', $_POST['email']);
  $stmt->execute();
  $stmt->store_result();

  //tells page where to go if data is correct
  if ($stmt->num_rows > 0) {
    $stmt->bind_result($id, $password);
    $stmt->fetch();
     if (md5($_POST['password']) === $password) {
       session_regenerate_id();
       $_SESSION['loggedin'] = TRUE;
       $_SESSION['email'] = $_POST['email'];
       $_SESSION['id'] = $id;
       header('Location: ../loggedin.php');
     } else {
       header('Location: ../login.php');

     }
  } else {
    header('Location: ../login.php');

  }
    $stmt->close();
}
*/
?>
  
  <div class="page">
    <h2 class="subhead">Login</h2>
    <div role="alert" aria-live="assertive" style="display: none">
      <h6>That account doesn't exist click here if you have forgot your password</h6>

    </div>
    <form class="form" method="post" action="functions/authenticate.php">
        <label class="label" for="email" id="label1">Email</label>
        <input class="Tname" type="text" value="" name="email" required>
        <label class="label" for="password">Password</label>
        <input class="Tname" type="password" value="" name="password" required>
        <input class="submit" type="submit" value="LOG IN">
        <!-- <a class="text-link" href="./forgot-password.php">Forgot password?</a> -->
        
        <?php
        // session cookie error message if details aren't correct 
        if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
      } ?>
    </form>
  </div>
<?php //include("includes/footer.php"); ?>
