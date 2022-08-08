<?php 
    $user = new Handling();
    $categorias = $user->listaCategorias();
    //var_dump($categorias);
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
		$userReg	= $user->userProfesionalRegistration($_POST);
	}
?>

<div class="row">
    <div class="col">
        <p class="h2 text-center p-3 text-primary mt-3">Seu Perfil Profissional</p>
    </div>
</div>

<?php if (isset($userReg)){ echo $userReg;} ?>

<div class="row">
    <div class="col mt-1">
        <form action="<?php
                         if(isset($_GET['acao'])){
                            echo "index.php?page=perfil&acao=".$_GET['acao'];
                         }
                       ?>
                       "
         method="POST">
            <input type="hidden" name="id" value="<?php echo Session::get('id')?>
            ">  
            <input type="hidden" name="acao" value="<?php echo $_GET['acao']?>
            ">            
            <input type="text" class="form-control" name="endereco" placeholder="Endereço">
            <input type="text" class="form-control" name="bairro" placeholder="Bairro">
            <input type="text" class="form-control" name="cidade" placeholder="Cidade">            
            <input type="tel" class="form-control" name="contato" placeholder="Contato" maxlength="14">
            <select class="form-control" name="servico1" aria-placeholder="Especialidades" required>
                <?php
                    foreach($categorias as $cat){
                        echo "<option value='".$cat['id']."'>";
                        echo $cat['servico'];
                        echo "</option>";
                    }
                ?>
            </select>
            <select class="form-control" name="servico2" aria-placeholder="Especialidades">
                <?php
                    foreach($categorias as $cat){
                        echo "<option value='".$cat['id']."'>";
                        echo $cat['servico'];
                        echo "</option>";
                    }
                ?>
            </select>            
            <input type="text" class="form-control" name="work_bio" placeholder="Fale sobre você" maxlength="255">
            <button name="text" class="btn btn-outline-primary btn-lg mt-2">
                Finalizar
            </button>
        </form>
    </div>
</div>
    <?php
        if(isset($_POST['acao'])&&$_FILES['profilepic']){   
            //Carrega as info do formulário        
            $id = $_POST['id'];
            echo "ID: ".$id;
            echo "ACAO: ".$_POST['acao'];
            $cidade = $_POST['cidade'];
            $contato1 = $_POST['contato1'];
            $tpcontato1 = $_POST['tpcontato1'];
            $contato2 = $_POST['contato2'];
            $birthday = $_POST['birthday'];
            $cidade = $_POST['cidade'];
            $estado = $_POST['estado'];
            $pais = $_POST['pais'];
            $bio = $_POST['bio'];    
            //Carrega a arquivo binário da foto
            $picture = $_FILES['profilepic'];
            $profilepic = $picture['name'];
            // Move o arquivo de foto    
            if(is_dir('img')){
                $arqMovido = move_uploaded_file($picture['tmp_name'],"img".DIRECTORY_SEPARATOR.$picture['name']);        
            }
            else{
                mkdir('img');
                $arqMovido = move_uploaded_file($picture['tmp_name'],"img".DIRECTORY_SEPARATOR.$picture['name']);    
            }

            // Se a movimentação da arq de foto for bem sucedida, inseri dados no banco
            if($arqMovido){
                if(isset($_POST['acao'])){                
                    if($_POST['acao']=="novo"){                   
                        $resultado = $user->insertInfoPessoal($cidade,$contato1,$tpcontato1,$contato2,$birthday,$pais,$estado,$bio,$profilepic,$id);                   
                        echo "entrou em inserir";
                    }
                    else{
                        $resultado = $user->updateInfoPessoal($cidade,$contato1,$tpcontato1,$contato2,$birthday,$pais,$estado,$bio,$profilepic,$id);                                    
                        echo "entrou em atualizar";
                    }
                }        
            }
            else{
                echo "Erro na movimentação de foto <br>";
                echo 'img'.DIRECTORY_SEPARATOR.$picture['name'];
            }
        }
    ?>