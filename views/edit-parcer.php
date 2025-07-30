<?php
include_once("../conexao.php");

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: ../login.php');
    exit;
    $_SESSION['nome'];
}
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM parceiro WHERE id= {$id}";
        $dados = mysqli_query($con, $sql); 
        $linha = mysqli_fetch_assoc($dados);
    }

    if(isset($_POST) && !empty($_POST))
    {
        $id = clear($con,$_POST['id']);
        $nome = clear($con,$_POST['nome']);
        $nif = clear($con,$_POST['nif']);
        $area = clear($con,$_POST['area']);
        $telefone = clear($con,$_POST['telefone']);
        $email = clear($con,$_POST['email']);
        $cidade = clear($con,$_POST['cidade']);
        $municipio = clear($con,$_POST['municipio']);
        $local = clear($con,$_POST['local']);
           
        if(isset($_FILES["foto"]) && !empty($_FILES["foto"]))
        {
            $imagem = "./upload/". $_FILES["foto"]["name"];
            move_uploaded_file($_FILES["foto"]["tmp_name"] ,$imagem);  
        }else{
            $imagem=""; 
        }

        $sql=mysqli_query($con, "UPDATE parceiro SET nome='$nome', nif= '$nif', area= '$area', 
        telefone='$telefone',email= '$email', cidade='$cidade', municipio='$municipio', bairro= '$local',
        foto='$imagem' WHERE id={$id}");
                if($sql==1)
                { 
                    ?>
                        <script>
                            alert("Atualizado com sucesso!");
                        </script>
                    <?php
                } 
                header("Location: parceiros.php");
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
<body>
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
<div class="w-100 d-flex justify-content-between">

    <div class="container w-75 px-4 py-5" id="featured-3">       
        <h3>Cadastrar novo parceiro</h3>
        <div class="w-100 row g-2 py-3">                
            <form class="row w-100 bg-light" action="edit-parcer.php" method="post"  enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-12">
                        <label for="firstName" class="form-label">Nome da instituição</label>
                        <input value="<?php echo $linha['nome'] ?>" name="nome" type="text" class="form-control" required>
                    </div>

                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">NIF</label>
                        <input value="<?php echo $linha['nif'] ?>" name="nif" type="text" class="form-control" required>
                    </div>

                    <div class="col-sm-6">
                        <label for="Ensino" class="form-label">Área de Atuação</label>
                        <select name="area" class="form-select" required>
                            <option value="<?php echo $linha['area'] ?>"><?php echo $linha['area'] ?></option>
                            <option value="Ensino Medio">Ensio Médio</option>
                            <option value="Ensino Superior">Ensino Superior</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input value="<?php echo $linha['telefone'] ?>" name="telefone" type="number" class="form-control"  placeholder="número de telefone" required>
                    </div>

                    <div class="col-sm-8">
                        <label for="email" class="form-label">Email</label>
                        <input value="<?php echo $linha['email'] ?>" name="email" type="email" class="form-control" id="email" placeholder="you@example.com" required>
                    </div>
                </div>
                       
                <h4 class="mt-3">Localização da instituição</h4>
                        
                <div class="row ">
                    <div class="col-sm-6">
                        <label for="cidade" class="form-label">Povincia</label>
                        <input value="<?php echo $linha['cidade'] ?>" name="cidade" type="text" class="form-control"  required>
                    </div>

                    <div class="col-sm-6">
                        <label for="municipio" class="form-label">Município</label>
                        <input value="<?php echo $linha['municipio'] ?>" name="municipio" type="text" class="form-control" required>
                    </div>

                    <div class="col-sm-6">
                        <label for="bairro" class="form-label">Local</label>
                        <input value="<?php echo $linha['bairro'] ?>" name="local" type="text" class="form-control" required>
                    </div>
                    <div class="mt-2 col-sm-12">
                        <label for="foto" class="form-label">Anexar o logotipo da instituição</label>
                        <input value="<?php echo $linha['foto'] ?>" name="foto" type="file" class="form-control" id="imagem" onchange="visualizarImagem(event)" accept=".jpg, .jpeg, .png" required image>
                    </div>    
                    <div class="container w-50 mt-2">
                        <img class="w-100"  id="preview" src="<?php echo $linha['foto'] ?>">
                    </div>
                </div>                   

                <div>
                    <input type="submit" name="submit" value="Atualizar" class="btn btn-success mt-3 w-25 mb-3">
                    <input type="hidden" name="id" id="" value=" <?php echo $linha['id'] ?> ">
                    <a class="btn btn-outline-primary" href="parceiros.php"><i class="bi bi-backspace-fill mt-2"> Voltar</i></a>      
                </div>
            </form>
            <script>
                function visualizarImagem(event) {
                    var preview = document.getElementById('preview');
                    preview.src = URL.createObjectURL(event.target.files[0]);
                    preview.onload = function() {
                        URL.revokeObjectURL(preview.src); // Libera a memória
                    }
                }
            </script>
        </div>  
        
    </div>
</div>

</body>
</html>


  