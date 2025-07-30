<?php include_once("conexao.php"); 
    $sql= "SELECT * FROM vagas";
    $dados = mysqli_query($con, $sql);
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
    <title>Hospedaria Adriano Humba</title>
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
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-success" aria-label="Ninth navbar example">
        <div class="container-xl">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
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
                    <li class="nav-item"><a href="consultac.php" class="nav-link text-white">Consulta</a></li>
                    <li class="nav-item"><a href="vagas.php" class="nav-link text-white">Vagas</a></li>
                </ul>
            </div>
        </div>
    </nav>
<div class="container mt-4">
    <p class="display-6 text-center text-primary mb-4">Vagas disponíveis</p>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mt-4">
        <?php 
    
            while($linha = mysqli_fetch_assoc($dados))
            {
            ?>  
            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="card-text"> <strong>Área de atuação: </strong> <span class="text-success"><?php echo $linha['area'];?></span></h6>
                        </div>
                        <div class="d-flex justify-content-between align-items-center boder">
                        
                            <p class="card-text text-justify mt-1"><span class="text-success">Desc.: </span><?php echo $linha['descricao']; ?></p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted text-danger">Número do vagas: <span class="text-info"><?php echo $linha['totalvagas'];?></span></small>
                        </div>
                    </div>
                </div>
            </div>
        
        <?php }
        ?>
            
                     
    </div>
</div>

<div class="p-1 bg-dark mt-5">
    <footer class="d-flex flex-wrap justify-content-around align-items-center py-3 my-4 border-top mt-3">
        <div class="">
            <div class="col-md-4 d-flex align-items-center list-unstyled">
                <img class="bi me-2" style="border-radius:5px" width="50" src="img/logo1.jpg" alt="">
            </div>
        </div>

        <div class="pt-2">
            <h6 class="text-center text-light">Contactos</h6>
            <div class="w-100 col-md-4 list-unstyled">
                <li class="ms-3 text-warning"><i class="bi bi-telephone-fill"></i> (+244) 937 480 997</li> 
                <li class="ms-3 text-warning"><i class="bi bi-envelope-at-fill"></i> grupoah.info@gmail.com</li> 
            </div>
        </div>

        <div>
            <h6 class="text-center text-light">Redes sociais</h6>
            <div class="col-md-4 d-flex align-items-center list-unstyled">
                <li class="ms-3 "><a class="bg-light p-1 rounded-3" href="https://www.facebook.com/profile.php?id=61556627045114&mibextid=rS40aB7S9Ucbxw6v"><i class="bi bi-facebook"></i></a></li> 
                <li class="ms-3"><a class="bg-light p-1 rounded-3" href="https://wa.me/244937480997"><i class="bi bi-whatsapp"></i></a></li>
                <li class="ms-3"><a class="bg-light p-1 rounded-3" href="https://www.instagram.com/hospedarias.adrianohumba?igsh=MTI5bDBndnR2Nzh5ZQ=="><i class="bi bi-instagram"></i></a></li> 
            </div>
        </div>
        
    </footer>
    <p class="pb-3 mb-md-0 text-secondary text-center">© 2025 , Todos os direitos reservados</p>
</div>
</body>
</html>