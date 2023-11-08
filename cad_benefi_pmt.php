<?php
include_once("config.php");
include_once("protect.php");

$nome_benefi_pmt=$_POST['nome_benefi_pmt'];
$id_Cras = $_POST['id_Cras'];

$benefi_sql = mysqli_query($conexao,"INSERT INTO beneficios_pmt(nome_benefi_pmt,cras_id_Cras) VALUES('$nome_benefi_pmt','$id_Cras')") or die ('erro: '.mysqli_error($conexao));
Mysqli_Close($conexao);
header('location:beneficios_pmt.php');
?>