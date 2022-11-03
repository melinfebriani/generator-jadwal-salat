<?php
// $url = "https://api.myquran.com/v1/sholat/jadwal/1609/2021/06/23";
// $json = file_get_contents($url);
// $response = json_decode($json);
// var_dump($response);

require "core.php";

$api = new Core("provinsi","Aceh","28-10-2022");

var_dump($api->getData());
