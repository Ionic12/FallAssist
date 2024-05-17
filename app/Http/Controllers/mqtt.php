<?php

require_once __DIR__ . '/../../../vendor/autoload.php';  // Adjust the path based on your project structure

use PhpMqtt\Client\ConnectionSettings;
use PhpMqtt\Client\MqttClient;

$server = 'broker.emqx.io';
$port = '1883';
$clientId = rand();  // Note: removed the single quotes from rand(5, 15)
$username = 'esp8266';
$password = 'esp8266';
$clean_session = true;

$connectionSettings = (new ConnectionSettings)
    ->setUsername($username)
    ->setPassword($password)
    ->setKeepAliveInterval(60)
    ->setLastWillTopic('esp8266/fallassist/test3')
    ->setLastWillMessage('client disconnect')
    ->setLastWillQualityOfService(0);

$mqtt = new MqttClient($server, $port, $clientId);
$mqtt->connect($connectionSettings, $clean_session);

$mqtt->subscribe('esp8266/praktikum', function ($topic, $message) use ($mqtt) {
    echo $message;
}, 0);

$mqtt->loop(true);

?>