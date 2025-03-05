function confirmStep() {
return confirm("are you sure you want to clear this data?");
}
function screenSize() {
return size(window.screen.width);
}
var n = 1;

function increment(){
  n++;
  return n;
} 
// function yesnoCheck() {
//   if (document.getElementById('yesCheck').checked) {
//       document.getElementById('ifYes').style.visibility = 'visible';
//       document.getElementById('ifNo').style.visibility = 'hidden';
//   }
//   else if (document.getElementById('noCheck').checked) { 
//         document.getElementById('ifYes').style.visibility = 'hidden';
//         document.getElementById('ifNo').style.visibility = 'visible';
//   }
// }

function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf( " mb-show") == -1) {
    x.className += " mb-show";
  }else{
    x.className = x.className.replace(" mb-show", "");
  }
}


//doesn't work from this file?
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
// var styles =  {
//   "border-color": "#616161 #616161 #f2ff80 #616161",
//   "border-width": "2px 2px 4px 2px"
// };

// window.onload = function () {
//   document.getElementById("openClick").click(); 
//   document.getElementById("overall").click(); };

// //this does
// function openClick() {
//   //clicked by default
//   document.getElementById("open-img").style.cssText = "opacity: 1;"
//   document.getElementById("skillz-img").style.cssText = "opacity: 0.7;"

//   //

//   document.getElementById("openClick").style.cssText = "border-color: #616161 #616161 #f2ff80 #616161;  "
//   document.getElementById("skillzClick").style.cssText = "border-color: #616161 #616161 #616161 #616161;"
//   document.getElementById("open").style.cssText = "display: ;"
//   document.getElementById("skillz").style.cssText = "display: none"
//   document.getElementById("open-c").style.cssText = "display: ;"
//   document.getElementById("skillz-c").style.cssText = "display: none"
//   //document.getElementById('skillz-a').style.cssText = "display:none ;"
//   //document.getElementById('open-a').style.cssText = "display:;"
//   document.getElementById("accord-o").style.cssText = "border-color: #f2ff80"
//   document.getElementById("accord-c").style.cssText = "border-color: #f2ff80"
//   document.getElementById("accord-a").style.cssText = "border-color: #f2ff80"

//   document.getElementById("overall").style.cssText = "color: #f2ff80;"
//   document.getElementById("current").style.cssText = "color: #f2ff80;"
//   document.getElementById("all").style.cssText = "color: #f2ff80;"

//   document.getElementById("wod-selection-open").style.cssText = "display: ;"
//   document.getElementById("wod-selection-skillz").style.cssText = "display: none;"
// }
// function skillzClick() {

//   document.getElementById("open-img").style.cssText = "opacity: 0.7;"
//   document.getElementById("skillz-img").style.cssText = "opacity: 1;"


  
//   document.getElementById("skillzClick").style.cssText = "border-color: #616161 #616161 #a6ffcf #616161; "
//   document.getElementById("openClick").style.cssText = "border-color: #616161 #616161 #616161 #616161;  "
//   document.getElementById("skillz").style.cssText = "display: ;"
//   document.getElementById("open").style.cssText = "display:none;"
//   document.getElementById("skillz-c").style.cssText = "display: ;"
//   document.getElementById("open-c").style.cssText = "display:none;"
//   //document.getElementById('skillz-a').style.cssText = "display: ;"
//   //document.getElementById('open-a').style.cssText = "display: none;"
//   document.getElementById("accord-o").style.cssText = "border-color: #a6ffcf"
//   document.getElementById("accord-c").style.cssText = "border-color: #a6ffcf"
//   document.getElementById("accord-a").style.cssText = "border-color: #a6ffcf"
    
//   document.getElementById("overall").style.cssText = "color: #a6ffcf;"
//   document.getElementById("current").style.cssText = "color: #a6ffcf;"
//   document.getElementById("all").style.cssText = "color: #a6ffcf;"

//   document.getElementById("wod-selection-skillz").style.cssText = "display: ;"
//   document.getElementById("wod-selection-open").style.cssText = "display: none;"

// }

