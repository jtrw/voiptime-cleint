<?php

namespace Jtrw\Voiptime\Client;

class VoipClientFields
{
    private array $fields;
    
    /**
     * @param array $fields
     */
    public function __construct(array $fields)
    {
        $this->fields = $fields;
    }
    
    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->fields;
    }
}