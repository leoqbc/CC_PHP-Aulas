<?php

// Responsabilidade única SRP(Single Responsability Principle)

// Conexão, erros, segurança
// Generica
class Database
{
    public function config(\PDO $con)
    {
        # code...
    }

    public function query(string $query)
    {
        # insert
    }
}

// Query
class QueryBuilder
{

}

// Open / Closed (Open to extension, Closed to modification OCP)
class Leilao
{
    const STAFF = 1;

    public array $conditions;

    public function makeDeal(float $valor)
    {
        foreach ($this->conditions as $condition) {
            $condition->execute($valor, $this->user, $this->expected);
        }
        // # code...
        // if ($valor === 0) {
        //     return false;
        // }

        // if ($valor < $this->expected) {
        //     return false;
        // }
        
        // if ($valor > 1_000_000 && $this->user === self::STAFF) {
        //     return false;
        // }
    }
}

class MaximunValueNotStaff implements DealCondition
{
    public function execute($valor, $user, $expected)
    {
        if ($valor > 1_000_000 && $this->user === self::STAFF) {
            return false;
        }
        return true;
    }
}

// Open/Closed (aberto para injetar novas condições)
// não devemos criar condicionais na class leilão, mas sim adiciona-los por outras
// classes(objetos)
$leilao->addConditions(new MaximunValueNotStaff());
$leilao->addConditions(new ValueAttend());
$leilao->makeDeal();

// Liskov Substitution
class Log implements OutputLogHandler
{
    // substituivel / troca de comportamento
    protected OutputLogHandler $logHandler;

    public function __construct(OutputLogHandler $logHandler)
    {
        $this->logHandler = $logHandler;
    }

    public function writeLog(string $message)
    {
        $this->logHandler->writeLog($message);
    }
}

interface OutputLogHandler 
{
    public function writeLog(string $message);
}

class OutputFile implements OutputLogHandler
{
    public function writeLog(string $message)
    {
        # code...
    }
}

class OutputConsole implements OutputLogHandler
{
    public function writeLog(string $message)
    {
        # code...
    }
}

// podemos substituir a classe OutputFile pela OutputLog
// Container de injeção (cofig)
$logger = new Log(new OutputFile());

$logger->writeLog('Criando um log do sistema');

// Interface segreggation
interface BankOperations
{
    public function withDraw(float $amount);
}

interface BankCosts
{
    public function monthlyCost();
}

// Conta Corrente e Conta Poupança
class ContaCorrente implements BankCosts, BankOperations
{
    public function withDraw(float $amount)
    {

    }

    public function monthlyCost()
    {

    }
}

// Dependency Inversion

// receber client do RabbitMQ
class QueueHandler
{
    public function putMessage()
    {

    }
}

// class PDOPersistence implements PersistenceMode
// {

// }

// class Persistence
// {
//     public function __construct(PersistenceMode $persistence)
//     {
//         $this->pdo = $pdo;
//     }
// }

// $persistence = new Persistence(new QueuePersistence());