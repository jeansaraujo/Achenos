<?php
	 Session::checkLogin();
	 
	$user = new Handling();
	
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
		$userLogin	= $user->userLogin($_POST);
		
	}
	?>

<div class="row">
    <div class="col">
        <p class="text-primary h2 text-end mt-2">
            Login
        </p>
    </div>
</div>

<div class="row">
    <div class="col">
        <form method="post">
            <div class="offset-4 col-4">
                <div class="caixa">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <input type="password" name="password" class="form-control mt-2" placeholder="Senha">
                    <button type="submit" name="login" class="btn btn-outline-primary mt-2">
                        Entrar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>