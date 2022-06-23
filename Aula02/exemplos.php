<?php
// Mal otimizado
$numbers = [];

for ($i = 0; $i <= 10000; $i++) {
    $numbers[] = $i * $i;
}

foreach ($numbers as $number) {
    echo $number;
}
echo "\n\n\n";
echo memory_get_peak_usage();

// bem otimizado
for ($i = 0; $i <= 10000; $i++) {
    echo $i * $i;
}
echo "\n\n\n";
echo memory_get_peak_usage();

// Evite multiplos loops
// Solução
foreach ($customers as &$customer) {
    filtro1($customer);
    filtro2($customer1);
    filtro3($customer2);
}

// Exemplo em Laravel
// quanto clientes? hoje dez amanhã um milhão!
$customers = Customer::all();

foreach ($customers as $customer) {
    // ...
}

// Otimizando
foreach (Customer::lazy() as $customer) {
    // ...carrega um a um os clientes
}

// Fatching no PDO
// Mal otimizado
$pdo =  new PDO(...);

$statement = $pdo->prepare('SELECT * FROM customers');

$statement->execute();

$customers = $statement->fetchAll();

foreach ($customers as $customer) {
    // ...
}

// Otimizado
$pdo =  new PDO(...);

$statement = $pdo->prepare('SELECT * FROM customers');

$statement->execute();

// a cada resultado puxado do banco
// um alocamento por loop
while ($customer = $statement->fetch()) {
    // ...
}

// Streams - problemas
// aloca TODO o arquivo em memória!!!!!
$arquivoGrande = file_get_contents('lista.csv');


// Solução
// abrir o arquivo para leitura
$handler = fopen('lista.csv', 'r');

// Leitura linha a linha
while ($line = fgetcsv($handler, 1000)) {
    $filter = filter1($line);

    // adiciona ao arquivo saida
    // usamos o file_* porque controlamos por linha
    file_put_contents('saida.csv', $filter, FILE_APPEND | LOCK_EX);
}

