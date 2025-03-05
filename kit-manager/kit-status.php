<?php include("includes/header.php"); ?>
<div class="status">
    <h1>Enter event below</h1>
    <br>
    <form action="">
        <input id="event" type="text" value=""> 
        <input onclick="grabEvent(eventName)"type="submit">   
    </form>
    <div class="grid-box">

        <div id="results">

            <div class="kit">
                <p  id="kit">kit</p>
                <p class="cat">glove set</p>
                <p class="cat">corner post</p>
                <p class="cat">charity bucket</p>
                <p class="cat">stamp</p>
                <p class="cat">table numbers</p>
                <p class="cat">barrier covers</p>
                <p class="cat">table cloths</p>
                <p class="cat">ticket scanner</p>
                <p class="cat">dress and cards</p>
                <p class="cat">sign ups</p>
                <p class="cat">hs folder</p>
                <p class="cat">go pro num</p>
                <p class="cat">camera</p>
                <p class="cat">pole</p>
                <p class="cat">extension lead</p>
                <p class="cat">black wire</p>
                <p class="cat">white plug</p>
                <p class="cat">bracket</p>

            </div>
            <div class="gone-out" id="gone">
                <div id='kgone'> Kit Gone </div>
                <div class="blank"></div>
                <div class="blank"></div>
                <div class="blank"></div>
                <div class="blank"></div>
                <div class="blank"></div>
                <div class="blank"></div>
                <div class="blank"></div>
                <div class="blank"></div>
                <div class="blank"></div>
                <div class="blank"></div>
                <div class="blank"></div>
                <div class="blank"></div>
                <div class="blank"></div>
                <div class="blank"></div>
                <div class="blank"></div>
                <div class="blank"></div>
                <div class="blank"></div>
                <div class="blank"></div>
            </div>
            <div class="come-back" id="back">
                <div id='kgone'> Kit Back </div>
                <div class="blank_r"></div>
                <div class="blank_r"></div>
                <div class="blank_r"></div>
                <div class="blank_r"></div>
                <div class="blank_r"></div>
                <div class="blank_r"></div>
                <div class="blank_r"></div>
                <div class="blank_r"></div>
                <div class="blank_r"></div>
                <div class="blank_r"></div>
                <div class="blank_r"></div>
                <div class="blank_r"></div>
                <div class="blank_r"></div>
                <div class="blank_r"></div>
                <div class="blank_r"></div>
                <div class="blank_r"></div>
                <div class="blank_r"></div>
                <div class="blank_r"></div>
            </div>
            </div>
            <h1>Other notes / Kit missing</h1>
            <div class="other-missing" id="missing">

            </div>
        </div>
    </div>

</div>        







<script src="resources/main.js"></script>