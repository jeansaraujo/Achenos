+<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Achenos - O profissional que precisa</title>
</head>
<body>
    <main>
        <div class="container">
            <p class="h1 text-primary d-flex justify-content-center mt-5">Encontre os Melhores profissionais</p>
            <hr>
        </div>
        <div class="container">
            <p class="h2 justify-content-center mt-2">
                Nome do profissional ou cargo
            </p>
        </div>
        <div class="row">
            <div class="offset-3 col-6 justify-content-center mt-1">
                <form method="POST">
                    <input type="text" class="form-control" name="nome" placeholder="Nome" required>
                    <button class="btn btn-outline-primary btn-lg mt-2">
                        Procurar
                    </button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>