<?php
include("includes/header.php");
include("functions/form_authenticate.php");

error_reporting(E_ALL);
$con = db_conn();
$message ='';

if (isset($_POST['submit'])) {

  if (!$con) {
    error_log("Error connection to database in check.php file.");
    exit();
  }
  //get the post records
  $team_name = $_POST['name'];
  // var_dump($team_name);

  // $team_name = mysqli_real_escape_string($con, $_POST['name']);
  //$team_name = addslashes($team_name);
  $wod = $_POST['wod'];
  $score =  $_POST['score'];
     
  
  $min = $_POST['min'];
  $sec = $_POST['sec'];  
  $mil = '00';
  $time = $mil . ':' . $min . ':' . $sec;

  // $sql_open = "SELECT * FROM scores WHERE team_name='$team_name' AND wod='$wod'";
  // $result_open = mysqli_query($con, $sql_open);

  // $sql_skillz = "SELECT * FROM scores_s WHERE team_name='$team_name' AND wod='$wod'";
  // var_dump($sql_skillz);
  // $result_skillz = mysqli_query($con, $sql_skillz);

  $open_stmt = $mysqli->prepare("SELECT * FROM scores WHERE team_name = ? AND wod = ? ");
  $open_stmt->bind_param("ss", $team_name, $wod); // "is" means that $id is bound as an integer and $label as a string
  $open_stmt->execute();
  $result_open = $open_stmt->get_result();
  $open_stmt->close();
 

  $skillz_stmt = $mysqli->prepare("SELECT * FROM scores_s WHERE team_name = ? AND wod = ? ");
  $skillz_stmt->bind_param("ss", $team_name, $wod); // "is" means that $id is bound as an integer and $label as a string
  $skillz_stmt->execute();
  $result_skillz = $skillz_stmt->get_result();
  $skillz_stmt->close();

  $key = 0;
  
  //checks to see if tname is in the team db
  if (in_array($team_name, team_name_array_return())) { 
    $key = array_search($team_name, team_name_array_return());
    $key++;
  }
  //pulls its category
  $cat = team_name_array_return();
  $cat_g = ($cat[$key]);
  $category = strtok($cat_g, '( ');
  $team_name = mysqli_real_escape_string($con, $_POST['name']);

  // makes it here

 //checks which category it is and changes accordingly
 if($category == "Skillz") {

    //these do not need to be repeated but its fine for now
    if(mysqli_num_rows($result_skillz) > 0) {
      if ( $score != '' ) {
        # code...
         $sql_i = "UPDATE `scores_s` SET score = '$score' WHERE team_name='$team_name' AND wod='$wod' ";
      } else {
         $sql_i = "UPDATE `scores_s` SET _Time = '$time' WHERE team_name='$team_name' AND wod='$wod' ";
      }
    //$update = mysqli_query($con, $sql_u);
    } else {
     if ( $score != '' ) {
        $sql_i = "INSERT INTO `scores_s` (`team_name`, `wod`, `score`) VALUES ('$team_name', '$wod', '$score')";
     } else {
        $sql_i = "INSERT INTO `scores_s` (`team_name`, `wod`, `_Time`) VALUES ('$team_name', '$wod', '$time')";
     }  
  }

} elseif ($category == "Open") {
  if(mysqli_num_rows($result_open) > 0) {
    if ( $score != '' ) {
      # code...
       $sql_i = "UPDATE `scores` SET score = '$score' WHERE team_name='$team_name' AND wod='$wod' ";
    } else {
       $sql_i = "UPDATE `scores` SET _Time = '$time' WHERE team_name='$team_name' AND wod='$wod' ";
    }
  //$update = mysqli_query($con, $sql_u);
  } else {
   if ( $score != '' ) {
      $sql_i = "INSERT INTO `scores` (`team_name`, `wod`, `score`) VALUES ('$team_name', '$wod', '$score')";
   } else {
      $sql_i = "INSERT INTO `scores` (`team_name`, `wod`, `_Time`) VALUES ('$team_name', '$wod', '$time')";
   }

  } 
}
$insert = mysqli_query($con, $sql_i);
if ($insert ) {
  $message = '<h2 class="subhead">Score has been set</h2>';
} else {
  $message = '<h2 class="subhead">Something has gone wrong</h2>';
}
}
//only issue, if both set, will only add in the score ^^
   
if ($category === "Open") {

  $open_check_sql = "SELECT * FROM scores WHERE wod='$wod'";
  $result_open_check = mysqli_query($con, $open_check_sql);

  foreach ($result_open_check as $key => $value) {
    update_wod_pos_open($wod, 'scores');
  }
  
} elseif ($category === "Skillz") {

  $skillz_check_sql = "SELECT * FROM scores_s WHERE wod='$wod'";
  $result_skillz_check = mysqli_query($con, $skillz_check_sql);

  foreach ($result_skillz_check as $key => $value) {
    update_wod_pos_open($wod, 'scores_s');
  }
  
}

$con = null;

?>
<script src="resources/main.js"></script>

<div class="page">
    <h2 class="subhead">Enter Score</h2>
    <form class="form" method="post" action="">
    
    <div>
      <label class="label" for="name">Team:</label>
      <select class="Tname" value="" name="name" required>
        <option hidden value=""><?php team_name_display();  ?></option>
      </select>
    </div>
  
    <div>
      <label class="label" for="wod">WOD:</label>
      <select class="Tname" onchange="wod_score_type(this)" value="" name="wod" required>
        <option hidden value=""></option>
        <option value="1">WOD 1A</option>
        <option value="2">WOD 1B</option>
        <option value="3">WOD 2</option>
        <option value="4">WOD 3</option>
        <option value="5">WOD 4</option>
        <option value="6">WOD 5</option>
        <option value="7">WOD 6</option>
      </select>
    </div>

  <!-- <div class="form_row">
    <div class="form_column">
      <label class="label" for="ScoreR"  >Reps:</label>
      <input id="yesCheck" onclick="yesnoCheck();" type="radio" name="scoring">
    </div>
    <div class="form_column">
      <label class="label" for="TimeR" >Time:</label>
      <input id="noCheck" onclick="yesnoCheck();" type="radio" name="scoring">
    </div>
  </div> -->

    <div class="_hide" id="score_reps">
      <label class="label" for="score">Reps:</label>
      <input type="number" class="Tname" name="score" min="0" max="9999">
    </div>

    <div class="form_row _hide" id="score_time">
      
      <div class="form_column">
        <label class="label" for="min">Minuites:</label>
        <input class="time" type="number"  name="min" min="0" max="999">
      </div>
      <div class="form_column">
        <label class="label" for="sec">Seconds:</label>
        <input class="time" type="number" name="sec" min="0" max="59">
      </div>

    </div>

    <div>
      <label class="label" for="submit"></label >
      <input class="submit" type="submit" name="submit" value="ENTER SCORE">
    </div>

  
</form>
<div class="message_output">
    <?php
      if ( isset($_POST['submit']) ){
        echo $message;
      }
      ?>
  </div>  
</div>
<?php include("includes/footer.php"); ?>



	

