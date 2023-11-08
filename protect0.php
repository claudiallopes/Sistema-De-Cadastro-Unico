<?php

if(!isset($_SESSION))
{
    session_start();

}
if(!isset($_SESSION['adm_id']))
{
    header('location:login.php');
    //die("Você não pode acessar por que não está logado.<p><a href=\"login.php\">Entrar</p>");
    
    
}
?>