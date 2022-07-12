//Coloca a pasta que a imagem vai aqui no uploads/;
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    if(isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    if($check !== false) {
                        echo "O arquivo é uma imagem" . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        echo "O arquivo não é uma imagem.";
                        $uploadOk = 0;
                    }
                    }

                    //Para verificar se já tem a mesma foto no banco de dados
                    if (file_exists($target_file)) {
                    echo "Este arquivo já existe em nosso banco de dados.";
                    $uploadOk = 0;
                    }

                    // Tamanho do arquivo
                    if ($_FILES["fileToUpload"]["size"] > 500000) {
                    echo "Desculpa, o arquivo é muito grande.";
                    $uploadOk = 0;
                    }

                    // Apenas formatos
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) {
                    echo "Desculpe, apenas arquivos do tipo JPG, JPEG, PNG & GIF são permitidos.";
                    $uploadOk = 0;
                    }

                    // Verificar erro no arquivo
                    if ($uploadOk == 0) {
                    echo "O aquivo não pôde ser enviado, tente novamente.";
                    } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        echo "O arquivo ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " já foi enviado.";
                    } else {
                        echo "Desculpe, existe algum erro em seu arquivo.";
                    }
                    }