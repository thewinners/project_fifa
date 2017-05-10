var time;
var myTimer;
var timer_the_time = 0;
var timer = timer_the_time;
var game_id = $(".page-title h2").attr("match-id");
var match_time = 10;
var extra_time = 3;

$(document).ready(function () {

    var start = document.getElementById("start");
    var pause = document.getElementById("pauze");
    var play = document.getElementById("play");

    start.addEventListener("click",function () {
        showTimer();
        getStartTime();
        myTimer = setInterval(theTimer, 1000);
    });

    pause.addEventListener("click", function () {
        savePauseTime();
        clearInterval(myTimer);
        document.getElementById("play").classList.remove("hidden");
        document.getElementById("pauze").classList.add("hidden");
    });

    play.addEventListener("click", function () {
        getTime();
    });
});

function savePauseTime() {
    $.ajax('../app/ajax/ajaxManager.php', {
        method: "POST",
        data: {
            "request": 2,
            "id" : game_id
        }
    });
}

function getStartTime() {
    $.ajax('../app/ajax/ajaxManager.php', {
        method: "POST",
        data: {
            "request": 1,
            "id" : game_id
        }
    }).done(function (data) {
        timer_the_time = data;
    });
}

function getTime() {
    $.ajax('../app/ajax/ajaxManager.php', {
        method: "POST",
        data: {
            "request": 3,
            "id" : game_id
        }
    }).done(function (data) {
        timer_the_time = data;
        startTimer();
    });
}

function startTimer() {
    myTimer = setInterval(theTimer, 1000);
    document.getElementById("pauze").classList.remove("hidden");
    document.getElementById("play").classList.add("hidden");
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

    calulateTime = extra_time;
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
    document.getElementById("extraTime").innerHTML = "".time;

    if (match_time <= timer)
    {
        var temp = match_time + extra_time;
        if (temp == timer)
        {
            clearInterval(myTimer);
            document.getElementById("time").innerHTML = "Done";
        }
    }
}