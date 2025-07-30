
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../bootstrap-icons-1.11.3/font/bootstrap-icons.min.css">
    <link href="../bootstrap-5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="../bootstrap-5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Administração</title>
</head>
<div class="w-100 d-flex justify-content-between; ">
    <div id="hider" class="bg-dark" style="width:20%;">   
        <div style="" class=" pt-3 col-auto min-vh-100 ">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-success" style="width:100%;">
                <h5 class="">ADRIANO HUMBA </h5>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link text-white" aria-current="page">
                            <i class="bi bi-house-fill"></i>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="inscrito.php" class="nav-link text-white">
                            <i class="bi bi-card-list"></i>
                            Inscrições
                        </a>
                    </li>
                    <li>
                        <a href="estagiarios.php" class="nav-link text-white">
                            <i class="bi bi-person-vcard-fill"></i>
                            Estagiarios
                        </a>
                    </li>

                    <li>
                        <a href="parceiros.php" class="nav-link text-white">
                            <i class="bi bi-people"></i>
                            Parceiros
                        </a>
                    </li>
                    <li>
                        <?php
                                if (isset($_SESSION['nome'])) { 
                                                                         
                                        if($_SESSION['perfil'] == 'Admin')  {
                                            ?> 
                                            <a href="listusuarios.php" class="nav-link text-white">
                                                <i class="bi bi-list-ol"></i>
                                                usuarios
                                            </a> <?php
                                        }else {
                                            echo "";
                                    }
                                } else {
                                        echo "Usuário não está logado.";
                                }
                        ?>
                        
                    </li>

                    <li>
                        <a href="resultado.php" class="nav-link text-white">
                        <i class="bi bi-check-circle-fill"></i>
                            Examinados
                        </a>
                    </li>
                    
                    <li>
                        <a href="verexame.php" class="nav-link text-white">
                            <i class="bi bi-list-ol"></i>
                            Exames
                        </a>
                    </li>
                    <li>
                        <a href="postagem.php" class="nav-link text-white">
                        <i class="bi bi-postage"></i>
                            Postagem
                        </a>
                    </li>

                    <li>
                        <a href="../sair.php" class="nav-link text-white">
                        <i class="bi bi-power"></i>
                            Sair
                        </a>
                    </li>
                    
                </ul>
                <hr>
                <div class="dropdown">
                        <a href="#" class="d-flex align-items-center link-light text-decoration-none ">
                            <img src="<?php echo  $_SESSION['foto']; ?>" alt="" width="32" height="32" class="rounded-circle me-2">
                            <strong><?php
                                if (isset($_SESSION['nome'])) { ?>
                                                                         <?php
                                        echo  $_SESSION['nome'];
                                } else {
                                        echo "Usuário não está logado.";
                                }
                        ?></strong></strong>
                        </a>
                </div>  
        </div>
    </div>   
</div>
