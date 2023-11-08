<?php
include_once('config.php');
include_once('protect0.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/esse.css">   
    <title>hub</title>
</head>
<body class="corfundo">
    
  <div vw class="enabled">
      <div vw-access-button class="active"></div>
      <div vw-plugin-wrapper>
        <div class="vw-plugin-top-wrapper"></div>
      </div>
    </div>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
      new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>
  <nav class="navbar navbar-expand-lg bg-light bd-gutter flex-wrap flex-lg-nowrap shadow-sm p-3 mb-5 bg-body rounded">
        <div class="container-fluid">
          <img class="img-thumbnail" src="images\pf.png" alt="">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="hub.php">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Consultas
                </a>
                
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="cadastros.php">Benefíciados(Familias)</a></li>
                    <li><a class="dropdown-item" href="consultar_periodo.php">Benefícios Por Período</a></li>
                    <li><a class="dropdown-item" href="consultar_bairro.php">Benefícios Por Bairro</a></li>
                  <?php if($_SESSION['nv_acesso'] == 1){?>
                    <li><a class="dropdown-item" href="consultar_geral.php">Cadastros Geral(Prefeitura)</a></li>
                  <?php }; ?>
                  </ul>
                  <?php if($_SESSION['nv_acesso'] == 1){?>
                    <li><a class="nav-link" href="index.php">Cadastrar Entidades</a></li>
                  <?php }; ?>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Perfil
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="logout.php">logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>            
  </nav>
  <br>
    <div class="input-group mb-3">
      <div class=" justify-content-center content container text-center">
        <div class="row">
        <?php if($_SESSION['nv_acesso'] == 1){?>
          <div class="card" style="width: 16rem; margin: 0 auto">
            <img src="images/teste.jfif" class="card-img-top" alt="..." onclick="window.location.href = 'aba1.php'">
            <div class="card-body">
              <h5 class="card-title">Cadastrar Famílias</h5>
              <p class="card-text">Caso seja necessário cadastrar uma nova família</p>
              <button onclick="window.location.href = 'aba1.php'" class="mt-5 cor_botao btn btn-block">Cadastrar</button>
            </div>
          </div>  
        <?php }?>
          <div class="card" style="width: 16rem; margin: 0 auto">
            <img src="images/teste2.jfif" class="card-img-top" alt="..." onclick="window.location.href = 'cadastros.php'">
            <div class="card-body">
              <h5 class="card-title">Famílias Cadastradas</h5>
              <p class="card-text">Quando necessitar visualizar o Cadastro de alguma familia ja cadastrada</p>
              <button onclick="window.location.href = 'cadastros.php'" class="cor_botao btn btn-block">Famílias Cadastradas</button>
            </div>
          </div> 
        <?php if($_SESSION['nv_acesso'] == 1){?>
          <div class="card" style="width: 16rem; margin: 0 auto">
            <img src="images/teste3.png" class="card-img-top" alt="..." onclick="window.location.href = 'Beneficios.php'">
            <div class="card-body">
              <h5 class="card-title">Benefícios Governo</h5>
              <p class="card-text">Quando necessitar cadastrar novos benefícios do Governo</p>
              <button onclick="window.location.href = 'Beneficios.php'" class="mt-4 cor_botao btn btn-block">Benefícios Governo</button>
            </div>
          </div>
        <?php } ?>
        </div>
      </div>
    </div>
    <?php if($_SESSION['nv_acesso'] == 1){?>
      <div class="input-group mb-3">
        <div class=" justify-content-center container text-center">
          <div class="row">
            <div class="card" style="width: 16rem; margin: 0 auto">
              <img src="images/teste4.png" class="card-img-top" alt="..." onclick="window.location.href = 'beneficios_pmt.php'">
              <div class="card-body">
                <h5 class="card-title">Benefícios da Prefeitura</h5>
                <p class="card-text">Quando necessitar cadastrar novos beneficios a serem doados</p>
                <button onclick="window.location.href = 'beneficios_pmt.php'" class="cor_botao btn btn-block btn-buttom">Benefícios Prefeitura</button>
              </div>
            </div> 
            <div class="card" style="width: 16rem; margin: 0 auto">
              <img src="images/teste5.png" class="card-img-top" alt="..." onclick="window.location.href = 'cras.php'">
              <div class="card-body">
                <h5 class="card-title">CRAS</h5>
                <p class="card-text">Quando necessitar cadastrar novos CRAS</p><br>
                <button onclick="window.location.href = 'cras.php'" class="mt-5 cor_botao btn btn-block">Cadastrar CRAS</button>
              </div>
            </div> 
            <div class="card" style="width: 16rem; margin: 0 auto">
              <img src="images/relatorio.png" class="card-img-top" alt="..." onclick="window.location.href = 'consultar_geral.php'">
              <div class="card-body">
                <h5 class="card-title">Consultas</h5>
                <p class="card-text">Quando necessitar consultar os produtos resgatados</p>
                <button onclick="window.location.href = 'consultar_geral.php'" class="mt-5 cor_botao btn btn-block">Consultar</button>
              </div>
            </div> 
          </div>
        </div>
      </div>
    <?php }?>
    <footer class="footer flex-lg-nowrap">
      <div class="text-center bg-white text-black p-3">
        <div class="row">
          <div class="col-4">      
            <img src="images/logo.png" class="image"><br>
          </div>  
          <div class="col-4">  
            <b>Endereço:</b>
            <span class="site-titletextdados">Praça Dr. Aimone Salerno, 171 - Centro<br>Taquaritinga/SP 
            <br>    
            <b>CEP:</b> 15900-012
            </span>
          </div>
          <div class="col-4">
            <b>Telefone:</b>
            <span class="site-titletextdados">(16) 3252-2221</span>
          </div>
        </div>
      </div>
    </footer>



</body>
</html>