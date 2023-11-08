<?php
include_once('config.php');




$adm_nome = $_POST['adm_nome'];
$c_adm_sobrenome= $_POST['c_adm_sobrenome'];
$c_adm_email= $_POST['c_adm_email'];
$c_adm_cpf= $_POST['c_adm_cpf'];
$c_adm_number= $_POST['c_adm_number'];
$c_adm_password= $_POST['c_adm_password'];
$c_adm_confirmSenha= $_POST['c_adm_confirmSenha'];
$gender= $_POST['gender'];
$nv_Acesso = 0;

    if(isset($_POST['c_adm_email']) || isset($_POST['c_adm_password'])){
        if(strlen($_POST['c_adm_email'] === 0))
        {
            echo "Digite um email";
            echo "<br><a href=\"index.php\">Voltar</a>";
        }
    elseif(strlen($_POST['c_adm_password'] === 0))
        {
            echo "Digite uma senha";
            echo "<br><a href=\"index.php\">Voltar</a>";
        }
    elseif($c_adm_confirmSenha != $c_adm_password)
        {
            header('location:index.php');
        }
    else
        {
            $senhaSegura = password_hash($c_adm_password, PASSWORD_DEFAULT);
            
            $query_usuario = mysqli_query($conexao, "INSERT INTO cadastro_usuario(adm_nome,adm_email,adm_sobrenome,adm_cpf,adm_number,adm_senha,adm_genero,nv_acesso) VALUES('$adm_nome','$c_adm_email','$c_adm_sobrenome','$c_adm_cpf','$c_adm_number','$senhaSegura','$gender','$nv_Acesso')" ); 
            mysqli_close($conexao);
            header('location:hub.php');
        }
    }


//------------------------------------------------------------------------------



?>