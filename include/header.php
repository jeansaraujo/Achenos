<?php 	Session::init(); if (isset($_GET['action']) && $_GET['action'] == 'logout') {Session::destroy();}?>
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
            <a href="index.php"><img src="assets/img/logo_achenos.jpg"></a>
        </div>
        <?php include_once 'navbar.php';?>
        
           
    </header>