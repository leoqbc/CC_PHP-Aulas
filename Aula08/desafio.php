<?php

// Crie usando padrões e SOLID uma forma de enviar
// mensagem sem que seja preciso alterar a classe Messenger no futuro

// obs: você deve altera-la para o exercício.

// obs: pode criar outras classes aqui mesmo.
class Messenger
{
    public function sendMessage(string $message, string $device)
    {
        switch ($device) {
            case 'email':
                $this->sendEmail($message);
                return;
            case 'sms':
                $this->sendSMS($message);
                return;
            default:
                throw new \Exception("No message type implemented");
        }
    }

    public function sendEmail()
    {
        echo 'Enviar email';
    }

    public function sendSMS()
    {
        echo 'Enviar sms';
    }
}