<?php

namespace Jtrw\Voiptime\Client;

class VoipClientAddress
{
    private string $address;
    private string $type;
    private bool $active;
    
    /**
     * @param string $address
     * @param string $type
     * @param bool $active
     */
    public function __construct(string $address, string $type, bool $active)
    {
        $this->address = $address;
        $this->type = $type;
        $this->active = $active;
    } // end __construct
    
    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            "address" => $this->address,
            "type"    => $this->type,
            "active"  => $this->active
        ];
    } // end toArray
}