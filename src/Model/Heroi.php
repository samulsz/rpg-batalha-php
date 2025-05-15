<?php

// src/Model/Heroi.php
namespace App\Model;

use App\Model\Arma;

class Heroi {
    private string $nome;
    private int $nivel;
    private float $vida;
    /** @var Arma[] */
    private array $armas;

    public function __construct(string $nome, int $nivel, float $vida, array $armas = []) {
        $this->nome = $nome;
        $this->nivel = $nivel;
        $this->vida = $vida;
        $this->armas = $armas;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getNivel(): int {
        return $this->nivel;
    }

    public function getVida(): float {
        return $this->vida;
    }

    public function setVida(float $vida): void {
        $this->vida = max(0, $vida);
    }

    /** @return Arma[] */
    public function getArmas(): array {
        return $this->armas;
    }

    public function adicionarArma(Arma $arma): void {
        $this->armas[] = $arma;
    }
}

