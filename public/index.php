<?php
//'/clients/exec.do';
$voip = new Voiptime($login, $passwod);



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

class VoipClientPhone
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

$voip->createClients(
    true,
    new VoipClient(
        1,
        'SIMPLE',
        'Europe/Kiev',
        new VoipClientFields([
            "id"        => 0,
            "firstname" => "test",
            "lastname"  => "Test",
        ]),
        [new VoipClientPhone('380991117888', 'MOB', true)]
    )
);