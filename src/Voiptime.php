<?php

namespace Jtrw\Voiptime;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use JsonException;
use RuntimeException;

class Voiptime
{
    public const API_URL = "https://smart-sms.voiptime.net/api/v1";
    
    private string $login;
    private string $password;
    private Client $httpClient;
    
    public function __construct(string $login, string $password)
    {
        $this->login = $login;
        $this->password = $password;
        
        $this->httpClient = new Client(
            [
                'http_errors' => false,
            ]
        );
    } // end __construct
    
    public function createClients(bool $recovery, VoipClient ...$clients): array
    {
        $data['recovery'] = $recovery;
        
        foreach ($clients as $client) {
            $data['clients'][] = $client->toArray();
        }
        
        $url = static::API_URL.'/clients/exec.do';
        
        $headers = [
            'Content-Type' => 'application/json',
        ];
        
        $httpResponse = $this->httpClient->request(
            'POST',
            $url,
            [
                'auth'    => [$this->login, $this->password],
                'json'    => $data,
                'headers' => $headers
            ]
        );
        
        return $this->getPreparedResponse($httpResponse);
    } // end createClients
    
    public function addClientToTacsByCampaignId(int $campaignID, int $maxCallCount, bool $disableDuplicatePhonesValidation, array $clients)
    {
        $url = static::API_URL."/tacs/campaigns/{$campaignID}/exec.do";
        
        $data = [
            'maxCallCount'                     => $maxCallCount,
            'disableDuplicatePhonesValidation' => $disableDuplicatePhonesValidation,
            'clients'                          => $clients
        ];
        
        $headers = [
            'Content-Type' => 'application/json',
        ];
        
        $httpResponse = $this->httpClient->request(
            'POST',
            $url,
            [
                'auth'    => [$this->login, $this->password],
                'json'    => $data,
                'headers' => $headers
            ]
        );
    
        return $this->getPreparedResponse($httpResponse);
    }
    
    protected function getPreparedResponse(ResponseInterface $httpResponse): array
    {
        $responseBody = $httpResponse->getBody()->getContents();
        
        try {
            $response = json_decode($responseBody, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            $response = null;
        }
        
        if (!$response) {
            throw new RuntimeException($responseBody);
        }
        
        return $response;
    } // end getPreparedResponse
    
}