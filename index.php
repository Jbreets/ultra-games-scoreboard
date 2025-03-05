<?php
require_once __DIR__ . "/includes/header.php";
// checks to see if user is currently logged in
//  if(!isset($_SESSION['loggedin'])) {
//   echo "<br>";
// }else{
//   echo  "<br>";
// } 
?>


<div id="controller" data-category="open" date-view="overall" data-wv="false" data-wv-active="1">

    <div class="openskillz" id="openskillz">
        <!-- Main Buttons - Control the parent divs for each category. -->
        <button id="openClick" data-category="open" data-active="true" data-current-view="overall" onclick="category(this)" class="main_buttons open"><img id="open-img" src="resources/Assets/OPEN.svg" style="color: #f2ff80 ;"></img></button>

        <button id="skillzClick" data-category="skillz" data-active="false" data-current-view="overall" onclick="category(this)" class="main_buttons skillz"><img id="skillz-img" src="resources/Assets/SKILLZ.svg" style="color: #a6ffcf;"></img></button>

    </div>

    <!-- WOD Display - overall, current and all wod buttons -->
    <div class="table_display" id="table_display" data-category="open" >
        <button class="wod_display_buttons" data-active="true" data-view-name="overall" onclick="active_view(this)">Overall</button>
        <button class="wod_display_buttons" data-active="false" data-view-name="current_wods" onclick="active_view(this)">Current Wod</button>
        <button class="wod_display_buttons" data-active="false" data-view-name="all_wods" onclick="active_view(this)">All Wods</button>
    </div>
    
    <!-- WOD Selector -->
    <div id="wod_menu" class="wod_menu _hide" data-category="open">
        <button class="wod-buttons" data-active="true" data-wod-number="1" onclick="wod_buttons(this)">
            <span class="wod_heading">WOD</span>
            <span class="wod-nums">1A</span>
        </button>
        <button class="wod-buttons" data-active="false" data-wod-number="2" onclick="wod_buttons(this)">
            <span class="wod_heading">WOD</span>
            <span class="wod-nums">1B</span>
        </button>
        <button class="wod-buttons" data-active="false" data-wod-number="3" onclick="wod_buttons(this)">
            <span class="wod_heading">WOD</span>
            <span class="wod-nums">2</span>
        </button>
        <button class="wod-buttons" data-active="false" data-wod-number="4" onclick="wod_buttons(this)">
            <span class="wod_heading">WOD</span>
            <span class="wod-nums">3</span>
        </button>
        <button class="wod-buttons" data-active="false" data-wod-number="5" onclick="wod_buttons(this)">
            <span class="wod_heading">WOD</span>
            <span class="wod-nums">4</span>
        </button>
        <button class="wod-buttons" data-active="false" data-wod-number="6" onclick="wod_buttons(this)">
            <span class="wod_heading">WOD</span>
            <span class="wod-nums">5</span>
        </button>
        <button class="wod-buttons" data-active="false" data-wod-number="7" onclick="wod_buttons(this)">
            <span class="wod_heading">WOD</span>
            <span class="wod-nums">6</span>
        </button>
    </div> 

        <!-- Add two parent div's here to hold each categories tables. One div for 'open' category and another for 'skillz'. The main buttons control which parent div is displayed. -->

        <div class="category_body" data-category="open">

            <!-- Overall table -->
            <div id="overall" class="overall_grid table_container">
                <h3 style="visibility: hidden"></h3>
                <h4 class="opentext" style></h4>
                <h4 class="open-data" style="text-align: center; background-color: black; border-style: none;">TOTAL</h4>
            
                <?php overall_scores(); ?>
            </div>

            <?php 
            if (current_wod() == 1){
                $current_open_wod_output = "1A";
            }else if (current_wod() == 2){
                $current_open_wod_output = "1B";
            }else {
                $current_open_wod_output = (current_wod() - 1);
            } 
            ?>

            <!-- Current WOD Table -->   
            <div id="current_wods" class="new-grid table_container _hide">
                <h3 style="visibility: hidden"></h3>
                <h4 class="opentext" id="current_open_wod_display">WOD <?php echo $current_open_wod_output; ?></h4>
                <h4 class="open-data" style="text-align: center; border-style: none;">REPS/<br>TIME</h4>
                <h4 class="open-data" style="text-align: center; border-style: none;">POINTS</h4>

                <?php get_wod_scores(current_wod()); ?>
                
            </div>

            <!-- All WOD Tables -->   
            <div id="all_wods" class="table_container _hide">
                <?php print_all_wods(); ?>
            </div>

        </div>

        <div class="category_body _hide" data-category="skillz" id="cat_body">
            
            <!-- Overall table -->
            <div id="overall" class="overall_grid table_container">
                <h3 style="visibility: hidden"></h3>
                <h4 class="skillztext"></h4>
                <h4 class="skillz-data" style="text-align: center; border-style: none;">TOTAL</h4>

                <?php overall_scores_skillz(); ?>
            </div>

            <?php 
            if (current_wod_skillz() == 1){
                $current_skillz_wod_output = "1A";
            }else if (current_wod_skillz() == 2){
                $current_skillz_wod_output = "1B";
            }else {
                $current_skillz_wod_output = (current_wod_skillz() - 1);
            } 
            ?>

            <!-- Current WOD Table -->  
            <div id="current_wods" class="new-grid table_container _hide">
                <h3 style="visibility: hidden"></h3>
                <h4 class="skillztext" id="current_skillz_wod_display">WOD <?php echo $current_skillz_wod_output; ?></h4>
                <h4 class="skillz-data" style="text-align: center; border-style: none;">REPS/<br>TIME</h4>
                <h4 class="skillz-data" style="text-align: center; border-style: none;">POINTS</h4>

                <?php get_wod_scores_skillz(current_wod_skillz()); ?>
            </div>

            <!-- All WOD Tables -->   
            <div id="all_wods" class="table_container _hide">
                <?php print_all_wods_skillz(); ?>
            </div>

        </div>

</div>

<script src="resources/main.js">
    
</script>
 
<!-- New html controller that updates on every click with the status of what is active. New functions that controll all visual elements and controller updates.-->

<!-- Left to do: Display the tables and change when clicked. Best option maybe to use the global JS object and window event listner. -->
</div>
</body>
</html>