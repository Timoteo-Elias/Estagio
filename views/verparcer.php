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
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM parceiro WHERE id= {$id}";
    $dados = mysqli_query($con, $sql); 
    $linha = mysqli_fetch_assoc($dados);
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
            font-size:18px;
            color:green;
        }
        h6{
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size:16px;
            color:#008080;
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
<body>
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
<div class="container w-75">

    <div class="container px-4 py-5" id="featured-3">
        
        <img src="<?php echo $linha['foto'] ?>" width="60" alt="">
        <h4>Parceiro: <?php echo $linha['nome'] ?></h4>
        
        
        <div class="w-100 row g-2 py-3">
            <p>Númeo de Indetificação Fiscal (NIF): <span><?php echo $linha['nif'] ?></span></p>
            <p>Área de Atuação: <span><?php echo $linha['area'] ?></span></p>
            <p>Localizado na província de: <span><?php echo $linha['cidade'] ?></span>
                município de: <span><?php echo $linha['municipio'] ?></span>, bairro: <span><?php echo $linha['bairro'] ?></span>
            </p>
            <h6>Contactos</h6>
            <p><i class="bi bi-telephone-fill"> <?php echo $linha['telefone'] ?></i></p>
            <p><i class="bi bi-envelope-at-fill"> <?php echo $linha['email'] ?></i></i></p>
        </div>  
        <a class="btn btn-outline-primary" href="parceiros.php"><i class="bi bi-backspace-fill mt-2"> Voltar</i></a>      
    </div>
</div>


</body>
</html>