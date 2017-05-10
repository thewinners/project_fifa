var game_time;
var player_id;

$(document).ready(function () {

    var plusButtons = document.getElementsByClassName("plus");
    var minusButtons =  document.getElementsByClassName("minus");

    for (var i;i < plusButtons.length;i++)
    {
        plusButtons[i].addEventListener("click", function() {
            player_id = $(this).parent().attr('data-id');
            game_time = getTime();

            $.ajax("../app/ajax/ajaxManager.php", {
                method: "POST",
                data: {
                    "request" : 4,
                    "id" : game_id,
                    "player" : player_id
                }
            });
            updateScore();
        });

        minusButtons[i].addEventListener("click",function() {
            player_id = $(this).parent().attr('data-id');

            $.ajax("../app/ajax/ajaxManager.php", {
                method: "POST",
                data: {
                    "request" : 5,
                    "id" : game_id,
                    "player" : player_id
                }
            });
            updateScore();
        });
    }
});

function updateScore() {
    $.ajax("../app/ajax/ajaxManager.php", {
        method: "POST",
        data: {
            "request" : 6,
            "id" : game_id
        }
    }).done(function (data) {
        document.getElementById("score").innerHTML = data;
    });
}