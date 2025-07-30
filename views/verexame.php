<?php
include_once("../conexao.php");

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: ../login.php');
    exit;
    $_SESSION['nome'];
}
?>
<?php 
    include_once("../conexao.php");     
    $pesquisar = $_POST['pesquisa'] ?? '';

    $sql = "SELECT e.idexame, e.sala,e.dia, e.hora, i.nome as estagiario, i.bi
    FROM exame e inner join inscricao i on e.idinscricao=i.id WHERE i.bi LIKE '%$pesquisar%'
    ORDER BY i.nome";
    $result = mysqli_query($con, $sql); 
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
            margin-left:4%;
            font-size:18px;
            color:green;
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

<div class="container w-75 d-flex justify-content-between mt-5 rounded-3 mb-5" style="background-color:#ffffff">

    <div class="container px-4 py-3" id="featured-3">
        <div class="twxt-center">
            <h3 class="">Lista</h3>
            
        </div>
        <div class="d-flex justify-content-between mt-5">
            <form action="parceiros.php" method="post" class=" d-flex" role="search">
                <input name="pesquisa" class="form-control me-2" type="search" placeholder="Buscar pelo BI" aria-label="Search">
                <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i></button>
            </form>
            <div>
                <a class="btn btn-outline-success" href="index.php"><i class="bi bi-backspace-fill mt-2"></i></a>  
                <a class="btn btn-outline-danger" target="_blank" href="examepdf.php"><i class="bi bi-file-pdf-fill"></i></a>    
            </div>
            
        </div>
        
        
        <div class="w-100 row g-2 py-3 ">
            <table class="table">
                <thead class="table-dark text-center">
                    <tr>
                        <th scope="col">Candidato</th>
                        <th scope="col">Número do BI</th>
                        <th scope="col">Local do exame</th>
                        <th scope="col">Data do teste</th>
                        <th scope="col">Hora de início</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if ($result->num_rows > 0) {
                        while ($data = mysqli_fetch_assoc($result)) { ?>
                            <tr class="text-center">
                                <td><?php echo $data['estagiario']; ?></td>
                                <td><?php echo $data['bi']; ?></td>
                                <td><?php echo $data['sala']; ?></td>
                                <td><?php echo $data['dia']; ?></td>
                                <td><?php echo $data['hora']; ?></td>
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


  