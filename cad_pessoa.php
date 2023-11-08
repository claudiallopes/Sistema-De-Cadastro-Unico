<?php
include_once('protect.php');
include_once('config.php');



$chf_cpf = $_POST["chf_cpf"];
$chf_nome = $_POST["chf_nome"];
$chf_telefone = $_POST["chf_tel"];
$chf_nis = $_POST["chf_nis"];
$chf_sexo = $_POST["chf_sexo"];
$chf_rg = $_POST["chf_rg"];
$chf_uf = $_POST["chf_uf"];
$chf_org_em = $_POST["chf_org_em"];
$chf_data_nasc = $_POST["chf_data_nasc"];
$chf_vd_melhor = $_POST["chf_vida_melhor"];
$chf_natu = $_POST["chf_naturalidade"];
$chf_mae = $_POST["chf_mae"];
$chf_pai = $_POST["chf_pai"];
$chf_cor = $_POST["chf_cor"];
$chf_est_civil = $_POST["chf_est"];
$chf_esc = $_POST["chf_esc"];
$chf_prof = $_POST["chf_profissao"];
$chf_empreg = $_POST["chf_empreg"];
$cep = $_POST["cep"];
$rua = $_POST["address"];
$bairro= $_POST["neighborhood"];
$num_residencia =$_POST["number"];
$complemento=$_POST["complement"];





$result = mysqli_query($conexao, "INSERT INTO cadastro_pessoa(NOME,CPF,TELEFONE,Nis,SEXO,RG,UF,RG_ORG_EMISSOR,DATA_NASCIMENTO,NUM_VIDAMELHOR,NATURALIDADE,MAE,PAI,RACA_COR_,EST_CIVIL,ESCOLARIDADE,PROFISSAO,SITUACAO,CEP,RUA,BAIRRO,COMPLEMENTO,NUM_RESIDENCIA)
VALUES('$chf_nome','$chf_cpf','$chf_telefone','$chf_nis','$chf_sexo','$chf_rg','$chf_uf','$chf_org_em','$chf_data_nasc','$chf_vd_melhor',
'$chf_natu','$chf_mae','$chf_pai','$chf_cor','$chf_est_civil','$chf_esc','$chf_prof','$chf_empreg','$cep','$rua','$bairro','$complemento','$num_residencia')") or die ("erro: ".mysqli_error($conexao));


header('location:aba2.php?CPF='.$chf_cpf);







mysqli_close($conexao)


?>