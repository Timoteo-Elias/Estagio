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

    $sql = "SELECT * FROM estagiarios WHERE nome LIKE '%$pesquisar%'";
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
<div class="container w-75 d-flex justify-content-between mt-5 rounded-3" style="background-color:#ffffff">

    <div class="container px-4 py-3" id="featured-3">
        <div class="text-center">
            <h3 class="">Estagiarios</h3>
        </div>
        <div class="d-flex justify-content-between mt-5">
            <form action="listaestagiarios.php" method="post" class=" d-flex" role="search">
                <input name="pesquisa" class="form-control me-2" type="search" placeholder="Buscar pelo Nome" aria-label="Search">
                <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i></button>
            </form>
            <div>
            <a class="btn btn-outline-danger" target="_blank" href="estagiariopdf.php"><i class="bi bi-file-pdf-fill"></i></a>
                <a class="btn btn-outline-success" href="estagiarios.php"><i class="bi bi-backspace-fill mt-2"></i></a>      
                <a class="btn btn-outline-success" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus-lg"></i></a>    
            </div>

        </div>
        
        
        <div class="w-100 row g-2 py-3">
            <table class="table">
                <thead class="table-dark text-center">
                    <tr>
                        <th scope="col">Nome Completo</th>
                        <th scope="col">Nº do BI</th>
                        <th scope="col">Data de nascimento</th>
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
                                <td><?php echo $data['bi']; ?></td>
                                <td><?php echo $data['nascimento']; ?></td>
                                <td><?php echo $data['telefone']; ?></td>
                                <td><?php echo $data['email']; ?></td>
                                <td>
                                <a href="deleteparcer.php?id=<?php echo $data['id']; ?>" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a> 
                                <a href="verestagiario.php?id=<?php echo $data['id']; ?>" class="btn btn-primary"><i class="bi bi-check-lg"></i></a>                  
                                </td>
                            </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>
        </div>  
        
    </div>
</div>


<?php 
    include_once("../conexao.php");

    if(isset($_POST) && !empty($_POST))
    {
        $nome = clear($con,$_POST['nome']);
        $bi = clear($con,$_POST['bi']);
        $nascimento = clear($con,$_POST['nascimento']);
        $sexo = clear($con,$_POST['sexo']);
        $telefone = clear($con,$_POST['telefone']);
        $email = clear($con,$_POST['email']);
        $cidade = clear($con,$_POST['cidade']);
        $municipio = clear($con,$_POST['municipio']);
        $bairro = clear($con,$_POST['bairro']);
        $curso = clear($con,$_POST['curso']);
        $nivel = clear($con,$_POST['nivel']);
           

        $query = mysqli_query($con, "SELECT * FROM estagiarios WHERE nome='$nome' OR bi='$bi'");

        if ($query) {
            $result = mysqli_num_rows($query);
        
            if ($result > 0) {
                ?>
                <script>
                    alert("As Credenciais inseridas já existem. Consulte a sua Candidatura por favor!!");
                </script>
                <?php
            }
            else{
                $sql = mysqli_query($con, "INSERT INTO estagiarios(nome,bi,nascimento,sexo,telefone,email,cidade,
                municipio,bairro,curso,nivel) 
                VALUES('$nome','$bi','$nascimento','$sexo', '$telefone', '$email','$cidade', '$municipio', '$bairro','$curso','$nivel')");
            
                if($sql==1)
                { 
                    ?>
                        <script>
                            alert("Estagiario cadastrado com sucesso!");
                        </script>
                    <?php
                } 
            }
        }         
    }
?>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title " id="exampleModalLabel">Cadastrar Estagiario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <form action="listestagiarios.php" class="row w-100" method="post"  enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="firstName" class="form-label"></label>
                            <input name="nome" type="text" class="form-control" placeholder="Nome completo" value="" required>
                        </div>

                        <div class="col-sm-6">
                            <label for="bi" class="form-label">Bilhete de Identidade</label>
                            <input name="bi" type="text" class="form-control" placeholder="Nº do Bilhete" value="" required>
                        </div>

                        <div class="col-sm-6">
                            <label for="data" class="form-label">Data de nascimento</label>
                            <input name="nascimento" type="date" class="form-control"  placeholder="Data de nascimento" required>
                        </div>

                        <div class="col-sm-6">
                            <label for="genero" class="form-label"></label>
                            <select name="sexo" class="form-select"  placeholder="Genero" required>
                                <option>selecionar genero</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="telefone" class="form-label"></label>
                            <input name="telefone" type="number" class="form-control"  placeholder="número de telefone" required>
                        </div>

                        <div class="col-sm-8">
                            <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
                            <input name="email" type="email" class="form-control" id="email" placeholder="you@example.com">
                        </div>
                    </div>

                        
                        <h4 class="mt-3">Endereço</h4>
                        <hr>
                    <div class="row ">
                        <div class="col-sm-6">
                            <label for="cidade" class="form-label"></label>
                            <input name="cidade" type="text" class="form-control"  placeholder="Cidade">
                        </div>

                        <div class="col-sm-6">
                            <label for="municipio" class="form-label"></label>
                            <input name="municipio" type="text" class="form-control"  placeholder="Municipio">
                        </div>

                        <div class="col-sm-6">
                            <label for="bairro" class="form-label"></label>
                            <input name="bairro" type="text" class="form-control"  placeholder="bairro" required>
                        </div>
                        
                    </div>

                    <h4 class="mt-3">Informações académicas</h4>
                    <hr>
                    <div class="row ">
                        <div class="col-sm-6">
                            <label for="curso" class="form-label"></label>
                            <input name="curso" type="text" class="form-control"  placeholder="curso" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="nivel" class="form-label"></label>
                            <input name="nivel" type="text" class="form-control"  placeholder="nivel acadêmico" required>
                        </div>
                        </div>    
                    <div>
                        <input type="submit" name="submit" value="Salvar" class="btn btn-success mt-3 w-25 mb-3">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>