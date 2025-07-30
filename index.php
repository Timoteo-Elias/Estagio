<?php include_once("conexao.php"); ?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="bootstrap-icons-1.11.3/font/bootstrap-icons.min.css"> 
    <link href="bootstrap-5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="bootstrap-5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Hospedaria Adriano Humba</title>
    <style>
        
        span{
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            text-overflow: initial;
            color:azure;
        }
        h6{
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        #nm{
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            margin-right:2%;
        }
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
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-success" aria-label="Ninth navbar example">
        <div class="container-xl">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <img class="bi me-2" style="border-radius:5px;margin-left:3%" width="50" src="img/logo1.jpg" alt="">
                <span class="fs-5">Adriano Humba & Filhos</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07XL" aria-controls="navbarsExample07XL" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample07XL">
               
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="index.php" class="nav-link text-white">Home</a></li>
                    <li class="nav-item"><a href="" class="nav-link text-white">Sobre Nós</a></li>
                    <li class="nav-item"><a href="consultac.php" class="nav-link text-white">Consulta</a></li>
                    <li class="nav-item"><a href="vagas.php" class="nav-link text-white">Vagas</a></li>
                    <li class="nav-item"><a data-bs-toggle="modal" data-bs-target="#exampleModal" href="#" class="nav-link text-white">Candidatar-se</a></li>
                </ul>
            </div>
        </div>
    </nav>
<div class="" id="carrocel">
    <div class="w-75 mt-5 p-1" >
        <div  class=" text-white">
            <h3>Aproveita a oportunidade de se qualificar profissionalmente</h3>
                <p class="text-warning">Venha fazer parte da nossa equipe. A nossa empresa disponibiliza para vc estágios qualificados em diversas árias.</p>
                <p class="text-info">Se insceva já!</p>
        </div> 
    </div>
</div>

<div class="container px-4" id="hanging-icons">
    <h2 class="pb-2 border-bottom">Nossas principais áreas</h2>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
        <div class="col d-flex align-items-start">
            <div>
                <h4 class="text-center text-primary">Hotelaria e Turismo</h4>
                <p id="paragrafo">O estágio proporciona uma experiência valiosa
                     no setor hoteleiro e turístico. Você aprenderá sobre as 
                     operações diárias, atendimento ao cliente, gestão de eventos
                      e muito mais.</p>
            </div>
        </div>
        <div class="col d-flex align-items-start">
            <div>
                <h4 class="text-center text-primary">Contabilidade e Gestão</h4>
                <p id="paragrafo">O estágio permite que o aluno tenha uma 
                    demonstração de como são feitas as tarefas no dia a dia de um 
                    profissional contábil, adquirindo mais conhecimento da profissão
                     que escolheu.</p>        
            </div>
        </div>
        <div class="col d-flex align-items-start">
            <div>
                <h4 class="text-center text-primary">Gestão de Empresas</h4>
                <p id="paragrafo">Estagiar em Gestão de Empresas oferece vários 
                    benefícios que podem impulsionar tanto a carreira quanto o 
                    desenvolvimento pessoal.</p>   
            </div>
        </div>
    </div>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
        <div >
            <div class="text-center">
                <h4 class="text-center text-primary">Marketing</h4>
                <p id="paragrafo">Principais benefícios: Aplicação Prática de Conhecimentos Teóricos,
                Desenvolvimento de Habilidades Criativas e Analíticas, Networking com Profissionais de Marketing
                Experiência com Ferramentas de Marketing Digital...</p>   
                
            </div>
        </div>
        <div >
            <div class="text-center">
                <h4 class="text-center text-primary">Economia</h4> 
                <p id="paragrafo">Principais benefícios: Experiência Prática em Análise Econômica,
                    Entendimento Profundo de Mercados e Políticas, Networking com Economistas e Profissionais da Área 
                    Conhecimento Multidisciplinar...</p>       
            </div>
        </div>
        <div >
            <div class="text-center">
                <h4 class="text-center text-primary">Outros...</h4>  
                <p id="paragrafo">Temos várias outras áreas que oferecem
                     diversas vantagens que podem ser fundamentais tanto para 
                     o desenvolvimento profissional quanto para o crescimento pessoal.
                </p>  
            </div>
        </div>
    </div>
