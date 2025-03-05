<?php 
include("includes/header.php"); 
include("functions/form_authenticate.php"); 
require_once __DIR__ . "/functions/funcs.php";

$con = db_conn();


if ( isset($_POST['submit']) ){

  if (!$con) {
    error_log("Error connection to database.");
    exit();
  }

  $old_team_name = mysqli_real_escape_string($con, $_POST['oldname']);
  $team_name = mysqli_real_escape_string($con, $_POST['name']);
  $gym_name = mysqli_real_escape_string($con, $_POST['gym']);
  $category = $_POST['drop'];
  $date_created = date("Y-m-d H:i:s");

  $message = '';

  $sql = "UPDATE teams SET team_name='$team_name', gym_name='$gym_name', category='$category' WHERE team_name='$old_team_name'";
  $result = mysqli_query($con, $sql);

  if ($result){
    $message = '<h2 class="subhead"> Team Name has been changed</h2>';
  }

  $sql_scores_update = "UPDATE scores SET team_name='$team_name' WHERE team_name='$old_team_name'";
  $result_scores_update = mysqli_query($con, $sql_scores_update);

  if ($result_scores_update) {
      // echo a message to say the UPDATE succeeded
      $message .= '<h2 class="subhead">Database records altered</h2>';
  }

  $con = null;
}
?>
<div class="page">
   <h2 class="subhead" id="test">Edit Team</h2>

  <form class="form" action="" method="post">
    <label for="oldname">Select Team</label>
    <select class="Tname" value="" name="oldname" onchange="gymInfo(this.value); cateInfo(this.value); nameInfo(this.value);" required>
      <option hidden value=""><?php team_name_display();  ?></option>
    </select>

    <label for="name" class="label">New Team Name</label>

    <input id="name" class="Tname" type="text" name="name" value="" required>

    <label for="gym" class="label">Gym</label>

    <input id="gym" class="Tname" type="text" name="gym" value="" required>

    <label class="label" for="drop">Category</label>

    <select id="category" class="Tname" value="" name="drop" required>
      <option hidden value=""></option>
      <option value="Open(Mixed)">Open(Mixed)</option>
      <option value="Skillz(Mixed)">Skillz(Mixed)</option>
    </select>

    <label class="label" for="submit"></label >
    <input class="submit" type="submit" name="submit" value="ENTER TEAM">
    <?php
      if (isset($_POST['submit'])){
        echo $message;
      }
    ?>
  </form>

 </div>

 <script>
//declare function to return info   
// figure out how to condense this and the funciton on funcs.php regarding this
function gymInfo(str) {
  
  if (str == "") {
    document.getElementById("gym").innerHTML = "";
    return;
  }
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("gym").value = this.responseText;
  }
  xhttp.open("GET", "functions/funcs.php?q="+str);
  xhttp.send();
  
}

function cateInfo(str) {
  console.log(str);
  if (str == "") {
    document.getElementById("category").innerHTML = "";
    return;
  }
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("category").value = this.responseText;
  }
  xhttp.open("GET", "functions/funcs.php?i="+str);
  xhttp.send();
  
}



function nameInfo(str) {
  console.log(str);
  if (str == "") {
    document.getElementById("name").innerHTML = "";
    return;
  }
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("name").value = this.responseText;
  }
  xhttp.open("GET", "functions/funcs.php?t="+str);
  xhttp.send();
  
}





</script>



<?php include("includes/footer.php") ?>

