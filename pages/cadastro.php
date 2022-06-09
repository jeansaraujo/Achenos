<div class="row">
    <div class="col">
        <p class="h2 text-end p-3 text-primary">Cadastro de Prestadores</p>
    </div>
</div>
<div class="row">
    <div class="offset-3 col-6 justify-content-center mt-1">
        <form method="POST">
            <input type="text" class="form-control" name="nome" placeholder="Nome" required>
            <input type="email" class="form-control" name="email" placeholder="Email" required>
            <input type="password" class="form-control" name="senha" placeholder="Senha" required>
            <input type="text" class="form-control" name="servico" placeholder="Serviço" required>
            <input type="tel" class="form-control" name="contato" placeholder="Contato" required>
            <button class="btn btn-outline-primary btn-lg mt-2">
                Cadastrar
            </button>
        </form>
    </div>
</div>

<?php
    if(isset($_POST['nome'])&isset($_POST['email'])&isset($_POST['senha'])&isset($_POST['servico'])&isset($_POST['contato'])){
        $conexao = new PDO("mysql:dbname=senac;host=localhost","root","");
        $insere = $conexao->prepare("INSERT INTO prestador(nome,email,senha,servico,contato) VALUES(:NOME,:EMAIL,:SENHA,:SERVICO,:CONTATO)");
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $servico = $_POST['servico'];
        $contato = $_POST['contato'];       
        $insere->bindParam(":NOME",$nome);
        $insere->bindParam(":EMAIL",$email);
        $insere->bindParam(":SENHA",$senha);
        $insere->bindParam(":SERVICO",$servico);
        $insere->bindParam(":CONTATO",$contato);
        $insere->execute();        
    }
?>
