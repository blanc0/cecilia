<?php
    include 'cecilia/cecilia.bootstrap.php';

    use cecilia\core\API,
        cecilia\model\Response;

    header("Content-Type: application/json");

    $api = new API();

    $response = $api->call();

    if ($response instanceof Response) {
        //header("Status: 200");
        die(json_encode($response));
    } else {
        //header("Status: 404 Not Found");
    }
