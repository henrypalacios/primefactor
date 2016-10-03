<?php


class FactorPrimo
{
    private $numero;
    private $maximoDivisor;
    private $divisorActual;
    private $maxFactor;

    public function __construct($numero)
    {
        $this->setNumero($numero);
        $this->setMaximoDivisor(2);
        $this->setDivisorActual(2);

    }

    private function setNumero($numero)
    {
        if ($numero <= 1) {
            throw new Exception(
                'Un número distinto de cero es compuesto si tiene más de dos divisores.'
            );
        }
        $this->numero = $numero;
    }

    private function setDivisorActual($divisorActual)
    {
        $this->divisorActual = $divisorActual;
    }

    private function setMaximoDivisor($maximoDivisor)
    {
        $this->maximoDivisor = $maximoDivisor;
    }

    public function calculate()
    {
        $this->descartarPares();
        $this->obtenerRaiz();
        $this->obtenerDivisor();
        $this->evaluarDivisor();

        return $this->maximoDivisor;
    }

    private function descartarPares()
    {
        while ($this->numero % 2 == 0) {
            $this->maximoDivisor = $this->divisorActual;
            $this->numero = $this->numero / $this->divisorActual;
        }
        $this->setDivisorActual(3);
    }

    private function obtenerRaiz()
    {
        $this->maxFactor = $this->numero ** 0.5;
    }

    private function evaluarDivisor()
    {
        if ($this->divisorActual > $this->maxFactor and $this->numero > $this->maximoDivisor) {
            $this->setMaximoDivisor($this->numero);
        }
    }

    private function obtenerDivisor()
    {
        while (
            $this->divisorActual <= $this->numero
            and $this->divisorActual <= $this->maxFactor
        ) {
            while ($this->numero % $this->divisorActual == 0) {
                $this->maximoDivisor = $this->divisorActual;
                $this->numero = $this->numero / $this->divisorActual;
            }
            $this->setDivisorActual($this->divisorActual + 2);
        }
    }

}