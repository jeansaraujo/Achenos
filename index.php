<?php 
    include_once 'config/config.php'; 
    include_once 'lib/handling.php'; 
    include_once 'lib/Session.php'; 
    include_once 'lib/queryhandling.php';
    include_once 'include/header.php';
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
    <title>Achenos - O profissional que precisa</title>
</head>
<body>
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
</body>
</html>