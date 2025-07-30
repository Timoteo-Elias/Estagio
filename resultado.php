<?php 
    include_once("conexao.php");       

    $sql = "SELECT r.idresultado, r.estado, i.nome as estagiario,i.bi
    FROM resultado r inner join inscricao i on r.idestagiario=i.id 
    ORDER BY i.nome";
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
    <title>Administração</title>
    <style>
        span{
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            text-overflow: initial;
            margin-left:4%;
            font-size:18px;
            color:#ffffff;
        }
        h6{
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size:16px;
            color:#008080;
            margin-left:2%;
        }
        h5{
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            color:#228B22;
        }
        #nm{
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            margin-right:2%;
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

<div class="container w-75 d-flex justify-content-between mt-5 rounded-3 mb-5 bg-light" >

    <div class="container px-4 py-3" id="featured-3">
        <div class="text-center">
            <h3 class="text-center">Resultado dos exames de acesso</h3>
            
        </div>
        
        
        <div class="w-100 row g-2 py-3 ">
            <table class="table">
                <thead class="table-dark text-center">
                    <tr>
                        <th scope="col">Nome Completo</th>
                        <th scope="col">Número do BI</th>
                        <th scope="col">Estado</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if ($result->num_rows > 0) {
                        while ($data = mysqli_fetch_assoc($result)) { ?>
                            <tr class="text-center">
                                <td><?php echo $data['estagiario']; ?></td>
                                <td><?php echo $data['bi']; ?></td>
                                <td><?php echo $data['estado']; ?></td>
                            </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>
        </div>  
    </div>
</div>

</body>
</html>


  