</div> 

<div class="container py-4">
    <div class="p-5 mb-4 bg-dark rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-6 fw-bold text-warning text-center">Responsabilidades</h1>
            <div class="row g-4 py-5 row-cols-2 row-cols-lg-2">
                
                <div class="  text-success">
                    <ul>
                        <li class="  text-success">
                            Apoio nas Atividades Diárias
                        </li>
                        <li class="  text-success">
                            Participação em Projetos
                        </li>
                        <li class="  text-success">
                            Aprendizado e Desenvolvimento
                        </li>
                        <li class="  text-success">
                            Comunicação e Relacionamento
                        </li>

                        <li class="  text-success">
                            Cumprimento de Prazos e Qualidade
                        </li>
                        
                    </ul>                
                </div>  

                <div class="  text-success">
                    <ul>
                        <li class="  text-success">
                            Iniciativa e Proatividade
                        </li>
                        <li class="  text-success">
                            Adaptação e Flexibilidade
                        </li>
                        <li class="  text-success">
                            Cumprimento de Normas e Regras
                        </li>
                        <li class="  text-success">
                            Desenvolvimento de Relatórios
                        </li>
                        <li class="  text-success">
                            Feedback e Autoavaliação
                        </li>
                    </ul>                
                </div>  
            </div>
                      
        </div>
    </div>

    <div class="row align-items-md-stretch">
        <div class="col-md-6">
            <div class="h-100 p-5 text-white bg-dark rounded-3">
                <h2 class=" text-warning">Requisitos</h2>
                <p>
                    <ul>
                        <li class="  text-success">
                            Idade: Estar dentro da faixa etária permitida 
                            (conforme as leis locais para estágios de ensino fundamental);
                        </li>
                        <li class="  text-success">
                            Ser estudante ativo de uma instituição de ensino fundamental;
                        </li>
                        <li class="  text-success">
                            Manter um bom desempenho acadêmico, com notas mínimas estabelecidas
                            pela hospedaria;
                        </li>
                        <li class="  text-success">
                            Ter disponibilidade para cumprir a carga horária do estágio
                        </li>
                    </ul>  
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="h-100 p-5 bg-dark border rounded-3">
                <h2 class="text-warning">Documentação necessária</h2>
                <p>
                    <ul>
                        <li class="  text-success">
                            Cópia do Bilhete de Identidade;
                        </li>
                        <li class="  text-success">
                            Declaração de frequência (Para quem ainda não concluio os estudos);
                        </li>
                        <li class="  text-success">
                            Declaração com notas
                        </li>
                        <li class="  text-success">
                            Certificado com média não inferior a 13 valores (para quem já conclui os estrudos)
                        </li>
                    </ul>  
                </p>
            </div>
        </div>
    </div>
</div>
<main class="container bg-light w-75 px-3 mt-2">
    <p  class="display-6">Nota.: a documentação deve ser entregue na empresa, 
        após passar no processo de seleção</p>
    <p class="">
      <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-lg btn-secondary fw-bold border-white bg-success mb-1">Inscrever-se</a>
    </p>
</main>
<div class="p-1 bg-dark mt-5">
    <footer class="d-flex flex-wrap justify-content-around align-items-center py-3 my-4 border-top mt-3">
        <div class="">
            <div class="col-md-4 d-flex align-items-center list-unstyled">
                <img class="bi me-2" style="border-radius:5px" width="50" src="img/logo1.jpg" alt="">
            </div>
        </div>

        <div class="pt-2">
            <h6 class="text-center text-light">Contactos</h6>
            <div class="w-100 col-md-4 list-unstyled">
                <li class="ms-3 text-warning"><i class="bi bi-telephone-fill"></i> (+244) 937 480 997</li> 
                <li class="ms-3 text-warning"><i class="bi bi-envelope-at-fill"></i> grupoah.info@gmail.com</li> 
            </div>
        </div>

        <div>
            <h6 class="text-center text-light">Redes sociais</h6>
            <div class="col-md-4 d-flex align-items-center list-unstyled">
                <li class="ms-3 "><a class="bg-light p-1 rounded-3" href="https://www.facebook.com/profile.php?id=61556627045114&mibextid=rS40aB7S9Ucbxw6v"><i class="bi bi-facebook"></i></a></li> 
                <li class="ms-3"><a class="bg-light p-1 rounded-3" href="https://wa.me/244937480997"><i class="bi bi-whatsapp"></i></a></li> 
                <li class="ms-3"><a class="bg-light p-1 rounded-3" href="https://www.instagram.com/hospedarias.adrianohumba?igsh=MTI5bDBndnR2Nzh5ZQ=="><i class="bi bi-instagram"></i></a></li> 
            </div>
        </div>
        
    </footer>
    <p class="pb-3 mb-md-0 text-secondary text-center">© 2025 , Todos os direitos reservados</p>
