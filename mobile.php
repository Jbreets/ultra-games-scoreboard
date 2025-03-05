<?php
require_once __DIR__ . "/includes/header.php";
?>
<script src="resources/main.js"></script>
<div class="openskillz">
    <button id="openClick" onclick="openClick()" class="open"><img src="resources/Assets/OPEN.svg" style="color: #f2ff80;"></img></button>
    <button id="skillzClick" onclick="skillzClick()" class="skillz"><img src="/resources/Assets/SKILLZ.svg" style="color: #a6ffcf"></img></button>
</div>
<div class="wod-op">
  <button id="accord" class="accordion">
      <h1 class="text">Overall</h1>
  </button>
  <div  class="panel">
      <div class="glarge-flex">

        <div id="open" class="new-grid">
            <h3 style="visibility: hidden"></h3>
            <h4 class="opentext" style>Team Name</h4>
            <h4 class="opentext" style="text-align: center;">Total</h4>

            <?php overall_scores(); ?>
        </div>

        <div id="skillz" class="new-grid">
            <h3 style="visibility: hidden"></h3>
            <h4 class="skillztext" style>Team Name</h4>
            <h4 class="skillztext" style="text-align: center;">Total</h4>

            <?php overall_scores_skillz(); ?>
        </div>


      </div> 
  </div>


  <button id="accord" class="accordion">
      <h1 class="text">Current Wod</h1>
  </button>
  <div class="panel">
      <div class="glarge-flex">    
          <div id="open-c" class="new-grid">
            <h3 style="visibility: hidden"></h3>
            <h4 class="opentext" style>Team Name</h4>
            <h4 class="opentext" style="text-align: center;">Total</h4>

            <?php get_wod_scores(current_wod()); ?>
          </div>
          <div id="skillz-c" class="new-grid">
            <h3 style="visibility: hidden"></h3>
            <h4 class="skillztext" style>Team Name</h4>
            <h4 class="skillztext" style="text-align: center;">Total</h4>

            <?php get_wod_scores_skillz(current_wod_skillz()); ?>
          </div>
      </div>      
  </div>

  <button id="accord" class="accordion">
      <h1 class="text">All Wods</h1>
  </button>
  <div class="panel">


    <div class="glarge-flex">
        <div>
          <div id="open-a">
            <?php print_all_wods(); ?>
          </div>
          <div id="skillz-a">
              <?php print_all_wods_skillz(); ?>
            </div>
        </div>  

    </div>
  </div>
</div>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
//check inspect -> var panel isn't pulling down table due to nextElementSibling 


</script>

<?php include("includes/footer.php"); 



