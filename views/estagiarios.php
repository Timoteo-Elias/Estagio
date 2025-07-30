<?php
include_once("../conexao.php");

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: ../login.php');
    exit;
    $_SESSION['nome'];
}
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
        div a{
            text-decoration:none;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color:azure;
            letter-spacing:1px;
        }
        div a:hover{
            color:orange;
            transition:1s;
        }
        .gt{
            background: linear-gradient(to top, rgba(0, 0, 0, 0.3)50%, rgba(0, 0, 0, 0.3)50%), url('../img/estagio2.jpeg');
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
<div class="w-100 d-flex justify-content-between; mt-5 gt">
    <?php include "header.php";  ?>

    <div style="width:80%;" class="">

    <div class="container px-4 py-5" id="featured-3">
        <h2 class="text-center text-white">Gestão de estagiarios</h2>
        <div class="w-100 row g-2 py-5">
            <div class="feature col p-2 m-2 d-flex justify-content-between" style="background-color:darkgreen;box-shadow:2px 5px 7px; border-radius:8px">
                <div class="">
                    <img style="border-radius:4px" width="40"  src="../img/contact_page_24dp.png" alt="">
                </div>
                <div class=" mt-3">
                    <a href="listestagiarios.php">Lista de estagiaros</a>
                </div>
            </div>
              
            <div class="feature col p-2 m-2 d-flex justify-content-between" style="background-color:DarkGreen;box-shadow:2px 5px 7px; border-radius:8px">
                <div class="">
                    <img style="border-radius:4px" width="40"  src="../img/contact_page_24dp.png" alt="">
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <a href="estagiarioassociado.php">Estagiarios Associados</a>
                </div>
            </div>
            <div class="feature col p-2 m-2 d-flex justify-content-between" style="background-color:darkgreen;box-shadow:2px 5px 7px; border-radius:8px">
                <div class="">
                    <img style="border-radius:4px" width="40"  src="../img/contact_page_24dp.png" alt="">
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <a href="estavolonta.php">Estagiarios Volontarios</a>
                </div>
            </div>        
        </div>       
        
        <div class="w-100 row g-2 py-5">
            <div class="feature col p-2 m-2 d-flex justify-content-between" style="background-color:darkgreen;box-shadow:2px 5px 7px; border-radius:8px">
                <div class="">
                    <img style="border-radius:4px" width="40"  src="../img/contact_page_24dp.png" alt="">
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <a href="grupo.php">Grupos</a>
                </div>
            </div>
            <div class="feature col p-2 m-2 d-flex justify-content-between" style="background-color:darkgreen;box-shadow:2px 5px 7px; border-radius:8px">
                <div class="">
                    <img style="border-radius:4px" width="40"  src="../img/contact_page_24dp.png" alt="">
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <a href="equipa.php">Equipas</a>
                </div>
            </div>
            <div class="feature col p-2 m-2 d-flex justify-content-between" style="background-color:darkgreen;box-shadow:2px 5px 7px; border-radius:8px">
                <div class="">
                    <img style="border-radius:4px" width="40"  src="../img/contact_page_24dp.png" alt="">
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <a href="avaliar.php">Avaliação</a>
                </div>
            </div>            
        </div>       
    </div>
</div>
</body>
</html>