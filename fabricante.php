<?php

class Fabricante
{
    private string $nome;
    private string $sigla;

    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    public function setSigla(string $sigla)
    {
        $this->sigla = $sigla;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getSigla()
    {
        return $this->sigla;
    }
}
