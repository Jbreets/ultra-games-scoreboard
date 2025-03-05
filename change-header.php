<?php
include("functions/admin_authenticate.php");
include("includes/header.php");

require_once __DIR__ . "/functions/funcs.php";
$con = db_conn();

$message = '';

if (isset($_POST['submit'])) {
  if (!$con) {
    error_log("Error connection to database.");
    exit();
  }

  $header = mysqli_real_escape_string($con, $_POST['header']);

  $sql = "UPDATE `options` SET `header` = '$header' ";
  $result = mysqli_query($con, $sql);

  if(isset($_POST['submit']))
        {

  echo "<meta http-equiv='refresh' content='0'>";
  }

  if ($result) {
    $message = "Option updated";
  }
  echo $message;
  $conn = null;
}


?>
<div>
  <h2 class="subhead">Update Header</h2>
</div>
<form class="form" action="" method="post">
  <section>
    <label for="header" class="label">Insert header</label>
    <br>
    <input class="Tname" type="text" name="header" value="" align="center" required>
  </section>
  <br>
  <section>
    <div>
      <label class="label" for="submit"></label >
      <input class="submit" type="submit" value="ENTER TEAM" name="submit">
    </div>
  </section>


</form>





<?php include("includes/footer.php"); ?>
