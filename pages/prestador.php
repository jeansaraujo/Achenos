<div class="row">
    <div class="col">
        <p class="text-primary h2 text-end mt-5">Listagem de Prestadores</p>
    </div>
</div>
<div class="row">
    <div class="col">
        <table class="table table-striped mt-3">
            <thead class="table-dark">
                <tr>
                    <td class="text-center">Id</td>
                    <td class="text-center">Nome</td>
                    <td class="text-center">Email</td>
                    <td class="text-center">Contato</td>
                    <td class="text-center">Serviço</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $conexao = new PDO("mysql:dbname=senac;host=localhost","root","");
                    $pesquisa = $conexao->prepare("SELECT * FROM prestador");
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
                ?>
            </tbody>            
        </table>
                
            

    </div>
</div>