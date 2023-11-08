<?php
include_once('protect0.php');
include_once('config.php');

$Cpf = $_GET["CPF"];
$Processo_cad = "Select * From cadastro_pessoa Where Cpf = '$Cpf'";
$Proc_cad = mysqli_query($conexao,$Processo_cad) or die ("erro: ".mysqli_error($conexao));
$Processo_Ben = "Select * From beneficios_pmt";
$Proc_Ben = mysqli_query($conexao,$Processo_Ben) or die ("erro: ".mysqli_error($conexao));
$Processo_Cras = "Select * From cras";
$Proc_Cras = mysqli_query($conexao,$Processo_Cras) or die ("erro:".mysqli_error($conexao));



?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Processo</title>
      <link rel="stylesheet" href="css/style1.css">   
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
      <script src="js/formMask.js" defer></script>
    <link rel="stylesheet" type="text/css" href="css/esse.css" media="screen"/>
  </head>
  <body id="checkout-page" class="corfundo">
    
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
    <div class="container text-center bg-light">
      <div>
        <form action="cad_Processos.php" method="POST">
                    <br> <br> <br>
                                <center><h2>Distribuição de Benefícios</h2></center>
                                <br>
                <div class="input-group mb-3">
                    <div class="container text-center">
                      <?php while($dados_Proc = $Proc_cad->fetch_array()){?>
                          <div class="row">
                              <div class="col">
                                <label for="PB_Cpf"></label>
                                <input value="<?php echo $dados_Proc["CPF"];?>" type="text" id="PB_Cpf" class="form-control" name="PB_Cpf" placeholder="CPF" autocomplete="off" placeholder="CPF" readonly>
                              </div>
                              <div class="col">
                                <label for="PB_Nome"></label>
                                <input value="<?php echo $dados_Proc["NOME"];?>" type="text" class="form-control" name="PB_Nome" id="PB_Nome" placeholder="Nome" readonly>
                              </div>
                          </div>
                      <?php } ?>
                    </div>
                </div>   
                <div class="input-group mb-3">
                    <div class="container text-center">
                        <div class="row">
                          <div class="col">
                            <label for="PB_Benefi"></label>
                            <select name="PB_Benefi" id="PB_Benefi" class="form-select" required>
                              <option Selected Disabled>Selecione o Benefício</option>
                              <?php while($dados_ben = $Proc_Ben->fetch_array()){?>
                              <option value="<?php echo $dados_ben["ID_BEN_PMT"];?>"><?php echo $dados_ben["NOME_BENEFI_PMT"];?></option>   
                              <?php } ?>
                            </select>
                          </div>
                          <div class="col">
                            <label for="PB_Quantidade"></label>
                            <select name="PB_Quantidade" id="PB_Quantidade" class="form-select" required>
                                <option Selected Disabled>Quantidade doada</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                          </div>  
                          <div class="col">
                            <label for="PB_periodo"></label>
                            <select name="PB_periodo" id="PB_periodo" class="form-select" required>
                                <option Selected Disabled>Tempo de Concessão</option>
                                <option value="1 mês">1 mês</option>
                                <option value="2 mêses">2 mêses</option>
                                <option value="3 mêses">3 mêses</option>
                                <option value="4 mêses">4 mêses</option>
                                <option value="5 mêses">5 mêses</option>
                                <option value="6 mêses">6 mêses</option>
                            </select>
                          </div>  
                        </div>
                    </div>
                </div>                                                   
                <div class="input-group mb-3">
                  <div class="container text-center">
                      <div class="row">
                          <div class="col">
                            <label for="PB_Cras"></label>
                            <select name="PB_Cras" id="" class="form-select" required>
                                <option Selected Disabled>Escolha o CRAS</option>
                                <?php while($dados_cras = $Proc_Cras->fetch_array()){?>
                                <option value="<?php echo $dados_cras["id_Cras"];?>"><?php echo $dados_cras["nome_Cras"];?></option>
                                <?php } ?>  
                            </select>
                          </div>   
                          <div class="col">
                              <label for="PB_Recebedor"></label>
                              <input  autocomplete="off" type="text" class="form-control" name="PB_Recebedor" id="PB_Recebedor" placeholder="Recebedor" required>
                          </div>
                          <div class="col">
                              <label for="PB_CPFReceb"></label>  
                              <input autocomplete="off" type="text" class="form-control" name="PB_CPFReceb" id="PB_CPFReceb" placeholder="CPF do Recebedor" required>
                          </div>        
                      </div>
                  </div>
                </div>                        
                <div class="input-group mb-3">
                    <div class="container text-center">
                        <div class="row">
                            <div class="col">
                              <button class="btn cor_botao me-md-2 mb-3" type="Submit">Cadastrar</button>
                            </div>
                            <div class="col">
                              <a href="cadastro_visualizar.php?CPF=<?php echo $Cpf;?>" class="btn cor_botao me-md-2 mb-3" role="button">Visualizar Registro</a>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
      </div>
    </div>
  </body>
</html>