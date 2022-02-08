<?php

namespace Jtrw\Voiptime\Client;

class VoipClientAddress
{
    private string $address;
    private string $type;
    private bool $active;
    
    public function __construct(string $address, string $type, bool $active)
    {
        $this->address = $address;
        $this->type = $type;
        $this->active = $active;
    }
    
    public function toArray(): array
    {
        return [
            "address" => $this->address,
            "type"    => $this->type,
            "active"  => $this->active
        ];
    }
}