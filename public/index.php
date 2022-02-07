<?php
//'/clients/exec.do';
$voip = new Voiptime($login, $passwod);

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

class Client
{
    private int $clientRoleId;
    private string $type;
    private string $timeZone;
    private ClientFields $fields;
    private array $clientPhones;
    private array $address;
    private array $emails;
    
    /**
     * @param int $clientRoleId
     * @param string $type
     * @param string $timeZone
     * @param ClientFields $fields
     * @param ClientPhone[] $clientPhones
     * @param ClientAddress[] $addresses
     * @param ClientEmail[] $emails
     */
    public function __construct(
        int          $clientRoleId,
        string       $type,
        string       $timeZone,
        ClientFields $fields,
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

class ClientFields
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

class ClientPhone
{
    private string $phoneNumber;
    private string $type;
    private bool $active;
    
    public function __construct(string $phoneNumber, string $type, bool $active)
    {
        $this->phoneNumber = $phoneNumber;
        $this->type = $type;
        $this->active = $active;
    }
    
    public function toArray(): array
    {
        return [
            "phoneNumber" => $this->phoneNumber,
            "type"        => $this->type,
            "active"      => $this->active
        ];
    }
}

class ClientAddress
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

class ClientEmail
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

$voip->createClients(
    true,
    new Client(
        1,
        'SIMPLE',
        'Europe/Kiev',
        new ClientFields([
            "id"        => 0,
            "firstname" => "test",
            "lastname"  => "Test",
        ]),
        [new ClientPhone('380991117888', 'MOB', true)]
    )
);