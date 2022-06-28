<?php
    class Veiculo{
        private $velocidade;        
        /**
         * Get the value of velocidade
         */ 
        public function getVelocidade()
        {
                return $this->velocidade;
        }
        /**
         * Set the value of velocidade
         *
         * @return  self
         */ 
        public function setVelocidade($velocidade)
        {
                $this->velocidade = $velocidade;

                return $this;
        }
        public function aumentarVelocidade($aumento){
            if($this->velocidade+=$aumento<=200){
                $this->velocidade+=$aumento;
            }
            else{
                echo "Sr. Motorista, o aumento de ".$aumento.
                " fará com passe de 200km/h que nã oé permitido na via"; 
            }
        }
        public function reduzirVelocidade($reducao){
            if($this->velocidade-=$reducao<0){
                echo "Sr. Motorista, não é permitido velocidade negativa";
            }
            else{
                $this->velocidade-=$reducao;
            }
            
        }
        public function mudaDirecao($direcao){
            switch($direcao) {
                case '0':
                    echo "esquerda";
                    break;
                case '1':
                    echo "direita";
                    break;
                default:
                    echo "invalida";
                    break;
            }
        }
    }
?>