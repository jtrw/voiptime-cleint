<?php

namespace Jtrw\Voiptime\Client;

class VoipClientPhone
{
    private string $phoneNumber;
    private string $type;
    private bool $active;
    
    /**
     * @param string $phoneNumber
     * @param string $type
     * @param bool $active
     */
    public function __construct(string $phoneNumber, string $type, bool $active)
    {
        $this->phoneNumber = $phoneNumber;
        $this->type = $type;
        $this->active = $active;
    }
    
    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            "phoneNumber" => $this->phoneNumber,
            "type"        => $this->type,
            "active"      => $this->active
        ];
    }
}