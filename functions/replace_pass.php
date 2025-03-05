<?php require_once __DIR__ . "/../includes/header.php"; ?>
<link rel="stylesheet" href="/../resources/styles.css"> 
<?php require_once __DIR__ . "/../functions/funcs.php";

$con = db_conn();
 
$code =  $_POST['vall'];
$email = $_POST['val'];
$newpass = mysqli_real_escape_string($con, $_POST['newpass']);

$encrypted = md5($newpass);





if (isset($_POST['submit'])) {

   $sql = "UPDATE users SET password='$encrypted' WHERE email='$email' "; 
   $result = mysqli_query($con, $sql);

   if ($result) {
     $message = '<h2 class="subhead">Password has been set<h2>' . '<br>' . '<h2 class="subhead">Click below to continue login<h2>';
   }
 
}
if (isset($_POST['submit'])) {
  echo $message;
}


?>
<?php include("../includes/footer.php"); ?>



