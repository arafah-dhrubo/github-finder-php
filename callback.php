<?php 

$code = $_GET['code'];

if($code==""){
    header('Location: http://api.test/user.php');
    exit;
}

$CLIENT_ID = "39ff0a6efdeefd38fefb";
$CLIENT_SECRET = "18b6a1a49b8d1d1277cd5aa9fc39fe50645ad3d3";
$URL = "https://github.com/login/oauth/access_token";

$postParams = [
    'client_id'=>$CLIENT_ID,
    'client_secret'=>$CLIENT_SECRET,
    'redirect_url'=>'https://api.test/user.php',
    'code'=>$code
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $URL);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postParams);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
$response = curl_exec($ch);
curl_close($ch);
$data = json_decode($response);

if($data->access_token!=""){
    session_start();
    $_SESSION['my_token'] = $data->access_token;
    header('Location: user.php');
    exit;
}

?>