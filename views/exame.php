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
    $sql = "SELECT * FROM inscricao WHERE id= {$id}";
    $dados = mysqli_query($con, $sql); 
    $linha = mysqli_fetch_assoc($dados);
}

if(isset($_POST) && !empty($_POST)){
    $id =  clear($con,$_POST['id']);
    $sala = clear($con,$_POST['sala']);
    $dia = clear($con,$_POST['dia']);
    $hora = clear($con,$_POST['hora']);
    $query = mysqli_query($con, "SELECT * FROM exame WHERE idinscricao='$id'");

        if ($query) {
            $result = mysqli_num_rows($query);
        
            if ($result > 0) {
                ?>
                <script>
                    alert("O estudante já tem exame marcado!");
                </script>
                <?php
            }
            else{
                $sql = mysqli_query($con, "INSERT INTO exame(sala,dia,hora,idinscricao) 
                VALUES('$sala', '$dia','$hora','$id')");
                if($sql==1)
                { 
                    ?>
                        <script>
                            alert("Exame marcado com sucesso!");
                        </script>
                    <?php
                    header("Location: inscrito.php");
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
<div class="container w-50 d-flex justify-content-between mt-4 rounded-3" style="background-color:#ffffff">

    <div class="container px-4 py-5" id="featured-3">
        <form action="exame.php" class="row w-100" method="post"  enctype="multipart/form-data">
            <h3 class="text-center">Marcar exame</h3>
            <div class="row mt-3">
                <div class="col-sm-6">
                    <label for="bairro" class="form-label">Nome Completo</label>
                    <input value="<?php echo $linha['nome'] ?>" type="text" class="form-control"disabled>
                </div>
                <div class="col-sm-4">
                    <label for="bairro" class="form-label">Nº do BI</label>
                    <input value="<?php echo $linha['bi'] ?>" type="text" class="form-control"disabled>
                </div>
                <div class="col-sm-2">
                    <label for="bairro" class="form-label">Codigo</label>
                    <select name="id"  class="form-control">
                        <option value="<?php echo $linha['id']; ?>"><?php echo $linha['id']; ?></option>
                    </select>
                </div>
            </div> 
            <div class="row mt-3">

                <div class="col-sm-4">
                    <label for="bairro" class="form-label">Sala</label>
                    <input name="sala" type="text" class="form-control">
                </div>
                <div class="col-sm-4">
                    <label for="bairro" class="form-label">Data de exame</label>
                    <input name="dia" type="date" class="form-control">
                </div>
                <div class="col-sm-4">
                    <label for="bairro" class="form-label">hora</label>
                    <input name="hora" type="time" class="form-control">
                </div>
            </div>   
            
            <div>
                <input type="submit" name="submit" value="Concluir" class="btn btn-success mt-3 mb-3">
                <a class="btn btn-outline-success" href="inscrito.php"><i class="bi bi-backspace-fill mt-2"> Voltar</i></a>       
            </div>
            
        </form>      
    </div>
</div>

</body>
</html>