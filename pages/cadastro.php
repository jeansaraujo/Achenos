<?php $user = new Handling();
      
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
        if((isset($_POST['password']) == (isset($_POST['confirmpassword'])))){
		$userReg	= $user->userRegistration($_POST);
	}}
?>
<div class="row">
    <div class="col">
        <p class="h2 text-end p-3 text-primary">Cadastro</p>
    </div>
    <?php
        if (isset($userReg)) {
            echo $userReg;
        }
    ?>
</div>
<div class="row">
    <div class="offset-3 col-6 justify-content-center mt-1">
        <form method="POST" action="" autocomplete="off">
            <input type="text" class="form-control" name="name" id="name" placeholder="Nome">
            <input type="text" class="form-control" name="username" id="username" placeholder="Nome de Usuário">
                <div id="element01"><span class="help-block">Nome de usuário não pode conter espaços.</span></div>
            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
            <div id="element02"><span class="text-success">Endereço de email válido!</span></div>
            <div id="element03"><span class="text-danger">Endereço de email inválido!</span></div>
            <input type="password" class="form-control" name="password" id="password" placeholder="Senha">
            <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confirme a senha">
            <div id="element04"><span class="text-success">As senhas coincidem!</span></div>
            <div id="element05"><span class="text-danger">As senhas não coincidem!</span></div><br>
            <button type="submit" name="register" class="btn btn-outline-primary btn-lg mt-2">
                Cadastrar
            </button>
        </form>
    </div>
</div>
</body>
</html>