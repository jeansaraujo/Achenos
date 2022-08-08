<?php   
  $user = new Handling();
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $profissional = $user->selectProfissional($id);
    $categorias =  $user->listaCategorias();    
  }
  
?> 

<div class="row">
  <div class="col">
    <div class="panel panel-default">
      <div class="panel-heading text-secondary h3 text-center mt-2">
        Detalhes do Profissional: <?php echo $profissional[0]['nome']; ?>   
        <hr>      
        <?php 
          $name = Session::get('loginmsg');
          if (isset($name)) {
            echo $name;
          }
          Session::set('loginmsg',NULL);          
        ?>        
      </div>
        <p class="h4 text-end">
            Dados de Usuário
        </p>
      <div style="width: 100%;">
        <table class="table table-bordered table-striped text-center">
          <tr>            
            <th>Nome</th>
            <th>E-mail</th>            
          </tr>
          <tr>                      
            <td ><?php echo $profissional[0]['nome']; ?></td>
            <td ><?php echo $profissional[0]['email']; ?></td>              
          </tr>
        </table>
      </div>
      <?php
        if(isset($profissional[0]['contato1'])){
          include_once("include/perfil_infopessoal_detalhes.php");
        }
      ?>
      <?php
        if(isset($profissional[0]['servico1'])){
          include_once("include/perfil_infoprofissional_detalhes.php");
        }
      ?>
    </div>
  </div>
</div>
<?php  
    if(isset($_POST['acao'])){      
      $acao = $_POST['acao'];
      if($acao="atualizar"){               
        $id = $_POST['id'];
        $endereco = $_POST['endereco'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $contato = $_POST['contato'];                
        $servico1 = $_POST['servico1'];
        $servico2 = $_POST['servico2'];
        $work_bio = $_POST['work_bio'];
        $qtd = $user->selectInfoProfissional($id);
        if(isset($qtd[0]['id'])){
          $resultado = $user->updateInfoProf($endereco,$bairro,$cidade,$contato,$servico1,$servico2,$work_bio,$id);          
        }
        else{
          $id = $_POST['id'];
          $endereco = $_POST['endereco'];
          $bairro = $_POST['bairro'];
          $cidade = $_POST['cidade'];
          $contato = $_POST['contato'];                
          $servico1 = $_POST['servico1'];
          $servico2 = $_POST['servico2'];
          $work_bio = $_POST['work_bio'];
          $resultado = $user->insertInfoProf($endereco,$bairro,$cidade,$contato,$servico1,$servico2,$work_bio,$id);          
        }
      }
      elseif($_POST['acao']=="novo"){
        $id = $_POST['id'];
        $endereco = $_POST['endereco'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $contato = $_POST['contato'];                
        $servico1 = $_POST['servico1'];
        $servico2 = $_POST['servico2'];
        $work_bio = $_POST['work_bio'];
        $resultado = $user->inserirInfoProf($endereco,$bairro,$cidade,$contato,$servico1,$servico2,$work_bio,$id);
      }
    }
?>