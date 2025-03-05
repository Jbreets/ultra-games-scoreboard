<?php
require_once __DIR__ . "/includes/header.php";
session_start();
?>
<?php if(!isset($_SESSION['loggedin'])) {
  echo "Not logged in";
}else{
  echo "logged in";
} ?>
<script>
// const url = "http://ugl.ultradev.co.uk/box.php";
if (window.screen.width < 450 && window.location.href != url) {
   window.location.replace(url);
}


</script>
<div class="space">

  </div>
      <div class="large-flex">
        <div class="grid-box-mbl" id="red">
          <div class="ldb">
            <h3>Overall Leaderboard</h3>
          </div>
          <div class="data">
            <h3>Team</h3>
          </div>
        <div class="data">
          <h3>Position</h3>
        </div>
          <div class="data">
          <h3>Total Points</h3>
        </div>
        <?php overall_scores(); ?>
        </div>

      <div class="grid-box-mbl">
          <div class="ldb">
          <h3>Current Wod </h3>
        </div>
        <div class="team">
          <h3 class="team">Team</h6>
         </div>
        <div class="pos">
          <h3 class="pos">WOD</h6>
         </div>
        <div class="scor">
          <h3 class="scor">score</h6>
         </div>
        <?php
        get_wod_scores(current_wod());
        ?>
      </div>
    </div>

<?php include("includes/footer.php"); ?>
