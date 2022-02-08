<?php

namespace Jtrw\Voiptime\Client;

class VoipClientFields
{
    private array $fields;
    
    public function __construct(array $fields)
    {
        $this->fields = $fields;
    }
    
    public function toArray(): array
    {
        return $this->fields;
    }
}