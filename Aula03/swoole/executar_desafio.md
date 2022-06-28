# Desfio de Async


## Resolva o problema abaixo

### Desafio Assincronismo
Fazer um script que deve em uma corrotina colocar em channel os valores da array, dobrando o valor numérico (* 2), aguardando de 1 em 1 segundo para adicionar no channel.

Em outra corrotina aguardar a entrada do valor no channel e exibir no console o resultado
obs: serão 2 corrotinas distintas, e não se esqueça de fechar o channel apos completar os valores

##### Rodar o script em cli com Swoole
```docker compose exec phpswoole php desafio.php```

##### Base o script
```php
Co\run(function () {
    $nums1 = [1.2, 4.3, 7.8, 4.5];
    $channel = new Swoole\Coroutine\Channel(1);

    // sua corrotinas aqui ...

});
```
