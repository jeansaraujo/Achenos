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
        ?>      
      </div>
      <div style="width: 100%;">
      <table class="table table-bordered table-striped text-center">
        <tr>
          <th>Nome de usuário</th>
          <th>Nome</th>
          <th>E-mail</th>
          <th>Informações</th>
        </tr>
        <tr>          
          <td ><?php echo Session::get('username'); ?></td>
          <td ><?php echo Session::get('name'); ?></td>
          <td ><?php echo Session::get('email'); ?></td>
          <td class="d-flex justify-content-around"><a href="?page=cadpess">Pessoais</a><a href="?page=cadprof">Profissionais</a></td>
        </tr>
      </table>
      </div>
    </div>
  </div>
</div>

