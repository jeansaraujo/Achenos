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
            <td class="d-flex justify-content-around"><a href="?page=cadpess">Atualizar</a></td>
          </tr>
        </table>
      </div>        
        <p class="h4 text-end">
          Dados Pessoais
        </p>
        <div style="width=100%">            
            <table class="table table bordered table-stripted text-center">
              <thead class="table-light">
                <tr>
                  <td>Contato Principal</td>
                  <td>Tipo Contato</td>
                  <td>Contato Alternativo</td>
                  <td>Nascimento</td>
                  <td>Pais</td>
                  <td>Estado</td>
                  <td>Cidade</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <?php echo $dadosPessoais[0]['contato1'];?>
                  </td>
                  <td>
                    <?php echo $dadosPessoais[0]['tpcontato1'];?>
                  </td>
                  <td>
                    <?php echo $dadosPessoais[0]['contato2'];?>
                  </td>
                  <td>
                    <?php echo $dadosPessoais[0]['birthday'];?>
                  </td>
                  <td>
                    <?php echo $dadosPessoais[0]['pais'];?>
                  </td>
                  <td>
                    <?php echo $dadosPessoais[0]['estado'];?>
                  </td>
                  <td>
                    <?php echo $dadosPessoais[0]['cidade'];?>
                  </td>
                </tr>
              </tbody>
            </table>
            <table class="table table bordered table-stripted text-center">
              <thead class="table-light">
                <tr>
                  <td>Descrição Biográfica</td>                
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <?php echo $dadosPessoais[0]['bio'];?>
                  </td>                  
                </tr>
              </tbody>
            </table>
        </div>

    </div>
  </div>
</div>

