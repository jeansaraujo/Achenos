<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Achenos - O profissional que precisa</title>
    <style>
 footer {

text-align: center;
padding: 20px;
background-color: #00407d;
color: white;
}               
</style>
</head>
<body>
    <!--
    <header class="d-flex justify-content-around mt-2">
        <a class="btn btn-lg btn-outline-primary" href="?page=home">Home</a>
        <a class="btn btn-lg btn-outline-primary" href="?page=prestador">Prestador</a>
        <a class="btn btn-lg btn-outline-primary" href="?page=busca">Busca</a>
        <a class="btn btn-lg btn-outline-primary" href="?page=cadastro">Cadastro</a>
        <a class="btn btn-lg btn-outline-primary" href="?page=login">Login</a>
    </header>
    -->
    <header class="container-fluid">
        <div class="logo d-flex justify-content-center">
            <img src="assets/img/logo_achenos.jpg">
        </div>
        <nav class="navbar navbar-expand-lg bg-light">
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
                                    <a class="caixa-link" href="#">Home</a>
                                </li>
                                <li class="caixa-item">
                                    <a class="caixa-link" href="#">Prestador    </a>
                                </li>
                                <li class="caixa-item">
                                    <a class="caixa-link" href="#">Cadastro</a>
                                </li>
                                <li class="caixa-item">
                                    <a class="caixa-link">Login</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> 
            </div>
        </nav>
        <div class="barra">            
        </div>
           
    </header>
    <main class="container">        
        <?php
            if(isset($_GET['page'])){
                $pagina = $_GET['page'];
                switch($pagina){
                    case "home":
                        include('pages/home.php');
                        break;
                    case "prestador":
                        include('pages/prestador.php');
                        break;
                    case "busca":
                        include('pages/busca.php');
                        break;
                    case "cadastro":
                        include('pages/cadastro.php');
                        break;
                    case "login":
                        include('pages/login.php');
                        break;
                    default:
                        include('pages/home.php');
                        break;
                }
            }
            else{
                include('pages/home.php');
            }            
        ?>
    </main>
    <footer>
    <div class="row">
        <div class="col"> 
        <a class="btn  btn-outline-light" href="?page=home">Home</a>
        
       
    </div>
        <div class="col">
        <a class="btn  btn-outline-light" href="?page=prestador">Prestador</a>
</p></div>
        <div class="col">
            <a class="btn  btn-outline-light" href="?page=cadastro">Cadastro</a>
    </div>
        <div class="col">
        <a class="btn  btn-outline-light" href="?page=login">Login</a>
        </div>
        <div class="col">
        <a class="btn  btn-outline-light" href="?page=sobrenos">Sobre nós</a>
        </div>
    </div>
    
    <div class="row">
        
        <div class="col">
        <p> Facebook: Achenos Garanhuns <br> Youtube: Achenos Brasil <br> Instagram: @achenos
        </div>
        
        <div class="col"> 
        <img src="assets/img/logo_achenos.jpg" alt="Logo da empresa" width="100px" height="70px" border-style: solid;>
        </div>
        
        <div class="col">
        <p>Contate-nos:<br> Email: contatoachenos.gmail.com<br>Central de atendimento: (87) 3014-1789
        </p>
        </div>
    </div>
        
</footer>
</body>
</html>