function startTimer() {
    var myVar = setInterval(theTimer, 1000);
    var d = 0;
}
function theTimer() {
    d++;
    document.getElementById("time").innerHTML = d;
}