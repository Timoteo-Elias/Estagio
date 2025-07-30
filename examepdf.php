<?php
require 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

include_once("conexao.php");
$id = $_GET['id'];
$sql = "SELECT e.idexame, e.sala,e.dia, e.hora, i.nome as estagiario, i.bi, i.curso, i.sexo
    FROM exame e inner join inscricao i on e.idinscricao=i.id WHERE e.idexame=$id";
$result = $con->query($sql);

// Preparar dados para inclusão no PDF
$data = '';

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        
        $nome = $row['estagiario'];
        $bi = $row['bi'];
        $sexo = $row['sexo'];
        $curso = $row['curso'];
        $dia = $row['dia'];
        $hora = $row['hora'];
        $sala = $row['sala'];        
    }
} else {
    $data = '<tr><td colspan="2">Nenhum usuário encontrado</td></tr>';
}

$con->close(); // Feche a conexão após o uso

// Configuração do Dompdf
$options = new Options();
$options->set('isRemoteEnabled', true); // Caso precise carregar imagens remotas
$dompdf = new Dompdf($options);

// HTML que será convertido em PDF
$html = '
<html>
    <head>
        <link rel="stylesheet" href="CSS/style.css">
        <link rel="stylesheet" href="bootstrap-icons-1.11.3/font/bootstrap-icons.min.css"> 
        <link href="bootstrap-5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="bootstrap-5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <style>
            div{
                background-color:#003300;
            }
            body { font-family: DejaVu Sans, sans-serif; }
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th, td {
                border: 1px solid black;
                padding: 8px;
                text-align: left;
            }
            th {
                background-color: #f2f2f2;
            }
                h3{
                    color:#ffffff;
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
                border-radius:4px;}
                h4,p{
                text-align:center;}
        </style>
  </head>
  <body>
    <h1>UNIDADE HOTELEIRA ADRIANDO HUMBA & FILHOS LDA</h1>  
    <h2>Exame de acesso</h2>
  <div>
    <h3>Dados do Candidato</h3>    
  </div>
   
       <h4> NOME COMPLETO: ' . htmlspecialchars($nome) . '<h4>
    <p>
        Nº DO BI: ' . htmlspecialchars($bi) . '<br>
        GÊNERO: ' . htmlspecialchars($sexo) . '
    </p>
    <div>
    <h3>Dados da prova</h3>    
  </div>
    <table class="table">
      <tr class="text-center"
        <th>Curso</th>
        <th>Data do exame </th>
        <th>Hora de inicio </th>
        <th>Local do exame </th>
      </tr>
      <tr class="text-center">
        <td>' . htmlspecialchars($curso) . '</td>
        <td>' . htmlspecialchars($dia) . '</td>
        <td>' . htmlspecialchars($hora) . '</td>
        <td>' . htmlspecialchars($sala) . '</td>

    </table>
<br>
<br>
    <span><strong>Obs:. </strong> o candicado deve se fazer acompanhar do seu bilhete de identidade original juntamente
  com este recibo no dia da realização da prova</span>
  </body>
  
</html>
';

$dompdf->loadHtml($html);

// Define o tamanho do papel e a orientação
$dompdf->setPaper('A4', 'portrait');

// Renderiza o HTML como PDF
$dompdf->render();

// Envia o PDF para o navegador
$dompdf->stream("Recibo_de_exame.pdf", ["Attachment" => false]);
?>