</div>
</div>

<?php 
    include_once("conexao.php");

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
        $ensino = clear($con,$_POST['ensino']);
        $instituto = clear($con,$_POST['instituto']);
        $nivel = clear($con,$_POST['nivel']);
        $curso = clear($con,$_POST['curso']);
           
        if(isset($_FILES["foto"]) && !empty($_FILES["foto"]))
        {
            $imagem = "./upload/". $_FILES["foto"]["name"];
            move_uploaded_file($_FILES["foto"]["tmp_name"] ,$imagem);  
        }else{
            $imagem=""; 
        }

        $query = mysqli_query($con, "SELECT * FROM inscricao WHERE nome='$nome' OR bi='$bi'");

        if ($query) {
            $result = mysqli_num_rows($query);
        
            if ($result > 0) {
                ?>
                <script>
                    alert("As Credenciais inseridas já existem. Consulte a sua Candidatura por favor!!");
                </script>
            <?php
            }

            else
            {
            $sql = mysqli_query($con, "INSERT INTO inscricao(nome,bi,nascimento,sexo,telefone,
            email,cidade, municipio,bairro,ensino,instituto,nivel,curso,foto) 
            VALUES('$nome','$bi','$nascimento','$sexo','$telefone','$email','$cidade','$municipio',
            '$bairro','$ensino','$instituto','$nivel','$curso','$imagem')");
                    if($sql==1)
                    { 
                        ?>
                            <script>
                                alert("Inscrição feita com sucesso!");
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
                
                <form action="index.php" class="row w-100" method="post"  enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="firstName" class="form-label"></label>
                            <input name="nome" type="text" class="form-control" placeholder="Nome completo" value="" required>
                        </div>

                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Bilhete de Identidade</label>
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

                        
                        <h4 class="mt-5">Endereço</h4>
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

                    <h4 class="mt-5">Dados Académicos</h4>
                        <hr>
                    <div class="row ">
                        <div class="col-sm-6">
                            <label for="Ensino" class="form-label"></label>
                            <select name="ensino" class="form-select"  placeholder="ensino" required>
                                <option>selecionar ensino</option>
                                <option value="Medio">Ensio Médio</option>
                                <option value="Superior">Ensino Superior</option>
                            </select>
                        </div>

                        <div class="col-sm-6">
                            <label for="instituto" class="form-label"></label>
                            <input name="instituto" type="text" class="form-control"  placeholder="Instituição que frequenta ou frequentou">
                        </div>

                        <div class="col-sm-6">
                            <label for="" class="form-label"></label>
                            <input name="nivel" type="text" class="form-control"  placeholder="Nível de escolaridade" required>
                        </div>

                        <div class="col-sm-6">
                            <label for="curso" class="form-label"></label>
                            <input name="curso" type="text" class="form-control"  placeholder="Curso" required>
                        </div>
                        <div class="mt-2 col-sm-12">
                            <label for="foto" class="form-label">Anexar imagem do certificado ou declaração com notas</label>
                            <input name="foto" type="file" class="form-control" id="imagem" onchange="visualizarImagem(event)" accept=".jpg, .jpeg, .png" required image>
                        </div>
                    </div>     
                    <div class="container w-50 mt-2">
                        <img class="w-100"  id="preview" src="">
                    </div>
                    

                    <div>
                        <input type="submit" name="submit" value="Cadastrar" class="btn btn-success mt-3 w-25 mb-3">
                    </div>
                </form>
            </div>
        </div>
    </div>

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
</body>
</html>