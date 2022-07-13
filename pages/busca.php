<?php
    require_once 'lib/queryhandling.php';
    Session::checkLogin();
	$user = new Handling(); 
    ?>
<div class="row" style="margin-top: -2rem; padding-bottom: 3rem;">
    <div class="col">
        <p class="h1 text-primary d-flex justify-content-center mt-5">Busca de Serviços</p>
    </div><hr>
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
