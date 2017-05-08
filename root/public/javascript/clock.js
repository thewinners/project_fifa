function theTimer() {
    timer++;
    calulateTime = timer;
    var hour = Math.floor(calulateTime / 3600);
    calulateTime = calulateTime % 3600;
    var min = Math.floor(calulateTime / 60);
    calulateTime = calulateTime % 60;
    if (hour != 0)
    {
        var time = hour+":"+min+":"+calulateTime;
    }
    else if (min != 0)
    {
        var time = min+":"+calulateTime;
    }
    else
    {
        var time = calulateTime;
    }

    document.getElementById("time").innerHTML = time;

}