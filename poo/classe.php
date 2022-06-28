<?php
include ('Util.php');
class Carro{    
    private $velocidade;    
    function getVelocidade(){
        return $this->velocidade;
    }
    function setVelocidade($nova){
        $this->velocidade = $nova;
    }
    function acelerar($aumento){
        if($this->velocidade+$aumento>100){
            echo "<br>O aumento velocidade de ".$aumento." 
            ultrapassa a permitida na via"; 
        }
        else{
            $this->velocidade += $aumento;
        }       
    }
    function frear(){
        $this->velocidade-=10; 
    }      
}
$carro1 = new Carro();
$carro1->setVelocidade(20);
echo $carro1->getVelocidade();
$carro1->acelerar(30);
echo "<br>";
echo $carro1->getVelocidade();
$carro1->acelerar(51);
echo "<br>";
echo $carro1->getVelocidade();
?>