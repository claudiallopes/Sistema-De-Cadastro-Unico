<?php
include_once('protect.php');
include_once('config.php');



$chf_cpf = $_POST["chf_cpf"];
$chf_nome = $_POST["chf_nome"];
$chf_data_nasc = $_POST["chf_data_nasc"];
$chf_telefone = $_POST["chf_tel"];
$chf_nis = $_POST["chf_nis"];
$chf_sexo = $_POST["chf_sexo"];
$chf_mae = $_POST["chf_mae"];
$chf_pai = $_POST["chf_pai"];
$chf_rg = $_POST["chf_rg"];
$chf_uf = $_POST["chf_uf"];
$chf_org_em = $_POST["chf_org_em"];
$chf_vd_melhor = $_POST["chf_vida_melhor"];
$chf_est_civil = $_POST["chf_est"];
$chf_esc = $_POST["chf_esc"];
$chf_prof = $_POST["chf_profissao"];
$chf_empreg = $_POST["chf_empreg"];
$cep = $_POST["cep"];
$rua = $_POST["address"];
$bairro= $_POST["neighborhood"];
$num_residencia=$_POST["number"];
$complemento=$_POST["complement"];



$query_editar =mysqli_query ($conexao,"update cadastro_pessoa set 
RG = '$chf_rg',
NOME = '$chf_nome',
DATA_NASCIMENTO = '$chf_data_nasc',
TELEFONE = '$chf_telefone',
RG_ORG_EMISSOR = '$chf_org_em',
UF = '$chf_uf ',
SEXO = '$chf_sexo',
MAE = '$chf_mae',
PAI = '$chf_pai',
NUM_VIDAMELHOR = '$chf_vd_melhor',
PROFISSAO = '$chf_prof',
Nis = '$chf_nis',
ESCOLARIDADE = '$chf_esc',
SITUACAO = '$chf_empreg',
EST_CIVIL='$chf_est_civil',
CEP = '$cep',
RUA = '$rua',
BAIRRO ='$bairro',
NUM_RESIDENCIA = '$num_residencia',
COMPLEMENTO = '$complemento'
where CPF = '$chf_cpf' ")
 or die('erro: '.mysqli_error($conexao));

mysqli_close($conexao);
header('location:cadastros.php');



?>