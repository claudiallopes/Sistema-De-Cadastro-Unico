<?php

include_once('config.php');
include_once('protect.php');


$cpf=$_POST['cpf'];
$d_nome = $_POST['d_nome'];
$d_nascimento = $_POST['d_nascimento'];
$d_parentesco = $_POST['d_parentesco'];
$d_cpf = $_POST['d_cpf'];
$d_escolaridade = $_POST['d_escolaridade'];
$d_profissao = $_POST['d_profissao'];
$d_deficiencia = $_POST['d_deficiencia'];
$d_deficiente = $_POST['d_deficiente'];
$d_renda = str_replace(['R$',''], [',','',], $_POST['d_renda']);


$query_dependente =mysqli_query ($conexao,"INSERT INTO cadastro_dependentes(cadastro_pessoa_CPF,d_cpf, d_nome, d_nascimento, d_parentesco, d_escolaridade, d_profissao, d_renda_total,d_deficiencia,d_deficiencia_qual) 
VALUES ('$cpf','$d_cpf','$d_nome','$d_nascimento','$d_parentesco','$d_escolaridade','$d_profissao','$d_renda','$d_deficiencia','$d_deficiente')") or die('erro: '.mysqli_error($conexao).$cpf);

mysqli_close($conexao);
header('location:aba2.php?CPF='.$cpf);










?>