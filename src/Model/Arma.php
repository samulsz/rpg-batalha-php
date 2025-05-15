<?php

// src/Model/Arma.php
namespace App\Model;

class Arma {
    private string $nome;
    private float $dano;
    private string $tipo;

    public function __construct(string $nome, float $dano, string $tipo) {
        $this->nome = $nome;
        $this->dano = $dano;
        $this->tipo = $tipo;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getDano(): float {
        return $this->dano;
    }

    public function getTipo(): string {
        return $this->tipo;
    }

    public function __toString(): string {
        return "{$this->nome} (Dano: {$this->dano}, Tipo: {$this->tipo})";
    }
}

