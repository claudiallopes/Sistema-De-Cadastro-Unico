<?php

include_once('protect.php');
include_once('config.php');




$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$id_programas = filter_input(INPUT_POST, 'programa_social', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
$Acao = isset($_GET['Acao']) ? $_GET['Acao'] : "";
if($Acao == "excluir"){
  $ID=$_GET['ID'];
  $cpf=$_GET['CPF'];
  $pro_query = mysqli_query($conexao, "DELETE FROM familia_beneficios_g where cadastro_pessoa_CPF like '$cpf' and Beneficios_IDBEN like '$ID'") or die ('erro:'.mysqli_error($conexao).$cpf);
  header('location:cadastro_visualizar.php?CPF='.$cpf);
}
else{
foreach ($id_programas as $id_programa) {

  
  $pro_query = "INSERT INTO familia_beneficios_g(cadastro_pessoa_CPF,Beneficios_IDBEN) VALUES('$cpf','$id_programa')" or die('erro: '.mysqli_error($conexao).$cpf);
  $pro_queries[] = $pro_query;
}
$query_string = implode(";", $pro_queries);

if (mysqli_multi_query($conexao, $query_string)) {
  //consultas foram executadas com sucesso
 mysqli_close($conexao);
} else {
  // ocorreu um erro
  echo "Erro: " . mysqli_error($conexao);
  mysqli_close($conexao);
}
header('location:aba4.php?CPF='.$cpf);
}
?>