<?php
include("includes/header.php");


// insert post catchers for all differnet elements 
if (isset($_POST['submit'])) {

    $con = db_conn();

    $event_type = $_POST['event_type'];
    $city = $_POST['city'];
    $date_o = $_POST['date'];
    $rep = $_POST['rep'];

    // changing date configuration
    $date_t = strtotime($date_o);
    $date = date("d-m-Y", $date_t);


    $event = $event_type . "-" . $city . "-" . $date;

    // catch all the for values
    $glove_set = $_POST['glove_set'];
    $corner_post = $_POST['corner_post'];
    $charity_bucket = $_POST['charity_bucket'];
    $stamp = $_POST['stamp'];
    $table_numbers = $_POST['table_numbers'];
    $barrier_covers = $_POST['barrier_covers'];
    $table_cloths = $_POST['table_cloths'];
    $ticket_scanner = $_POST['ticket_scanner']; 
    $dress_cards = $_POST['dress_and_cards'];
    $sign_ups = $_POST['sign_ups'];
    $hs_folder = $_POST['hs_folder'];
    $go_pro_num = $_POST['go_pro_num'];
    $camera = $_POST['camera'];
    $pole = $_POST['pole'];
    $extension = $_POST['extension_lead'];
    $black_wire = $_POST['black_wire'];
    $white_plug = $_POST['white_plug'];
    $bracket = $_POST['bracket'];
    $other_missing = $_POST['missing'];
    $season = $_POST['season'];
    

    $db_events = pull_events('kit-sent-out');


    // prevents duplicate entries can also add an UPDATE sql statement in the if/else
    if (in_array($event, $db_events)) {
        // echo"in the database";
    } else {

    $sql = "INSERT INTO `kit-sent-out`
    (`event`, `rep`, `glove_set`, `corner_post`, `charity_bucket`, `stamp`, `table_numbers`, `barrier_covers`, `table_cloths`, `ticket_scanner`, `dress_and_cards`, `sign_ups`, `hs_folder`, `go_pro_num`, `camera`, `pole`, `extension_lead`, `black_wire`, `white_plug`, `bracket`, `season`)
    VALUES ('$event', '$rep', '$glove_set', '$corner_post', '$charity_bucket', '$stamp', '$table_numbers', '$barrier_covers', '$table_cloths', '$ticket_scanner', '$dress_cards', '$sign_ups', '$hs_folder', '$go_pro_num', '$camera', '$pole', '$extension', '$black_wire', '$white_plug', '$bracket', '$season') ";


    // var_dump($sql);

    $insert = mysqli_query($con, $sql);
    // var_dump($insert);
    if ($insert) {
        $message = "<h2>gurren</h2>";
    } else {
        
        $message = "<h2>ye</h2>";
    }

    }
}







?>
<div class="header">
        <h1 class="form-title">Kit Going Out</h1>
    </div>
