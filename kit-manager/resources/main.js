var eventName = document.getElementById('event');
var rep = document.getElementById('rep');
document.querySelector('form').addEventListener('submit', function(e) {
    e.preventDefault();

    //console.log(lastNameInput.value);
})




// status page onclick
function grabEvent(str) {
    // grabs kit gone info
    let event = str.value

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        document.getElementById("gone").innerHTML = this.responseText;
        console.log(this.responseText);
    }
    xhttp.open("GET", "./functions/funcs.php?q=" + event);
    
    xhttp.send();

    // grabs kit back info
    const http = new XMLHttpRequest();
    http.onload = function () {
        document.getElementById("back").innerHTML = this.responseText;
        console.log(this.responseText);
    }
    http.open("GET", "./functions/funcs.php?s=" + event);
    
    http.send();

    // grabs missing kit info
    const ohttp = new XMLHttpRequest();
    ohttp.onload = function () {
        document.getElementById("missing").innerHTML = this.responseText;
        console.log(this.responseText);
    }
    ohttp.open("GET", "./functions/funcs.php?o=" + event);
    
    ohttp.send();


}
function grabCosts(str) {

    let rep = str.value
    console.log(rep);

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        document.getElementById("cost-return").innerHTML = this.responseText;
        console.log(this.responseText);
    }
    xhttp.open("GET", "./functions/funcs.php?c=" + rep);    
    xhttp.send();

    //add another field for season
    
}

