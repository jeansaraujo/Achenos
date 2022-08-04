<?php 
    include_once 'config/config.php';
    include_once 'lib/Session.php'; 
    include_once 'lib/handling.php'; 
    include_once 'lib/parser.php'; 
    include_once 'lib/queryhandling.php';    
    Session::init(); 
    if (isset($_GET['action']) && $_GET['action'] == 'logout') {
        Session::destroy();
    }        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <?php
        include_once 'include/header.php';       
    ?>    
    <main class="container">        
        <?php
            if(isset($_GET['page'])){
                $pagina = $_GET['page'];
                switch($pagina){
                    case "home":
                        include('pages/home.php');
                        break;                    
                    case "busca":
                        include('pages/busca.php');
                        break;
                    case "cadastro":
                        include('pages/cadastro.php');
                        break;
                    case "cadpess":
                        include('pages/cadpess.php');
                        break;
                    case "cadprof":
                        include('pages/cadprof.php');
                        break;
                    case "login":
                        include('pages/login.php');
                        break;                    
                    case "perfil":
                        include('pages/perfil.php');
                        break;    
                    case "prestador":
                        include('pages/prestador.php');
                        break;
                    case "detalhe":
                        include('pages/detalhesprestador.php');
                        break;        
                    case "buscaprestador":
                        include('pages/buscaprestador.php');
                    break;                            
                    default:
                        include('pages/home.php');
                        break;                    
                }
            }
                  
        ?>
    </main>
    <footer class="footer">        
        <div class="row">        
            <div class="col">
                <div class="contato-fb">
                    <a class="fa fa-facebook" href="www.facebook.com/achenosgaranhuns"></a> Achenos Garanhuns 
                </div>
                <div class="contato-yt">
                    <a href="www.youtube.com.br/achenosbrasil" class="fa fa-youtube"></a> Achenos Brasil
                </div>
                <div class="contato-ig">
                    <a href="www.instagram.com/achenos" class="fa fa-instagram"></a> @achenos
                </div>
            </div>        
            <div class="col logo-footer"> 
                <img src="assets/img/logo_achenos_sembg.png" alt="Logo da empresa">
            </div>        
            <div class="col contato-email-tel">
                <p>
                    Contate-nos:<br> Email: contatoachenos.gmail.com<br>Central de atendimento: (87) 3014-1789
                </p>
            </div>
        </div>
    </footer>
</body>
</html>