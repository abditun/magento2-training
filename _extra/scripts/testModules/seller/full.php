<?php
require __DIR__.'/../_tools/init.php';

// Initialize the client
$client = new \SmileCoreTest\RestClient();
$client->setDebug(true);
$client->setMagentoParams($params);
$client->connect();



for($i=0; $i<99; $i++) {

    $object = [
        'object' => [
            'identifier' => 'seller_'.$i,
            'name' => 'seller Test'.$i,
        ]
    ];

    $client->post('rest/V1/seller/', $object);
}

