<?php include("includes/header.php"); ?>
<?php
session_start();
if (!isset($_SESSION['loggedin']) && !isset($_SESSION['loggedin-staff'])) {
    header('Location: login.php');
    exit;
}

 ?>

<div class="page">
    <h1 class="login">Login Successful</h1>
    <p style="color: #fff;">Select a page from the dropdown or click on the games logo to go back to the leaderboard</p>
</div>

<?php include("includes/footer.php"); ?>