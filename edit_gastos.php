<?php

include_once('config.php');
include_once('protect.php');

$gasto_alim=0.00;
$gasto_agua=0.00;
$gasto_gas=0.00;
$gasto_luz=0.00;
$gasto_medic=0.00;
$gasto_tel=0.00;
$gasto_aluguel=0.00;
$gasto_outros=0.00;

 $cond_moradia = $_POST['cond_moradia'];
 $quant_comodos = $_POST['comodos'];
 $tempo_morad = $_POST['moradia'];
 $gasto_alim = str_replace(['R$',''], [',','',], $_POST['alimentacao']);
 $gasto_agua = str_replace(['R$',''], [',','',], $_POST['agua']);
 $gasto_luz = str_replace(['R$',''], [',','',], $_POST['luz']);
 $gasto_gas = str_replace(['R$',''], [',','',], $_POST['gas']);
 $gasto_medic = str_replace(['R$',''], [',','',], $_POST['medicamento']);
 $gasto_tel =  str_replace(['R$',''], [',','',], $_POST['telefone']);
 $gasto_aluguel = str_replace(['R$',''], [',','',], $_POST['aluguel']);
 $gasto_outros = str_replace(['R$',''], [',','',], $_POST['outros']);
 
 $total_gas = $gasto_alim + $gasto_agua + $gasto_luz + $gasto_gas + $gasto_medic + $gasto_tel + $gasto_aluguel + $gasto_outros;
 $cpf = $_POST['cpf'];

$query_gasto =mysqli_query ($conexao,"update cadastro_pessoa set 
cond_morad = '$cond_moradia',
quant_comod = '$quant_comodos',
total_gastos= '$total_gas',
tempo_morad = '$tempo_morad',
val_aliment = '$gasto_alim',
val_agua = '$gasto_agua',
val_energia = '$gasto_luz',
val_gas = '$gasto_gas',
medicamentos = '$gasto_medic',
val_telefone = '$gasto_tel',
val_aluguel = '$gasto_aluguel',
outros_gastos = '$gasto_outros'
where cpf = '$cpf' ")
 or die('erro: '.mysqli_error($conexao));

mysqli_close($conexao);
header('location:cadastros.php');
