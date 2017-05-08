<?php
namespace app;

function hideClock()
{
    ?>
    <script>
        document.getElementById("start").classList.remove(hidden);
        document.getElementById("clock").classList.add(hidden);
    </script>
    <?php
}

function startClock()
{
    include_once (__DIR__."/../../config/config.php");

    $timer = 0;
    $eindTime = $matchTime;
    $startTime = time();
    ?>
    <script>
        var myVar = setInterval(theTimer, 1000);
        var timer = <?php echo $timer;?>;
        var eindTime = <?php echo $eindTime;?>;
    </script>
    <?php
    return $startTime;
}

function updateClock()
{

}
?>