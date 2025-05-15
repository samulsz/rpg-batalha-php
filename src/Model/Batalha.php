<?php
// src/Model/Batalha.php
namespace App\Model;

use App\Model\Heroi;
use App\Model\Monstro;
use App\Model\Resultado;

class Batalha {
    private Heroi $heroi;
    private Monstro $monstro;
    private Resultado $resultado;
    private int $turno = 0;

    public function __construct(Heroi $heroi, Monstro $monstro){
        $this->heroi = $heroi;
        $this->monstro = $monstro;
        $this->resultado = new Resultado();
    }

    public function iniciar(): Resultado {
        $nomeHeroi = $this->heroi->getNome();
        $nomeMonstro = $this->monstro->getNome();
        $this->resultado->adicionarLog("Início da batalha: $nomeHeroi vs $nomeMonstro.");

        $turnoDoHeroi = (bool) rand(0, 1);
        $this->resultado->adicionarLog(($turnoDoHeroi ? "$nomeHeroi" : "$nomeMonstro") . " começa atacando!");

        while ($this->heroi->getVida() > 0 && $this->monstro->getVida() > 0) {
            $this->turno++;

            if ($turnoDoHeroi) {
                foreach ($this->heroi->getArmas() as $arma) {
                    $dano = $arma->getDano();
                    $vidaRestante = $this->monstro->getVida() - $dano;
                    $this->monstro->setVida($vidaRestante);
                    $this->resultado->adicionarLog("Turno {$this->turno}: $nomeHeroi ataca com {$arma->getNome()} causando $dano de dano ao $nomeMonstro. Vida restante do $nomeMonstro: {$this->monstro->getVida()}");

                    if ($this->monstro->getVida() <= 0) {
                        $this->resultado->adicionarLog("$nomeMonstro foi derrotado!");
                        $this->resultado->definirVencedor($nomeHeroi);
                        return $this->resultado;
                    }
                }
            } else {
                $dano = $this->monstro->getDano();
                $vidaRestante = $this->heroi->getVida() - $dano;
                $this->heroi->setVida($vidaRestante);
                $this->resultado->adicionarLog("Turno {$this->turno}: $nomeMonstro ataca causando $dano de dano ao $nomeHeroi. Vida restante do $nomeHeroi: {$this->heroi->getVida()}");

                if ($this->heroi->getVida() <= 0) {
                    $this->resultado->adicionarLog("$nomeHeroi foi derrotado!");
                    $this->resultado->definirVencedor($nomeMonstro);
                    return $this->resultado;
                }
            }

            $turnoDoHeroi = !$turnoDoHeroi;
        }

        return $this->resultado;
    }
}