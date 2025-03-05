<?php include ("../includes/header.php");?>
<script>
//sends user to landing page
const url = "https://ugl.ultradev.co.uk/landing-page.php";
   window.location.replace(url);

</script>
<?php 
$userpass = $_GET['forgot_password'];
$usermail = $_GET['email'];

?>

<?php
//function that created a random password for the user
function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); 
}
$code = randompassword();
echo $code;



$email = $_POST['email'];

require_once __DIR__ . "/funcs.php";
$con = db_conn();

if ($con) {
  echo '<h2 class="subhead"> Connected successfully! </h2>';
} else {
  echo "DB not connected";
}
if (isset($_POST['submit'])) {


	$sql_u = "SELECT * FROM users WHERE email='$email'";
	$res_u = mysqli_query($con, $sql_u);

	if (mysqli_num_rows($res_u) < 1) {
	  $name_error = '<h3 class="subhead">Sorry... that email does not exist in our database.</h3>';
    echo $name_error;
    echo '<h3 class="subhead"><a href="../forgot-password.php">forgot password page</a></h3>';
}else{

  $sql = "UPDATE users SET forgot_pass ='$code' WHERE email = '$email'";

  if ($con->query($sql) === TRUE) {
  echo "";
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}
//need new email address for from in column below
//reference mysqli_get_links_stats
//http://localhost/scoreboard/forgot-password.php/?forgot_password=gh757fhfh&email=ashley@ultraevents.co.uk
// http://localhost/scoreboard/change-password.php/?change_password=$_GET['forgot_password']&email=$_GET['email']";
  $to_email = "$email";
  $subject = 'Testing PHP Mail';
  $message = "ugl.ultradev.co.uk/change-password.php/?forgot_password=$code&email=$email";
  $headers = 'From: jackbreeton@gmail.com';
  $headers .= "Reply-To: noreply @ company . com\r\n";
  $headers .= "Return-Path: noreply @ company . com\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
  $headers .= "X-Priority: 3\r\n";
  $headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;


    $query = mail($to_email,$subject,$message,$headers);

       echo '<h3 class="subhead">Check your email, we have sent you a code!</h3>';
       echo '<h3 class="subhead">To enter code on the next page <a href="https://ugl.ultradev.co.uk/enter-code.php">click here</a></h3>';


    exit();
	}
}
$conn = null;





 ?>

<?php include ("../includes/footer.php");?>
