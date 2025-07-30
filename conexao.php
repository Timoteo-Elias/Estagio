<?php

   session_start(); 
   
   //Conexão com o servidor e o banco de dados
   $dbHost='Localhost';
   $dbUsername='root';
   $dbPassword='';
   $dbName='estagio';

   $con= new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

   // função de segurança 
    function clear($conexao, $texto_puro)
     {
      //prevenção contra ataques mysql injection
        $texto=mysqli_real_escape_string($conexao, $texto_puro);

      // prevenção contra ataques XSS
        $texto=htmlspecialchars($texto);
        return $texto;
     }

     mysqli_set_charset($con, "utf8");
?>