<?php

require 'vendor/autoload.php';
//'/clients/exec.do';
use Jtrw\Voiptime\Voiptime;
use Jtrw\Voiptime\VoipClient;
use Jtrw\Voiptime\Client\VoipClientFields;
use Jtrw\Voiptime\Client\VoipClientPhone;

$voip = new Voiptime($login, $passwod);


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
        [new VoipClientPhone('380991117888', 'MOB', true)]
    )
);

print_r($result);