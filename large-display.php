<?php 
//require_once __DIR__ . "/../functions/config.php";
require_once __DIR__ . "/functions/funcs.php"; 
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

      <header>
        <div class="head" style="max-width: none; justify-content: center; -webkit-box-align: center;">
          <a href="/">
            <img class="ultra" src="resources/Assets/ultra-games.svg">
          </a>
          <a class="scoreboard" style="text-decoration: none;" href="">
            <!-- <h1><?php echo display_header(); ?></h1> -->       
          </a>
        </div>


      </header>
      <!-- top text on page -->
      <div class="lg-wod-type">
          <h2 class="lg-txt">Test Information</h2>
      </div>

      <div id="lg-overall" class="lg-ldb-box" >
            <div  id="overall-table-container" style="box-shadow: 0px 0px 15px 4px black;"class="overall_grid table_container">
                <h3 style="visibility: hidden"></h3>
                <h4 class="skillztext"></h4>
                <h4 class="skillz-data" style="text-align: center; border-style: none;">TOTAL</h4>

                <?php test_overall("skillz", 0, 12); ?>
                <!-- can nest the other functions eg open and current wod within mult divs -->
            </div>
     </div> 
          <div id="lg-current" class="lg-ldb-box" style="display: none; opacity:  0.01;">
             <div id="current_wods" class="new-grid table_container" style="    box-shadow: 0px 0px 15px 4px black;" >
                <h3 style=""></h3>
                <h4 class="opentext" id="current_open_wod_display">WOD <?php echo $current_open_wod_output; ?></h4>
                <h4 class="open-data" style="text-align: center; border-style: none;">REPS/<br>TIME</h4>
                <h4 class="open-data" style="text-align: center; border-style: none;">POINTS</h4>
                <?php get_wod_scores(current_wod()); ?>
            </div>
        </div>  
     </div>           
    <script src="resources/main.js">
      
    </script>
         
          
