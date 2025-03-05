<?php 
include("includes/header.php");
include("functions/form_authenticate.php");
require_once __DIR__ . "/functions/funcs.php";
$con = db_conn();

if (isset($_POST['submit'])) {

  if (!$con) {
    error_log("Error connection to database.");
    exit();
  }

  $team_name = mysqli_real_escape_string($con, $_POST['name']);
  $gym_name = mysqli_real_escape_string($con, $_POST['gym']);
  $category = $_POST['drop'];
  $date_created = date("Y-m-d H:i:s");
  $message = '';

  $sql_u = "SELECT * FROM teams WHERE team_name='$team_name'";
  $res_u = mysqli_query($con, $sql_u);

  if (mysqli_num_rows($res_u) > 0) {
    $message = '<h3 class="subhead">Sorry... username already taken. Please try another.</h3>';
  } else {
    $query = "INSERT INTO teams (team_name, gym_name, category, date_created)
        VALUES ('$team_name', '$gym_name', '$category', '$date_created')";
    $results = mysqli_query($con, $query);
    if($results) {
      $message = '<h3 class="subhead">Details have been saved!</h3>';
    } else {
      $message = '<h3 class="subhead">Something went wrong!</h3>';
    }
  }

  $con = null;

 }

?>

  <div class="page">
    <h2 class="subhead">Team Entry</h2>
    <p style="text-align: center;">Please fill out the form below to enter a team.</p>
  
    <form class="form" method="post" action="">
        <label class="label" for="name" id="label1">Team Name</label>
          <input class="Tname" type="text" value="" name="name" align="center" required>
        <div>
          <label class="label" for="gym">Gym Name</label>
          <input class="Tname" type="text" value="" name="gym" align="center" required>
        </div>
        <div>
          <label class="label" for="drop">Category</label>
          <select class="Tname" value="" name="drop" align="center" required>
            <option hidden value=""></option>
            <option value="Open(Mixed)">Open</option>
            <option value="Skillz(Mixed)">Skillz</option>
          </select>
        </div>
        <div>
          <label class="label" for="submit"></label >
          <input class="submit" type="submit" value="ENTER TEAM" name="submit">
        </div>

      <?php
      if ( isset($_POST['submit']) ){
        echo $message;
      }
      ?>

    </form>
  </div>
<?php include("includes/footer.php");
