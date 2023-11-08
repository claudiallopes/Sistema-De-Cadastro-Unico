<?php
include_once('config.php');


if(isset($_POST['l_adm_email']) || isset($_POST['l_adm_password']))
{
    //checagem de email do usuario
    if(strlen($_POST['l_adm_email'] === 0))
    {
        echo "preencha o seu email";
        echo "<br><a href=\"login.php\">Voltar</a>";
    }
    //checagem da senha do usuario
    elseif(strlen($_POST['l_adm_password'] === 0))
    {
        echo "preencha sua senha";
        echo "<br><a href=\"login.php\">Voltar</a>";
    }
    //login aceito
    else 
    {
        $l_adm_email = $conexao -> real_escape_string($_POST['l_adm_email']);
        $l_adm_password = $conexao -> real_escape_string($_POST['l_adm_password']);
        $sql_verify = "SELECT adm_senha FROM cadastro_usuario WHERE adm_email = '$l_adm_email'";
        
        //codigo para verificar criptografia da senha
        $senha_verify = mysqli_query($conexao,$sql_verify) or die ("erro:".mysqli_error($conexao));
        $senha_final = $senha_verify -> fetch_array();
        $senha_enviada = $senha_final["adm_senha"];

        if(password_verify($l_adm_password, $senha_enviada)){

            $sql_code ="SELECT*FROM cadastro_usuario WHERE adm_email = '$l_adm_email' And adm_senha  = '$senha_enviada'";
            //$sql_query = mysqli_query($conexao,$sql_code) or die(mysqli_error($conexao));
            $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL:". $conexão->error);
            

            $quantidade = $sql_query->num_rows;
            if ($quantidade == 1) {
                $dbUsername = $sql_query->fetch_assoc();
                if(!isset($_SESSION))
                {
                    session_start();
                    $_SESSION['adm_id'] = $dbUsername['adm_id'];//O id deste usuario
                    $_SESSION['adm_nome'] = $dbUsername['adm_nome'];//O nome do usuario
                    $_SESSION['nv_acesso'] = $dbUsername['nv_acesso'];//nivel de acesso de cada usuario ao site
                    header('location:hub.php');
                }          

                
            }
        }
        else{
            echo "Falha ao logar! email ou senha incorretos";
            echo "<br><a href=\"login.php\">Voltar</a>";
        }
    };
}



?>

