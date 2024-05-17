<?php

declare(strict_types=1);

use PhpMqtt\Client\MqttClient;
use PhpMqtt\Client\Repositories\MemoryRepository;

return [
    'default' => [
        'host' => 'broker.emqx.io',
        'port' => 1883,
        'username' => 'esp8266',
        'password' => 'esp8266',
        'client_id' => 'your-client-id',
        'protocol' => 'mqttv311',
        'quality_of_service' => 0,
        'keep_alive' => 60,
        'clean_session' => true,
    ],
];