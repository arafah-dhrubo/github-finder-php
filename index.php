<?php include_once 'partials/header.php' ?>
<?php
session_start();
$accessToken = $_SESSION['my_token'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    // see https://developer.github.com/v3/#user-agent-required

    if ($accessToken != "") {
        echo '<p>Logged in</p>';
        echo '<p><code> Current Access Token' . $accessToken . '</code</p>';
    }
    ?>
    <form action="" class="container mx-auto d-flex justify-content-center align-items-center flex-column vh-100" method="POST">
        <label for="access_token">Access Token</label>
        <input class="form-control" placeholder="Access Token" name="active_token" id="access_token">
        <input class="btn btn-primary w-100" type="submit" value="See Private Repositories">
    </form>
    <?php include_once 'partials/footer.php' ?>