<?php
include_once("config.php");
include_once("protect.php");

$ID=$_GET["ID"];
$acao=$_GET["Acao"];
if($acao == "Excluir"){
    $query_deletar = mysqli_query ($conexao,"DELETE FROM beneficios_pmt WHERE ID_BEN_PMT like '$ID'") or die('erro: '.mysqli_error($conexao));
    header('location:consultar_geral.php');
}
elseif($acao =="Editar"){
$nome_benefi_pmt=$_POST['nome_benefi_pmt'];
$benefi_sql = mysqli_query($conexao,"UPDATE beneficios_pmt SET
NOME_BENEFI_PMT = '$nome_benefi_pmt'
 where ID_BEN_PMT like '$ID'") or die ('erro: '.mysqli_error($conexao));
Mysqli_Close($conexao);
header('location:consultar_geral.php');
}
?>