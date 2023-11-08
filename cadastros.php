  <?php
  include_once('config.php');
  include_once('protect0.php');
  //visualizar
    if (ISSET($_GET['tsearch']) && ISSET($_GET['selectFiltro'])) //se tiver algum valor
  {
    //executa a pesquisa no BD
    $search=$_GET['tsearch'];
    $filtro=$_GET['selectFiltro'];
    if ($filtro == "NOME")
    {
      $consulta = "Select *, DATE_FORMAT(data_cadastro,'%d/%m/%Y') AS data_cad From cadastro_pessoa where nome like  '%$search%' Order BY  data_cadastro DESC";
    }
    else
    {
      $consulta = "Select *, DATE_FORMAT(data_cadastro,'%d/%m/%Y') AS data_cad From cadastro_pessoa where cpf like  '$search%' Order BY  data_cadastro DESC";
    }

  }
  else
  {
    $consulta = "Select *, DATE_FORMAT(data_cadastro,'%d/%m/%Y') AS data_cad From cadastro_pessoa Order BY  data_cadastro DESC";
  }
  
  $con = mysqli_query($conexao,$consulta) or die ("erro: ".mysqli_error($conexao));
  ?>
  
  <!DOCTYPE html>
  <html lang="pt-br">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>cadastros</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
      <link rel="stylesheet" href="css/esse.css">   
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </head>
  
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
  <body class="corfundo pb-5">
    <nav class="navbar navbar-expand-lg bg-light bd-gutter flex-wrap flex-lg-nowrap shadow-sm p-3 mb-5 bg-body rounded">
      <div class="container-fluid">
        <img class="img-thumbnail " src="images\pf.png" alt="">
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
  <div class="container bd-gutter flex-wrap flex-lg-nowrap">  
    <ul class="nav nav-tabs " id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="tab_1" data-bs-toggle="tab" data-bs-target="#tab1-pane" type="button" role="tab" aria-controls="tab1-pane" aria-selected="true">Registrados</button>
      </li>
    </ul>
    <div class="container bd-gutter table-responsive flex-lg-nowrap shadow-sm p-3 mb-5 bg-body rounded">
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="tab1-pane" role="tabpanel" aria-labelledby="tab1" tabindex="0"><br>
          <div class="container">
            <div>
              <form class="d-flex" role="search" method="GET">
                <input autocomplete="off" class="form-control col m-1" type="search" placeholder="Pesquisar" aria-label="Search" name="tsearch">
                  <div class="form-check col-2 m-1 mt-1">
                    <select class="form-select" name="selectFiltro">
                      <option disabled selected>Filtros</option>
                      <option value="CPF">CPF</option>
                      <option value="NOME">NOME</option>
                    </select>
                  </div>
                <button class="btn col-2 btn-outline-success m-1" type="submit">Pesquisar</button>
              <button class="btn col-2 btn-outline-danger  m-1" type="submit">Limpar</button>
              </form>
            </div>
            <div id="registros-container">
              <table id="registros-table" class="table">
                    <thead>  
                      <tr>
                        <th class="py-3 px-md-4">CPF</th>
                        <th  class="py-3 px-md-4 ">Nome</th>
                        <th  class="py-3 px-md-4 ">Data de Cadastro</th>
                        <th  class="py-3 px-md-4 ">Ações</th>
                      </tr>
                    </thead>  
                  <?php while($dados = $con->fetch_array()){?>
                    <tbody>    
                      <tr>
                        <th class="py-3 px-md-4"><?php echo $dados["CPF"];?></th>
                        <th class="py-3 px-md-4 "><?php echo $dados["NOME"];?></th>
                        <th class="py-3 px-md-4 "><?php echo $dados["data_cad"];?></th>
                        <th><a href="cadastro_visualizar.php?CPF=<?php echo $dados["CPF"];?>" class="btn cor_botao" role="button">Visualizar</a></th>
                      </tr>
                    </tbody>  
                  <?php } ?>
              </table>
            </div>
        </div>      
      </div>            
    </div>
  </div>
  </body>
  </html>