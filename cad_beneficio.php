<?php
include_once('config.php');

$nome_benefi=$_POST['nome_benefi'];
$valor_benefi=$_POST['valor_benefi'];
$desc_benefi=$_POST['desc_benefi'];
$categoria_benefi=$_POST['categoria_benefi'];

if(isset($_POST['valor_benefi']) || isset($_POST['nome_benefi'])){
    if(strlen($_POST['valor_benefi'] === 0))
    {
        header('location:Beneficios.php');
    }
elseif(strlen($_POST['nome_benefi'] === 0))
    {
        header('location:Beneficios.php');
    }
else{
        $query = mysqli_query($conexao,"INSERT INTO beneficios(nome_benefi,categoria_benefi,descricao_benefi,valor_benefi)
        VALUES('$nome_benefi','$categoria_benefi','$desc_benefi','$valor_benefi')") or die ("erro: ".mysqli_error($conexao));
        header('location:Beneficios.php');
}
}
?>