  <?php
  include_once('config.php');
  include_once('protect.php');
  //visualizar

  $consulta_ben ="SELECT * FROM beneficios";
  $con_ben=mysqli_query($conexao,$consulta_ben) or die ("erro:".mysqli_error($conexao));
  $consulta ="SELECT * FROM cras";
  $con=mysqli_query($conexao,$consulta) or die ("erro:".mysqli_error($conexao));
  $consulta_ben_pmt ="SELECT * FROM beneficios_pmt a inner join cras b on b.id_Cras = a.cras_id_Cras";
  $con_ben_pmt=mysqli_query($conexao,$consulta_ben_pmt) or die ("erro:".mysqli_error($conexao));

  ?>
  
  <!DOCTYPE html>
  <html lang="pt-br">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Consulta Geral</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
      <link rel="stylesheet" href="css/esse.css">   
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </head>
  <body class="corfundo ">
    
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
  <div class="container-fluid table-responsive bg-light bd-gutter flex-wrap flex-lg-nowrap">  
    <ul class="nav nav-tabs " id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="tab_1" data-bs-toggle="tab" data-bs-target="#tab1-pane" type="button" role="tab" aria-controls="tab1-pane" aria-selected="true">Beneficios Governo</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="CRAS" data-bs-toggle="tab" data-bs-target="#CRAS-pane" type="button" role="tab" aria-controls="CRAS-pane" aria-selected="false">CRAS Registrados</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="tab_2" data-bs-toggle="tab" data-bs-target="#tab2-pane" type="button" role="tab" aria-controls="tab2-pane" aria-selected="true">Beneficios Prefeitura</button>
      </li>
    </ul>
    <div class="container-fluid bd-gutter flex-lg-nowrap shadow-sm p-3 mb-5 bg-body rounded">
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="tab1-pane" role="tabpanel" aria-labelledby="tab1" tabindex="0"><br>
          <div class="container-fluid">
  
              <table class="table">
                  <thead>
                    <tr>
                      <th class="py-3 px-md-4">Benefícios</th>
                      <th class="py-3 px-md-4">Categoria</th>
                      <th class="py-3 px-md-4 ">Valor</th>
                      <th class="py-3 px-md-4">Descrição</th>
                      <th class="py-3 px-md-4">Ações</th>

                    </tr>
                  </thead>  
                  <?php while($dados = $con_ben->fetch_array()){?>
                  <tbody>
                    <tr>
                      <th class="py-3 px-md-4"><?php echo $dados["NOME_BENEFI"];?></th>
                      <th class="py-3 px-md-4"><?php echo $dados["CATEGORIA_BENEFI"];?></th>
                      <th class="py-3 px-md-4"><?php echo $dados["VALOR_BENEFI"];?></th>
                      <th class="py-3 px-md-4"><?php echo $dados["DESCRICAO_BENEFI"];?></th>
                      <th class="py-3 px-md-4 "><a href="editar_ben_g.php?ID=<?php echo $dados["IDBEN"];?>" class="btn btn-outline-success" role="button">Editar</a>
                      <a href="edit_ben_g.php?ID=<?php echo $dados["IDBEN"];?>&Acao=Excluir" class="btn btn-outline-danger" role="button">Deletar</a></th>
                    </tr>
                  </tbody>  
                  <?php } ?>
              </table>
          </div>      
        </div>            
      </div>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade" id="CRAS-pane" role="tabpanel" aria-labelledby="tab1" tabindex="0"><br>
          <div class="container-fluid">
  
              <table class="table">
                    <tr>
                      <th class="py-3 px-md-2">CRAS</th>
                      <th class="py-3 px-md-2">Bairro</th>
                      <th class="py-3 px-md-2">Endereço Completo</th>
                      <th class="py-3 px-md-6 ">Ações</th>

                    </tr>
                    <?php while($dados = $con->fetch_array()){?>
                    <tr>
                      <th class="py-3 px-md-2"><?php echo $dados["nome_Cras"];?></th>
                      <th class="py-3 px-md-2"><?php echo $dados["bairro_Cras"];?></th>
                      <th class="py-3 px-md-2"><?php echo $dados["endereco_Cras"];?></th>
                      <th class="py-3 px-md-6 "><a href="editar_CRAS.php?ID=<?php echo $dados["id_Cras"];?>" class="btn btn-outline-success" role="button">Editar</a>
                      <a href="edit_CRAS.php?ID=<?php echo $dados["id_Cras"];?>&CRAS=Excluir" class="btn btn-outline-danger" role="button">Deletar</a></th>

                    </tr>
                    <?php } ?>
              </table>
          </div>      
        </div>            
      </div>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade" id="tab2-pane" role="tabpanel" aria-labelledby="tab2" tabindex="0"><br>
          <div class="container-fluid">
  
              <table class="table">
                    <tr>
                      <th class="py-3 px-md-4">Benefícios</th>
                      <th class="py-3 px-md-4">CRAS(A Qual Tomou inciativa)</th>
                      <th class="py-3 px-md-4 ">Ações</th>

                    </tr>
                    <?php while($dados = $con_ben_pmt->fetch_array()){?>
                    <tr>
                      <th class="py-3 px-md-4"><?php echo $dados["NOME_BENEFI_PMT"];?></th>
                      <th class="py-3 px-md-4"><?php echo $dados["nome_Cras"];?></th>
                      <th class="py-3 px-md-4 "><a href="editar_ben_pmt.php?ID=<?php echo $dados["ID_BEN_PMT"];?>" class="btn btn-outline-success" role="button">Editar</a>
                      <a href="edit_ben_pmt.php?ID=<?php echo $dados["ID_BEN_PMT"];?>&Acao=Excluir" class="btn btn-outline-danger" role="button">Deletar</a></th>

                    </tr>
                    <?php } ?>
              </table>
          </div>      
        </div>            
      </div>
    </div>
  </div>
  </body>
  </html>
