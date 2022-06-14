<div class="row">
    <div class="col">
        <p class="text-primary text-end h2 mt-5">Busca de Serviços</p>
    </div>
</div>
<form>
    <div class="row">
        <div class="col-10">
            <input type="text" name="busca" class="form-control">
            <input type="hidden" name="page" value="busca">
        </div>
        <div class="col-2">
            <button class="btn btn-outline-primary">
                Pesquisar
            </button>
        </div>
    </div> 
</form>
<?php
    if(isset($_GET['busca'])){
        echo"
        <div class='row'>
            <div class='col'>
                <table class='table table-striped mt-3'>
                    <thead class='table-dark'>
                        <tr>
                            <td class='text-center'>Id</td>
                            <td class='text-center'>Nome</td>
                            <td class='text-center'>Email</td>
                            <td class='text-center'>Contato</td>
                            <td class='text-center'>Serviço</td>
                        </tr>
                    </thead>
                    <tbody>
        ";
                    $conexao = new PDO("mysql:dbname=senac;host=localhost","root","");
                    $pesquisa = $conexao->prepare("SELECT * FROM prestador WHERE servico LIKE :BUSCA OR nome LIKE :BUSCA");
                    $busca = $_GET['busca'];
                    $busca = "%".$busca."%";                    
                    $pesquisa->bindParam(":BUSCA",$busca);                    
                    $pesquisa->execute();
                    $resultado = $pesquisa->fetchAll(PDO::FETCH_ASSOC);

                    foreach($resultado as $r){
                        echo "                        
                        <tr>
                            <td>".$r['id']."</td>
                            <td>".$r['nome']."</td>
                            <td>".$r['email']."</td>
                            <td>".$r['contato']."</td>
                            <td>".$r['servico']."</td>
                        </tr>";               
                    }


    }
    echo"
        </tbody>            
            </table>
        </div>
    </div>
    ";

?>