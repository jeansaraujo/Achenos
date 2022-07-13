<?php
    require_once 'lib/queryhandling.php';
    Session::checkLogin();
	$user = new Handling(); 
    ?>

<div class="row" style="margin-top: -2rem; padding-bottom: 3rem;">
    <div class="col">
        <p class="h1 text-primary d-flex justify-content-center mt-5">Listagem de Prestador</p><hr>
    </div>
</div>
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