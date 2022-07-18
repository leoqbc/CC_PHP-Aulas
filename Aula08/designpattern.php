<?php

// Factory

// O problema é do construtor

class User
{
    public function __construct(string $nome, string $email, string $cpf)
    {
        
    }
}

class UserFactory
{
    public static function make()
    {
        return new User('Leonardo', 'email', '333.333.333-33', new Database());
    }
}

// usar em várias partes!
// cria o User via factory
$user = UserFactory::make();

// Template method
interface PaymentActions
{
    public function checkCreditCard(): bool;
    public function validate(): bool;
    public function setCustomerData(): void;
    public function processPayment(): void;
}

class Payment
{
    protected PaymentActions $payment;

    // TemplateMethod
    public function process(array $customerData)
    {
        // factory method
        $payment = $this->payment;

        $payment->setCustomerData($customerData);

        if ($payment->validate() === false) {
            return false;
        }

        if ($payment->checkCreditCard() === false) {
            return false;
        }

        $payment->processPayment();
    }
}

// Decorator
class Validation1
{
    public function execute()
    {
        echo 'executa validation' . PHP_EOL;
    }
}

class Validation2
{
    public function __construct($validation)
    {
        $this->validation = $validation;
    }

    public function execute()
    {
        echo 'Antes' . PHP_EOL;
        $this->validation->execute();
        echo 'Depois'. PHP_EOL;
    }
}


$validation1 = new Validation1();
$validation2 = new Validation2($validation1);
$validation3 = new Validation2($validation2);

$validation3->execute();