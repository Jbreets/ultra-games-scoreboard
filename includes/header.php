<?php 
//require_once __DIR__ . "/../functions/config.php";
require_once __DIR__ . "/../functions/funcs.php"; 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="stylesheet" href="resources/styles.css">
  <?php if (isset($_SESSION['loggedin'])) { ?>
    <!--add in html to ensure that this works properly-->
  <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0"/>
  <title>The Ultra Games - Scores</title>
  <meta name="description" content="The Ultra Games leaderboard to track the teams progress through the games.">
  <link rel="icon" type="image/png" href="resources/favicon.png" sizes="16x16">
  <link rel="icon" type="image/png" href="resources/favicon.png" sizes="32x32">
  <link rel="icon" type="image/png" href="resources/favicon.png" sizes="96x96">
  <?php } else { ?>
  <link rel="icon" type="image/png" href="resources/favicon.png" sizes="16x16">
  <link rel="icon" type="image/png" href="resources/favicon.png" sizes="32x32">
  <link rel="icon" type="image/png" href="resources/favicon.png" sizes="96x96">
  <!-- <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" /> -->
  <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0"/>
  <?php } ?>
</head>
  <body>
    <div id="app_container">
      <header>
        <div class="head">
          <a href="/">
            <img class="ultra" src="resources/Assets/ultra-games.svg">
          </a>
          <a class="scoreboard" style="text-decoration: none;" href="">
            <!-- <h1><?php echo display_header(); ?></h1> -->       
          </a>
          <button class="nav-drop" onclick="drop()">
            <img class="icon" src="resources/menu-burger.svg" alt="">  
          </button>
          <div class="menu-drops" id="menuItems">
            <?php
            if (isset($_SESSION['loggedin'])) { ?>
              <!-- <a href="./loggedin.php"> -->
                <!-- <h4>Account</h4> -->
              <!-- </a> -->
              <a href="./team-score.php">Team score</a>
              <a href="./team-entry.php">Team entry form</a>
              <a href="./update-teams.php">Edit teams</a>
              <a href="./change-header.php">Change header</a>
              <a href="./reset-tables.php">Clear scores</a>
              <a href="./logout.php">Log out</a>
              <?php
              } elseif (isset($_SESSION['loggedin-staff'])) { ?>
                <a href="./team-score.php">Team score</a>
                <a href="./team-entry.php">Team entry form</a>
                <a href="./update-teams.php">Edit teams</a>
                <a href="./logout.php">Log out</a>
                <?php
              } else { ?>
                <a href="./login.php">Login</a>
             <?php }
                ?>
          </div>
        </div>

        <script>
          /* When the user clicks on the button, 
          toggle between hiding and showing the dropdown content */
          function drop() {
            let menu = document.getElementById("menuItems");          
            menu.classList.toggle("_show");
          }
        </script>
      </header>