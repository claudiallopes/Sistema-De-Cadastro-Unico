<?php
include_once("config.php");
include_once("protect.php");

$ID=$_GET["ID"];
$acao=$_GET["Acao"];
if($acao == "Excluir"){
    $query_deletar = mysqli_query ($conexao,"DELETE FROM beneficios WHERE IDBEN like '$ID'") or die('erro: '.mysqli_error($conexao));
    header('location:consultar_geral.php');
}
elseif($acao =="Editar"){
$nome_benefi=$_POST['nome_benefi'];
$valor_benefi=$_POST['valor_benefi'];
$desc_benefi=$_POST['desc_benefi'];
$categoria_benefi=$_POST['categoria_benefi'];

$benefi_sql = mysqli_query($conexao,"UPDATE beneficios SET
NOME_BENEFI = '$nome_benefi',
CATEGORIA_BENEFI = '$categoria_benefi',
VALOR_BENEFI = '$valor_benefi',
DESCRICAO_BENEFI = '$desc_benefi'
 where IDBEN like '$ID'") or die ('erro: '.mysqli_error($conexao));
Mysqli_Close($conexao);
header('location:consultar_geral.php');
}
?>