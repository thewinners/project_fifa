<?php
include_once ("tamplates/header.php");

if (isset($_SESSION["logged"]))
{
    echo
    "<div class='page-title'>
            <h2>Register</h2>
        </div>
        <div class='wrapper'>
        <form action='../app/register/RegisterManager.php' method='post'>
            <div class='group-form'>
                <label for='username'>Username:</label>
                <input type='text' id='username' name='username' class='textarea' required>
            </div>
            <div class='group-form'>
                <label for='email'>Email:</label>
                <input type='email' id='email' name='email' class='textarea' required>
            </div>
            <div class='group-form'>
                <label for='password'>Password:</label>
                <input type='password' id='password' name='password' class='textarea'>
            </div>
            <div class='group-form'>
                <label for='email'>Confirm password:</label>
                <input type='password' id='confirmPassword' name='confirmPassword' class='textarea' required>
            </div>
            <div class='group-form'>
                <label for='email'>Studentnumber:</label>
                <input type='text' id='studentNumber' name='studentNumber' class='textarea' required>
            </div>
            <div class='group-form'>
                <input type='submit' value='Submit' class='button'>
            </div>
        </form>
    </div>";
}
else
{
    echo
    "
        <h2> No permission for this area. </h2>
    ";
}
?>
