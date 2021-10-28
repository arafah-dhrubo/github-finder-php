<?php include_once 'partials/header.php' ?>
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
$URL = "https://api.github.com/user/repos";
var_dump($accessToken);
$authHeader = "Authorization: token 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";
$userAgentHeader = "User-Agent: testapi"; 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $URL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', $authHeader, $userAgentHeader));
$response = curl_exec($ch);


$data = json_decode($response);
curl_close($ch);
foreach($data as $id=>$repo){
    if($repo->private == 'true'){
    echo '<pre>';
    var_dump($repo->name);
    echo '</pre>';
}

}
?>
<?php include_once 'partials/footer.php' ?>