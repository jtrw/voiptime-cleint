<?php

namespace Jtrw\Voiptime\Client;

class VoipClientEmail
{
    private string $email;
    private bool $active;
    
    public function __construct(string $email, bool $active)
    {
        $this->email = $email;
        $this->active = $active;
    }
    
    public function toArray(): array
    {
        return [
            "email"  => $this->email,
            "active" => $this->active
        ];
    }
}