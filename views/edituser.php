<?php
include_once("../conexao.php");
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: ../login.php');
    exit;
    $_SESSION['nome'];
    $_SESSION['foto'];
    $_SESSION['perfil'];
}

if(isset($_POST) && !empty($_POST))
{
    $id = clear($con,$_POST['id']);
    $nome = clear($con,$_POST['nome']);
    $email = clear($con,$_POST['email']);
    $perfil = clear($con,$_POST['perfil']);
    $senha = clear($con,$_POST['senha']);
       
    if(isset($_FILES["foto"]) && !empty($_FILES["foto"]))
    {
        $imagem = "./upload/". $_FILES["foto"]["name"];
        move_uploaded_file($_FILES["foto"]["tmp_name"] ,$imagem);  
    }else{
        $imagem=""; 
    }

    $sql=mysqli_query($con, "UPDATE usuarios SET nome='$nome', email= '$email', perfil='$perfil',
    senha='$senha', foto='$imagem' WHERE id={$id}");

    if($sql==1)
    { 
        ?>
            <script>
                alert("Usuario atualizado com sucesso!");
            </script>
        <?php
    } 
    header("Location: listusuarios.php");

}
?>