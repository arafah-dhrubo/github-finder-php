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

echo '<p><code>' . $accessToken . '</code</p>';

if($accessToken!=""){
    echo '<p>Logged in</p>';
}else{
    echo "<p><a href='https://github.com/login/oauth/authorize?client_id=$CLIENT_ID'>
    Sign In with Github</a></p>";
}

?>
</body>
</html>