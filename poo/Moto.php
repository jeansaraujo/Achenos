<?php
include_once('Veiculo.php');

class Moto extends Veiculo{
    function trocaPneu($qtd){
        if($qtd<=2){
           echo $qtd."pneus trocados <br>"; 
        }
        else{
            echo "Quantidade de Pneus Invalidos, não é um carro<br>";
        }
    }

}
?>