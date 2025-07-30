<?php 
include_once("../conexao.php");

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: ../login.php');
    exit;
    $_SESSION['nome'];
    $_SESSION['foto'];
    $_SESSION['perfil'];
}

    if(isset($_POST) && !empty($_POST))
    {
        $nome = clear($con,$_POST['nome']);
        $email = clear($con,$_POST['email']);
        $perfil = clear($con,$_POST['perfil']);
        $senha = clear($con,$_POST['senha']);
           
        if(isset($_FILES["foto"]) && !empty($_FILES["foto"]))
        {
            $imagem = "./upload/". $_FILES["foto"]["name"];
            move_uploaded_file($_FILES["foto"]["tmp_name"] ,$imagem);  
        }else{
            $imagem=""; 
        }

        $query = mysqli_query($con, "SELECT * FROM usuarios WHERE nome='$nome' OR email='$email'");

        if ($query) {
            $result = mysqli_num_rows($query);
        
            if ($result > 0) {
                ?>
                <script>
                    alert("Usuario já cadastrado");
                </script>
            <?php
            }

            else
            {
            $sql = mysqli_query($con, "INSERT INTO usuarios(nome,email,perfil,senha,foto) 
            VALUES('$nome','$email','$perfil','$senha','$imagem')");
                    if($sql==1)
                    { 
                        ?>
                            <script>
                                alert("Usuario cadastrado com sucesso!");
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
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../bootstrap-icons-1.11.3/font/bootstrap-icons.min.css">
    <link href="../bootstrap-5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="../bootstrap-5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
<body style="background-color:#e5e5e5">
<nav class="navbar shadow navbar-dark bg-success d-flex justify-content-between ">
    <div class="container-fluid">
        <div class="">
           <img style="border-radius:5px" width="50" src="../img/logo1.jpg" alt="">
        </div>
        <div class="" style="padding-right:1%">
           <h5 class="text-white">Unidade Hoteleira Adriano Humba & Filhos Lda</h5>
        </div>
    </div>
    
</nav>
<div class="container w-75 d-flex justify-content-between mt-5 rounded-3" style="background-color:#ffffff">
    <div class=" px-4 py-3" id="featured-3">       
        <div class="w-100 row g-2 py-3">                
            <form action="usuario.php" class="row w-100" method="post"  enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-12">
                        <label for="firstName" class="form-label"></label>
                        <input name="nome" type="text" class="form-control" placeholder="Nome completo" value="" required>
                    </div>

                    <div class="col-sm-8">
                        <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="you@example.com" required>
                    </div>

                    <div class="col-sm-6">
                        <label for="perfil" class="form-label"></label>
                         <select name="perfil" class="form-select"  required>
                            <option>selecionar perfil</option>
                            <option value="Admin">Admin</option>
                            <option value="Comum">Comum</option>
                        </select>
                    </div>  
                            
                    <div class="col-sm-6">
                        <label for="senha" class="form-label"></label>
                        <input name="senha" type="password" class="form-control"  placeholder="Senha">
                    </div>
                    <div class="mt-2 col-sm-12">
                        <label for="foto" class="form-label">Anexar foto</label>
                        <input name="foto" type="file" class="form-control" id="imagem" onchange="visualizarImagem(event)" accept=".jpg, .jpeg, .png" required image>
                    </div>
                </div>
    
                        <div class="container w-50 mt-2">
                            <img class="w-20" width="150" id="preview" src="">
                        </div>
                        

                        <div>
                            <input type="submit" name="submit" value="Cadastrar" class="btn btn-success mt-3 w-25 mb-3">
                            <a class="btn btn-outline-primary" href="listusuarios.php"><i class="bi bi-backspace-fill mt-2"> Voltar</i></a>
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
</div>
</body>
</html>


  