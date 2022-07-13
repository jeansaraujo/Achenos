<?php $user = new Handling();
      $user->db->unsetter();
      $upload = new pictureHandling();
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
		$userReg	= $user->userPersonalRegistration($_POST);
	}
    if($_SERVER['REQUEST METHOD'] == 'POST' && isset($_FILES['profilepic']) && isset($_POST['upload'])){
        $pichandling = $upload->pictureHandler($_POST);
    }
?>
<div class="row">
    <div class="col">
        <p class="h2 text-end p-3 text-primary">Informações Pessoais</p>
    </div>
        <?php if (isset($userReg)){echo $userReg;}?>
        <div class="row">
            <form action="" enctype="multipart/form-data" method="POST">
                <label for="profilepic">Foto: </label>
                <input type="file" name="profilepic" id="profilepic">
                <input type="hidden" name="id" value="<?php Session::get('id')?>">
                <input type="submit" name="upload" value="Atualizar">
            </form>
            <form method="POST" action="" autocomplete="off">
                    <input type="hidden" name="id" value="<?php Session::get('id')?>">
                <div class="nome-sobrenome">
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo Session::get('name');?>"><br>                
                    <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Sobrenome">
                </div>
                <div class="contato">
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo Session::get('email');?>">                
                    <input type="tel" class="form-control" id="contato" name="contato" placeholder="Contato">
                </div>
                <div class="localidade">
                    <input type="text" class="form-control" name="pais" id="pais" placeholder="País">
                    <select class="form-control" name="Estado" id="Estado" aria-placeholder="Selecione seu estado">
                        <option value="none">...</option>
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
                    <textarea name="bio" rows="10" cols="50" maxlength="255" placeholder="Descreva um pouco sobre você"></textarea>
                    <div id="biospan"><span class="text-disabled">Até 255 caracteres</span></div>
                <button type="submit" name="register" class="btn btn-outline-primary btn-lg mt-2">Prosseguir</button>
            </form>
        </div>
</div>
</body>
</html>