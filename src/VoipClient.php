<?php

namespace Jtrw\Voiptime;

use Jtrw\Voiptime\Client\VoipClientAddress;
use Jtrw\Voiptime\Client\VoipClientEmail;
use Jtrw\Voiptime\Client\VoipClientFields;
use Jtrw\Voiptime\Client\VoipClientPhone;
use Ramsey\Uuid\Uuid;

class VoipClient
{
    private int $clientRoleId;
    private string $type;
    private string $timeZone;
    private VoipClientFields $fields;
    private array $clientPhones;
    private array $addresses;
    private array $emails;
    
    /**
     * @param int $clientRoleId
     * @param string $type
     * @param string $timeZone
     * @param VoipClientFields $fields
     * @param VoipClientPhone[] $clientPhones
     * @param VoipClientAddress[] $addresses
     * @param VoipClientEmail[] $emails
     */
    public function __construct(
        int          $clientRoleId,
        string       $type,
        string       $timeZone,
        VoipClientFields $fields,
        array        $clientPhones,
        array        $addresses = [],
        array        $emails = []
    )
    {
        $this->clientRoleId = $clientRoleId;
        $this->type = $type;
        $this->timeZone = $timeZone;
        $this->fields = $fields;
        $this->clientPhones = $clientPhones;
        $this->addresses = $addresses;
        $this->emails = $emails;
    } // end __construct
    
    /**
     * @return array
     */
    public function toArray(): array
    {
        $client = [
            "uuid"         => Uuid::uuid6()->toString(),
            "clientRoleId" => $this->clientRoleId,
            "type"         => $this->type,
            "timeZone"     => stripslashes($this->timeZone),
            "fields"       => $this->fields->toArray(),
        ];
        
        foreach ($this->clientPhones as $clientPhone) {
            $client['phones'][] = $clientPhone->toArray();
        }
        $client['addresses'] = [];
        foreach ($this->addresses as $address) {
            $client['addresses'][] = $address->toArray();
        }
    
        $client['emails'] = [];
        foreach ($this->emails as $email) {
            $client['emails'][] = $email->toArray();
        }
        
        return $client;
    } // end toArray
}