<?php include_once 'partials/header.php' ?>
    <?php

    require_once realpath(__DIR__."/vendor/autoload.php");
    use Dotenv\Dotenv;
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    $ACCESS_TOKEN = $_ENV["ACCESS_TOKEN"];


    $URL = "https://api.github.com/repos/Dhrubo-Arafah/CSEFEST2021/commits";

    $authHeader = "Authorization: token ".$ACCESS_TOKEN;
    $userAgentHeader = "User-Agent: testapi";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $URL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', $authHeader, $userAgentHeader));
    $response = curl_exec($ch);
    $data = json_decode($response);
    curl_close($ch);
    $dateArray = [];
    foreach ($data as $i => $commits) {
        $currentDate =  $commits->commit->committer->date;
        $date = date("d-m-Y", strtotime($currentDate)); 
        array_push($dateArray, $date);
    }
    $dateArray=array_count_values($dateArray);
    ?>
    <table class="table container table-striped text-center">
        <tr>
            <th>Date</th>
            <th>Commits</th>
        </tr>
        <?php
        foreach ($dateArray as $date => $count) : ?>
            <tr>
                <td><?php echo $date ?></td>
                <td><?php echo $count ?></td>
            </tr>
        <?php endforeach ?>
        </table>
<?php include_once 'partials/footer.php' ?>