<?php

function db_conn() {
   // live connection
   
 // xampp connection (ubuntu)
       $db_host = 'localhost';
       $db_user = 'jack';
       $db_password = '';
       $db_name = 'ug_leaderboard'; 

      $con = mysqli_connect($db_host, $db_user, $db_password, $db_name);

      return $con;


}

if (!function_exists('str_contains')) {
  function str_contains(string $haystack, string $needle): bool
  {
      return '' === $needle || false !== strpos($haystack, $needle);
  }
}

//function that displays the team name to the front end
function team_name_display() {
  $con=db_conn();

  $sql = "SELECT * FROM teams ORDER BY team_name ASC";
  $result = mysqli_query($con, $sql);

  $team_display = mysqli_fetch_all($result, MYSQLI_ASSOC);

  echo '<optgroup label="Open(Mixed)">';
   foreach ($team_display as $k => $v) {
      if ( str_contains($v['category'], 'Open') ) {        
        echo '<option value="' . $v['team_name'] . '">' . $v['team_name'] . '</option>';        
      }     
   }
   echo '</optgroup>';
   echo '<optgroup label="Skillz(Mixed)">';
   foreach ($team_display as $k => $v) {
      if ( str_contains($v['category'], 'Skillz') ) {        
        echo '<option value="' . $v['team_name'] . '">' . $v['team_name'] . '</option>';        
      }     
   }
   echo '</optgroup>';
   $con = null;
}

function gym_name_display($team_name) {
  $con=db_conn();
  $sql = "SELECT * FROM teams WHERE team_name = '$team_name'";
  $result = mysqli_query($con, $sql);
  $gym_display = mysqli_fetch_all($result, MYSQLI_ASSOC);
  $gym = $gym_display[0]['gym_name'];

  echo ($gym);
}


function category_display($team_name) {
  $con=db_conn();
  $sql = "SELECT * FROM teams WHERE team_name = '$team_name'";
  $result = mysqli_query($con, $sql);
  $cat_display = mysqli_fetch_all($result, MYSQLI_ASSOC);
  $category = $cat_display[0]['category'];

  echo ($category);
}




function team_name_array_return() {
  $con=db_conn();

  $sql = "SELECT team_name, category FROM teams";
  $result = mysqli_query($con, $sql);
  $cat_display = mysqli_fetch_all($result, MYSQLI_ASSOC);

  $tname_array = [];

  foreach ($cat_display as $key => $v) {
    array_push($tname_array, $v['team_name']);
    array_push($tname_array, $v['category']);
  }

  return $tname_array;
  $con = null;
}



//function that takes a value from form and places that as the header
function display_header() {
  
  $con = db_conn();

  if (!$con) {
    error_log("Error connection to database.");
    exit();
  }

  $sql = "SELECT `header` FROM `options` LIMIT 1 ";
  $result = mysqli_query($con, $sql);


  $header = mysqli_fetch_row($result);

  
  
  return $header[0];
  $conn = null;
}

function pull_best_score_by_name($team_name) {
  $db = db_conn();
  $sql = "SELECT * FROM `best_positions` WHERE team_name = '$team_name'";
  $result = mysqli_query($db, $sql);
  $best_score = mysqli_fetch_all($result, MYSQLI_ASSOC);


  // var_dump($best_score);
  //if($best_score = empty ) {
  //  echo "yes";
  //}
  foreach ($best_score as $pos) {
    $position = $pos['best_pos'];

  

    
  }


  return $position;
}



