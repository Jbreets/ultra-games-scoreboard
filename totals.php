<?php include("includes/header.php"); 
session_start();
?>
<?php if(!isset($_SESSION['loggedin'])) {
  echo "Not logged in";
}else{
  echo "logged in";
} ?>

    <div class="large-flex">
      <div class="grid-box" id="red">
        <div class="ldb">
          <h6>Overall Leaderboard</h6>
        </div>
        <div class="data">
          <h6>Team</h6>
        </div>
      <div class="data">
        <h6>Position</h6>
      </div>
        <div class="data">
        <h6>Total Points</h6>
      </div>
      <?php overall_scores(); ?>
      </div>

       <div class="grid-box">
          <div class="ldb">
          <h6>Wod 1</h6>
        </div>
        <div class="team">
          <h6 class="team">Team</h6>
         </div>
        <div class="pos">
          <h6 class="pos">data area</h6>
         </div>
        <div class="scor">
          <h6 class="scor">score</h6>
         </div>
        <?php
        get_wod_scores(1);
        ?>
      </div>

       <div class="grid-box">
          <div class="ldb">
          <h6>Wod 2</h6>
        </div>
        <div class="team">
          <h6 class="team">Team</h6>
        </div>
        <div class="pos">
          <h6 class="pos">data area</h6>
        </div>
        <div class="scor">
          <h6 class="scor">score</h6>
        </div>
        <?php get_wod_scores(2);  ?>
      </div>

          <div class="grid-box">
          <div class="ldb">
          <h6>Wod 3</h6>
        </div>
        <div class="team">
          <h6 class="team">Team</h6>
        </div>
        <div class="pos">
          <h6 class="pos">data area</h6>
        </div>
        <div class="scor">
          <h6 class="scor">score</h6>
        </div>
        <?php get_wod_scores(3);  ?>
      </div>

           <div class="grid-box">
          <div class="ldb">
          <h6>Wod 4</h6>
        </div>
        <div class="team">
          <h6 class="team">Team</h6>
        </div>
        <div class="pos">
          <h6 class="pos">data area</h6>
        </div>
        <div class="scor">
          <h6 class="scor">score</h6>
        </div>
        <?php get_wod_scores(4);  ?>
      </div>

           <div class="grid-box">
          <div class="ldb">
          <h6>Wod 5</h6>
        </div>
        <div class="team">
          <h6 class="team">Team</h6>
        </div>
        <div class="pos">
          <h6 class="pos">data area</h6>
        </div>
        <div class="scor">
          <h6 class="scor">score</h6>
        </div>
        <?php get_wod_scores(5);  ?>
      </div>

           <div class="grid-box">
          <div class="ldb">
          <h6>Wod 6</h6>
        </div>
        <div class="team">
          <h6 class="team">Team</h6>
        </div>
        <div class="pos">
          <h6 class="pos">data area</h6>
        </div>
        <div class="scor">
          <h6 class="scor">score</h6>
        </div>
        <?php get_wod_scores(6);  ?>
      </div>

           <div class="grid-box">
          <div class="ldb">
          <h6>Wod 7</h6>
        </div>
        <div class="team">
          <h6 class="team">Team</h6>
        </div>
        <div class="pos">
          <h6 class="pos">data area</h6>
        </div>
        <div class="scor">
          <h6 class="scor">score</h6>
        </div>
        <?php get_wod_scores(7);  ?>
      </div>
    </div>

    
<?php include("includes/footer.php"); ?>
