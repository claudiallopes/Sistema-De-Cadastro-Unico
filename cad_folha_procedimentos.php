<?php
include_once("config.php");
include_once("protect.php");


$anotar = $_POST['anotar'];
$id_anot = $_POST['id_anot'];
if($anotar == "adicionar" ){
$CPF=$_POST['cpf'];
$ANOTACAO = $_POST['ANOTACAO'];

$folha_sql = mysqli_query($conexao,"INSERT INTO cadastro_proced(cadastro_pessoa_CPF,Anotacoes) VALUES('$CPF','$ANOTACAO')") or die ('erro: '.mysqli_error($conexao));
Mysqli_Close($conexao);
header('location:cadastro_visualizar.php?CPF='.$CPF);
}
elseif($anotar == "editar")
{
$CPF=$_POST['cpf'];
$ANOTACAO = $_POST['ANOTACAO'];
$folha_sql = mysqli_query($conexao,"UPDATE cadastro_proced set
Anotacoes = '$ANOTACAO'
where cadastro_pessoa_CPF like '$CPF' and id_anot like '$id_anot'
") or die('erro: '.mysqli_error($conexao));
Mysqli_Close($conexao);
header('location:cadastro_visualizar.php?CPF='.$CPF);
}
elseif($anotar == "excluir")
{
$CPF=$_POST['cpf'];
$folha_sql = mysqli_query($conexao,"DELETE FROM cadastro_proced where cadastro_pessoa_CPF like '$CPF'  and id_anot like '$id_anot' ");
Mysqli_Close($conexao);
header('location:cadastro_visualizar.php?CPF='.$CPF);
}
?>