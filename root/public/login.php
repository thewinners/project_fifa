<?php
include_once ("tamplates/header.php");
?>
    <div class="page-title">
        <h2>Login</h2>
    </div>
    <div class="wrapper">
        <form action="" method="">
            <div class="group-form">
                <label for="usernameoremail">Username or Email:</label>
                <input type="text" id="usernameoremail"name="usernameoremail" class="textarea">
            </div>
            <div class="group-form">
                <label for="password">Password:</label>
                <input type="text" id="password" name="password" class="textarea">
            </div>
            <div class="group-form">
                <input type="submit" value="Submit" class="button">
            </div>
        </form>
    </div>
<?php
include_once ("tamplates/footer.php");
?>