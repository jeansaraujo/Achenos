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
    echo $dadosPessoais[0]['bio'];
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
                    <input type="tel" class="form-control" id="contato" name="contato1" placeholder="Contato" value="<?php
                                                                                                                        if(isset($dadosPessoais[0]['contato1']))
                                                                                                                        {
                                                                                                                            echo $dadosPessoais[0]['contato1'];
                                                                                                                        }
                                                                                                                    ?>">  
                    <label class="label-control">Selecione o Tipo de Contato:</label>
                    <select name="tpcontato1"  class="form-control" placeholder="Opções do Contato" >                                                
                        <option value="none"
                            <?php
                                if(isset($dadosPessoais[0]['tpcontato1']))
                                {
                                    if($dadosPessoais[0]['tpcontato1']=="none"){
                                        echo "selected";
                                    }
                                }
                            ?>                                                                            
                        >Nenhum</option>
                        <option value="whatsapp"
                            <?php
                                if(isset($dadosPessoais[0]['tpcontato1']))
                                {
                                    if($dadosPessoais[0]['tpcontato1']=="whatsapp"){
                                        echo "selected";
                                    }
                                }
                            ?>
                        >WhatsApp</option>
                        <option value="telegram" 
                            <?php
                                if(isset($dadosPessoais[0]['tpcontato1']))
                                {
                                    if($dadosPessoais[0]['tpcontato1']=="telegram"){
                                        echo "selected";
                                    }
                                }
                            ?>
                        >Telegram</option>
                        <option value="ambos" 
                            <?php
                                if(isset($dadosPessoais[0]['tpcontato1']))
                                {
                                    if($dadosPessoais[0]['tpcontato1']=="ambos"){
                                        echo "selected";
                                    }
                                }
                            ?>
                        >Ambos</option>                        
                    </select>                    
                    <label class="label-control">Contato Alternativo:</label>
                    <input type="tel" class="form-control" id="contato" name="contato2" placeholder="Contato Alternativo" 
                                                                                                                    value="<?php
                                                                                                                        if(isset($dadosPessoais[0]['contato2']))
                                                                                                                        {
                                                                                                                            echo $dadosPessoais[0]['contato2'];
                                                                                                                        }
                                                                                                                    ?>">                  
                <!-- Fim de Contatos-->                
                <!-- Localidade -->                
                    <label class="label-control">Informe o País</label>
                    <input type="text" class="form-control" name="pais" id="pais" placeholder="País"
                                                                                                                    value="<?php
                                                                                                                        if(isset($dadosPessoais[0]['pais']))
                                                                                                                        {
                                                                                                                            echo $dadosPessoais[0]['pais'];
                                                                                                                        }
                                                                                                                    ?>">
                    <label class="label-control">Selecione seu estado:</label>
                    <select class="form-control" name="estado" id="estado">                        
                        <option value="ac"
                            <?php
                                if(isset($dadosPessoais[0]['estado']))
                                {
                                    if($dadosPessoais[0]['estado']=="ac"){
                                        echo "selected";
                                    }
                                }
                            ?>                                                                                                        
                        >Acre</option>
                        <option value="al"
                            <?php
                                if(isset($dadosPessoais[0]['estado']))
                                {
                                    if($dadosPessoais[0]['estado']=="al"){
                                        echo "selected";
                                    }
                                }
                            ?> 
                        >Alagoas</option>
                        <option value="ap">Amapá</option>
                        <option value="am">Amazonas</option>
                        <option value="ba">Bahia</option>
                        <option value="ce">Ceará</option>
                        <option value="df">Distrito Federal</option>
                        <option value="es">Espírito Santo</option>
                        <option value="go">Goiás</option>
                        <option value="ma">Maranhão</option>
                        <option value="mt">Mato Grosso</option>
                        <option value="ms">Mato Grosso do Sul</option>
                        <option value="mg">Minas Gerais</option>
                        <option value="pa">Pará</option>
                        <option value="pr">Paraná</option>
                        <option value="pe"
                            <?php
                                if(isset($dadosPessoais[0]['estado']))
                                {
                                    if($dadosPessoais[0]['estado']=="pe"){
                                        echo "selected";
                                    }
                                }
                            ?> 
                        >Pernambuco</option>
                        <option value="pi">Piauí</option>
                        <option value="rj">Rio de Janeiro</option>
                        <option value="rn">Rio Grande do Norte</option>
                        <option value="rs">Rio Grande do Sul</option>
                        <option value="rd">Rondônia</option>
                        <option value="ro">Roraima</option>
                        <option value="sc">Santa Catarina</option>
                        <option value="sp">São Paulo</option>
                        <option value="se">Sergipe</option>
                        <option value="to">Tocantins</option>
                    </select>
                    <label class="label-control">Informe a Cidade:</label>
                    <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade" value="<?php
                                                                                                                        if(isset($dadosPessoais[0]['cidade']))
                                                                                                                        {
                                                                                                                            echo $dadosPessoais[0]['cidade'];
                                                                                                                        }
                                                                                                                    ?>">                              
                <!-- Fim Localidade -->
                <!-- Descrição Pessoal -->
                    <label for="bio">Sobre você:</label>
                    <input type="textarea"class="form-control" name="bio" rows="5" cols="100" maxlength="255" placeholder="Descreva um pouco sobre você" 
                                                                                                                    value="<?php
                                                                                                                        if(isset($dadosPessoais[0]['bio']))
                                                                                                                        {
                                                                                                                            echo $dadosPessoais[0]['bio'];
                                                                                                                        }
                                                                                                                    ?>">
                    
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
        if(isset($_GET['acao'])){
            if($_GET['acao']="inserir"){
                $resultado = $user->insertInfoPessoal($cidade,$contato1,$tpcontato1,$contato2,$birthday,$pais,$estado,$bio,$profilepic,$id);                
            }
            if($_GET['acao']="atualizar"){
                $resultado = $user->updateInfoPessoal($cidade,$contato1,$tpcontato1,$contato2,$birthday,$pais,$estado,$bio,$profilepic,$id);                
            }
        }        
    }
    else{
        echo "Erro na movimentação de foto <br>";
        echo 'img'.DIRECTORY_SEPARATOR.$picture['name'];
    }
}



?>