// function start
function insert_best_pos($skillz_or_open) {
  $key = 0;
  $positions = [];

  $con = db_conn();
  if ($skillz_or_open == 'open') {
    $database = 'scores';
    //echo"no";
  } elseif ($skillz_or_open == 'skillz') {
    $database = 'scores_s';
    //echo"yes";
  }

  // pull db information and insert into new db
  $sql = "SELECT * FROM `$database` ORDER BY pos ASC" ;
  $result = mysqli_query($con, $sql);
  $scores = mysqli_fetch_all($result, MYSQLI_ASSOC);
  // print_r($scores);

  foreach ($scores as $score ) {
    $team_name = $score['team_name'];
    $pos = $score['pos'];
    $pos = intval($pos);

    //var_dump($team_name);
    //var_dump($pos);


    $current_top_score = pull_best_score_by_name($team_name);

    var_dump($current_top_score);

    if (empty($current_top_score)) {
      $sql_i = "INSERT INTO best_positions (`team_name`, `category`, `best_pos`) VALUES('$team_name', '$skillz_or_open', '$pos')";
    } elseif ($current_top_score > $pos) {
      $sql_i = "UPDATE best_positions SET best_pos = '$pos' WHERE team_name = '$team_name'";
    } elseif ($current_top_score < $pos) {
      $sql_i = "UPDATE best_positions SET best_pos = '$pos' WHERE team_name = '$team_name'";
    }



    $insert = mysqli_query($con, $sql_i);
    if ($insert ) {
      $message = '<h2 class="subhead">Score has been set</h2>';
    } else {
      $message = '<h2 class="subhead">Something has gone wrong</h2>';
    }
    $sql_i = NULL;
  }
  

}
//end of function

//start of funciton
function check_best_pos($team_name) {
  $con = db_conn();
  $sql = "SELECT * FROM best_positions WHERE team_name = '$team_name'";
  $result = mysqli_query($con, $sql);
  $pos = mysqli_fetch_all($result, MYSQLI_ASSOC);
  
  foreach ($pos as $position ) {
    return $position['best_pos'];
  }
}


// insert_best_pos('open');


//MYSQLI PREPARED STATEMENT

$mysqli = new mysqli('vps196.opalstack.com', 'ug_lb_user', 'CE0s07EEAfpLm2IB', 'ug_leaderboard' );
if ($mysqli->connect_error) {
    exit('Could not connect');
}

$sql = "SELECT gym_name FROM teams WHERE team_name = ?"; 



$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();

$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    echo $row['gym_name'];
    
}

$sql = "SELECT category FROM teams WHERE team_name = ?"; 

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['i']);
$stmt->execute();

$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    echo $row['category'];
    
}

$sql = "SELECT team_name FROM teams WHERE team_name = ?"; 

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['t']);
$stmt->execute();

$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    echo $row['team_name'];
    
}

function grab_lowest_scores($array, $open_skillz) {
  $num = 0;
  $lowest = [];
  $con = db_conn();
  if ($open_skillz == 'open') {
    $open_skillz = 'scores';
  } elseif ($open_skillz == 'skillz') {
    $open_skillz = 'scores_s';
  }

  
  foreach ($array as $key ) {
    $sql = "SELECT * FROM `$open_skillz` WHERE team_name = '$key'";    
    $result = mysqli_query($con, $sql);
    $scores = mysqli_fetch_all($result, MYSQLI_ASSOC); 

    foreach ($scores as $s) {
      
      if ($num == 0) {
        $num = $s['pos'];
      } elseif ($num > $s['pos']) {
        $num = $s['pos'];
      }
      // var_dump($num);
      // move array
      $lowest[$s['team_name']] = $num;
    }
    $num = 0;
  }
  return($lowest);
}

function order_by_score($array) {
  var_dump($array);

  asort($array);

  foreach ($array as $key => $value) {
    $new_array[$key] = $value;
  }
  return($new_array);
  


 
}
// find proper sorting method for given array 



///////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////Open Functions////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////








//function that checks what the wod is with most recent data in
function current_wod() {
  //require_once __DIR__ . "/config.php";
  $con = db_conn();

  $sql = "SELECT * FROM `scores` ORDER BY wod DESC LIMIT 1";
  $result = mysqli_query($con, $sql);
  $current_wod = $result->fetch_array(MYSQLI_ASSOC);

  $current_wod = intval($current_wod['wod']);

  return $current_wod;
}

