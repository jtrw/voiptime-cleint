<?php

namespace Jtrw\Voiptime\Client;

class VoipClientEmail
{
    private string $email;
    private bool $active;
    
    /**
     * @param string $email
     * @param bool $active
     */
    public function __construct(string $email, bool $active)
    {
        $this->email = $email;
        $this->active = $active;
    }
    
    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            "email"  => $this->email,
            "active" => $this->active
        ];
    }
}