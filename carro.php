<?php

class Carro
{
    private string $modelo;
    private int $anoFabricacao;
    private Fabricante $fabricante;

    public function setModelo(string $modelo)
    {
        $this->modelo = $modelo;
    }

    public function setAnoFabricacao(int $anoFabricacao)
    {
        $this->anoFabricacao = $anoFabricacao;
    }

    public function setFabricante(Fabricante $fabricante)
    {
        $this->fabricante = $fabricante;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function getAnoFabricacao()
    {
        return $this->anoFabricacao;
    }

    public function getFabricante()
    {
        return $this->fabricante;
    }
}
