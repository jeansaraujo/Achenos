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
?>
<div class="row">
    <div class="col">
        <p class="h2 text-end p-3 text-primary">Informações Pessoais</p>
    </div>
        <?php if (isset($userReg)){echo $userReg;}?>
        <div class="row">
            <form enctype="multipart/form-data" method="POST" >
                <input type="hidden" name="id" value="<?php Session::get('id')?>">                                
                <label for="profilepic">Foto: </label>
                <input type="file" name="profilepic" id="profilepic">
                <div class="nome-sobrenome">
                    <input type="text" class="form-control" id="name" name="nome" value="<?php echo Session::get('name');?>"><br>                
                    <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Sobrenome">
                </div>
                <div class="contato">
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo Session::get('email');?>">                
                    <input type="tel" class="form-control" id="contato" name="contato" placeholder="Contato">
                </div>
                <div class="localidade">
                    <input type="text" class="form-control" name="pais" id="pais" placeholder="País">
                    <select class="form-control" name="estado" id="estado">
                        <option value="none">Selecione seu estado</option>
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
                    <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade">
                </div>
                    <label for="bio">Sobre você:</label>
                    <textarea name="bio" rows="10" cols="100" maxlength="255" placeholder="Descreva um pouco sobre você"></textarea>
                    <div id="biospan"><span class="text-disabled">Até 255 caracteres</span></div>
                <button type="submit" name="update" class="btn btn-outline-primary btn-lg mt-2">Prosseguir</button>
            </form>
        </div>
</div>
</body>
</html>

<?php

if(isset($_POST['nome'])&&$_FILES['profilepic']){   
    //Carrega as info do formulário
    $id = $_POST['id'];
    $sobrenome = $_POST['sobrenome'];
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
        $resultado = $user->updateInfoPessoal($sobrenome,$cidade,$pais,$estado,$bio,$profilepic,$id);
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