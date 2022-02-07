<?php

class Voiptime
{
    public const API_URL = "https://smart-sms.voiptime.net/api/v1";
    
    private string $login;
    private string $password;
    
    public function __construct(string $login, string $password)
    {
        $this->login = $login;
        $this->password = $password;
    }
    
    public function createClients(bool $recovery, Client ...$clients)
    {
        $data['recovery'] = $recovery;
        
        foreach ($clients as $client) {
            $data['clients'][] = $client->toArray();
        }
        
    }
}