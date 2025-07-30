<?php
include_once("../conexao.php");
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $query_delete = mysqli_query($con, "DELETE FROM grupo WHERE idgrupo = $id");
    mysqli_close($con);
    header("Location: grupo.php");
}
?>