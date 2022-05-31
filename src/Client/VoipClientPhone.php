<?php

namespace Jtrw\Voiptime\Client;

class VoipClientPhone
{
    public const PHONE_TYPE_MOBILE = "MOB";
    public const PHONE_TYPE_HOME   = "HOME";
    public const PHONE_TYPE_WORK   = "WORK";
    public const PHONE_TYPE_FAX    = "FAX";
    
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