<?php include("includes/header.php"); ?>
<?php include("includes/functions/code_authenticate.php"); ?>
<link rel="stylesheet" href="../resources/styles.css">                                                     
<?php

session_start();
if (isset($_SESSION['loggedin'])) {
    header('Location: /login.php');
    exit;
}
$email = $_GET['email'];
$code = $_GET['forgot_password'];
?>
<div>
  <h2 class="subhead">New Password</h2>
</div>

<form class="form" action="../functions/replace_pass.php/forgot_password=<?php echo $code ?>&email=<?php echo $email ?>" method="post">
  <section>
    <label for="newpass" class="label"></label>
    <br>
    <input class="Tname" type="text" name="newpass" value="">
  </section>
  <br>
  <section>
    <div>
      <label class="label" for="submit"></label >
      <input class="submit" type="submit" value="ENTER TEAM" name="submit">
      <input type="hidden" name="vall" value='<?php echo "$code" ?>'>
      <input type="hidden" name="val" value='<?php echo "$email" ?>'>
    </div>
  </section>
</form>

<?php include("includes/footer.php"); ?>
