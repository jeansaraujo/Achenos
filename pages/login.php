<!--
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
-->
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
        $consulta = $conexao->prepare("SELECT senha FROM prestador WHERE email = :EMAIL");
        $email = $_POST['email'];        
        $consulta->bindParam(":EMAIL",$email);
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $senhausuario="ui";        
        foreach($resultado as $r){
            $senhausuario = $r['senha'];
        }
        $senha=$_POST['senha'];
        if($senhausuario=="ui"){
            echo "<strong>".$email." </strong> não está cadastrado";
        }
        else{
            if($senhausuario==$senha){
                header("Location:admin");
            }
            else{
                echo "A Senha <strong>". $senha. " </strong> está incorreta";
            }
        }
    }
?>      

