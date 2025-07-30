<?php 
    include_once("conexao.php");     
    $pesquisar = $_POST['pesquisa'] ?? '';

    $sql = "SELECT e.idexame, e.sala,e.dia, e.hora, i.nome as estagiario, i.bi
    FROM exame e inner join inscricao i on e.idinscricao=i.id WHERE i.bi='$pesquisar'";
    $result = mysqli_query($con, $sql); 
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
<body style="background-color:#A9A9A9">

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
                </ul>
            </div>
        </div>
    </nav>
<div class="mb-5">
    <div class="container w-75 mt-5 p-3 bg-light rounded-3">
        <div  class=" text-center mt-2">
            <h3 class="">Estado da candidatura</h3>
        </div> 
        <div class="d-flex justify-content-center mt-2">
            <form action="exame.php" method="post" class="w-75 d-flex" role="search">
                <input name="pesquisa" class="form-control me-2" type="search" placeholder="Buscar pelo BI" aria-label="Search" style="border:1px solid #006b70">
                <button class="btn btn-success" type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div>
        <div class="w-100 row g-2 py-3 mt-4 mb-5">
                <?php 
                if ($result->num_rows > 0)
                
                {?>
                <?php
                    if ($result->num_rows > 0) {
                        while ($data = mysqli_fetch_assoc($result)) { ?>
                    <table class="table">
                        <thead class="table-dark text-center">
                            <tr>
                                <th scope="col">Candidato</th>
                                <th scope="col">Número do BI</th>
                                <th scope="col">Local do exame</th>
                                <th scope="col">Data do teste</th>
                                <th scope="col">Hora de início</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center ">
                                <td><?php echo $data['estagiario']; ?></td>
                                <td><?php echo $data['bi']; ?></td>
                                <td><?php echo $data['sala']; ?></td>
                                <td><?php echo $data['dia']; ?></td>
                                <td><?php echo $data['hora']; ?></td>
                                <td>
                                <a  href="examepdf.php?id=<?php echo $data['idexame'] ?>&v=<?php echo $data['idexame'] ?>" target="_blank" class="btn btn-danger"><i class="bi bi-file-pdf-fill"></i></a> 
                                </td>
                            </tr>
                        </tbody>
                     </table>
                    <?php }
                    } 
                }
            ?>
        </div>  
       
    </div>

</div>

<div class="p-1 bg-dark mt-5">
    <footer class="d-flex flex-wrap justify-content-around align-items-center py-3 my-4 border-top">
        <div class="">
            <div class="col-md-4 d-flex align-items-center list-unstyled">
                <img class="bi me-2" style="border-radius:5px" width="50" src="img/logo1.jpg" alt="">
            </div>
        </div>

        <div class="pt-2">
            <h6 class="text-center text-light">Contactos</h6>
            <div class="w-100 col-md-4 list-unstyled">
                <li class="ms-3 text-warning"><i class="bi bi-telephone-fill"></i> (+244) 942 108 301</li> 
                <li class="ms-3 text-warning"><i class="bi bi-envelope-at-fill"></i> adrianohumba@gmail.com </li> 
            </div>
        </div>

        <div>
            <h6 class="text-center text-light">Redes sociais</h6>
            <div class="col-md-4 d-flex align-items-center list-unstyled">
                <li class="ms-3 "><a class="bg-light p-1 rounded-3" href="#"><i class="bi bi-facebook"></i></a></li> 
                <li class="ms-3"><a class="bg-light p-1 rounded-3" href="#"><i class="bi bi-whatsapp"></i></a></li> 
                <li class="ms-3"><a class="bg-light p-1 rounded-3" href="#"><i class="bi bi-twitter"></i></a></li> 
            </div>
        </div>
        
    </footer>
    <p class="pb-3 mb-md-0 text-secondary text-center">© 2024 , Todos os direitos reservados</p>
</div>
</div>