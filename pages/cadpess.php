<?php
     $user = new Handling();
     // $user->closeBD();
     // $upload = new pictureHandling();
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
		$userReg	= $user->userPersonalRegistration($_POST);
	}
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['profilepic']) && isset($_POST['upload'])){
        $pichandling = $upload->pictureHandler($_POST);
    }
    $dadosPessoais = $user->selectInfoPessoal(Session::get('id'));        
?>

<div class="row">
    <div class="col">
        <p class="h2 text-end p-3 text-primary">Informações Pessoais</p>
    </div>
        <?php if (isset($userReg)){echo $userReg;}?>
        <div class="row">
            <form enctype="multipart/form-data" method="POST" >
                <input type="hidden" name="id" value="<?php echo Session::get('id')?>">                                
                <label class="label-control">Foto:</label>
                <input type="file" class="form-control" name="profilepic" id="profilepic">
                <!-- Infos Básicas -->    
                    <label class="label-control">Nome</label>            
                    <input type="text" class="form-control" id="name" name="nome" value="<?php echo Session::get('name');?>"><br>                                    
                    <label class="label-control">Data de Nascimento</label>  
                    <input type="date" class="form-control" id="birthday" name="birthday" placeholder="Data de Nascimento" value="<?php
                                                                                                                                        if(isset($dadosPessoais[0]['birthday']))
                                                                                                                                        {
                                                                                                                                            echo $dadosPessoais[0]['birthday'];
                                                                                                                                        }
                                                                                                                                    ?>">                
                    <label class="label-control">Email</label>  
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo Session::get('email');?>">
                <!-- Fim de Infos Básicas -->
                <!-- Contato -->                                    
                    <label class="label-control">Contato Principal:</label>
                    <input type="tel" class="form-control" id="contato" name="contato" placeholder="Contato" value="<?php
                                                                                                                        if(isset($dadosPessoais[0]['contato']))
                                                                                                                        {
                                                                                                                            echo $dadosPessoais[0]['contato'];
                                                                                                                        }
                                                                                                                    ?>">  
                    <label class="label-control">Selecione o Tipo de Contato:</label>
                    <select name="tipocontato" id="" class="form-control" placeholder="Opções do Contato">                        
                        <option value="none">Nenhum</option>
                        <option value="whatsapp">WhatsApp</option>
                        <option value="telegram">Telegram</option>
                        <option value="ambos">Ambos</option>                        
                    </select>                    
                    <label class="label-control">Contato Alternativo:</label>
                    <input type="tel" class="form-control" id="contato" name="contato2" placeholder="Contato Alternativo">                
                <!-- Fim de Contatos-->                
                <!-- Localidade -->                
                    <label class="label-control">Informe o País</label>
                    <input type="text" class="form-control" name="pais" id="pais" placeholder="País">
                    <label class="label-control">Selecione seu estado:</label>
                    <select class="form-control" name="estado" id="estado">                        
                        <option value="Acre">Acre</option>
                        <option value="Alagoas">Alagoas</option>
                        <option value="Amapá">Amapá</option>
                        <option value="Amazonas">Amazonas</option>
                        <option value="Bahia">Bahia</option>
                        <option value="Ceará">Ceará</option>
                        <option value="Distrito Federal">Distrito Federal</option>
                        <option value="Espírito Santo">Espírito Santo</option>
                        <option value="Goiás">Goiás</option>
                        <option value="Maranhão">Maranhão</option>
                        <option value="Mato Grosso">Mato Grosso</option>
                        <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                        <option value="Minas Gerais">Minas Gerais</option>
                        <option value="Pará">Pará</option>
                        <option value="Paraná">Paraná</option>
                        <option value="Pernambuco">Pernambuco</option>
                        <option value="Piauí">Piauí</option>
                        <option value="Rio de Janeiro">Rio de Janeiro</option>
                        <option value="Rio Grande do Norte">Rio Grande do Norte</option>
                        <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                        <option value="Rondônia">Rondônia</option>
                        <option value="Roraima">Roraima</option>
                        <option value="Santa Catarina">Santa Catarina</option>
                        <option value="São Paulo">São Paulo</option>
                        <option value="Sergipe">Sergipe</option>
                        <option value="Tocantins">Tocantins</option>
                    </select>
                    <label class="label-control">Informe a Cidade:</label>
                    <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade">                                
                <!-- Fim Localidade -->
                <!-- Descrição Pessoal -->
                    <label for="bio">Sobre você:</label>
                    <textarea class="form-control" name="bio" rows="5" cols="100" maxlength="255" placeholder="Descreva um pouco sobre você"></textarea>
                    <div id="biospan"><span class="text-disabled">Até 255 caracteres</span></div>
                <!-- Fim de Descrição Pessoal -->
                <div class="w-100 d-flex justify-content-end">
                    <button type="submit" name="update" class="btn btn-outline-primary btn-lg m-2">Prosseguir</button>
                </div>
            </form>
        </div>
</div>
</body>
</html>

<?php

if(isset($_POST['nome'])&&$_FILES['profilepic']){   
    //Carrega as info do formulário
    $id = $_POST['id'];
    echo "ID: ".$id;
    $sobrenome = $_POST['sobrenome'];
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
        $resultado = $user->updateInfoPessoal($cidade,$contato1,$tpcontato1,$contato2,$birthday,$pais,$estado,$bio,$profilepic,$id);
        var_dump($resultado);
        if ($resultado){
            echo "Alterado Banco";
        }
        else{
            echo "Algo de errado aconteceu";
        }
    }
    else{
        echo "Erro na movimentação de foto <br>";
        echo 'img'.DIRECTORY_SEPARATOR.$picture['name'];
    }
}



?>