# Voiptime

## Install

```
composer require jtrw/voiptime-cleint
```

## Documentations

[api.voiptime.net](https://api.voiptime.net)

### Implemented

Implemented methods

1. `/clients/exec.do` - createClients
1. `/tacs/campaigns/{$campaignID}/exec.do` - addClientToTacsByCampaignId

### Use

```php
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
    $clients
);
```