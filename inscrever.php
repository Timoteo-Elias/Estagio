<?php 
    include_once("conexao.php");

    if(isset($_POST) && !empty($_POST))
    {
        $nome = clear($con,$_POST['nome']);
        $bi = clear($con,$_POST['bi']);
        $nascimento = clear($con,$_POST['nascimento']);
        $sexo = clear($con,$_POST['sexo']);
        $telefone = clear($con,$_POST['telefone']);
        $email = clear($con,$_POST['email']);
        $cidade = clear($con,$_POST['cidade']);
        $municipio = clear($con,$_POST['municipio']);
        $bairro = clear($con,$_POST['bairro']);
        $ensino = clear($con,$_POST['ensino']);
        $instituto = clear($con,$_POST['instituto']);
        $nivel = clear($con,$_POST['nivel']);
        $curso = clear($con,$_POST['curso']);
           
        if(isset($_FILES["foto"]) && !empty($_FILES["foto"]))
        {
            $imagem = "./upload/". $_FILES["foto"]["name"];
            move_uploaded_file($_FILES["foto"]["tmp_name"] ,$imagem);  
        }else{
            $imagem=""; 
        }

        $query = mysqli_query($con, "SELECT * FROM inscricao WHERE nome='$nome' OR bi='$bi'");

        if ($query) {
            $result = mysqli_num_rows($query);
        
            if ($result > 0) {
                ?>
                <script>
                    alert("As Credenciais inseridas já existem. Consulte a sua Candidatura por favor!!");
                </script>
            <?php
            }

            else
            {
            $sql = mysqli_query($con, "INSERT INTO inscricao(nome,bi,nascimento,sexo,telefone,
            email,cidade, municipio,bairro,ensino,instituto,nivel,curso,foto) 
            VALUES('$nome','$bi','$nascimento','$sexo','$telefone','$email','$cidade','$municipio',
            '$bairro','$ensino','$instituto','$nivel','$curso', '$imagem')");
                    if($sql==1)
                    { 
                        ?>
                            <script>
                                alert("Inscrição feita com sucesso!");
                            </script>
                        <?php
                    } 
        }
    }         
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="bootstrap-icons-1.11.3/font/bootstrap-icons.min.css">
    <link href="bootstrap-5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="bootstrap-5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Administração</title>
    <style>
        
        span{
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            text-overflow: initial;
            color:azure;
        }
        h6{
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        #nm{
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            margin-right:2%;
        }
        .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success" aria-label="Ninth navbar example">
        <div class="container-xl">
            <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <img class="bi me-2" style="border-radius:5px;margin-left:3%" width="50" src="img/logo1.jpg" alt="">
                <span class="fs-5">Adriano Humba & Filhos</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07XL" aria-controls="navbarsExample07XL" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample07XL">
               
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="index.php" class="nav-link text-white">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white">Sobre Nós</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white">Serviços</a></li>
                    <li class="nav-item"><a href="consultac.php" class="nav-link text-white">Consulta</a></li>
                    <li class="nav-item"><a href="inscrever.php" class="nav-link text-white">Candidatar-se</a></li>
                </ul>
            </div>
        </div>
    </nav>
<div class="w-100 d-flex justify-content-between">

<div class="container w-75 px-4 py-3" id="featured-3">       
    <div class="w-100 row g-2 py-3">                
        <form action="inscrever.php" class="row w-100" method="post"  enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="firstName" class="form-label"></label>
                            <input name="nome" type="text" class="form-control" placeholder="Nome completo" value="" required>
                        </div>

                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Bilhete de Identidade</label>
                            <input name="bi" type="text" class="form-control" placeholder="Nº do Bilhete" value="" required>
                        </div>

                        <div class="col-sm-6">
                            <label for="data" class="form-label">Data de nascimento</label>
                            <input name="nascimento" type="date" class="form-control"  placeholder="Data de nascimento" required>
                        </div>

                        <div class="col-sm-6">
                            <label for="genero" class="form-label"></label>
                            <select name="sexo" class="form-select"  placeholder="Genero" required>
                                <option>selecionar genero</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="telefone" class="form-label"></label>
                            <input name="telefone" type="number" class="form-control"  placeholder="número de telefone" required>
                        </div>

                        <div class="col-sm-8">
                            <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
                            <input name="email" type="email" class="form-control" id="email" placeholder="you@example.com">
                        </div>
                    </div>

                        
                    <h4 class="mt-3">Endereço</h4>
                        <hr>
                    <div class="row ">
                        <div class="col-sm-6">
                            <label for="cidade" class="form-label"></label>
                            <input name="cidade" type="text" class="form-control"  placeholder="Cidade">
                        </div>

                        <div class="col-sm-6">
                            <label for="municipio" class="form-label"></label>
                            <input name="municipio" type="text" class="form-control"  placeholder="Municipio">
                        </div>

                        <div class="col-sm-6">
                            <label for="bairro" class="form-label"></label>
                            <input name="bairro" type="text" class="form-control"  placeholder="bairro" required>
                        </div>
                    </div>

                    <h4 class="mt-3">Dados Académicos</h4>
                        <hr>
                    <div class="row ">
                        <div class="col-sm-6">
                            <label for="Ensino" class="form-label"></label>
                            <select name="ensino" class="form-select"  placeholder="ensino" required>
                                <option>selecionar ensino</option>
                                <option value="Medio">Ensio Médio</option>
                                <option value="Superior">Ensino Superior</option>
                            </select>
                        </div>

                        <div class="col-sm-6">
                            <label for="instituto" class="form-label"></label>
                            <input name="instituto" type="text" class="form-control"  placeholder="Instituição que frequenta ou frequentou">
                        </div>

                        <div class="col-sm-6">
                            <label for="" class="form-label"></label>
                            <input name="nivel" type="text" class="form-control"  placeholder="Nível de escolaridade" required>
                        </div>

                        <div class="col-sm-6">
                            <label for="curso" class="form-label"></label>
                            <input name="curso" type="text" class="form-control"  placeholder="Curso" required>
                        </div>
                        <div class="mt-2 col-sm-12">
                            <label for="foto" class="form-label">Anexar imagem do certificado ou declaração com notas</label>
                            <input name="foto" type="file" class="form-control" id="imagem" onchange="visualizarImagem(event)" accept=".jpg, .jpeg, .png" required image>
                        </div>
                    </div>     
                    <div class="container w-50 mt-2">
                        <img class="w-100"  id="preview" src="">
                    </div>
                    

                    <div>
                        <input type="submit" name="submit" value="Cadastrar" class="btn btn-success mt-3 w-25 mb-3">
                    </div>
            </form>
            <script>
                function visualizarImagem(event) {
                    var preview = document.getElementById('preview');
                    preview.src = URL.createObjectURL(event.target.files[0]);
                    preview.onload = function() {
                        URL.revokeObjectURL(preview.src); // Libera a memória
                    }
                }
            </script>
        </div>  
        
    </div>
</div>

</body>
</html>


  