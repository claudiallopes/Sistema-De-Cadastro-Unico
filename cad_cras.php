<?php
include_once('config.php');
include_once('protect.php');
$nome_Cras=$_POST['nome_Cras'];
$bairro_Cras=$_POST['bairro_Cras'];
$endereco_Cras=$_POST['endereco_Cras'];


if(isset($_POST['nome_Cras']) || isset($_POST['bairro_Cras']) || isset( $_POST['endereco_Cras'])){
    if(strlen($_POST['nome_Cras'] === 0))
    {
        header('location:cras.php');
    }
elseif(strlen($_POST['bairro_Cras'] === 0))
    {
        header('location:cras.php');
    }
elseif(strlen($_POST['endereco_Cras'] === 0))
    {
        header('location:cras.php');
    }
else{
        $query = mysqli_query($conexao,"INSERT INTO cras(nome_Cras,bairro_Cras,endereco_Cras)
        VALUES('$nome_Cras','$bairro_Cras','$endereco_Cras')") or die ("erro: ".mysqli_error($conexao));
        header('location:cras.php');
}
}
?>