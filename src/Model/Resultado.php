<?php
// src/Model/Resultado.php
namespace App\Model;

class Resultado {
    private string $vencedor = '';
    /** @var string[] */
    private array $log = [];

    public function adicionarLog(string $mensagem): void {
        $this->log[] = $mensagem;
    }

    public function definirVencedor(string $nome): void {
        $this->vencedor = $nome;
    }

    public function getVencedor(): string {
        return $this->vencedor;
    }

    /** @return string[] */
    public function getLog(): array {
        return $this->log;
    }
}