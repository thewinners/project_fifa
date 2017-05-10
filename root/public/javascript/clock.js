var time;
var myTimer;
var timer;
var game_id = $(".page-title h2").attr("match-id");

$(document).ready(function () {

    var start = document.getElementById("start");
    var pauze = document.getElementById("pauze");
    var play = document.getElementById("play");

    start.addEventListener("click",function startTimer() {
        showTimer();
        timer = getTime();
        myTimer = setInterval(theTimer, 1000);
    });

    pauze.addEventListener("click", function pauseTimer() {
        saveTime();
        clearInterval(myTimer);
        document.getElementById("play").classList.remove("hidden");
        document.getElementById("pauze").classList.add("hidden");
    });

    play.addEventListener("click", function resumeTimer() {
        timer = getTime();
        myTimer = setInterval(theTimer, 1000);
        document.getElementById("pauze").classList.remove("hidden");
        document.getElementById("play").classList.add("hidden");
    });
});

function savepauzeTime() {
    $.ajax('../app/ajax/ajaxManager.php', {
        method: "POST",
        data: {
            "request": 2,
            "id" : game_id
        }
    });
}

function getTime() {
    $.ajax('../app/ajax/ajaxManager.php', {
        method: "POST",
        data: {
            "request": 1,
            "id" : game_id
        }
    }).done(function (data) {
        timer = data;
        console.log(data);
    });
}

function showTimer() {
    document.getElementById("clock").classList.remove("hidden");
    document.getElementById("start").classList.add("hidden");
}

function theTimer() {
    timer++;
    calulateTime = timer;
    var hour = Math.floor(calulateTime / 3600);
    calulateTime = calulateTime % 3600;
    var min = Math.floor(calulateTime / 60);
    calulateTime = calulateTime % 60;
    if (hour != 0) {
        time = hour + ":" + min + ":" + calulateTime;
    }
    else if (min != 0) {
        time = min + ":" + calulateTime;
    }
    else {
        time = calulateTime;
    }

    document.getElementById("time").innerHTML = time;
}