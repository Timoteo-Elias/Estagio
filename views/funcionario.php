<?php
include_once("../conexao.php");

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: ../index.php');
    exit;
    $_SESSION['nome'];
}
?>
<?php
    include_once("../conexao.php");
    if(isset($_POST) && !empty($_POST))
    {
        $nome = clear($con,$_POST['nome']);
        $nascimento = clear($con,$_POST['nascimento']);
        $sexo = clear($con,$_POST['sexo']);
        $email = clear($con,$_POST['email']);
        $telefone = clear($con,$_POST['telefone']);
        $funcao = clear($con,$_POST['funcao']);
        
        $sql=mysqli_query($con,"INSERT INTO funcionario(nome,nascimento,sexo,email,telefone,funcao)
        VALUES ('$nome','$nascimento','$sexo','$email','$telefone','$funcao')");
        
        if($sql==1) {
            $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Funcionario Cadastrado!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
        } else {
            $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Erro ao cadastrar!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
        }        
    }

    $sql_count="SELECT  COUNT(*) as p FROM funcionario";
    $sql_count_p=$con->query($sql_count) or die($con->error);

    $sqli_count= $sql_count_p->fetch_assoc();
    $countp=$sqli_count['p'];
    
    $limit= 6;
    $intervalo= 4;
    $pg_number= ceil($countp / $limit);
    $query = mysqli_query($con, "SELECT * FROM funcionario");
    $result = mysqli_num_rows($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
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
        label, h6{
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size:16px;
            color:#5F9EA0;
            margin-left:2%;
        }
    </style>
</head>
<body>
    <?php include "header.php";  ?>
    <div style="width:80%;background-color:#dcdcdc;padding-bottom:12%;heigth:100vh" class="">

        
        <div class="w-100 d-flex justify-content-between p-3 bg-dark">
            <div class="w-50 text-center ">
                <h3 class="text-white">Zango </h3>
            </div>
            <div class="text-white" style="padding-right:1%">
                <p ><?php echo htmlspecialchars($_SESSION['nome']); ?></p>
            </div>

        </div>
        <div class="container" style="width:95%;margin-bottom:5%;margin-top:5%;background-color:#ffffff;border-radius:5px">
            <form  action="funcionario.php" method="post"  enctype="multipart/form-data">
                <div style="padding-top:3%" class="row">
                    <div class="col-md-3">
                        <label for="" class="form-label">Nome do funcionario</label>
                        <input id="input" type="text" name="nome" class="form-control" placeholder="digite o nome" requerid>
                    </div>

                    <div class="col-md-3">
                        <label for="" class="form-label">data de nascimento</label>
                        <input id="input" type="date" name="nascimento" class="form-control" placeholder="data de nascimento" requerid>
                    </div>

                    <div class="col-md-3">
                        <label for="" class="form-label">sexo</label>
                        <select id="input" name="sexo" id="" class="form-control" requerid>
                            <option value="">Selecionar sexo</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label for="" class="form-label">Email</label>
                        <input id="input" type="email" name="email" class="form-control" placeholder="digite o email" requerid>
                    </div>

                    <div class="col-md-3 ">
                        <label for="" class="form-label">telefone</label>
                        <input id="input" type="text" name="telefone" class="form-control"  placeholder="digite o telefone" requerid>
                    </div>

                    <div class="col-md-3 ">
                    <label for="" class="form-label">função</label>
                        <select id="input" name="funcao" id="" class="form-control" requerid>
                            <option value="">Selecionar a função</option>
                            <option value="Segurança">Segurança</option>
                            <option value="Secretaria">Personal</option>
                            <option value="Administração">Administração</option>
                            <option value="Secretaria">Secretaria</option>
                            <option value="Limpeza">Limpeza</option>
                        </select>
                    </div>

                    <div class="mt-2">
                        <input type="submit" name="submit" value="Cadastrar" class="btn btn-success mt-3 mb-3">
                    </div>
                </div>
            </form>
        </div> 
        
<div class="container" style="width:97%">
<h6 class="mb-3">Registros totais: <?= $countp; ?></h6>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr class="bg-dark text-white">
                <th scope="row">Nome</th>
                <th>data de nascimento</th>
                <th>genero</th>
                <th>email</th>
                <th>telefone</th>
                <th>função</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result > 0) {
                while ($data = mysqli_fetch_assoc($query)) { ?>
                    <tr >

                        <td scope="row"><?php echo $data['nome']; ?></td>
                        <td><?php echo $data['nascimento']; ?></td>
                        <td><?php echo $data['sexo']; ?></td>
                        <td><?php echo $data['email']; ?></td>
                        <td><?php echo $data['telefone']; ?></td>
                        <td><?php echo $data['funcao']; ?></td>
                        <td>
                        <a href="eliminarfu.php?id=<?php echo $data['id']; ?>" class="btn btn-danger"><img width="30" src="../img/delete_24dp.png" alt=""></a>
                        <a href="#" class="btn btn-success"> <img width="30" src="../img/edit_24dp.png" alt=""></a>
                            
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