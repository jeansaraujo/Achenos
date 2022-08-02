

<?php
    require_once 'lib/queryhandling.php';
    Session::checkLogin();
	$user = new Handling();
    $profissionais =  $user->listaInfoProfissional();
    $categorias =  $user->listaCategorias();
    //var_dump($dadosProfissionais);
    ?>

<div class="row" style="margin-top: -2rem; padding-bottom: 3rem;">
    <div class="col">
        <p class="h1 text-primary d-flex justify-content-center mt-5">Listagem de Prestador</p><hr>
    </div>
</div>
<style>
    .img-tamanho{
        width:15em;
        height:12em;
        margin:auto;                
    }
</style>

<div class="row">
    <?php
        foreach($profissionais as $prof){
            echo "
            <div class='col-3'>
                <div class='card'>
                    <img class='img-tamanho mt-2'src=img"
                    .DIRECTORY_SEPARATOR.$prof['profilepic'].">
                    <div class='card-body'>
                        <h5 class='card-title'>";
                        foreach($categorias as $cat){
                            if($cat['id']==$prof['servico1']){
                                echo $cat['servico'];
                            }
                        }
                        echo "</h5>
                        <h5 class='card-title'>".$prof['nome']."</h5>                        
                        <div style='height:5em;'>
                            <p class='card-text'>".$prof['work_bio']."</p>                            
                        </div>
                        <hr>
                        <div class='d-flex justify-content-between align-itens-center'>
                            <span>".
                                $prof['contato1']."
                            </span>
                        ";  
                            if($prof['tpcontato1']=="whatsapp"){
                                echo"
                                <a href='https://api.whatsapp.com/send?phone=".
                                $prof['contato1']."&text=Quero contratar%20seu%20serviço%20,".$prof['nome']."'>";
                                include('include/icon_whats.php');
                                echo"
                                </a>
                                ";
                            }
                            echo"
                            <a target='_blank' href='index.php?page=detalhes&id=".$prof['usuario_id']."' class='btn btn-primary'>Mais Detalhes</a>
                        </div>
                    </div>
                </div>
            </div>";
        }
    ?>
    <a href="index.php?page=detalhes">teste link</a>
</div>

<!--
    Desatualizado
<div class="row">
    <div class="col">
        <table class="table table-striped mt-3" style="background-color: white;">
            <thead class="table-dark">
                <tr>
                    <td class="text-center">Nome</td>
                    <td class="text-center">Nome de usuário</td>
                    <td class="text-center">Email</td>
                </tr>
            </thead>
            <tbody class="table-white">
                <?php
                $it = new RecursiveArrayIterator();
                $result = new TableRows($it);
                $result->queryWorkers();
                ?>
            </tbody>            
        </table>
    </div>
</div>
-->