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

    $sql = "SELECT * FROM parceiro WHERE nif LIKE '%$pesquisar%'";
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
<div class="container  d-flex justify-content-between mt-5 rounded-3" style="background-color:#ffffff">

    <div class="container px-4 py-3" id="featured-3">
        <div class="twxt-center">
            <h3 class="">Parceiros</h3>
            
        </div>
        <div class="d-flex justify-content-between mt-5">
            <form action="parceiros.php" method="post" class=" d-flex" role="search">
                <input name="pesquisa" class="form-control me-2" type="search" placeholder="Buscar pelo NIF" aria-label="Search">
                <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i></button>
            </form>
            <div>
            <a class="btn btn-outline-danger" target="_blank" href="parceiropdf.php"><i class="bi bi-file-pdf-fill"></i></a>      
                <a class="btn btn-outline-success" href="index.php"><i class="bi bi-backspace-fill mt-2"></i></a>      
                <a class="btn btn-outline-primary" href="adparceiro.php"><i class="bi bi-plus-lg"></i></a>
            </div>
            
        </div>
        
        
        <div class="w-100 row g-2 py-3">
            <table class="table">
                <thead class="table-dark text-center">
                    <tr>
                        <th scope="col">Nome da Instituição</th>
                        <th scope="col">Nif</th>
                        <th scope="col">Área de atuação</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if ($result->num_rows > 0) {
                        while ($data = mysqli_fetch_assoc($result)) { ?>
                            <tr class="text-center">
                                <td><?php echo $data['nome']; ?></td>
                                <td><?php echo $data['nif']; ?></td>
                                <td><?php echo $data['area']; ?></td>
                                <td><?php echo $data['telefone']; ?></td>
                                <td><?php echo $data['email']; ?></td>
                                <td>
                                <a href="deleteparcer.php?id=<?php echo $data['id']; ?>" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a> 
                                <a href="verparcer.php?id=<?php echo $data['id']; ?>" class="btn btn-success"><i class="bi bi-check-lg"></i></a>  
                                <a href="edit-parcer.php?id=<?php echo $data['id']; ?>" class="btn btn-primary"><i class="bi bi-pen-fill"></i></a>                
                                </td>
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