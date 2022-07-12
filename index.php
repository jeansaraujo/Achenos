<?php include_once 'config/config.php'; include_once 'lib/handling.php'; include_once 'lib/Session.php'; include_once 'lib/queryhandling.php';?>
<?php include_once 'include/header.php';?>
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