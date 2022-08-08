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
<div class="container">
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
    <div class="container">
    <div class="row">
        <form action="index.php?page=cadprof&acao=atualizar"enctype="multipart/form-data" method="POST" >
            <input type="hidden" name="id" value="<?php echo Session::get('id')?>">
            <input type="hidden" name="acao" value="<?php 
                                                           if(isset($_GET['acao'])){
                                                            echo $_GET['acao'];
                                                           }
                                                    ?>">                                 
            
            <!-- Infos Básicas -->
            <div class="container">
                <div class="row">
                    <div class="col-sm">   
                    <label class="label-control">Nome</label>            
                    <input type="text" class="form-control" id="name" name="nome" value="<?php echo Session::get('name');?>">
                    </div>
                    <div class="col-sm">
                    <label class="label-control">Sobrenome</label>
                    <input type="text" class="form-control" id="sobrenome" name="sobrenome" value="<?php
                                                                                                        if(isset($dadosPessoais[0]['sobrenome']))
                                                                                                        {
                                                                                                            echo $dadosPessoais[0]['sobrenome'];
                                                                                                        }
                                                                                                    ?>">
                    </div>
                </div>
            </div>                                    
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <label class="label-control">Email</label>  
                        <input type="text" class="form-control" id="email" name="email" value="<?php echo Session::get('email');?>">
                    </div>
                    <div class="col-sm">
                        <label class="label-control">Data de Nascimento</label>  
                        <input type="date" class="form-control" style="width: 47%;" id="birthday" name="birthday" placeholder="Data de Nascimento" value="<?php
                                                                                                                                            if(isset($dadosPessoais[0]['birthday']))
                                                                                                                                            {
                                                                                                                                                echo $dadosPessoais[0]['birthday'];
                                                                                                                                            }
                                                                                                                                        ?>">                
                    </div>
                    <div class="col-sm">    
                        <label for="profilepic" style="margin-left: -28.5vh;" class="label-control">Foto:</label>
                        <input type="file" class="form-control" style="margin-left: -28.5vh; width: 154%;" name="profilepic" id="profilepic" required>
                    </div>        
                </div>
            </div>  
            <!-- Fim de Infos Básicas -->
            <!-- Contato -->
            <div class="container">
                <div class="row">
                    <div class="col-sm">                                    
                        <label class="label-control">Contato Principal:</label>
                        <input type="tel" class="form-control" id="contato" name="contato1" placeholder="Contato" value="<?php
                                                                                                                            if(isset($dadosPessoais[0]['contato1']))
                                                                                                                            {
                                                                                                                                echo $dadosPessoais[0]['contato1'];
                                                                                                                            }
                                                                                                                        ?>">  
                    </div>
                    <div class="col-sm">
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
                    </div>
                    <div class="col-sm">
                        <label class="label-control">Contato Alternativo:</label>
                        <input type="tel" class="form-control" id="contato" name="contato2" placeholder="Contato Alternativo" 
                                                                                                                        value="<?php
                                                                                                                            if(isset($dadosPessoais[0]['contato2']))
                                                                                                                            {
                                                                                                                                echo $dadosPessoais[0]['contato2'];
                                                                                                                            }
                                                                                                                        ?>">                  
                    </div>
                </div>
            </div>
            <!-- Fim de Contatos-->                
            <!-- Localidade -->
            <div class="container">
                <div class="row">
                    <div class="col-sm">                                   
                        <label class="label-control">Informe o País</label>
                        <input type="text" class="form-control" name="pais" id="pais" placeholder="País"
                                                                                                                        value="<?php
                                                                                                                            if(isset($dadosPessoais[0]['pais']))
                                                                                                                            {
                                                                                                                                echo $dadosPessoais[0]['pais'];
                                                                                                                            }
                                                                                                                        ?>">
                    </div>
                    <div class="col-sm">
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
                            <option value="ap"
                                <?php
                                    if(isset($dadosPessoais[0]['estado']))
                                    {
                                        if($dadosPessoais[0]['estado']=="ap"){
                                            echo "selected";
                                        }
                                    }
                                ?>
                            >Amapá</option> 
                            <option value="am"
                                <?php
                                    if(isset($dadosPessoais[0]['estado']))
                                    {
                                        if($dadosPessoais[0]['estado']=="am"){
                                            echo "selected";
                                        }
                                    }
                                ?> 
                            >Amazonas</option>
                            <option value="ba"
                                <?php
                                    if(isset($dadosPessoais[0]['estado']))
                                    {
                                        if($dadosPessoais[0]['estado']=="ba"){
                                            echo "selected";
                                        }
                                    }
                                ?> 
                            >Bahia</option>
                            <option value="ce"
                                <?php
                                    if(isset($dadosPessoais[0]['estado']))
                                    {
                                        if($dadosPessoais[0]['estado']=="ce"){
                                            echo "selected";
                                        }
                                    }
                                ?> 
                            >Ceará</option>
                            <option value="df"
                                <?php
                                    if(isset($dadosPessoais[0]['estado']))
                                    {
                                        if($dadosPessoais[0]['estado']=="df"){
                                            echo "selected";
                                        }
                                    }
                                ?>
                            >Distrito Federal</option> 
                            <option value="es"
                                <?php
                                    if(isset($dadosPessoais[0]['estado']))
                                    {
                                        if($dadosPessoais[0]['estado']=="es"){
                                            echo "selected";
                                        }
                                    }
                                ?> 
                            >Espírito Santo</option>
                            <option value="go"
                                <?php
                                    if(isset($dadosPessoais[0]['estado']))
                                    {
                                        if($dadosPessoais[0]['estado']=="go"){
                                            echo "selected";
                                        }
                                    }
                                ?>
                            >Goiás</option> 
                            <option value="ma"
                                <?php
                                    if(isset($dadosPessoais[0]['estado']))
                                    {
                                        if($dadosPessoais[0]['estado']=="ma"){
                                            echo "selected";
                                        }
                                    }
                                ?> 
                            >Maranhão</option>
                            <option value="mt"
                                <?php
                                    if(isset($dadosPessoais[0]['estado']))
                                    {
                                        if($dadosPessoais[0]['estado']=="mt"){
                                            echo "selected";
                                        }
                                    }
                                ?>
                            >Mato Grosso</option> 
                            <option value="ms"
                                <?php
                                    if(isset($dadosPessoais[0]['estado']))
                                    {
                                        if($dadosPessoais[0]['estado']=="ms"){
                                            echo "selected";
                                        }
                                    }
                                ?>
                            >Mato Grosso do Sul</option> 
                            <option value="mg"
                                <?php
                                    if(isset($dadosPessoais[0]['estado']))
                                    {
                                        if($dadosPessoais[0]['estado']=="mg"){
                                            echo "selected";
                                        }
                                    }
                                ?>
                            >Minas Gerais</option> 
                            <option value="pa"
                                <?php
                                    if(isset($dadosPessoais[0]['estado']))
                                    {
                                        if($dadosPessoais[0]['estado']=="pa"){
                                            echo "selected";
                                        }
                                    }
                                ?> 
                            >Pará</option>
                            <option value="pr"
                                <?php
                                    if(isset($dadosPessoais[0]['estado']))
                                    {
                                        if($dadosPessoais[0]['estado']=="pr"){
                                            echo "selected";
                                        }
                                    }
                                ?> 
                            >Paraná</option>
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
                            <option value="pi"
                                <?php
                                    if(isset($dadosPessoais[0]['estado']))
                                    {
                                        if($dadosPessoais[0]['estado']=="pi"){
                                            echo "selected";
                                        }
                                    }
                                ?> 
                            >Piauí</option>
                            <option value="rj"
                                <?php
                                    if(isset($dadosPessoais[0]['estado']))
                                    {
                                        if($dadosPessoais[0]['estado']=="rj"){
                                            echo "selected";
                                        }
                                    }
                                ?> 
                            >Rio de Janeiro</option>
                            <option value="rn"
                                <?php
                                    if(isset($dadosPessoais[0]['estado']))
                                    {
                                        if($dadosPessoais[0]['estado']=="rn"){
                                            echo "selected";
                                        }
                                    }
                                ?> 
                            >Rio Grande do Norte</option>
                            <option value="rs"
                                <?php
                                    if(isset($dadosPessoais[0]['estado']))
                                    {
                                        if($dadosPessoais[0]['estado']=="rs"){
                                            echo "selected";
                                        }
                                    }
                                ?> 
                            >Rio Grande do Sul</option>
                            <option value="rd"
                                <?php
                                    if(isset($dadosPessoais[0]['estado']))
                                    {
                                        if($dadosPessoais[0]['estado']=="rd"){
                                            echo "selected";
                                        }
                                    }
                                ?> 
                            >Rondônia</option>
                            <option value="ro"
                                <?php
                                    if(isset($dadosPessoais[0]['estado']))
                                    {
                                        if($dadosPessoais[0]['estado']=="ro"){
                                            echo "selected";
                                        }
                                    }
                                ?> 
                            >Roraima</option>
                            <option value="sc"
                                <?php
                                    if(isset($dadosPessoais[0]['estado']))
                                    {
                                        if($dadosPessoais[0]['estado']=="sc"){
                                            echo "selected";
                                        }
                                    }
                                ?> 
                            >Santa Catarina</option>
                            <option value="sp"
                                <?php
                                    if(isset($dadosPessoais[0]['estado']))
                                    {
                                        if($dadosPessoais[0]['estado']=="sp"){
                                            echo "selected";
                                        }
                                    }
                                ?> 
                            >São Paulo</option>
                            <option value="se"
                                <?php
                                    if(isset($dadosPessoais[0]['estado']))
                                    {
                                        if($dadosPessoais[0]['estado']=="se"){
                                            echo "selected";
                                        }
                                    }
                                ?> 
                            >Sergipe</option>
                            <option value="to"
                                <?php
                                    if(isset($dadosPessoais[0]['estado']))
                                    {
                                        if($dadosPessoais[0]['estado']=="to"){
                                            echo "selected";
                                        }
                                    }
                                ?> 
                            >Tocantins</option>
                        </select>
                    </div>
                    <div class="col-sm">
                        <label class="label-control">Informe a Cidade:</label>
                        <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade" value="<?php
                                                                                                                            if(isset($dadosPessoais[0]['cidade']))
                                                                                                                            {
                                                                                                                                echo $dadosPessoais[0]['cidade'];
                                                                                                                            }
                                                                                                                        ?>">                              
                    </div>
           <!-- Fim Localidade -->
            <!-- Descrição Pessoal -->
            <div class="container">
                <div class="row">
                    <div class="col-sm">     
                        <label for="bio">Sobre você:</label>
                        <input type="textarea"class="form-control" name="bio" rows="5" cols="100" maxlength="255" placeholder="Descreva um pouco sobre você" 
                                                                                                                        value="<?php
                                                                                                                            if(isset($dadosPessoais[0]['bio']))
                                                                                                                            {
                                                                                                                                echo $dadosPessoais[0]['bio'];
                                                                                                                            }
                                                                                                                        ?>">
                        
                        <div id="biospan"><span class="text-disabled">Até 255 caracteres</span></div>
                    </div>
                </div>
            </div>
            <!-- Fim de Descrição Pessoal -->
            <div class="w-100 d-flex justify-content-end">
                <button type="submit" name="update" class="btn btn-outline-primary btn-lg m-2">Prosseguir</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>