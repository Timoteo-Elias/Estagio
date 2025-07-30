<?php
include_once("../conexao.php");

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: ../login.php');
    exit;
    $_SESSION['nome'];
    $_SESSION['foto'];
}
?>
<?php 
    include_once("../conexao.php");

    if(isset($_POST) && !empty($_POST))
    {
        $grupos = clear($con,$_POST['grupos']);
        $estagiario = clear($con,$_POST['estagiario']);
        $query = mysqli_query($con, "SELECT * FROM equipa WHERE idestagiario='$estagiario'");

        if ($query) {
            $result = mysqli_num_rows($query);
        
            if ($result > 0) {
                ?>
                <script>
                    alert("O estudante já está enquadrado a um grupo!!");
                </script>
                <?php
            }
            else{
                $sql = mysqli_query($con, "INSERT INTO equipa(idgrupo,idestagiario) 
                VALUES('$grupos', '$estagiario')");
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

    <div class="container w-75 px-4 py-5" id="featured-3">       
        <h3>Associar estudante a equipa</h3>
        <form action="adequipa.php" class="row w-100" method="post"  enctype="multipart/form-data">
                    <div class="row ">

                        <div class="col-sm-6">   
                            <?php 
                            include_once("../conexao.php");
                            $sql="SELECT * FROM grupo";
                            $dado = mysqli_query($con, $sql);
                            
                            ?>
                            <label for="instituto" class="form-label"></label>
                            <select name="grupos"  class="form-control">
                                <option value="">Escolher o grupo</option>
                                    <?php 
                                        if($dado){
                                            while($linha = mysqli_fetch_assoc($dado))
                                                {
                                                ?> 
                                                <option value="<?php echo $linha['idgrupo']; ?>"><?php echo $linha['nome']; ?></option>
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
                                <option value="">Escolher o estudante</option>
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
                        <input type="submit" name="submit" value="Concluir" class="btn btn-success mt-3 mb-3">
                        <a href="equipa.php" class="btn btn-success mt-3 mb-3">Ver</a>
                    </div>
                </form>
    </div>
</div>

</body>
</html>


  