function get_last_score_position($team_name, $category) {
  $con = db_conn();
}

// update the pos column in teams table.
function update_wod_pos_open($wod_number, $category) {

  // echo "RUNNING<br><br>";

  // $category is 'scores' for open or 'scores_s' for skillz

  $con = db_conn();

  $st = score_or_time($wod_number, $category);

  if ($st == "score") {
    $sql = "SELECT * FROM $category WHERE wod={$wod_number} ORDER BY score DESC";
  } else {
    $sql = "SELECT * FROM $category WHERE wod={$wod_number} ORDER BY _Time ASC";
  }

  $result = mysqli_query($con, $sql);
  $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

  // sort the array based on score/time
  // if ($st == "score") {
  //   usort($rows, function($a, $b) {
  //     return $b['score'] <=> $a['score'];
  //   });    
  // } else {
  //   usort($rows, function($a, $b) {
  //     return $a['_Time'] <=> $b['_Time'];
  //   });    
  // }

  // echo "<pre>";
  // print_r($rows);
  // echo "</pre>";
 
  // set default position order
  $pos = 1;

  $duplicate_checker = [];


  // loop through scores table
  foreach ($rows as $k => $v) {

    if ( count($rows) > 1){

      if ($st == "score") {
         // get the score for the current row
        $this_score = $v['score'];
        $duplicate_found = array_search($this_score, $duplicate_checker);
        if ($duplicate_found || $duplicate_found === 0){
          $pos = $rows[$duplicate_found]['pos'];
        } else {
          // array_push($duplicate_checker, $this_score);
          $duplicate_checker[$k] = $this_score;
          $pos = $k+1;
        }       
        

      } else {
         // get the score for the current row
        $this_score = $v['_Time'];
        $duplicate_found = array_search($this_score, $duplicate_checker);
        if ($duplicate_found || $duplicate_found === 0){
          $pos = $rows[$duplicate_found]['pos'];
        } else {
          // array_push($duplicate_checker, $this_score);
          $duplicate_checker[$k] = $this_score;
          $pos = $k+1;
        }
          
      }
  
    }  

    // echo "<pre>";
    // var_dump($pos);
    // echo "</pre>";
    
    $team_name = mysqli_real_escape_string($con, $v['team_name']);
    // echo "Team Name: " . $v['team_name'] . " POS: " . $pos . "<br>";
    // update db
    $sql_i = "UPDATE $category SET pos = $pos WHERE wod={$wod_number} AND team_name = '$team_name' ";
    
    $insert = mysqli_query($con, $sql_i);

    // increment the position value
    $pos++;

  } // end loop
  // echo "END RUN<br><br>";

  $con = null;
}


//function that gets the wod scores from the db
function get_wod_scores($wod_number) {
  
  
  $con = db_conn();

    $st = score_or_time($wod_number, 'scores');

    if ($st == "score") {
      $sql = "SELECT * FROM scores WHERE wod={$wod_number} ORDER BY score DESC";
    } else {
      $sql = "SELECT * FROM scores WHERE wod={$wod_number} ORDER BY _Time ASC";
    }

    
    $result = mysqli_query($con, $sql);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $n = 1;

    
    foreach ($rows as $k => $v) {
      if ($st == "score") {
        $count = $v[$st];
      } else {
        $count = substr($v[$st], 3);
      }

      //code...
      echo "<div class='data-black'><h6 class='open-data'>" . $n . "</h6></div>
      <div class='data-black'><h6 class='open-data' id='names'>" . $v['team_name'] . "</h6></div>
      <div class='data-black'><h6 class='open-data' id='total-o'>" . $count . "</h6></div>
      <div class='data-black'><h6 class='open-data' id='total-o'>" . $v['pos'] . "</h6></div>";

      // $sql_i = "UPDATE `scores` SET pos = '$n' WHERE wod={$wod_number} AND team_name = '$v[team_name]' ";
      // $insert = mysqli_query($con, $sql_i);

      $n++;
      
    }

    if(!$rows) {
      echo "<div class='no_wod_score'>WOD NOT STARTED</div>";
    }

  $con = null;
  //function end
}

