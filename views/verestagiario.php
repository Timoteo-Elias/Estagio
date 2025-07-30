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
    $sql = "SELECT * FROM estagiarios WHERE id= {$id}";
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
<div class="container w-75 d-flex justify-content-between mt-2 rounded-3" style="background-color:#ffffff">

    <div class="container px-4 py-5" id="featured-3">
        <div class="row ">
            <div class="col-sm-6">
                <label for="bairro" class="form-label">Nome Completo</label>
                <input value="<?php echo $linha['nome'] ?>" type="text" class="form-control"disabled>
            </div>
            <div class="col-sm-6">
                <label for="bairro" class="form-label">Nº do Bilhete de Identidade</label>
                <input value="<?php echo $linha['bi'] ?>" type="text" class="form-control"disabled>
            </div>
            <div class="col-sm-6">
                <label for="bairro" class="form-label">Genero</label>
                <input value="<?php echo $linha['sexo'] ?>" type="text" class="form-control"disabled>
            </div>
            <div class="col-sm-6">
                <label for="bairro" class="form-label">Data de nascimento</label>
                <input value="<?php echo $linha['nascimento'] ?>" type="text" class="form-control"disabled>
            </div>
        </div>    
            <hr>
        <div class="row ">
            
            <div class="col-sm-4">
                <label for="bairro" class="form-label">Natural da provincia de </label>
                <input value="<?php echo $linha['cidade'] ?>" type="text" class="form-control"disabled>
            </div>
            <div class="col-sm-4">
                <label for="bairro" class="form-label">Município</label>
                <input value="<?php echo $linha['municipio'] ?>" type="text" class="form-control"disabled>
            </div>
            <div class="col-sm-4">
                <label for="bairro" class="form-label">Local</label>
                <input value="<?php echo $linha['bairro'] ?>" type="text" class="form-control"disabled>
            </div>            
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-4">
                <label for="bairro" class="form-label">Número de telefopne</label>
                <input value="<?php echo $linha['telefone'] ?>" type="text" class="form-control"disabled>
            </div> 
            <div class="col-sm-4">
                <label for="bairro" class="form-label">Correio Electrónico</label>
                <input value="<?php echo $linha['email'] ?>" type="text" class="form-control"disabled>
            </div>  
        </div>  
        <hr>
        <div class="row">
            
            <div class="col-sm-3">
                <label for="bairro" class="form-label">Curso</label>
                <input value="<?php echo $linha['curso'] ?>" type="text" class="form-control"disabled>
            </div>  
            <div class="col-sm-2">
                <label for="bairro" class="form-label">Nivel escolar</label>
                <input value="<?php echo $linha['nivel'] ?>" type="text" class="form-control"disabled>
            </div> 

            <div class="col-sm-3">
                <label for="bairro" class="form-label">Data de inscrição</label>
                <input value="<?php echo $linha['datacadastro'] ?>" type="text" class="form-control"disabled>
            </div>
            
        </div>  
        
        <div class="col-sm-1 mt-2">
            <a class="btn btn-outline-primary" href="listestagiarios.php"><i class="bi bi-backspace-fill mt-2"></i></a>
        </div>
            
    </div>
</div>

</body>
</html>