// team entry wod select input. check what is selected and show/hide the type of scoring based on that.
function wod_score_type(e) {
  let scoreReps = document.querySelector("#score_reps");
  let scoreTime = document.querySelector("#score_time");
  let selectedWod = parseInt(e.value);

  if (selectedWod === 1) {
    // WOD 1(1A) is time based
    scoreReps.classList.add("_hide");
    scoreTime.classList.remove("_hide");
  } else if (selectedWod === 2) {
    // WOD 2(1B) is rep based
    scoreReps.classList.remove("_hide");
    scoreTime.classList.add("_hide");
  } else if (selectedWod === 3) {
    // WOD 3(2) is rep based
    scoreReps.classList.remove("_hide");
    scoreTime.classList.add("_hide");
  } else if (selectedWod === 4) {
    // WOD 4(3) is rep based
    scoreReps.classList.remove("_hide");
    scoreTime.classList.add("_hide");
  } else if (selectedWod === 5) {
    // WOD 5(4) is time based
    scoreReps.classList.add("_hide");
    scoreTime.classList.remove("_hide");
  } else if (selectedWod === 6) {
    // WOD 6(5) is rep based
    scoreReps.classList.remove("_hide");
    scoreTime.classList.add("_hide");
  } else if (selectedWod === 7) {
    // WOD 7(6) is time based
    scoreReps.classList.add("_hide");
    scoreTime.classList.remove("_hide");
  }

}

// default variables
let settings = {
  "activeCategory": "open",
  "activeView": "overall",
  "wodViews": false,
  "WodViewsActive": 1
}


let html_controller = document.getElementById("controller");

// 
// not working on specific page for some reason
// 
/*

// parent container elements
let container_open = document.querySelector(".category_body[data-category='open']");
let container_skillz = document.querySelector(".category_body[data-category='skillz']");

// tables (open category)
let overall_open = container_open.querySelector("#overall");
let current_wod_open = container_open.querySelector("#current_wods");
let all_wods_open = container_open.querySelector("#all_wods");

// tables (skillz category)
let overall_skillz = container_skillz.querySelector("#overall");
let current_wod_skillz = container_skillz.querySelector("#current_wods");
let all_wods_skillz = container_skillz.querySelector("#all_wods");

*/
// 
// not working on specific page for some reason
// 




function category(e) {

  // get the value of the category button clicked.
  let clickedCategory = e.dataset.category;

  // update the global variable
  settings['activeCategory'] = clickedCategory;

  //update html controler
  html_controller.dataset.category = clickedCategory;

  // run function to update button classes
  toggleActive(e, '.main_buttons');
  
}

function active_view(e) {
  
  // get the value of the view button clicked.
  let clickedView = e.dataset.viewName;

  // update the global variable
  settings['activeView'] = clickedView;

  // update html controler
  html_controller.dataset.view = clickedView;

  // toggle button classes
  toggleActive(e, '.wod_display_buttons');

  // check if views button clicked is "all wods"
  if (clickedView === "all_wods") {
    // show the wod menu
    document.getElementById("wod_menu").classList.remove("_hide");
    // update html controller
    settings['wodViews'] = true;
  } else {
    //hide the wod menu
    document.getElementById("wod_menu").classList.add("_hide");
    // update the html controller
    settings['wodViews'] = false;
  }

}

function wod_buttons(e) {
  
  // get the value of the view button clicked.
  let clickedWod = e.dataset.wodNumber;

  // update the global variable
  settings['WodViewsActive'] = parseInt(clickedWod);

  //update html controler
  html_controller.dataset.wv = clickedWod;

  //toggle button classes
  toggleActive(e, '.wod-buttons');

}

// function to toggle the active data attribute
function toggleActive(e, className) {

  if (e.dataset.active === "false") {

    // get all elements with data-active = true
    let x = document.querySelectorAll(className);

    // loop through all elements and reverse their data-active value
    x.forEach(element => {
      element.dataset.active = false;
      // if (element.dataset.active === "true") {
      //   element.dataset.active = false;
      // } else if (element.dataset.active === "false") {
      //   element.dataset.active = true;
      // }
    });

    e.dataset.active = true;

  }

}

