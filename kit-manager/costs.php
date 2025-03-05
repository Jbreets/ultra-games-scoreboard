<?php include("includes/header.php"); ?>

<h1>enter event below</h1>
<br>
<form action="">
    <input id="rep" type="text" value=""> 
    <input onclick="grabCosts(rep)"type="submit">   
</form>
<div class="container">
    <div class="costs-grid" id="cost-return">
        <div>
            <h1 class="grid-head">Event</h1>
        </div>
        <div>
            <h1 class="grid-head">Missing item(s)</h1>
        </div>
        <div>
            <h1 class="grid-head">Amount</h1>
        </div>
        <div>
            <h1 class="grid-head">Cost</h1>
        </div>
        <div>
            <h1 class="grid-head">Total</h1>
        </div>
        <?php 
        //  print_missing_costs("UMMA-Nottingham-27-08-2022"); ?>
    </div>
</div>    
<!-- can add an export function just in case this gets pushed to reps 
still not too hard-->



<script src="resources/main.js"></script>