$(document).ready(function () {
    var time;
    var myTimer;
    var timer;

    document.getElementById("start").addEventListener("click",function startTimer() {
        showTimer();
        resumeTimer();
    });

    function showTimer() {
        document.getElementById("clock").classList.remove("hidden");
        document.getElementById("start").classList.add("hidden");
    }

    document.getElementById("pauze").addEventListener("click", function pauseTimer() {
        saveTime();
        clearInterval(myTimer);
        document.getElementById("play").classList.remove("hidden");
        document.getElementById("pauze").classList.add("hidden");
    });

    document.getElementById("play").addEventListener("click", function resumeTimer() {
        timer = getTime();
        myTimer = setInterval(theTimer, 1000);
        document.getElementById("pauze").classList.remove("hidden");
        document.getElementById("play").classList.add("hidden");
    });

    function saveTime() {
        $.ajax('../../app/ajax/ajaxManager.php', {
            method: "POST",
            data: {
                "request": 2,
                "time": timer
            }
        });
    }

    function getTime() {
        $.ajax('../../app/ajax/ajaxManager.php', {
            method: "POST",
            data: {
                "request": 1
            }
        }).done(function (data) {
            timer = data;
        });
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

        if (calulateTime % 5) {
            saveTime();
        }
    }
});