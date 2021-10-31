<?php
function error($msg){
    $response = [];
    $response['success'] = false;
    $response['message'] = $msg;
    return json_encode($response);
}
session_start();
$accessToken = $_SESSION['my_token'];

if($accessToken==""){
    die(error('Invalid access token'));
}

// $URL = "https://api.github.com/user/repos?/authorization_request=".$accessToken."?page=1&per_page=1000";
$URL = "https://api.github.com/user";
var_dump($accessToken);
$authHeader = "Authorization: token $accessToken";
$userAgentHeader = "User-Agent: testapi"; 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $URL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', $authHeader, $userAgentHeader));
$response = curl_exec($ch);


$data = json_decode($response);
curl_close($ch);
?>

<h1><? echo $data->name?></h1>