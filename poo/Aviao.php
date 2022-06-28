<?php
include_once ('Veiculo.php');
class Aviao extends Veiculo{
    function mudaDirecao($direcao){
        switch($direcao){
            case 0:
                echo "Esquerda - Sobe";
                break;                
            case 1:
                echo "Esquerda - Desce";
                break;
            case 2:
                echo "Direita - Sobe";
                break;            
            case 3:
                echo "Direita - Desce";
                break;                
            default:
                echo "Invalido";
                break;
        }
    }
}
?>