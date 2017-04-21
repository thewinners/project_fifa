<?php
include_once ("tamplates/header.php");
?>
    <div class="page-title">
        <h2>Login</h2>
    </div>
    <div class="wrapper">
        <?php
            if (isset($_SESSION["logged"]))
            {
                if ($_SESSION["logged"])
                {
                    echo "<p> Logged in </p>";
                    unset($_SESSION["error"]);
                }
                else
                {
                    echo "<p>" . $_SESSION["error"] . "</p>";
                    unset($_SESSION["error"]);
                }
            }
        ?>
        <form action="../app/login/LoginManager.php" method="post">
            <div class="group-form">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" class="textarea">
            </div>
            <div class="group-form">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="textarea">
            </div>
            <div class="group-form">
                <input type="submit" value="Submit" class="button">
            </div>
        </form>
    </div>
<?php
include_once ("tamplates/footer.php");
?>