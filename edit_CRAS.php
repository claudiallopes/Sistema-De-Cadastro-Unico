<?php
include_once("config.php");
include_once("protect.php");

$ID=$_GET["ID"];
$CRAS=$_GET["CRAS"];
$nome_Cras=$_POST['nome_Cras'];
$bairro_Cras=$_POST['bairro_Cras'];
$endereco_Cras=$_POST['endereco_Cras'];

if($CRAS == "Excluir"){
    $query_deletar = mysqli_query ($conexao,"DELETE FROM cras WHERE id_Cras like '$ID'") or die('erro: '.mysqli_error($conexao));
    header('location:consultar_geral.php');
}
elseif($CRAS == "Editar"){
    $query_editar = mysqli_query($conexao,"UPDATE cras set
    nome_Cras = '$nome_Cras',
    bairro_Cras = '$bairro_Cras',
    endereco_Cras = '$endereco_Cras'
    where id_Cras like '$ID'") or die('erro: '.mysqli_error($conexao));
        header('location:consultar_geral.php');

}
?>