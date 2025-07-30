<?php
require '../vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

include_once("../conexao.php");
$sql = "SELECT * FROM inscricao";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $data = ''; // Variável para armazenar o HTML gerado

    while($row = $result->fetch_assoc()) {
        $data .= '
        <tr>
            <td>' . $row['nome'] . '</td>
            <td>' . $row['bi'] . '</td>
            <td>' . $row['curso'] . '</td>
            <td>' . $row['ensino'] . '</td>
            <td>' . $row['instituto'] . '</td>
        </tr>';
    }
} else {
    $data = '<tr><td colspan="2">Nenhum usuário encontrado</td></tr>';
}



$con->close(); // Feche a conexão após o uso

// Configuração do Dompdf
$options = new Options();
$options->set('isRemoteEnabled', true); // Caso precise carregar imagens remotas
$dompdf = new Dompdf($options);
$imageData = base64_encode(file_get_contents('../img/logo1.jpg'));

// HTML que será convertido em PDF
$html = '
<html>
    <head>
        <link rel="stylesheet" href="CSS/style.css">
        <link rel="stylesheet" href="bootstrap-icons-1.11.3/font/bootstrap-icons.min.css"> 
        <link href="bootstrap-5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="bootstrap-5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <style>
            p{
                padding:10px;
                background-color:#003300;
                color:#ffffff;
                font-size:20px;
            }
            div{ width:100%;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            img { 
                margin-left: 45%;
                height: auto; }
            
            body { font-family: DejaVu Sans, sans-serif;}
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th, td {
                border: 1px solid black;
                padding: 8px;
                text-align:center;
                font-size:13px;
            }
            th {
                background-color: #f2f2f2;
            }
                h3{
                   
                    padding:2px;
                }
                h1{
                    text-align:center;
                    font-size:18px;
                    margin-top:3px;

                }
                h2{
                    text-align:center;
                    font-size:15px;
                    margin-top:1px;
                }
                input{
                width:50%;
                border-radius:4px;
                }
                h4,p{
                text-align:center;}
        </style>
  </head>
  <body>
    <div>
        <img width="134" src="data:img/jpg;base64,' . $imageData . '" alt="">
    </div>
    <h1>UNIDADE HOTELEIRA ADRIANDO HUMBA & FILHOS LDA</h1>  
  <p> Lista nominal dos candidatos inscritos 
  </p>
    <table class="table">
      <tr class="text-center"
        <th>Nome</th>
        <th>Nº do BI </th>
        <th>Curso </th>
         <th>Ensino </th>
        <th>Instituição que frequenta </th>
      </tr>
       ' . $data . '
    </table>
</body>
  
</html>
';

$dompdf->loadHtml($html);

// Define o tamanho do papel e a orientação
$dompdf->setPaper('A4', 'portrait');

// Renderiza o HTML como PDF
$dompdf->render();

// Envia o PDF para o navegador
$dompdf->stream("Inscritos.pdf", ["Attachment" => false]);
?>