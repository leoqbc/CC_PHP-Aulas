<?php

class CPF
{
    public string $cpf;

    public function __construct(string $cpf)
    {
        # validar
        $this->value = $cpf;
    }
}

class Customer
{
    protected string $nome;
    protected string $email;
    protected $cpf;

    // associação 1 pra 1
    public function setCpf(CPF $cpf)
    {
        $this->cpf = $cpf;
    }
}

$cliente = new Customer();

// ação de associar um objeto a outro
$cliente->setCpf(new CPF('333.333.333-33'));