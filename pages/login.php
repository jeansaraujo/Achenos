<div class="row">
    <div class="col">
        <p class="text-primary h2 text-end mt-2">
            Login
        </p>
    </div>
</div>
<style>
    .caixa{
        border: 3px solid #0d6efd;
        padding: 10px;
        border-radius: 10px;
    }
</style>
<div class="row">
    <div class="col">
        <form method="post">
            <div class="offset-4 col-4">
                <div class="caixa">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <input type="password" name="senha" class="form-control mt-2" placeholder="Senha">
                    <button type="submit" class="btn btn-outline-primary mt-2">
                        Acessar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
   if(isset($_POST['email'])&isset($_POST['senha'])){
    $conexao = new PDO("mysql:dbname=senac;host=localhost","root","");
    $consulta = $conexao->prepare("SELECT senha FROM prestador WHERE email=:EMAIL");
    $email=$_POST['email'];
    $consulta->bindParam(":EMAIL",$email);
    $consulta->execute();
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);   
    if($resultado[0]["senha"]==$_POST['senha']){
        session_start();        
        $resultado = session_unset();
        if($resultado == true){            
            session_regenerate_id();
            $_SESSION['email']=$email;
            $_SESSION['id']=session_id();
            //echo "ok";
            header("Location:admin");
        }
        else{
            echo "problema no session_unset()";
        }
        
    }
    else{
        echo "
        <div class='alert alert-danger text-center mt-3' role='alert'>
            Usuário ou Senha Inválido!
        </div>
        ";
    }
   }
?>