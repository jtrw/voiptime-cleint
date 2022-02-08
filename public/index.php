<?php
//'/clients/exec.do';
$voip = new Voiptime($login, $passwod);


$voip->createClients(
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