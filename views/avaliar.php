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

    $sql = "SELECT * FROM estagiarios";
    $resulted = mysqli_query($con, $sql); 

    if(isset($_POST) && !empty($_POST))
    {
        $estagiario = clear($con,$_POST['estagiario']);
        $comportamento= clear($con,$_POST['comportamento']);
        $participacao = clear($con,$_POST['participacao']);
        $desempenho= clear($con,$_POST['desempenho']);
        $query = mysqli_query($con, "SELECT * FROM avaliar WHERE idestagiario='$estagiario'");

        if ($query) {
            $result = mysqli_num_rows($query);
        
            if ($result > 0) {
                header('Location: avaliar.php');
            }
            else{
                $sql = mysqli_query($con, "INSERT INTO avaliar(idestagiario,comportamento,participacao,desempenho) 
                VALUES('$estagiario', '$comportamento','$participacao', '$desempenho')");
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
        <div class="d-flex justify-content-between mt-1">
            <div>
                <a class="btn btn-outline-success" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-question-octagon-fill"></i></a>
            </div>
            <div>
                <a class="btn btn-outline-danger" target="_blank" href="avaliarpdf.php"><i class="bi bi-file-pdf-fill"></i></a>
                <a class="btn btn-outline-success" href="estagiarios.php"><i class="bi bi-backspace-fill mt-2"></i></a>      
            </div>

        </div>
        
        
        <div class="w-100 row g-2 py-3">
            <form action="avaliar.php" class="row w-100" method="post"  enctype="multipart/form-data">
                <table class="table">
                    <thead class="table-dark text-center">
                        <tr>
                            <th scope="col">Nome Completo</th>
                            <th scope="col">Comportamento</th>
                            <th scope="col">Participação</th>
                            <th scope="col">Desempenho</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if ($resulted->num_rows > 0) {
                            while ($data = mysqli_fetch_assoc($resulted)) { ?>
                                <div class="row ">
                                <tr class="text-center">
                                    <td>
                                        <div class="col-sm-14">
                                            <select name="estagiario"  class="form-control">
                                                    <option value="<?php echo $data['id']; ?>"><?php echo $data['nome']; ?></option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-sm-14">
                                            <input name="comportamento" type="radio" value="Mau">
                                            <input name="comportamento" type="radio"  value="Normal">
                                            <input name="comportamento" type="radio" value="Bom">
                                            <input name="comportamento" type="radio" value="Muito Bom">
                                            <input name="comportamento" type="radio"  value="Excelente">
                    
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-sm-14">
                                            <input name="participacao" type="radio" value="Mau">
                                            <input name="participacao" type="radio"  value="Normal">
                                            <input name="participacao" type="radio" value="Bom">
                                            <input name="participacao" type="radio" value="Muito Bom">
                                            <input name="participacao" type="radio"  value="Excelente">
                    
                                        </div>
                                        
                                    </td>
                                    <td>
                                        <div class="col-sm-14">
                                            <input name="desempenho" type="radio" value="20%">
                                            <input name="desempenho" type="radio"  value="40%">
                                            <input name="desempenho" type="radio" value="60%">
                                            <input name="desempenho" type="radio" value="80%">
                                            <input name="desempenho" type="radio"  value="100%">
                    
                                        </div>
                                        
                                    </td>
                                </tr>
                                </div>
                        <?php }
                        } ?>
                    </tbody>
                </table>
                <div>
                    <input type="submit" name="submit" value="Salvar" class="btn btn-success mt-3 w-25 mb-3">
                </div>
            </form>
        </div>  
        
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title " id="exampleModalLabel">Ajuda</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-between">
                <div>
                    <h4>Comportamento</h4>
                    <div>
                        <input type="radio" checked> Mau
                    </div>
                    
                    <div>
                        <input type="radio" checked> Normal
                    </div>
                    <div>
                        <input type="radio" checked> Bom
                    </div>
                    <div>
                        <input type="radio" checked> Muito Bom
                    </div>
                    <div>
                        <input type="radio" checked> Excelente
                    </div>
                </div>

                <div>
                    <h4>Participação</h4>
                    <div>
                        <input type="radio" checked> Mau
                    </div>
                    
                    <div>
                        <input type="radio" checked> Normal
                    </div>
                    <div>
                        <input type="radio" checked> Bom
                    </div>
                    <div>
                        <input type="radio" checked> Muito Bom
                    </div>
                    <div>
                        <input type="radio" checked> Excelente
                    </div>
                </div>

                <div>
                    <h4>Desempenho</h4>
                    <div>
                        <input type="radio" checked> 20%
                    </div>
                    
                    <div>
                        <input type="radio" checked> 40%
                    </div>
                    <div>
                        <input type="radio" checked> 60%
                    </div>
                    <div>
                        <input type="radio" checked> 80%
                    </div>
                    <div>
                        <input type="radio" checked> 100%
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>