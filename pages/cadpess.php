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
    //echo $dadosPessoais[0]['bio'];
?>
<div class="row">
    <div class="col-12">
        <p class="h2 text-end p-3 text-primary">Informações Pessoais</p>
    </div>
    <div class="col-12 d-flex justify-content-center">
        <?php
            if(isset($dadosPessoais[0]['profilepic']))
            {
                echo "<img src='"."img".DIRECTORY_SEPARATOR.$dadosPessoais[0]['profilepic']."'>";
            }
        ?>
    </div>
    <?php if (isset($userReg)){echo $userReg;}?>
    <?php
        echo "GET: ".$_GET['acao'];
    ?>
    
    <div class="row">
        <form action="index.php?page=cadprof&acao=atualizar"enctype="multipart/form-data" method="POST" >
            <input type="hidden" name="id" value="<?php echo Session::get('id')?>">
            <input type="hidden" name="acao" value="<?php 
                                                           if(isset($_GET['acao'])){
                                                            echo $_GET['acao'];
                                                           }
                                                    ?>">                                 
            <label class="label-control">Foto:</label>
            <input type="file" class="form-control" name="profilepic" id="profilepic" required>
            <!-- Infos Básicas -->   
                <label class="label-control">Nome</label>            
                <input type="text" class="form-control" id="name" name="nome" disabled value="<?php echo Session::get('name');?>"><br>                                    
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