window.addEventListener("click", function() {
  // console.log(settings);

  // show/hide category containers
  if (settings.activeCategory === "open") {
    container_open.classList.remove("_hide");
    container_skillz.classList.add("_hide");
  } else if (settings.activeCategory === "skillz") {
    container_open.classList.add("_hide");
    container_skillz.classList.remove("_hide");
  }

  // get all tables and add _hide class to them all.
  let allTables = document.querySelectorAll(".table_container");
  allTables.forEach(element => {
    element.classList.add("_hide");

    // if table is the table for the current active view then remove the hide css class.
    if (settings.activeView === element.id) {
      element.classList.remove("_hide");
    }

  });

  // get all the individual WOD tables
  let allWodTables = document.querySelectorAll(".table_container_wod");
  allWodTables.forEach(element => {
    element.classList.add("_hide");    

    if (parseInt(settings.WodViewsActive) === parseInt(element.dataset.wodNumber)) {
      element.classList.remove("_hide");
    }
  });

})

//function that sticks header to the top based off of how far has been scrolled (may need changing either based on variable position or different values)

// can add wod menu and set it to relative, since it will only dissapear anyways

// basic start
  function changeCss() {
    var bodyElement = document.querySelector("header").offsetHeight;
    var divElement = document.getElementById("openskillz").offsetHeight;
    var navElement = document.getElementById("table_display");
    var buttonElement = document.getElementById("table_display");

    this.scrollY <= bodyElement + divElement ? navElement.style.cssText = "" : navElement.style.cssText = "position: fixed; margin:, -3px auto; top: 0; left: 0; right: 0; background-color: #000";   
  }
  window.addEventListener("scroll", changeCss , false);


  // changes values based off of the val of category
  function changeGrid() {
    var bodyElement = document.querySelector("header").offsetHeight;
    var divElement = document.getElementById("openskillz").offsetHeight;
    var navElement =  document.getElementById("cat_body");
    var buttonElement = document.getElementById("table_display").offsetHeight;
    var controller = document.getElementById("controller");
    // this.scrollY <= 176.8 ? navElement.style.cssText = "position: relative;" : navElement.style.cssText = "position: fixed; top: 0; left: 0; right: 0; background-color: #000", 


  //  if/else depending on wether all wods is selected or not 
    var attribute = controller.getAttribute('data-view');
    // console.log(attribute);
 
    if (attribute == 'all_wods') {

       buttonElement += 60;

      this.scrollY <= bodyElement + divElement ? navElement.style.cssText = "" : navElement.style.cssText =  "padding-top:" + buttonElement + "px; background-color: #000;"; 
    } else {


      this.scrollY <= bodyElement + divElement ? navElement.style.cssText = "" : navElement.style.cssText =  "padding-top:" + buttonElement + "px; background-color: #000;"; 
    }

    // default padding
//    this.scrollY < bodyElement + divElement ? navElement.style.cssText = "" : navElement.style.cssText =  "padding-top:" 
//    buttonElement + "px; background-color: #000;";


  }
  window.addEventListener("scroll", changeGrid , false);




  function changeWodBar() {
    var wodbarElement = document.getElementById("wod_menu");
    var bodyElement = document.querySelector("header").offsetHeight;
    var divElement = document.getElementById("openskillz").offsetHeight;
    var navElement = document.getElementById("table_display").offsetHeight - 5;

    this.scrollY <= bodyElement + divElement ? wodbarElement.style.cssText = "" : wodbarElement.style.cssText = "position: fixed; top:" + navElement + "px;"   
  }
  window.addEventListener("scroll", changeWodBar , false);







// function toggleClick(e) {

//   // get the category of the clicked button(open or skillz)
//   let buttonCategory = e.dataset.category;

//   // if the button clicked has data-active = false then run
//   if (e.dataset.active === "false") {

//     // get all elements with data-active = true
//     let all = document.querySelectorAll('[data-active]');

//     // loop through all elements and reverse their data-active value
//     all.forEach(element => {
//       if (element.dataset.active === "true") {
//         element.dataset.active = false;
//       } else if (element.dataset.active === "false") {
//         element.dataset.active = true;
//       }
//     });

//     // get all the category parent divs.
//     let categoryBodies = document.querySelectorAll(".category_body");

//     // loop through parent divs and toggle css class to show and hide them
//     categoryBodies.forEach(element => {
//       element.classList.toggle("_hide");
//     });

//     // Update the table display data-category value. This will change active css
//     document.querySelector("#table_display").dataset.category = buttonCategory;

