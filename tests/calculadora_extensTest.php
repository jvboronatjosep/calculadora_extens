<?php

use PHPUnit\Framework\TestCase;
use App_Calculadora_extens\Calculadora_extens;

class Calculadora_extensTest extends TestCase{
    public function testSuma(){
        $calc = new Calculadora_extens;
        $this->assertEquals(5, $calc->suma(2,3));
    }

    public function testResta(){
        $calc = new Calculadora_extens;
        $this->assertEquals(1, $calc->resta(3,2));
    }

    public function testMultiplicacion(){
        $calc = new Calculadora_extens;
        $this->assertEquals(4, $calc->multiplicacion(2,2));
    }

    public function testDivision(){
        $calc = new Calculadora_extens;
        $this->assertEquals(5, $calc->division(10,2));
    }
}