<?php

class MercadoPagoSDK { public function processPayment() { } }

class NubankSDK { }

// Desacople a classe Payment para poder pagar com outros
// formatos como ex: Nubank, MercadoPago e etc...
class Payment
{
    public function processPayment($customerData)
    {
        # não programar
        $mercadoPago = new MercadoPagoSDK();
        $mercadoPago->processPayment();
    }
}