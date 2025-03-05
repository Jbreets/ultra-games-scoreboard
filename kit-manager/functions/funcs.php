<?php 

// database connection
function db_conn() {
    $db_host = 'localhost';
    $db_user = 'jack';
    $db_password = 'J@ckbr33ton230802';
    $db_name = 'kit-manager'; 

  $con = mysqli_connect($db_host, $db_user, $db_password, $db_name);

  return $con;
}

//JS return functions functions
//START

// catches js parameter
$returnp = $_GET['q'];

// only echoes if there is a value in return
if (isset($returnp)) {
    $field_key = 3;
    $gone = [];
    $kit_gone = pull_kit_gone($returnp);
    echo"<div id='kgone'> Kit Gone </div>";
    
    foreach ($kit_gone as $gon) {
        foreach ($gon as $val) {
            array_push($gone, $val);
        }
    }
    
      while ($field_key <= count($gone) -2) {
        if ($gone[$field_key] == $returned[$field_key]) {
            echo"<div class='gon'>" . $gone[$field_key] . "</div>";
        } else {
            echo"<div class='gon'>" . $gone[$field_key] . "</div>";
        }
        $field_key++;
     }
}

//catches js parameter
$returns = $_GET['s'];
// checks if said parameter is empty
if (isset($returns)) {
    $key = 3;
    $k_gone = [];
    $back = [];
    echo"<div id='kgone'> Kit Back </div>";


    $grab_kit_gone = pull_kit_gone($returns);
    foreach ($grab_kit_gone as $out) {

        foreach ($out as $val) {
            array_push($k_gone, $val);
        }
    }
    $grab_kit_returned = pull_kit_returned($returns);

    foreach ($grab_kit_returned as $ret) {
        foreach ($ret as $in) {
            array_push($back, $in);
        }
    }
    
     while ($key < count($back) -2) {

         if ($back[$key] == $k_gone[$key]) {
            echo "<div class='returned'>" . $back[$key] . "</div>"; 
         } else {
            echo "<div class='missing'>" . $back[$key] . "</div>";
         }

         $key++;
     }
     if (empty($back[22])) {

    } else {

    }
}

$returno = $_GET['o'];

if (isset($returno)) {
    $missing_kit = print_other_missing($returno);
    echo "<p>" . $missing_kit . "</p>";
}

$returnc = $_GET['c'];

if (isset($returnc)) {
    // sql statement pulling all the reps events
    // replace current values with variables
    $events = rep_events($returnc, 4);
    echo" 
    <div>       
        <h1 class='grid-head'>Event</h1>
    </div>
    <div>
        <h1 class='grid-head'>Missing item(s)</h1>
    </div>
    <div>
        <h1 class='grid-head'>Amount</h1>
    </div>
    <div>
        <h1 class='grid-head'>Cost</h1>
    </div>
    <div>
        <h1 class='grid-head'>Total</h1>
    </div>";
    
    //run function that takes array of events
    
    foreach ($events as $event) {
        // var_dump($event);
        
        print_missing_costs($event);
    }

}

//END
//JS return functions functions

// pulls info from the kit that gone out database
function pull_kit_gone($event) {
    $con = db_conn();
    $sql = "SELECT * FROM `kit-sent-out` WHERE event = '$event' ";
    $result = mysqli_query($con, $sql);
    $kit_gone = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $kit_gone;

}

// pulls info from the kit that come back database
function pull_kit_returned($event) {
    $key = 0;
    $con = db_conn();
    $sql = "SELECT * FROM `kit-come-back` WHERE event = '$event' ";
    $result = mysqli_query($con, $sql);
    $kit_returned = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $kit_returned;
}

// prints the rep name based on event
function print_event_rep($event) {

    $con = db_conn();
    $sql = "SELECT * FROM `kit-sent-out` WHERE event = '$event' ";
    $result = mysqli_query($con, $sql);
    $kit_gone = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return($kit_gone[0]['rep']);
    
}

// prints info from the others missing field 
function print_other_missing($event) {
    $con = db_conn();
    $sql = "SELECT * FROM `kit-come-back` WHERE event = '$event' ";
    $result = mysqli_query($con, $sql);
    $kit_back = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return($kit_back[0]['other_missing']);
}

