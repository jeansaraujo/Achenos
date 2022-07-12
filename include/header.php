<header class="container-fluid">
    <div class="logo d-flex justify-content-center">
        <img src="assets/img/logo_achenos.jpg">
    </div>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <div class="row">
                <div class="offset-1 col-10 offset-1">
                    <a class="navbar-brand" href="#"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="d-flex justify-content-center align-items-center">
                            <li class="caixa-item">
                                <a class="caixa-link" href="?page=home">Home</a>
                            </li>
                            <li class="caixa-item">
                                <a class="caixa-link" href="?page=prestador">Prestador</a>
                            </li>
                            <li class="caixa-item">
                                <a class="caixa-link" href="?page=busca">Busca</a>
                            </li>                                                     
                            <li class="caixa-item">
                                <a class="caixa-link" href="?page=avaliacoes">Avaliacoes</a>
                            </li>
                            <?php
                                if(empty(Session::get('id'))){ 
                            ?>
                                <div class="dropdown">
                                    <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Trabalhe Conosco
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="?page=login">Login</a></li>
                                        <li><a class="dropdown-item" href="?page=cadastro">Cadastro</a></li>                                        
                                    </ul>
                                </div>                                
                            <?php 
                                }
                                else
                                { 
                            ?>
                                <div class="dropdown">
                                    <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Perfil
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="?page=config">Configurações</a></li>
                                        <li><a class="dropdown-item" href="?action=logout">Logout</a></li>                                        
                                    </ul>
                                </div> 
                            <?php 
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div> 
        </div>
    </nav>
    <div class="barra">            
    </div>
</header>       