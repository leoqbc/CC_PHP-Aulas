<?php

function operacao_lenta() {
    sleep(2);
    echo 'Operação acabou';
}

operacao_lenta();

echo <<<JSON
{
    "hello": "world"
}
JSON;
