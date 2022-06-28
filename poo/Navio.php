<?php
include_once('Veiculo.php');
class Navio extends Veiculo{
    public function mudaDirecao($direcao){
        switch($direcao) {
            case '0':
                echo "bombordo";
                break;
            case '1':
                echo "estibordo";
                break;
            default:
                echo "invalida";
                break;
        }
    }
}
?>