//finds dupe
function get_duplicates ($array) {
  return array_unique( array_diff_assoc( $array, array_unique( $array ) ) );
}


function sort_teams() {
  $con = db_conn();
  // var_dump($names_array);  

  $names = ['BST', 'Almost there'];
  

  $condition = implode(', ', $names);
  // var_dump ($condition);
  

  $sql = "SELECT team_name, pos FROM `scores` WHERE team_name IN $condition ORDER BY pos ASC" ;
  $res_u = mysqli_query($con, $sql);
  $rows = mysqli_fetch_all($res_u, MYSQLI_ASSOC);
  
  // var_dump($res_u);

  // SELECT * FROM `scores` WHERE team_name IN ("BST", "Almost there");


  //return $new_order;
}

sort_teams();




//function that makes an ordering system for the scores first being highest score
// function has 3 main parts
// driving me mad
function overall_scores() {
//beginning
// SQL statement and first loop of embedded array
    
  $scores = [];
  $key = 0;
  $key2 = 0;
  $t_names = [];
  $con = db_conn();
  $sql_u = "SELECT *, SUM(pos) FROM `scores` GROUP BY team_name ORDER BY SUM(pos) ASC";
  $res_u = mysqli_query($con, $sql_u);
  $rows = mysqli_fetch_all($res_u, MYSQLI_ASSOC);
  
  foreach ($rows as $r ) {
  
    // var_dump($rows[$key]);
    // var_dump($rows[$key]['SUM(pos)']);
    $teams = $rows[$key]["team_name"];
    
    
    //see what positions are the same
    array_push($scores, $rows[$key]['SUM(pos)']); 
    $key++;
  }
/*
  $dupes = get_duplicates($scores);
  echo"<br>";
  // var_dump($dupes);
  foreach ($dupes as $val ) {
    // find number of ocurrences
    $x = array_count_values($scores);
    $times = $x[$val];
    
    // find the index of first occurence 
    $index1 = array_search($val, $scores);
    // var_dump($index1);
    // find the team names
    // new loop required
     
    while ($key2 < $times) {
      $name = ($rows[$times + $key2]["team_name"]);
      $key2++;
      array_push($t_names, $name);
    }
    // var_dump($t_names);
    $nums = grab_lowest_scores($t_names, 'open');
    
    $order = order_by_score($nums);

    // New method
    // add to the assocaitvie arrays a new section wich would be there 'lowest' score
    // then sort the array where the sum of positions are the same 

    */





  //}






  $n = 1;


// prints the basic overall score
  foreach ($rows as $k => $v) {
    echo "<div class='data-black'><h6 class='open-data'>"
     . $n  . "</h6></div>
          <div class='data-black'><h6 class='open-data' id='names'>"
     . $v['team_name'] . "</h6></div>
          <div class='data-black'><h6 class='open-data' id='total-o'>"
     . $v['SUM(pos)'] . "</h6></div>";
          $n++;
  }
  $con = null;
  //end 
}
  //  overall_scores();

// determines and RETURNS wether an entry has a score or time value in the open db
//used for logic
function score_or_time($wodnum, $category) {
  $con = db_conn();

  $sql = "SELECT * FROM $category WHERE wod={$wodnum}";
  $res_u = mysqli_query($con, $sql);
  $result = mysqli_fetch_all($res_u, MYSQLI_ASSOC);
  foreach ($result as $arr ) {
    if ($arr['score'] == NULL) {
      return '_Time';
    } else {
      return 'score';
    }
  }
}
// determines and ECHOES wether an entry has a score or time value in the open db
// used for logical automatic display for tables 
function score_or_time_e($wodnum) {
  $con = db_conn();

  $sql = "SELECT * FROM `scores` WHERE wod={$wodnum}";
  $res_u = mysqli_query($con, $sql);
  $result = mysqli_fetch_all($res_u, MYSQLI_ASSOC);
  foreach ($result as $arr ) {
    if ($arr['score'] == NULL) {
      echo 'TIME';
    } else {
      echo 'REPS';
    }
    return;
  }
}

