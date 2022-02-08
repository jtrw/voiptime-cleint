<?php

require 'vendor/autoload.php';

use Jtrw\Voiptime\Voiptime;
use Jtrw\Voiptime\VoipClient;
use Jtrw\Voiptime\Client\VoipClientFields;
use Jtrw\Voiptime\Client\VoipClientPhone;

$voip = new Voiptime($login, $password);


$result = $voip->createClients(
    true,
    new VoipClient(
        1,
        'SIMPLE',
        'Europe/Kiev',
        new VoipClientFields([
            "id"        => 0,
            "firstname" => "test",
            "lastname"  => "Test",
        ]),
        [new VoipClientPhone('380991117978', 'MOB', true)]
    )
);
/*
Array
(
    [createResult] => Array
    (
        [0] => Array
        (
            [uuid] => 1ec88bc0-9908-66c0-a755-3af9d3d6c622
[result] => Success
[createdClientId] => 14990805
                )

        )

)
*/


$clients = [
    [
        'clientIdentifiers' => [
            'id' => $result['createResult'][0]['createdClientId'] ?? 0
        ],
    ]
];
$result = $voip->addClientToTacsByCampaignId(
    108,
    10,
    false,
    $clients);
print_r($result);
exit;