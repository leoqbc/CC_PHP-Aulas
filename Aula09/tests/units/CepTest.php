<?php

use CampusCode\Cep;

use PHPUnit\Framework\TestCase;

class CepTest extends TestCase
{

    // public function testASomaDeDoisValores()
    // {
    //     $total = 2 + 3;

    //     //verifica o resultado deve ser 4
    //     $this->assertEquals(4, $total);
    // }

    protected Cep $cep;

    // Fixtures roda no inicio de cada método de teste
    public function setUp(): void
    {
        $this->cep = new Cep('12345-333');
    }

    // Fixture que roda no fim de cada método de teste
    public function tearDown(): void
    {
        unset($this->cep);
    }

    public function testVerificaCepValido()
    {
        $resultado = $this->cep->validaCep($this->cep->getValue());

        $this->assertTrue($resultado);
    }

    // Ideia de cenário de testes
    public function cepExceptionDataProvider(): array
    {
        return [
            ['22222-F22', 'Exception'],
            ['2A222-F22', 'Exception'],
            ['22R22-F2E', 'Exception'],
            ['22222-2222', 'Exception'],
            ['22222322', 'Exception'],
            ['22222222-3222222', 'Exception'],
            ['2222*2&2-3222-2', 'Exception'],
            ['222-2*2&23222', 'Exception'],
        ];
    }

    /**
     * @dataProvider cepExceptionDataProvider
     */
    public function testValidadeCepConstructorThrowsException(string $cep, string $exception)
    {
        $this->expectException($exception);
        $cep = new Cep($cep);
    }

}