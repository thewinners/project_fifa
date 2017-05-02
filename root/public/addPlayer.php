<?php
require_once ("tamplates/header.php");
require_once ("tamplates/footer.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
</html>
<form action="../app/PlayerAdder.php" method="POST">
    <div class="form-group">
        <label for="first_name">firstname</label>
        <input type="text" name="first_name" class="form-control">
        <label for="last_name">lastname</label>
        <input type="text" name="last_name" class="form-control">
        <label for="student_id">student id</label>
        <input type="text" name="student_id" class="form-control">
        <label for="team_id">Add player</label>
        <input type="text" name="team_id" class="form-control">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary">
    </div>
</form>
