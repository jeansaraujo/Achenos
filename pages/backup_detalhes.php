<?php 
  Session::checkSession();
  $user = new Handling();
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $profissional = $user->selectProfissional($id);
  }
?> 
<div class="row">
  <div class="col">
    <div class="panel panel-default">
      <div class="panel-heading text-primary h2">
        Perfil de <?php echo $profissional[0]['nome']; ?>   
        <hr>      
        <?php 
          $name = Session::get('loginmsg');
          if (isset($name)) {
            echo $name;
          }
          Session::set('loginmsg',NULL);
          $dadosPessoais = $user->selectInfoPessoal(Session::get('id'));
          $dadosProfissionais = $user->selectInfoProfissional(Session::get('id'));
          $categorias = $user->listaCategorias();
        ?>        
      </div>
        <p class="h4 text-end">
            Dados de Usuário
        </p>
      <div style="width: 100%;">
        <table class="table table-bordered table-striped text-center">
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Informações</th>
          </tr>
          <tr>          
            <td ><?php echo Session::get('id')?></td>
            <td ><?php echo Session::get('name'); ?></td>
            <td ><?php echo Session::get('email'); ?></td>
            <td class="d-flex justify-content-around">
              <?php
                if(isset($dadosPessoais[0]['contato1'])){
                  echo" 
                    <a href='?page=cadpess&acao=atualizar'>
                      Atualizar
                    </a>
                  ";                  
                }
                else{
                  echo" 
                    <a href='?page=cadpess&acao=novo'>
                      Inserir
                    </a>
                  ";
                }
              ?>
            </td>
              
          </tr>
        </table>
      </div>
      <?php
        if(isset($dadosPessoais[0]['contato1'])){
          include_once("include/perfil_infopessoal.php");
        }
      ?>
      <?php
        if(isset($dadosProfissionais[0]['servico1'])){
          include_once("include/perfil_infoprofissional.php");
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