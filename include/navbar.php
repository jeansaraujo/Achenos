<nav class="navbar navbar-expand-lg" id="navbar">
    <div class="container">
        <div class="row">
            <div class="offset-4 col-4 offset-4">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="d-flex justify-content-center align-items-center">
                        <li class="caixa-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="caixa-item">
                            <a class="nav-link" href="#">Prestador</a>
                        </li>
                        <?php
                        if(empty(Session::get('id'))){ ?>
                            <li class="caixa-item dropdown" role="button" style="margin-bottom: -1rem;">Trabalhe Conosco
                                <div class="dropdown-content">
                                    <a role="button" class="" href="?page=login">Login</a>
                                    <a role="button" class="" href="?page=cadastro">Cadastro</a>
                                </div>
                            </li>
                            <?php }else{ ?>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?php echo Session::get('profilepic');?>" width="40" height="40" class="rounded-circle">
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <li><a class="dropdown-item" href="?tab=perfil">Perfil</a></li>
                            <li><a class="dropdown-item" href="security/index.php">Configurações</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="?action=logout">Logout</a></li>
                            </ul>
                            </li>
                        <?php }?>
                    </ul>
                </div>
            </div>
        </div> 
    </div>
</nav>
<div class="barra" style="z-index: auto;">            
</div>