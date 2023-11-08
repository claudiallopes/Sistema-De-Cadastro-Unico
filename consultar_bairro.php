  <?php
  include_once('config.php');
  include_once('protect0.php');
  //visualizar
  //ISSET($_GET['tsearch']) && ISSET($_GET['csearch']) && 
  if (ISSET($_GET['dataInicial']) && ($_GET['dataFinal'])) //se tiver algum valor
  {
    //executa a pesquisa no BD
    $search = isset($_GET['tsearch']) ? $_GET['tsearch'] : "";
    $csearch = isset($_GET['csearch']) ? $_GET['csearch'] : "";
    $dataInicial=$_GET['dataInicial'];
    $dataFinal=$_GET['dataFinal'];
    if (($search) && ($csearch) && ($dataInicial != $dataFinal) || ($dataInicial == $dataFinal))
    {
      $consulta ="SELECT *, DATE_FORMAT(DATA_ENTREGA,'%d/%m/%Y') AS DATA_ENT FROM familia_beneficios_pmt f inner join  cadastro_pessoa d on f.cadastro_pessoa_CPF = d.CPF inner join beneficios_pmt b on f.Beneficios_PMT_ID_BEN_PMT = b.ID_BEN_PMT where DATA_ENTREGA Between '$dataInicial' and '$dataFinal' and NOME_BENEFI_PMT like '$search' and BAIRRO like '$csearch'  Order By DATA_ENTREGA DESC";
      $soma_consulta ="SELECT SUM(QUANTIDADE) as qnt_Total FROM familia_beneficios_pmt f  inner join  cadastro_pessoa d on f.cadastro_pessoa_CPF = d.CPF  inner join beneficios_pmt b on f.Beneficios_PMT_ID_BEN_PMT = b.ID_BEN_PMT where DATA_ENTREGA Between '$dataInicial' and '$dataFinal' and NOME_BENEFI_PMT like '$search' and BAIRRO like '$csearch'";
      $consulta_ben ="SELECT * FROM beneficios_pmt";
      $consulta_bairro="SELECT * FROM cadastro_pessoa";
    }
    elseif(($csearch) && ($dataInicial != $dataFinal) || ($dataInicial == $dataFinal ))
    {
      $consulta ="SELECT *, DATE_FORMAT(DATA_ENTREGA,'%d/%m/%Y') AS DATA_ENT FROM familia_beneficios_pmt f inner join  cadastro_pessoa d on f.cadastro_pessoa_CPF = d.CPF  inner join beneficios_pmt b on f.Beneficios_PMT_ID_BEN_PMT = b.ID_BEN_PMT where DATA_ENTREGA Between '$dataInicial' and '$dataFinal' and BAIRRO like '$csearch'  Order By  DATA_ENTREGA DESC";
      $soma_consulta ="SELECT SUM(QUANTIDADE) as qnt_Total FROM familia_beneficios_pmt f inner join  cadastro_pessoa d on f.cadastro_pessoa_CPF = d.CPF   inner join beneficios_pmt b on f.Beneficios_PMT_ID_BEN_PMT = b.ID_BEN_PMT where DATA_ENTREGA Between '$dataInicial' and '$dataFinal' and BAIRRO like '$csearch'";
      $consulta_ben ="SELECT * FROM beneficios_pmt";
      $consulta_bairro="SELECT * FROM cadastro_pessoa";
    }
    elseif(($search) && ($dataInicial != $dataFinal) || ($dataInicial == $dataFinal))
    {
      $consulta ="SELECT *, DATE_FORMAT(DATA_ENTREGA,'%d/%m/%Y') AS DATA_ENT FROM familia_beneficios_pmt f inner join  cadastro_pessoa d on f.cadastro_pessoa_CPF = d.CPF  inner join beneficios_pmt b on f.Beneficios_PMT_ID_BEN_PMT = b.ID_BEN_PMT where DATA_ENTREGA Between '$dataInicial' and '$dataFinal' and NOME_BENEFI_PMT like '$search' Order By  DATA_ENTREGA DESC";
      $soma_consulta ="SELECT SUM(QUANTIDADE) as qnt_Total FROM familia_beneficios_pmt f inner join  cadastro_pessoa d on f.cadastro_pessoa_CPF = d.CPF   inner join beneficios_pmt b on f.Beneficios_PMT_ID_BEN_PMT = b.ID_BEN_PMT where DATA_ENTREGA Between '$dataInicial' and '$dataFinal' and NOME_BENEFI_PMT like '$search'";
      $consulta_ben ="SELECT * FROM beneficios_pmt";
      $consulta_bairro="SELECT * FROM cadastro_pessoa";
    }
    else
    {
      $consulta ="SELECT *, DATE_FORMAT(DATA_ENTREGA,'%d/%m/%Y') AS DATA_ENT FROM familia_beneficios_pmt f inner join  cadastro_pessoa d on f.cadastro_pessoa_CPF = d.CPF inner join beneficios_pmt b on f.Beneficios_PMT_ID_BEN_PMT = b.ID_BEN_PMT where DATA_ENTREGA Between '$dataInicial' and '$dataFinal' Order By DATA_ENTREGA DESC";
      $soma_consulta ="SELECT SUM(QUANTIDADE) as qnt_Total FROM familia_beneficios_pmt f inner join cadastro_pessoa d on f.cadastro_pessoa_CPF = d.CPF inner join beneficios_pmt b on f.Beneficios_PMT_ID_BEN_PMT = b.ID_BEN_PMT where DATA_ENTREGA Between '$dataInicial' and '$dataFinal' Order By DATA_ENTREGA DESC";
      $consulta_ben ="SELECT * FROM beneficios_pmt";
      $consulta_bairro="SELECT * FROM cadastro_pessoa";
    }
  }
  else
  {
    $consulta ="SELECT *, DATE_FORMAT(DATA_ENTREGA,'%d/%m/%Y') AS DATA_ENT FROM familia_beneficios_pmt f inner join cadastro_pessoa d on f.cadastro_pessoa_CPF = d.CPF  inner join beneficios_pmt b on f.Beneficios_PMT_ID_BEN_PMT = b.ID_BEN_PMT  Order BY  DATA_ENTREGA DESC";
    $soma_consulta ="SELECT SUM(QUANTIDADE) as qnt_Total FROM familia_beneficios_pmt;";
    $consulta_ben ="SELECT * FROM beneficios_pmt";
    $consulta_bairro="SELECT * FROM cadastro_pessoa";
  }
  $soma_ben =mysqli_query($conexao,$soma_consulta) or die ("erro: ".mysqli_error($conexao));
  $qnt_Total = $soma_ben->fetch_array();
  $con_bairro=mysqli_query($conexao,$consulta_bairro) or die ("erro:".mysqli_error($conexao));
  $con_ben=mysqli_query($conexao,$consulta_ben) or die ("erro: ".mysqli_error($conexao));
  $con = mysqli_query($conexao,$consulta) or die ("erro: ".mysqli_error($conexao));
  
  ?>
  
  <!DOCTYPE html>
  <html lang="pt-br">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Consulta Por Bairro</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
      <link rel="stylesheet" href="css/esse.css">   
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </head>
  <body class="corfundo pb-5">
    
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
  <div class="container-xxl bd-gutter flex-wrap flex-lg-nowrap">  
    <ul class="nav nav-tabs " id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="tab_1" data-bs-toggle="tab" data-bs-target="#tab1-pane" type="button" role="tab" aria-controls="tab1-pane" aria-selected="true">Benefícios Por Periodo</button>
      </li>
    </ul>
    <div class="container-xxl bd-gutter table-responsive flex-lg-nowrap shadow-sm p-3 mb-5 bg-body rounded">
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="tab1-pane" role="tabpanel" aria-labelledby="tab1" tabindex="0"><br>
        <div class="container-fluid me-auto">
          <div>
            <form class="d-flex" role="search" method="GET">
              <div class="input-group mb-3">
                <div class="row">
                  <div class="col m-1">
                        <label for="form-label" class="form-label">Benefícios</label>
                        <select name="tsearch" id="" class="form-select">
                          <option value="" selected readonly>Selecione o Benefício</Option>
                          <?php while($dados_ben = $con_ben->fetch_array()){?>
                          <option  value="<?php echo $dados_ben["NOME_BENEFI_PMT"];?>"><?php echo $dados_ben["NOME_BENEFI_PMT"];?></option>
                          <?php } ?>
                        </select>
                  </div>
                  <div class="col m-1">
                        <label for="form-label" class="form-label">Bairro</label>
                        <select name="csearch" id="" class="form-select">
                            <option value="" selected readonly>Selecione o Bairro</Option>
                            <?php
                              //Armazena bairros em um array
                              $bairros = array();
                              while($dados_bairro = $con_bairro->fetch_array()) {
                                $bairros[] = $dados_bairro["BAIRRO"];
                              }
                              // Remove entradas duplicadas do array de bairros
                              $bairros = array_unique($bairros);
                              // Gera opções do select com bairros únicos
                              foreach ($bairros as $bairro) {
                              ?>
                                <option value="<?php echo $bairro;?>"><?php echo $bairro;?></option>
                              <?php } ?>
                        </select>
                  </div>
                  <div class="col m-1">
                      <label class="form-label" for="flexRadioDefault1">
                        Primeiro período 
                      </label>
                      <input class="form-control" type="date" name="dataInicial" id="dataInicial">
                    </div>
                    <div class="col m-1">
                      <label class="form-label" for="flexRadioDefault2">
                        Último período
                      </label>
                      <input class="form-control" type="date" name="dataFinal" id="Final">
                    </div>
                </div>
              </div>
              <div class="input-group px-2">
                <div class="row">
                    <div class="col m-2">
                      <label for="" class="form-label"></label>
                      <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                    </div>
                    <div class="col m-2">
                      <button class="btn mt-4 btn-outline-danger" type="submit">Limpar</button>
                    </div>

                    <div class="col">
                      <label></label>
                      <h6 class="form-control">Quantidade: <?php echo $qnt_Total["qnt_Total"];?></h6>
                    </div>
                </div>
              </div>    
            </form>
          </div>
            <table class="table">
                <thead>
                  <tr>
                    <th class="py-3 px-md-4">Quantidade</th>
                    <th class="py-3 px-md-4">Benefícios</th>
                    <th class="py-3 px-md-4">CPF(a quem foi atribuido)</th>
                    <th class="py-3 px-md-4 ">Data da entrega</th>
                    <th class="py-3 px-md-4 ">Recebedor</th>
                    <th class="py-3 px-md-4">BAIRRO</th>
                  </tr>
                </thead>  
                <?php
                  while($row = $con->fetch_array()) {
                ?>
                <tbody>  
                      <tr>
                        <th class="py-3 px-md-4"><?php echo $row["QUANTIDADE"];?></th>
                        <th class="py-3 px-md-4"><?php echo $row["NOME_BENEFI_PMT"];?></th>
                        <th class="py-3 px-md-4"><?php echo $row["cadastro_pessoa_CPF"];?></th>
                        <th class="py-3 px-md-4 "><?php echo $row["DATA_ENT"];?></th>
                        <th class="py-3 px-md-4 "><?php echo $row["RECEBEDOR"];?></th>
                        <th class="py-3 px-md-4"><?php echo $row["BAIRRO"];?></th>
                      </tr>
                  </tbody >     
                  <?php
                    }
                  ?>
            </table>
        </div>      
      </div>            
    </div>
  </div>
  </body>
  </html>
