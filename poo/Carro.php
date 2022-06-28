<?php
    include_once('Veiculo.php');
    class Carro extends Veiculo{
        function trocaPneu($qtd){
            if($qtd<=5){
               echo $qtd."pneus trocados <br>"; 
            }
            else{
                echo "Quantidade de Pneus Invalidos, não é um sentopeia <br>";
            }
        }

    }
?>