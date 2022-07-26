<?php

namespace CampusCode;

use GuzzleHttp\Client;

class Cep
{
    protected string $cep;

    public function __construct(string $cep)
    {
        if (false === $this->validaCep($cep)) {
            throw new \Exception("Cep inválido");
        }
        
        $this->cep = $cep;
    }

    public function validaCep(string $cep): bool
    {
        return (bool)preg_match('#^[0-9]{5}\-[0-9]{3}$#', $cep);
    }

    public function getValue()
    {
        return $this->cep;
    }

    public function getRemoteData(Client $client)
    {
        $result = $client->get('https://api.postmon.com.br/v1/cep/' . $this->cep);

        $body = (string)$result->getBody();

        return json_decode($body);
    }
}