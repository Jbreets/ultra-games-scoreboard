<?php 
include("includes/header.php");
include("functions/admin_authenticate.php");

require_once __DIR__ . "/functions/funcs.php";
$con = db_conn();

$message = '';

if (!$con) {
  error_log("Error connection to database.");
  exit();
}

if ( isset($_POST['drop_teams_submit']) ){

  $sql = "DELETE FROM teams";
  $result = mysqli_query($con, $sql);

  if ($result) {
    // echo a message to say the UPDATE succeeded
    echo '<h2 class="subhead">All teams have been removed from the database</h2>';
  }
  
}

if ( isset($_POST['drop_scores_submit']) ){

  $sql = "DELETE FROM scores";
  $result = mysqli_query($con, $sql);

  if ($result) {
    // echo a message to say the UPDATE succeeded
    echo '<h2 class="subhead"> Scores have been removed from the database</h2>';
  }

}

?>
<script src="resources/main.js"></script>
    <div>
      <h2 class="subhead">Clear tables</h2>
    </div>
    <div class="buttons" id="clear-tables" >
      <form class="btn" method="post" action="">
      <div>
        <input id="red" class="delete" type="submit" name="drop_teams_submit" value="Delete all teams" onclick="return confirmStep()">
      </div>
    </form>
    
      <form class="btn" method="post" action="">
      <div>
        <input id="white" class="delete" type="submit" name="drop_scores_submit" value="Delete all scores" onclick="return confirmStep()">
      </div>
    </form>
    </div>
<?php include("includes/footer.php"); ?>
