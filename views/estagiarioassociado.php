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

    $sql = "SELECT es.id_asosiado, e.nome,e.bi, e.curso, e.nivel, p.nome as instituicao 
    FROM estassociado es inner join estagiarios e on es.id_estagiario=e.id 
    inner join parceiro p on es.id_parceiro=p.id";
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
            <h3 class="">Estagiarios das instituições parceiras</h3> 
        </div>
        <div class="d-flex justify-content-between mt-5">
            <form action="parceiros.php" method="post" class=" d-flex" role="search">
                <input name="pesquisa" class="form-control me-2" type="search" placeholder="Buscar pelo Nome" aria-label="Search">
                <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i></button>
            </form>
            <div>
            <a class="btn btn-outline-danger"  target="_blank" href="associadospdf.php"><i class="bi bi-file-pdf-fill"></i></i></a>
                <a class="btn btn-outline-success" href="estagiarios.php"><i class="bi bi-backspace-fill mt-2"></i></a>
                <a class="btn btn-outline-primary" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus-lg"></i></a>
            </div>            
        </div>
        
        
        <div class="w-100 row g-2 py-3">
            <table class="table">
                <thead class="table-dark text-center">
                    <tr>
                        <th scope="col">Nome Completo</th>
                        <th scope="col">Nº do BI</th>
                        <th scope="col">Curso</th>
                        <th scope="col">Nivel</th>
                        <th scope="col">Instituição</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if ($result->num_rows > 0) {
                        while ($data = mysqli_fetch_assoc($result)) { ?>
                            <tr class="text-center">
                                <td><?php echo $data['nome']; ?></td>
                                <td><?php echo $data['bi']; ?></td>
                                <td><?php echo $data['curso']; ?></td>
                                <td><?php echo $data['nivel']; ?></td>
                                <td><?php echo $data['instituicao']; ?></td>
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
        $instituto = clear($con,$_POST['instituto']);
        $estagiario = clear($con,$_POST['estagiario']);
        $query = mysqli_query($con, "SELECT * FROM estassociado WHERE id_estagiario='$estagiario'");

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
                $sql = mysqli_query($con, "INSERT INTO estassociado(id_parceiro,id_estagiario) 
                VALUES('$instituto', '$estagiario')");
                if($sql==1)
                { 
                    ?>
                        <script>
                            alert("Feito com sucesso!");
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
                <h1 class="modal-title " id="exampleModalLabel">Inscrição</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <form action="estagiarioassociado.php" class="row w-100" method="post"  enctype="multipart/form-data">
                    <div class="row ">

                        <div class="col-sm-6">   
                            <?php 
                            include_once("../conexao.php");
                            $sql="SELECT * FROM parceiro";
                            $dado = mysqli_query($con, $sql);
                            
                            ?>
                            <label for="instituto" class="form-label"></label>
                            <select name="instituto"  class="form-control">
                                <option value="">Selecionar o Instituição</option>
                                    <?php 
                                        if($dado){
                                            while($linha = mysqli_fetch_assoc($dado))
                                                {
                                                ?> 
                                                <option value="<?php echo $linha['id']; ?>"><?php echo $linha['nome']; ?></option>
                                    <?php 
                                                }
                                                    
                                            }

                                    ?>   
                            </select>
                        </div>

                        <div class="col-sm-6">   
                            <?php 
                            include_once("../conexao.php");
                            $sql="SELECT * FROM estagiarios";
                            $dado = mysqli_query($con, $sql);
                            
                            ?>
                            <label for="instituto" class="form-label"></label>
                            <select name="estagiario"  class="form-control">
                                <option value="">Selecionar o estudante</option>
                                    <?php 
                                        if($dado){
                                            while($linha = mysqli_fetch_assoc($dado))
                                                {
                                                ?> 
                                                <option value="<?php echo $linha['id']; ?>"><?php echo $linha['nome']; ?></option>
                                    <?php 
                                                }
                                                    
                                            }

                                    ?>   
                            </select>
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