//potential function to check database and then return the numbers 1 through to x that will then print the necessary wod information,
 //the print all functions probably wont be necessary due to the layout of the leaderboard
 function print_all_wods() {
   $con = db_conn();
   $sql = "SELECT wod FROM `scores` ORDER BY wod DESC LIMIT 1";
   $res_u = mysqli_query($con, $sql);
   $result = mysqli_fetch_all($res_u, MYSQLI_ASSOC);
   
   //$latestwod = intval($result[0]['wod']);
   $latestwod = 7;
   $num = 1;

  while ($num <= $latestwod) {
  
  echo"<div id='open' class='new-grid-skill table_container_wod _hide' data-wod-number='" . $num . "'>";
    echo"<h5 class='opentext' ></h3>";
    echo"<h4 class='opentext' style></h4>";
    echo"<h4 class='open-data' style='text-align: center;'>";
    print_r (score_or_time_e($num));
    echo"</h4>";
    echo "<h4 class='open-data'>POINTS</h4>";
    print_r(get_wod_scores($num));    
  echo"</div>"; 

    $num ++;
  }
  
 }




















////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////// SKILLZ FUNCTIONS
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////

// returns the overall scores from the skillz database
function overall_scores_skillz() {
  $con = db_conn();

  $sql_u = "SELECT *, SUM(pos) FROM `scores_s` GROUP BY team_name ORDER BY SUM(pos) ASC";
  $res_u = mysqli_query($con, $sql_u);

  $rows = mysqli_fetch_all($res_u, MYSQLI_ASSOC);

  //echo "<pre>";
  //var_dump($rows);
  //echo "<pre>";

  $n = 1;

  foreach ($rows as $k => $v) {


    echo "<div class='data-black'><h6 class='skillz-data'>" . $n  . "</h6></div>
          <div class='data-black'><h6 class='skillz-data' id='names'>" . $v['team_name'] . "</h6></div>
          <div class='data-black'><h6 class='skillz-data' id='total-s'>"
     . $v['SUM(pos)'] . "</h6></div>";
          $n++;
  }
  $con = null;
  
}



// returns the current wod from the skillz database
function current_wod_skillz() {
  $con = db_conn();

  $sql = "SELECT * FROM `scores_s` ORDER BY wod DESC LIMIT 1";
  $result = mysqli_query($con, $sql);
  $current_wod = $result->fetch_array(MYSQLI_ASSOC);

  $current_wod = intval($current_wod['wod']);

  return $current_wod;
}



// gathers all wod scores based on the wod number given as the parameter from the skillz database
function get_wod_scores_skillz($wod_number) {
  
  
  $con = db_conn();

    $st = score_or_time_skillz($wod_number, 'scores_s');

    if ($st == "score") {
      $sql = "SELECT * FROM scores_s WHERE wod={$wod_number} ORDER BY score DESC";
    } else {
      $sql = "SELECT * FROM scores_s WHERE wod={$wod_number} ORDER BY _Time ASC";
    }

    
    $result = mysqli_query($con, $sql);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $n = 1;
    







    foreach ($rows as $k => $v) {
      if ($st == "score") {
        $count = $v[$st];
      } else {
        $count = substr($v[$st], 3);
      }

      //code...
      echo "<div class='data-black'><h6 class='skillz-data'>" . $n . "</h6></div>
      <div class='data-black'><h6 class='skillz-data' id='names'>" . $v['team_name'] . "</h6></div>
      <div class='data-black'><h6 class='skillz-data' id='total-s'>" . $count . "</h6></div>
      <div class='data-black'><h6 class='skillz-data' id='total-s'>" . $v['pos'] . "</h6></div>";
      // $sql_i = "UPDATE `scores_s` SET pos = '$n' WHERE wod={$wod_number} AND team_name = '$v[team_name]' ";
      // $insert = mysqli_query($con, $sql_i);
      $n++;
      
    }

    if(!$rows) {
      echo "<div class='no_wod_score'>WOD NOT STARTED</div>";
    }


  $con = null;
}

