<?php
include_once('protect.php');
include_once('config.php');

$editar = $_POST['editar'];
if($editar == "editar")
{
$d_cpf=$_POST['d_cpf'];
$d_nome = $_POST['d_nome'];
$d_parentesco = $_POST['d_parentesco'];
$d_escolaridade = $_POST['d_escolaridade'];
$d_profissao = $_POST['d_profissao'];
$d_renda = str_replace(['R$',''], [',','',], $_POST['d_renda']);
$d_deficiencia = $_POST['d_deficiencia'];
$d_deficiente = $_POST['d_deficiente'];

$query_editar =mysqli_query ($conexao,"update cadastro_dependentes set 

d_nome = '$d_nome',
d_parentesco = '$d_parentesco',
d_escolaridade ='$d_escolaridade',
d_profissao = '$d_profissao ',
d_renda_total = '$d_renda',
d_deficiencia = '$d_deficiencia',
d_deficiencia_qual = '$d_deficiente'
where d_cpf = '$d_cpf' ")
 or die('erro: '.mysqli_error($conexao));

mysqli_close($conexao);
header('location:cadastros.php');
}
elseif($editar == "adicionar")
{
$cpf=$_POST['cpf'];
$d_nome = $_POST['d_nome'];
$d_nascimento = $_POST['d_nascimento'];
$d_parentesco = $_POST['d_parentesco'];
$d_cpf = $_POST['d_cpf'];
$d_escolaridade = $_POST['d_escolaridade'];
$d_profissao = $_POST['d_profissao'];
$d_renda = str_replace(['R$',''], [',','',], $_POST['d_renda']);
$d_deficiencia = $_POST['d_deficiencia'];
$d_deficiente = $_POST['d_deficiente'];

$query_dependente =mysqli_query ($conexao,"INSERT INTO cadastro_dependentes(cadastro_pessoa_CPF,d_cpf, d_nome, d_nascimento, d_parentesco, d_escolaridade, d_profissao, d_renda_total, d_deficiencia, d_deficiencia_qual) 
VALUES ('$cpf','$d_cpf','$d_nome','$d_nascimento','$d_parentesco','$d_escolaridade','$d_profissao','$d_renda','$d_deficiencia','$d_deficiente')") or die('erro: '.mysqli_error($conexao).$cpf);
    
mysqli_close($conexao);
header('location:cadastros.php');
}
elseif ($editar == "apagar") {
$d_cpf=$_POST['d_cpf'];
$cpf=$_POST['cpf'];

$query_deletar = mysqli_query ($conexao,"DELETE FROM cadastro_dependentes WHERE d_cpf = '$d_cpf' AND cadastro_pessoa_CPF = '$cpf' ") or die('erro: '.mysqli_error($conexao));

mysqli_close($conexao);
header('location:cadastros.php');

}


?>