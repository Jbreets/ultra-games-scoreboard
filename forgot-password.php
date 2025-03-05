<?php // test on ftp ?>

<?php include("includes/header.php"); ?>
<?php
echo $_GET['forgot_password'];
echo "<br>";
echo $_GET['email'];

?>
<div class="page">
  <h2 class="subhead">Forgot Your Password?</h2>
  <form class="form" method="post" action="functions/mail_test.php">
        <label for="email" class="label">Enter your username or email</label>
        <input type="text" name="email" value="" class="Tname" required>      
        <input class="submit" type="submit" value="SEND" name="submit">    
  </form>
</div>
<!-- need to add library to send email with xammp: https://www.codexworld.com/how-to-send-email-from-localhost-in-php/ -->

<?php include("includes/footer.php"); ?>

