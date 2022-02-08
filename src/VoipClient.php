<?php

namespace Jtrw\Voiptime;

class VoipClient
{
    private int $clientRoleId;
    private string $type;
    private string $timeZone;
    private VoipClientFields $fields;
    private array $clientPhones;
    private array $address;
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
    }
    
    public function toArray(): array
    {
        $client = array(
            "uuid"         => uniqid(),
            "clientRoleId" => $this->clientRoleId,
            "type"         => $this->type,
            "timeZone"     => stripslashes($this->timeZone),
            "fields"       => $this->fields->toArray(),
        );
        
        foreach ($this->clientPhones as $clientPhone) {
            $client['phones'][] = $clientPhone->toArray();
        }
        
        foreach ($this->addresses as $address) {
            $client['addresses'][] = $address->toArray();
        }
        
        foreach ($this->emails as $email) {
            $client['emails'][] = $email->toArray();
        }
    }
}