// prints the name of the events in the db
function print_event_name() {
    $con = db_conn();
    $sql = "SELECT event FROM `kit-sent-out`";
    $result = mysqli_query($con, $sql);
    $events = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach ($events as $val) {
        echo'<option value="' . $val['event'] . '">' . $val['event'] . '</option>';
        echo $val['event'];
    }
    
}
// grabs events in current database param as to wether its going in or out
function pull_events($direction) {
    $events = [];
    $db = db_conn();
    $sql = "SELECT event FROM `$direction`";
    $result = mysqli_query($db, $sql);
    $ev = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach ($ev as $event) {
        array_push($events, $event['event']);
        
    }
    return($events);
}

// prints the kit thats missing from a specific event
function missing_kit($event_name) {
    $key = 0;
    $missing = [];
    $fields = ['event', 'rep', 'glove_set', 'corner_post', 'charity_bucket', 'stamp', 'table_numbers', 'barrier_covers', 'table_cloths', 'ticket_scanner', 'dress_and_cards', 'sign_ups', 'hs_folder', 'go_pro_num', 'camera', 'pole', 'extension_lead', 'black_wire', 'white_plug', 'bracket', 'other_missing', 'season'];

    

    $kit_gone = pull_kit_gone($event_name);
    $kit_back = pull_kit_returned($event_name);

    //push embedded array to standard array for both db
    foreach ($kit_gone as $gone) {
    }
    foreach ($kit_back as $back) {
    }

    while ($key < count($back)) {
        if ($gone[$fields[$key]] == $back[$fields[$key]]) {

        } else {
            $missing[$fields[$key]] = $back[$fields[$key]];
        }
        $key++;
    }
    return ($missing);
    
}
// missing_kit("UWCB-Brighton-24-09-2022");
function costs() {
    $item_costs = [];
    $con = db_conn();
    $sql = "SELECT * FROM items";
    $result = mysqli_query($con, $sql);
    $costs = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    foreach ($costs as $val) {
        $item_costs[$val['item_name']] = "£" .  $val['cost'];
    }

    return $item_costs;
}

// inserts necessary info into the missing cost database
function insert_missing_cost($event_name) {
    $con = db_conn();



    //array of missing kit
    $missing = missing_kit($event_name);

    //array of item prices
    $item_price = costs();

    //foreach looping through events/missing items
    foreach ($missing as $key => $val ) {

        
        $missing_item = $key;
        if ($val == "no") {
            $val = 1;
        } elseif ($val == "yes") {
            $val = 0;
        }

        $key = strtoupper($key[0]) . substr($key, 1);
        $key = str_replace( "_", " ", $key);


        $amount = $val;
        $cost = $item_price[$key];
        $costval = intval(substr($cost, 2));
        $total = "£" . $amount * $costval;
        $cost = "£" . strval($costval);


        $sql = "INSERT INTO missing_cost (event, missing_item, amount, cost, total) 
        VALUES ('$event_name', '$missing_item', '$amount', '$cost', '$total')";


        $insert = mysqli_query($con, $sql);
        // var_dump($insert);
        if ($insert) {
            $message = "<h2>gurren</h2>";
        } else {

            $message = "<h2>ye</h2>";
        }
        
    }
}
//  insert_missing_cost("UMMA-Nottingham-27-08-2022");

// prints the info relating to missing kit and the cost of said kit
function print_missing_costs($event_name) {
    $key = 0;
    $feilds = ["id", "event", "missing_item", "amount", "cost", "total"];
    
    $con = db_conn();
    $sql = "SELECT `event`, `missing_item`, `amount`, `cost`, `total` FROM `missing_cost` WHERE event = '$event_name'";
    $result = mysqli_query($con, $sql);
    $missing_info = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach($missing_info as $val) {
        foreach ($val as $key) {
            echo"<div class='answer'><h1>" . $key . "</h1></div>";
        }
    }

}
//   print_missing_costs("UMMA-Nottingham-27-08-2022");

//  may not be necessary
function rep_events($rep, $season) {
    $events = [];
    $con = db_conn();
    $sql = "SELECT event FROM `kit-come-back` WHERE rep = '$rep' AND season = '$season'";
    $result = mysqli_query($con, $sql);
    $events = mysqli_fetch_all($result, MYSQLI_ASSOC);
    

    foreach ($events as $event) {
        array_push($events, $event['event']);
        return $events;
    }
}
//rep_events('Jack', 3);

?>

