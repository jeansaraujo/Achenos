<style>
    .caixa{
        border: 5px solid #0d6efd;
        padding: 10px;
        border-radius:20px;
    }
</style>
<div class="row">
    <div class="col">
        <p class="h2 text-primary text-end mt-3">Área Administrativa</p>
    </div>
</div>
<div class="row">
    <div class="col">
        <form method="POST">
            <div class="row">
                <div class="offset-4 col-4 offset-4 caixa">                    
                    <input class="form-control" type="email" name="email" placeholder="Email">
                    <input class="form-control mt-2" type="password" name="senha" placeholder="Senha">
                    <button class="btn btn-outline-primary mt-2" type="submit">
                        Acessar
                    </button>                
                </div>
            </div>    
        </form>
    </div>
</div>

<?php
    if(isset($_POST['email'])&isset($_POST['senha'])){
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        if($senha=="123"){
            header("Location:http://www.google.com");
        }       

    }
?>
