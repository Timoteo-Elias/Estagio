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

        $sql_count= " SELECT  COUNT(*) as es FROM estagiarios";
        $sql_count_es=$con->query($sql_count) or die($con->error);
    
        $sqli_count= $sql_count_es->fetch_assoc();
        $countes=$sqli_count['es'];


        $sqlp= " SELECT  COUNT(*) as p FROM parceiro";
        $sql_p=$con->query($sqlp) or die($con->error);
    
        $sqlp= $sql_p->fetch_assoc();
        $countp=$sqlp['p'];

        $sqli= " SELECT  COUNT(*) as i FROM inscricao";
        $sql_i=$con->query($sqli) or die($con->error);
    
        $sqlii= $sql_i->fetch_assoc();
        $counti=$sqlii['i'];


?>

<!DOCTYPE html>
<html lang="pt">
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
        .m{
            background: linear-gradient(to top, rgba(0, 0, 0, 0.1)50%, rgba(0, 0, 0, 0.1)50%), url('../img/logo1.jpg');
            background-position:center;
            background-size: cover;
            background-repeat:no-repeat;
            position: relative;
        }
    </style>
</head>
<body>
<nav class="navbar shadow navbar-dark bg-success fixed-top d-flex justify-content-between ">
    <div class="container-fluid">
        <div class="">
           <img style="border-radius:5px" width="50" src="../img/logo1.jpg" alt="">
        </div>
        <div class="" style="padding-right:1%">
           <h5 class="text-white">Unidade Hoteleira Adriano Humba & Filhos Lda</h5>
        </div>
    </div>
    
</nav>
<div class="w-100 d-flex justify-content-between">
    <?php include "header.php";  ?>

    <div style="width:80%;" class="m">

    <div class="container px-4 py-5" id="featured-3">
        <div class="w-100 row g-2 py-5">
            <div class="feature col m-2" style="box-shadow:1px 2px 3px; border-radius:8px">
                <div class="">
                    <img style="border-radius:4px" width="40" class="feature-icon bg-primary bg-gradient" src="../img/people_alt_24dp.png" alt="">
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <h6>Total de Estagiarios</h6>
                    <p id="nm" class=" text-danger"><?= $countes; ?></p>
                </div>
            </div>
            <div class="feature col m-2" style="box-shadow:1px 2px 3px; border-radius:8px">
                <div class="">
                    <img style="border-radius:4px" width="40" class="feature-icon bg-primary bg-gradient" src="../img/how_to_reg_24dp.png" alt="">
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <h6>Total de Candidaturas</h6>
                    <p id="nm" class=" text-danger"><?= $counti; ?></p>
                </div>
            </div>
            <div class="feature col m-2" style="box-shadow:1px 2px 3px; border-radius:8px">
                <div class="">
                    <img style="border-radius:4px" width="40" class="feature-icon bg-primary bg-gradient" src="../img/contact_page_24dp.png" alt="">
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <h6>Parceiros</h6>
                    <p id="nm" class=" text-danger"><?= $countp; ?></p>
                </div>
            </div>
            
        </div>        
    </div>
</div>
</body>
</html>