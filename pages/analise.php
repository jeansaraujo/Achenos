
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
    <header class="container-fluid">
        <div class="logo d-flex justify-content-center">
            <a href="?page=home"><img class="logo-img"src="assets/img/logo_achenos.jpg"></a>
        </div>
        <nav class="navbar navbar-expand-lg" id="navbar">
            <div class="nav-container">
                <div class="row">
                    <div class="offset-2 col-9 offset-1">
                        <a class="navbar-brand" href="#"></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="d-flex justify-content-center align-items-center">
                                <li class="caixa-item" role="button">
                                    <a class="caixa-link" href="?page=home">Home</a>
                                </li>
                                <li class="caixa-item" role="button">
                                    <a class="caixa-link" href="?page=prestador">Prestador</a>
                                </li>
                                <li class="caixa-item" role="button">
                                    <a class="caixa-link" href="?page=busca">Busca</a>
                                </li>
                                <!--
                                    <li class="caixa-item" role="button">
                                        <a class="caixa-link" href="?page=avaliacoes">Avaliações</a>
                                    </li>
                                -->
                                                                <div class="dropdown">
                                        <button class="caixa-item dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            Trabalhe Conosco
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="?page=login">Login</a></li>
                                            <li><a class="dropdown-item" href="?page=cadastro">Cadastro</a></li>                                        
                                        </ul>
                                    </div>                                
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
        <div class="row" style="margin-top: -2rem; padding-bottom: 3rem;">
            <div class="col">
                <p class="h1 text-primary d-flex justify-content-center mt-5">Listagem de Prestador</p>
                <hr>
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
            <div class='col-3'>
                <div class='card'>
                    <img class='img-tamanho mt-2'src=img\apple.png>
                    <div class='card-body'>
                        <h5 class='card-title'>Administrador</h5>
                        <h5 class='card-title'>Maisa SENAC</h5>                        
                        <div style='height:5em;'>
                            <p class='card-text'>Educação Profissional</p>                            
                        </div>
                        <hr>
                        <div class='d-flex justify-content-between align-itens-center'>
                            <span>879999999
                            </span>
                            <a href='https://api.whatsapp.com/send?phone=879999999&text=Quero contratar%20seu%20serviço%20,Maisa SENAC'><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                                </svg>
                            </a>
                            <a target='_blank' href='index.php?page=detalhes&id=7' class='btn btn-primary'>
                                Mais Detalhes
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class='col-3'>
                <div class='card'>
                    <img class='img-tamanho mt-2'src=img\8-dicas-para-desenvolver-sua-inteligência-emocional-e1627585686130.jpg>
                    <div class='card-body'>
                        <h5 class='card-title'>Administrador de Arquivos</h5>
                        <h5 class='card-title'>Camila SENAC</h5>                        
                        <div style='height:5em;'>
                            <p class='card-text'>Educação Profissional SENAC Garanhuns</p>                            
                        </div>
                        <hr>
                        <div class='d-flex justify-content-between align-itens-center'>
                            <span>
                                8799999999
                            </span>                        
                            <a href='https://api.whatsapp.com/send?phone=8799999999&text=Quero contratar%20seu%20serviço%20,Camila SENAC'><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                                </svg>
                            </a>
                            <a target='_blank' href='index.php?page=detalhes&id=8' class='btn btn-primary'>
                                Mais Detalhes
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class='col-3'>
                <div class='card'>
                    <img class='img-tamanho mt-2'src=img\BARBA.jpg>
                    <div class='card-body'>
                        <h5 class='card-title'>Desenvolvedor</h5>
                        <h5 class='card-title'>Ruan Developer</h5>                        
                        <div style='height:5em;'>
                            <p class='card-text'>PHP, HTML, CSS, Java tudo </p>                            
                        </div>
                        <hr>
                        <div class='d-flex justify-content-between align-itens-center'>
                            <span>87981475398
                            </span>                        
                            <a href='https://api.whatsapp.com/send?phone=87981475398&text=Quero contratar%20seu%20serviço%20,Ruan Developer'><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                                </svg>
                            </a>                                
                            <a target='_blank' href='index.php?page=detalhes&id=9' class='btn btn-primary'>
                                Mais Detalhes
                            </a>
                        </div>
                    </div>
                </div>
            </div>    
            <a href="index.php?page=detalhes">teste link</a>
        </div>
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