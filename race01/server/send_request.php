<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: *");
    header("Access-Control-Allow-Headers: *");

    $header = array("Content-Type" => "multipart/form-data");
    $fields = array_merge(['userfile' => curl_file_create(__DIR__ . "/test.png", "image/png", "1.png")], $_POST);
    // print_r($fields);


    $resource = curl_init();
    curl_setopt($resource, CURLOPT_URL, 'http://hearthcards.net/generator_ajax.php');
    curl_setopt($resource, CURLOPT_HTTPHEADER, $header);
    curl_setopt($resource, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($resource, CURLOPT_POST, true);
    curl_setopt($resource, CURLOPT_POSTFIELDS, $fields);;
    $result = json_decode(curl_exec($resource));
    curl_close($resource);

    echo("http://hearthcards.net/".$result->url);
?>