// determines and RETURNS wether an entry has a score or time value in the open db
//used for logic
function score_or_time_skillz($wodnum) {
  $con = db_conn();

  $sql = "SELECT * FROM `scores_s` WHERE wod={$wodnum}";
  $res_u = mysqli_query($con, $sql);
  $result = mysqli_fetch_all($res_u, MYSQLI_ASSOC);
  foreach ($result as $arr ) {
    if ($arr['score'] == NULL) {
      return '_Time';
    } else {
      return 'score';
    }
  }
}

// determines and ECHOES wether an entry has a score or time value in the open db
// used for logical automatic display for tables 
function score_or_time_skillz_e($wodnum) {
  $con = db_conn();

  $sql = "SELECT * FROM `scores_s` WHERE wod={$wodnum}";
  $res_u = mysqli_query($con, $sql);
  $result = mysqli_fetch_all($res_u, MYSQLI_ASSOC);
  foreach ($result as $arr ) {
    if ($arr['score'] == NULL) {
      echo 'TIME';
    } else {
      echo 'REPS';
    }
    return;
  }
}

//Prints all wods that are available
//the print all functions probably wont be necessary due to the layout of the leaderboard
function print_all_wods_skillz() {
  $con = db_conn();
  $sql = "SELECT wod FROM `scores_s` ORDER BY wod DESC LIMIT 1";
  $res_u = mysqli_query($con, $sql);
  $result = mysqli_fetch_all($res_u, MYSQLI_ASSOC);
  
  //$latestwod = intval($result[0]['wod']);
  //try set to display none if no data is there
  $latestwod = 7;
  $num = 1;

 while ($num <= $latestwod) {
 
  echo"<div id='skillz' class='new-grid-skill table_container_wod _hide' data-wod-number='" . $num . "'>";
    echo"<h5 class='skillztext' ></h3>";
    echo"<h4 class='skillztext' style></h4>";
    echo"<h4 class='skillz-data' style='text-align: center;'>";
    print_r (score_or_time_skillz_e($num));
    echo"</h4>";
    echo "<h4 class='skillz-data'>POINTS</h4>";
    print_r(get_wod_scores_skillz($num));
  echo"</div>"; 

   $num ++;
 }
}
// funciton that takes event type two numbers so a specific amount of names can be show
function test_overall($event_type, $num_shown, $num_to_show) {

  if ($event_type == "skillz") {
    $event_type = "scores_s";
  } elseif($event_type == "open") {
    $event_type = "scores";
  }

  $con = db_conn();

  $sql_u = "SELECT *, SUM(pos) FROM `$event_type` GROUP BY team_name ORDER BY SUM(pos) ASC";
  $res_u = mysqli_query($con, $sql_u);

  $rows = mysqli_fetch_all($res_u, MYSQLI_ASSOC);



  $n = $num_shown;
  if ($n < 1) {
    $n = 1;
  } elseif ($n > 0) {
    $num_shown = $num_shown - 1; 
  }

  foreach ($rows as $k => $v) {


 
    while ($num_shown < $num_to_show) {

      echo "<div class='data-black'><h6 class='skillz-data'>" . $n  . "</h6></div>
      <div class='data-black'><h6 class='skillz-data' id='names'>" . $rows[$num_shown]['team_name'] . "</h6></div>
      <div class='data-black'><h6 class='skillz-data' id='total-s'>"
     . $rows[$num_shown]['SUM(pos)'] . "</h6></div>";
      $n++;

      $num_shown++;
    }
    // add js to automatically change the data values for the function 

  }
  $con = null;
   

}
// test_overall("skillz", 11, 20);
