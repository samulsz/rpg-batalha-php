<?php

require 'vendor/autoload.php';

use App\Model\Arma;
use App\Model\Heroi;
use App\Model\Monstro;
use App\Model\Batalha;

$espada = new Arma('Espada Longa', 25.0, 'corte');
$arco   = new Arma('Arco Curto', 15.0, 'perfurante');

$heroi  = new Heroi('Arthur', 5, 100);
$heroi->adicionarArma($espada);
$heroi->adicionarArma($arco);

$monstro = new Monstro('Goblin', 100.0, 'fera', 25.0);

$batalha = new Batalha($heroi, $monstro);
$resultado = $batalha->iniciar();

foreach ($resultado->getLog() as $linha) {
    echo $linha . "\n";
}
echo "Vencedor: {$resultado->getVencedor()}\n";