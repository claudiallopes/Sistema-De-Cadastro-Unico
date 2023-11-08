<?php

include_once('protect0.php');
include_once('config.php');

$PB_CPF = $_POST["PB_Cpf"];
$PB_Nome = $_POST["PB_Nome"];
$PB_Recebedor = $_POST["PB_Recebedor"];
$PB_Benefi = $_POST["PB_Benefi"];
$PB_Quantidade = $_POST["PB_Quantidade"];
$PB_Cras = $_POST["PB_Cras"];
$PB_periodo = $_POST["PB_periodo"];
$PB_CPF_Receb = $_POST["PB_CPFReceb"];

$converter_beneficios="SELECT * FROM beneficios_pmt where ID_BEN_PMT like '$PB_Benefi'";
$converter_cras = "SELECT * FROM cras where id_Cras like '$PB_Cras'";
$conv_ben= mysqli_query($conexao,$converter_beneficios) or die ("erro: ".mysqli_error($conexao));
$conv_cras= mysqli_query($conexao,$converter_cras) or die ("erro: ".mysqli_error($conexao));
$ben = $conv_ben ->fetch_array();
$cras = $conv_cras -> fetch_array();

 
$proce_query = mysqli_query($conexao,"INSERT INTO familia_beneficios_pmt(cadastro_pessoa_CPF,RECEBEDOR,CPF_Recebedor,DATA_ENTREGA,Temp_Concessao,QUANTIDADE,Beneficios_PMT_ID_BEN_PMT,Beneficios_PMT_cras_id_Cras) VALUES('$PB_CPF','$PB_Recebedor','$PB_CPF_Receb',current_timestamp(),'$PB_periodo','$PB_Quantidade','$PB_Benefi','$PB_Cras')") or die('erro: '.mysqli_error($conexao));
mysqli_close($conexao);
header('location:Recibo.php?CPF='.$PB_CPF.'&NOME='.$PB_Nome.'&BENEFICIO='.$ben["NOME_BENEFI_PMT"].'&RECEBEDOR='.$PB_Recebedor.'&CPF_Recebedor='.$PB_CPF_Receb.'&QUANTIDADE='.$PB_Quantidade.'&CRAS='.$cras["nome_Cras"]);
?>
