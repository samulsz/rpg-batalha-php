<?php

// src/Model/Monstro.php
namespace App\Model;

class Monstro {
    private string $nome;
    private float $vida;
    private string $tipo;
    private float $dano;

    public function __construct(string $nome, float $vida, string $tipo, float $dano){
        $this->nome = $nome;
        $this->vida = $vida;
        $this->tipo = $tipo;
        $this->dano = $dano;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getVida(): float {
        return $this->vida;
    }

    public function setVida(float $vida): void {
        $this->vida = max(0, $vida);
    }

    public function getTipo(): string {
        return $this->tipo;
    }

    public function getDano(): float {
        return $this->dano;
    }
}