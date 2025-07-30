<?php
include_once("../conexao.php");

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: ../login.php');
    exit;
    $_SESSION['nome'];
}

    if (!empty($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM grupo WHERE idgrupo = {$id}";
        $dados = mysqli_query($con, $sql); 
        $linha = mysqli_fetch_assoc($dados);
    }

    if(isset($_POST) && !empty($_POST))
    {
        $id = clear($con,$_POST['id']);
        $nome = clear($con,$_POST['nome']);
        $categoria = clear($con,$_POST['categoria']);
        $area= clear($con, $_POST['area']);

        $sql = mysqli_query($con, "UPDATE grupo SET nome='$nome', categoria='$categoria', area='$area'
        WHERE idgrupo={$id}");
        header("Location: grupo.php");
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
<div class="container w-75 d-flex justify-content-between mt-5 rounded-3" style="background-color:#ffffff">

    <div class="container px-4 py-3" id="featured-3">
        <form action="edit-grupo.php" class="row w-100" method="post"  enctype="multipart/form-data">
            <div class="row ">
                <div class="col-sm-6">
                    <label for="firstName" class="form-label">Nome do grupo</label>
                    <input value=" <?php echo $linha['nome'] ?>" name="nome" type="text" class="form-control" required>
                </div>

                <div class="col-sm-6">
                    <label for="lastName" class="form-label">categoria</label>
                    <input value=" <?php echo $linha['categoria'] ?>" name="categoria" type="text" class="form-control" required>
                </div>
                <div class="col-sm-6">
                    <label for="lastName" class="form-label">Area de atuação</label>
                    <input value=" <?php echo $linha['area'] ?>" name="area" type="text" class="form-control" required>
                </div>
            </div>     
            <div>
                <input type="submit" name="submit" value="Atualizar" class="btn btn-success mt-3 w-25 mb-3">
                <input type="hidden" name="id" id="" value=" <?php echo $linha['idgrupo'] ?> ">
            </div>
        </form>
              
    </div>
</div>
</body>
</html>