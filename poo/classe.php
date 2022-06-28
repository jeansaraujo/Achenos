<?php
    include ('Moto.php');
    include ('Carro.php');
    include ('Navio.php');
    include ('Aviao.php');

    echo "<br> Moto <br>";
    $kawasaki = new Moto();
    $kawasaki->setVelocidade(100);
    echo $kawasaki->getVelocidade()."<br>";
    $kawasaki->trocaPneu(2);
    $kawasaki->trocaPneu(3);
    $kawasaki->mudaDirecao(0);
    
    echo "<br><br> Carro <br>";
    $bmw = new Carro();
    $bmw->setVelocidade(150);    
    echo $bmw->getVelocidade()."<br>";
    $bmw->trocaPneu(4);
    $bmw->trocaPneu(6);
    $bmw->mudaDirecao(1);

    echo "<br><br>Navio <br>";
    $costa = new Navio();
    $costa->mudaDirecao(0);

    echo "<br><br>Aviao <br>";
    $boing = new Aviao();
    $boing->mudaDirecao(0);
    

?>