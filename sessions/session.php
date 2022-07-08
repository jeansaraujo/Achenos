<?php
    session_start();
    echo session_id();
    //$_SESSION['curso']="Programador";
    //$_SESSION['local']="SENAC";
    //var_dump($_SESSION);
    //echo $_SESSION['local'];
    //echo session_save_path();    



    //redirecionar
    header("Location:admin");
    //criar sessão
    // guarda o email numa variável de sessão

?>   