//     // update the WOD menu data-category value. This will change active css
//     document.querySelector("#wod_menu").dataset.category = buttonCategory;

//     // get all WOD Buttons
//     let wodButtons = document.querySelectorAll(".wod_display_buttons");
//     let currentView;

//     // loop through WOD buttons
//     wodButtons.forEach(element => {
//       // find the active WOD button
//       if (element.dataset.menuActive === "true") {
//         // assign the button value to variable
//         currentView = element.innerText.toLowerCase();
//       }
//     });

//     // set the current active WOD Display button table to be shown.
//     let selectedCategoryBody = document.querySelector(".category_body[data-category='" + buttonCategory + "']");
//     let tableContainers = selectedCategoryBody.querySelectorAll(".table_container");


//   }

  

// }

// function wod_menu_click(e) {

//   // get all of the WOD display buttons
//   let menuButtons = document.querySelectorAll('[data-menu-active]');

//   // loop through all WOD display buttons and set menuActive to false. This will also remove active css classes.
//   menuButtons.forEach(element => {
//     element.dataset.menuActive = false;   
//   });

//   // assign menuActive to true for the button that was clicked. This will reassign the active css class.
//   e.dataset.menuActive = 'true';





//   // get all of the table containers that hold the tables
//   let tableContainers = document.querySelectorAll('.table_container');

//   // loop through all of the table containers and add css class "_hide". This will hide all of the table containers.
//   tableContainers.forEach(element => {
//     element.classList.add("_hide");
//   });


//   // if "all wods" button is clicked then show the individual wod menu, if not, hide it.
//   if (e.dataset.menuName === "all_wods") {
//     document.getElementById('wod_menu').classList.remove("_hide");
//   } else {
//     document.getElementById('wod_menu').classList.add("_hide");
//   }



//   // console.log(e.parentElement.dataset.category);

//   let activeCategory = e.parentElement.dataset.category;
//   let x = document.querySelector(".category_body[data-category='" + activeCategory + "']");

//   if (e.dataset.menuName === "overall") {
    
//     x.querySelector('#overall').classList.toggle("_hide");
//   } 

//   if (e.dataset.menuName === "current_wods") {
//     x.querySelector('#current_wods').classList.toggle("_hide");
//   } 

//   if (e.dataset.menuName === "all_wods") {
//     x.querySelector('#all_wods').classList.toggle("_hide");
//   } 

  
// }




// set of functions that fade in and out the scoreboard
let current = document.getElementById("lg-current");
let overall = document.getElementById("lg-overall");

// basic fade out animation
function fade(element) {
  var op = 1;  // initial opacity
  var timer = setInterval(function () {
      if (op <= 0.01){
          clearInterval(timer);
          element.style.display = 'none';
      }
      element.style.opacity = op;
      element.style.filter = 'alpha(opacity=' + op * 100 + ")";
      op -= op * 0.1;
  }, 30);
}


// basic unfade function
function unfade(element) {
  var op = 0.01;  // initial opacity
  element.style.display = 'block';
  var timer = setInterval(function () {
      if (op >= 1){
          clearInterval(timer);
      }
      element.style.opacity = op;
      element.style.filter = 'alpha(opacity=' + op * 100 + ")";
      op += op * 0.1;
  }, 30);
}


// simple counter
function simpleCounter(seconds, fadeout) {
  let counter = seconds;

  const interval = setInterval(() => {
  console.log(counter);
  counter--;
    if (counter < 0) {
      clearInterval(interval);
      fade(fadeout);

    }
  }, 1000);
}



// changes the display to be dynamic and change between open and skillz 
const toggleTableDisplay = () => {
  let ov = document.getElementById("lg-overall");
  let cur = document.getElementById("lg-current");
  console.log(ov);
  console.log(cur);
  if (cur.style.display == "none") {
    fade(ov);
    setTimeout(function(){
    unfade(cur);
    }, 2000); 
    
    
  }else {
    fade(cur);
    setTimeout(function(){
    unfade(ov);
    }, 2000); 
    
  }
}
// setIntervall test
const testFunc = () => {
  console.log(`Hello world!`);
};

//console.log(document.getElementById("lg-overall"));


// setInterval(testFunc, 2000);

// code that enables the fading and un-fading functions
setInterval(toggleTableDisplay, 20000);
