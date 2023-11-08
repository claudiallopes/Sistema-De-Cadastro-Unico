<?php
session_start();
if(isset($_SESSION['adm_id'])){
    session_destroy();
    header("Location:login.php");
}
?>
