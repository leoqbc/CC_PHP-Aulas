<?php

class FinancialCustomer
{
    public function __construct(string $nome, CPF $cpf, Datetime $createdAt)
    {
        # code...
    }
}

// Composição
// Tornar obrigatorio o uso de classes externas
// sendo parta da composição do objeto
$cliente = new FinancialCustomer(
    'Leonardo', 
    new CPF('333.333.333-33'), 
    new Datetime('now')
);