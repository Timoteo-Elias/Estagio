<?php 

if(isset($_POST['usuario']) && !empty($_POST['usuario']) && !empty(['senha']))
{
    include_once("conexao.php");
   
    $user = clear($con, $_POST['usuario']);
    $senha = clear($con, $_POST['senha']);
   
    $sql =mysqli_query($con, "SELECT id,nome,email,perfil,senha,foto FROM usuarios WHERE email='$user' AND senha='$senha' ") ;
    $login  = mysqli_fetch_array($sql);

    if($sql)
    {
        if(mysqli_num_rows($sql) > 0)
        {
            $_SESSION['loggedin'] = true;
            $_SESSION['nome']=$login['nome'];
            $_SESSION['email']=$login['email'];
            $_SESSION['perfil']=$login['perfil'];
            $_SESSION['foto']=$login['foto'];
            header("location:views/index.php");
        }
        else{
            header("location: login.php");
        }
       
    }else{
        header("location: login.php");
    }
    $con = null;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <link href="bootstrap-5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="bootstrap-5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Autenticação</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center bg-dark" style="">
    
<main class="container-xxl w-50 mt-5 form-signin">
  <form action="login.php" class="container w-75 p-3" method="post">
    <img class="mb-3" src="img/logo1.jpg" alt="" width="80" height="75" style="border-radius:4px">
    <h1 class="h3 mb-3 fw-normal text-white">Iniciar sessão</h1>

    <div class="form-floating">
      <input type="email" name="usuario" class="form-control" id="floatingInput" placeholder="digite o seu email" required>
      <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating mt-3 mb-3">
      <input type="password" name="senha" class="form-control" id="floatingPassword" placeholder="Password" required>
      <label for="floatingPassword">Senha</label>
    </div>

 
    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Entrar</button>
    <p class="mt-5 mb-3 text-white">&copy; 2024</p>
  </form>
</main>


    
  </body>
</html>
