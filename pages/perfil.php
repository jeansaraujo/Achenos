<?php 
  Session::checkSession();
  $user = new Handling(); 
?> 
<div class="row">
  <div class="col">
    <div class="panel panel-default">
      <div class="panel-heading text-primary h2">
        Seu perfil     
        <hr>      
        <?php 
          $name = Session::get('loginmsg');
          if (isset($name)) {
            echo $name;
          }
          Session::set('loginmsg',NULL);
          $dadosPessoais = $user->selectInfoPessoal(Session::get('id'));
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
    </div>
  </div>
</div>