<form class="form" method="post" action="">
    <div class="grid-box">
        <div class="form-grid">
            <div class="sub-head">
                <h1>Gloves and headguards</h1>
            </div>
            <div class="sub-head"> 
                <h1>Amount sent</h1>
            </div>
            <div class="question">
                <label for="event_type">event</label>
            </div>

            <div class="answer">
                <select name="event_type" id="">
                    <option  value="UWCB">UWCB</option>
                    <option  value="UMMA">UMMA</option>
                    <option  value="UBALLROOM">UBALLROOM</option>
                    <option  value="UCOMEDY">UCOMEDY</option>
                </select>
               
            </div>

            <!-- city field -->
            <div class="question">
                <label for="city">city</label>
            </div>
            <div class="answer">
                <input type="text" name="city" >
            </div>

            <!-- city field -->
            <div class="question">
                <label for="date">date</label>
            </div>
            <div class="answer">
                <input type="date" name="date" >
            </div>



            <!-- season field -->
            <div class="question">
                <label for="season">season</label>
            </div>
            <div class="answer">
                <input name="season" type="number">
            </div>

             <!-- rep field -->
            <div class="question">
                <label for="rep">rep</label>
            </div>
            <div class="answer">
                <input name="rep" type="text">
            </div>


            <!-- glove set number / letter given -->
            <div class="question">
                <label for="text">Glove set Number</label>
            </div>
            <div class="answer">
                <input type="text" name="glove_set">
            </div>

            <div class="sub-head">
                <h1>Other Kit</h1>
            </div>
            <div class="sub-head"> 

            </div>

              <!-- corner post -->
            <div class="question">
                <label >corner post</label>
            </div>
            <div class="answer">
                <label for="radio">yes</label>
                <input type="radio" class="yes" value="yes" name="corner_post">
                <label for="radio">no</label>
                <input type="radio" class="no"  value="no" name="corner_post">
            </div>

            <!-- charity bucket -->
            <div class="question">
                <label>charity bucket</label>

            </div>
            <div class="answer">
                <label for="radio">yes</label>
                <input type="radio" class="yes" value="yes" name="charity_bucket">
                <label for="radio">no</label>
                <input type="radio" class="no" value="no" name="charity_bucket">
            </div>


            <!-- stampt -->
            <div class="question">
                <label >stamp</label>
            </div>
            <div class="answer">
                <label for="radio">yes</label>
                <input type="radio" class="yes" value="yes" name="stamp">
                <label for="radio">no</label>
                <input type="radio" class="no" value="no" name="stamp">
            </div>

             <!-- table_numbers -->
            <div class="question">
                <label>table numbers</label>
            </div>
            <div class="answer">
            <label for="radio">yes</label>
                <input type="radio" class="yes" value="yes" name="table_numbers">
                <label for="radio">no</label>
                <input type="radio" class="no"  value="no" name="table_numbers">
            </div>

            <!-- barrier covers -->
            <div class="question">
                <label>barrier covers</label>
            </div>
            <div class="answer">
                <input type="text" name="barrier_covers">
            </div>


            <!-- table cloths -->
            <div class="question">
                <label>table cloths</label>
            </div>
            <div class="answer">
                <input type="text" name="table_cloths">
            </div>



            <!-- ticket scanner -->
            <div class="question">
                <label>ticket scanner</label>
            </div>
            <div class="answer">
                <label for="radio">yes</label>
                <input type="radio" class="yes" value="yes" name="ticket_scanner">
                <label for="radio">no</label>
                <input type="radio" class="no"  value="no" name="ticket_scanner">
            </div>


            <!-- ring girl dress & ring cards -->
            <div class="question">
                <label>ring girl dress & ring cards</label>
            </div>
            <div class="answer">
                <label for="radio">yes</label>
                <input type="radio" class="yes" value="yes" name="dress_and_cards">
                <label for="radio">no</label>
                <input type="radio" class="no"  value="no" name="dress_and_cards">
            </div>

            <!-- sign ups -->
            <div class="question">
                <label>sign ups</label>
            </div>
            <div class="answer">
                <label for="radio">yes</label>
                <input type="radio" class="yes" value="yes" name="sign_ups">
                <label for="radio">no</label>
                <input type="radio" class="no"  value="no" name="sign_ups">
            </div>

            <div class="sub-head">
                <h1>Health and safety</h1>
            </div>
            <div class="sub-head"> 

            </div>


            <!-- h&s folder -->
            <div class="question">
                <label>h&s folder</label>
            </div>
            <div class="answer">
                <label for="radio">yes</label>
                <input type="radio" class="yes" value="yes" name="hs_folder">
                <label for="radio">no</label>
                <input type="radio" class="no"  value="no" name="hs_folder">
            </div>

            <div class="sub-head">
                <h1>Go Pro</h1>
            </div>
            <div class="sub-head"> 

            </div>


            <!-- might need to allow multiple values -->
            <!-- Go pro Num sent -->
            <div class="question">
                <label for="text">Go Pro Num set</label>
            </div>
            <div class="answer">
                <input class="text" type="text" name="go_pro_num" value="">
            </div>

            <!-- tick all gp -->
<!--            
            <div class="question">
                <label for="yes">yes</label>
                <label for="no">no</label>
            </div>
            
            <div class="answer">
                <label for="radio">yes</label>
                <input type="radio" class="yes" value="yes" name="tick_all_gp">
                <label for="radio">no</label>
                <input type="radio" class="no"  value="no" name="tick_all_gp">
            </div>
  -->


            <!-- camera -->
            <div class="question">
                <label>camera</label>
            </div>
            <div class="answer">
                <label for="radio">yes</label>
                <input type="radio" class="yes" value="yes" name="camera">
                <label for="radio">no</label>
                <input type="radio" class="no"  value="no" name="camera">
            </div>


            <!-- pole -->
            <div class="question">
                <label >pole</label>
            </div>
            <div class="answer">
                <label for="radio">yes</label>
                <input type="radio" class="yes" value="yes" name="pole">
                <label for="radio">no</label>
                <input type="radio" class="no"  value="no" name="pole">
            </div>

             <!-- extension -->
            <div class="question">
                <label>extension</label>
            </div>
            <div class="answer">
                <label for="radio">yes</label>
                <input type="radio" class="yes" value="yes" name="extension_lead">
                <label for="radio">no</label>
                <input type="radio" class="no"  value="no" name="extension_lead">
            </div>


            <!-- black wire -->
            <div class="question">
                <label>black wire</label>
            </div>
            <div class="answer">
                <label for="radio">yes</label>
                <input type="radio" class="yes" value="yes" name="black_wire">
                <label for="radio">no</label>
                <input type="radio" class="no"  value="no" name="black_wire">
            </div>


            <!-- white plug -->
            <div class="question">
                <label>white plug</label>
            </div>
            <div class="answer">
                <label for="radio">yes</label>
                <input type="radio" class="yes" value="yes" name="white_plug">
                <label for="radio">no</label>
                <input type="radio" class="no"  value="no" name="white_plug">
            </div>

            <!-- bracket -->
            <div class="question">
                <label>bracket</label>
            </div>
            <div class="answer">
                <label for="radio">yes</label>
                <input type="radio" class="yes" value="yes" name="bracket">
                <label for="radio">no</label>
                <input type="radio" class="no"  value="no" name="bracket">
            </div>

        </div>
                <!-- submit -->
            <div class="submit">
                <input class="submit" type="submit" name="submit">
            </div>
    </div>
</form>