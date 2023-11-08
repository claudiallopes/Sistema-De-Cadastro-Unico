<?php
include_once('protect0.php');
include_once('config.php');
$Visual_Cpf = $_GET['CPF'];
$cont = 0;
$consulta_cad = "Select *, DATE_FORMAT(data_cadastro,'%d/%m/%Y') AS data_cad,DATE_FORMAT(DATA_NASCIMENTO,'%d/%m/%Y') AS DATA_NASC  From cadastro_pessoa Where Cpf like '$Visual_Cpf'";
$con_cad = mysqli_query($conexao,$consulta_cad) or die ("erro: ".mysqli_error($conexao));
//-----------------------------------------------------------------------------------------
$consulta_cad_2 = "Select * From cadastro_pessoa Where Cpf = '$Visual_Cpf'";
$con_cad_2 = mysqli_query($conexao,$consulta_cad_2) or die ("erro: ".mysqli_error($conexao));
//-----------------------------------------------------------------------------------------
$consulta_dep = "Select *, DATE_FORMAT(d_nascimento,'%d/%m/%Y') AS d_nasc From cadastro_dependentes Where cadastro_pessoa_CPF like '$Visual_Cpf'";
$con_dep = mysqli_query($conexao,$consulta_dep) or die ("erro: ".mysqli_error($conexao));
//-----------------------------------------------------------------------------------------
$consulta_ben ="SELECT * FROM familia_beneficios_g a inner join beneficios b on a.Beneficios_IDBEN = b.IDBEN where cadastro_pessoa_CPF like '$Visual_Cpf'";
$con_ben=mysqli_query($conexao,$consulta_ben) or die ("erro:".mysqli_error($conexao));
//-----------------------------------------------------------------------------------------
$consulta_proc ="SELECT *, DATE_FORMAT(DATA_ENTREGA,'%d/%m/%Y') AS DATA_ENT FROM familia_beneficios_pmt f inner join  cras c on f.Beneficios_PMT_cras_id_Cras = c.id_Cras  inner join beneficios_pmt b on f.Beneficios_PMT_ID_BEN_PMT = b.ID_BEN_PMT Where cadastro_pessoa_CPF like '$Visual_Cpf' Order BY  DATA_ENTREGA DESC";
$con_proc = mysqli_query($conexao,$consulta_proc) or die ("erro: ".mysqli_error($conexao));
//-----------------------------------------------------------------------------------------
$consulta_folha = "SELECT * FROM cadastro_proced where cadastro_pessoa_CPF like '$Visual_Cpf' order by id_anot Desc";
$con_folha = mysqli_query($conexao,$consulta_folha) or die ("erro: ". mysqli_error($conexao));
$cont = mysqli_num_rows($con_folha);

?>
<!DOCTYPE html>
  <html lang="pt-br">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Informações da pessoa</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
      <link rel="stylesheet" href="css/esse.css">   
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
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
  <div class="container-fluid bd-gutter table-responsive flex-wrap flex-lg-nowrap bg-light">
    <nav>
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="perfil_tab" data-bs-toggle="tab" data-bs-target="#perfil_cad" type="button" role="tab" aria-controls="pefil_cad" aria-selected="true">Informações</button><br>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="dep_tab" data-bs-toggle="tab" data-bs-target="#dep_cad" type="button" role="tab" aria-controls="dep_cad" aria-selected="false">Dependentes</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="gast_tab" data-bs-toggle="tab" data-bs-target="#gast_cad" type="button" role="tab" aria-controls="gast_cad" aria-selected="false">Gastos</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="tab_1" data-bs-toggle="tab" data-bs-target="#tab1-pane" type="button" role="tab" aria-controls="tab1-pane" aria-selected="true">Beneficios Governo</button>
        </li>
        <?php if($_SESSION['nv_acesso'] == 1){?>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="anot_tab" data-bs-toggle="tab" data-bs-target="#anot_cad" type="button" role="tab" aria-controls="anot_cad" aria-selected="false">Anotações</button>
          </li>
        <?php } ?>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="proc_tab" data-bs-toggle="tab" data-bs-target="#proc_cad" type="button" role="tab" aria-controls="proc_cad" aria-selected="false">Entregar Benefícios</button>
        </li>
      </ul>
    </nav>
      <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="perfil_cad" role="tabpanel" aria-labelledby="perfil_tab" tabindex="0"><br> 
              <div class="container-fluid bg-light">
                  <!--NOME,CPF,TELEFONE,Nis,SEXO,RG,UF,RG_ORG_EMISSOR,DATA_NASCIMENTO,NUM_VIDAMELHOR,NATURALIDADE,MAE,PAI,RACA_COR_,EST_CIVIL,ESCOLARIDADE,PROFISSAO,SITUACAO,CEP,BAIRRO-->
                    <?php while($dados_cad = $con_cad->fetch_array()){?>
                      <b>
                      <div class="input-group mb-3">
                        <div class="container">
                          <div class="row">
                            <div class="col-md-2">
                              Data de Registro:
                            </div>
                            <div class="col-md-5">                              
                              <?php echo $dados_cad["data_cad"];?>
                            </div>
                            <div class="col-md-2">
                              CPF:
                            </div>
                            <div class="col-md-3">      
                              <?php echo $dados_cad["CPF"];?>
                            </div>
                          </div>
                        </div>
                      </div><br>
                      <div class="input-group mb-3">
                        <div class="container">  
                          <div class="row">
                            <div class="col-md-2">
                              Nome:
                            </div>
                            <div class="col-md-5">  
                              <?php echo $dados_cad["NOME"];?>
                            </div>
                            <div class="col-md-2">
                              Número de contato:
                            </div>
                            <div class="col-md-3">
                              <?php echo $dados_cad["TELEFONE"];?>
                          </div>
                          </div>
                        </div>
                      </div><br>
                      <div class="input-group mb-3">
                        <div class="container">  
                          <div class="row">
                            <div class="col-md-2">
                              RG:
                            </div>
                            <div class="col-md-5">
                              <?php echo $dados_cad["RG"];?>
                            </div>
                            <div class="col-md-2">
                              Sexo:
                            </div>
                            <div class="col-md-3">
                              <?php echo $dados_cad["SEXO"];?>
                            </div>
                          </div>
                        </div>
                      </div><br>
                      <div class="input-group mb-3">
                        <div class="container">  
                          <div class="row">
                            <div class="col-md-2">
                              UF:
                            </div>
                            <div class="col-md-5">
                              <?php echo $dados_cad["UF"];?>
                            </div>
                            <div class="col-md-2">
                              Orgão Emissor do RG:
                            </div>
                            <div class="col-md-3">      
                              <?php echo $dados_cad["RG_ORG_EMISSOR"];?>
                            </div>
                          </div>
                        </div>
                      </div><br>
                      <div class="input-group mb-3">
                        <div class="container">  
                          <div class="row">
                            <div class="col-md-2">
                            Data de Nascimento:
                            </div>
                            <div class="col-md-5">      
                              <?php echo $dados_cad["DATA_NASC"];?>
                            </div>
                            <div class="col-md-2">
                            Número Vida Melhor:
                            </div>
                            <div class="col-md-3">      
                              <?php echo $dados_cad["NUM_VIDAMELHOR"];?>
                            </div>
                          </div>
                        </div>
                      </div><br>
                      <div class="input-group mb-3">
                        <div class="container">  
                          <div class="row">
                            <div class="col-md-2">
                            Mãe:
                            </div>
                            <div class="col-md-5">      
                              <?php echo $dados_cad["MAE"];?>
                            </div> 
                            <div class="col-md-2">
                            Naturalidade:
                            </div>
                            <div class="col-md-3">      
                              <?php echo $dados_cad["NATURALIDADE"];?>
                            </div>
                          </div>
                        </div>
                      </div><br>
                      <div class="input-group mb-3">
                        <div class="container">  
                          <div class="row">
                            <div class="col-md-2">
                            Pai:
                            </div>
                            <div class="col-md-5">      
                              <?php echo $dados_cad["PAI"];?>
                            </div>
                            <div class="col-md-2">
                            Etnia:
                            </div>
                            <div class="col-md-3">      
                              <?php echo $dados_cad["RACA_COR_"];?>
                            </div>
                          </div>
                        </div>
                      </div><br>
                      <div class="input-group mb-3">
                        <div class="container">  
                          <div class="row">
                            <div class="col-md-2">
                            Estado Civil:
                            </div>
                            <div class="col-md-5">      
                              <?php echo $dados_cad["EST_CIVIL"];?>
                            </div>
                            <div class="col-md-2">
                            Profissão:
                            </div>
                            <div class="col-md-3">      
                              <?php echo $dados_cad["PROFISSAO"];?>
                            </div>
                          </div>
                        </div>
                      </div><br>
                      <div class="input-group mb-3">
                        <div class="container">  
                          <div class="row">
                            <div class="col-md-2">
                            CEP:
                            </div>
                            <div class="col-md-5">      
                              <?php echo $dados_cad["CEP"];?>
                            </div>
                            <div class="col-md-2">
                            Bairro:
                            </div>
                            <div class="col-md-3">      
                              <?php echo $dados_cad["BAIRRO"];?>
                            </div>
                          </div>
                        </div>
                      </div><br>
                      <div class="input-group mb-3">
                        <div class="container">  
                          <div class="row">
                            <div class="col-md-2">
                            Número da casa:
                            </div>
                            <div class="col-md-5">      
                              <?php echo $dados_cad["NUM_RESIDENCIA"];?>
                            </div>
                            <div class="col-md-2">
                            Complemento:
                            </div>
                            <div class="col-md-3">      
                              <?php echo $dados_cad["COMPLEMENTO"];?>
                            </div>
                          </div>
                        </div>
                      </div><br>
                      <div class="input-group mb-3">
                        <div class="container">  
                          <div class="row">
                            <div class="col-md-2">
                              Cadastro Editar:
                            </div>
                            <div class="col-md-2">
                            <th><a href="editar_Pessoa.php?CPF=<?php echo $dados_cad["CPF"];?>" class="btn cor_botao mb-3" role="button">Editar</a></th>
                            <!--<form action="cadastro_excluir.php"
                              <button value="<?php echo $dados["CPF"];?>" class="btn cor_botao me-md-2" type="Submit">EXCLUIR </button>
                            </form>
                            -->
                            </div>
                          </div>
                        </div>
                      </div>
                      </b>
                    <?php } ?>     
                </div>        
              </div>
          </div>
        </div>
      </div>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade" id="dep_cad" role="tabpanel" aria-labelledby="dep_tab" tabindex="0">
          <div class="container-fluid table-responsive bg-light">
            <table class="table">        
                    <tr>
                      <th class="py-3 px-md-4">CPF</th>
                      <th class="py-3 px-md-4">Nome</th>
                      <th class="py-3 px-md-4">Data de Nascimento</th>
                      <th class="py-3 px-md-4">Parentesco</th>
                      <th class="py-3 px-md-4">Escolaridade</th>
                      <th class="py-3 px-md-4">Profissão</th>
                      <th class="py-3 px-md-4">Renda individual</th>
                      <th class="py-3 px-md-4">Ações</th>
                    </tr>
                    <?php while($dados_dep = $con_dep->fetch_array()){?>
                    <tr>

                      <th class="py-3 px-md-4"><?php echo $dados_dep["d_cpf"];?></th>
                      <th class="py-3 px-md-4"><?php echo $dados_dep["d_nome"];?></th>
                      <th class="py-3 px-md-4"><?php echo $dados_dep["d_nasc"];?></th>
                      <th class="py-3 px-md-4"><?php echo $dados_dep["d_parentesco"];?></th>
                      <th class="py-3 px-md-4"><?php echo $dados_dep["d_escolaridade"];?></th>
                      <th class="py-3 px-md-4"><?php echo $dados_dep["d_profissao"];?></th>
                      <th class="py-3 px-md-4">R$ <?php echo $dados_dep["d_renda_total"];?></th>
                      <th><a href="editar_Dependentes.php?CPF=<?php echo $dados_dep["d_cpf"];?>&CHF_CPF=<?php echo $_GET["CPF"];?>" class="btn cor_botao " role="button">Editar</a></th>
                    </tr>
                    <?php } ?>
            </table>
            <div class="text-center">
              <a href="adicionar_Dependentes.php?CPF=<?php echo $_GET["CPF"];?>" class="btn cor_botao mb-3" role="button">Adicionar Dependente</a>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade" id="gast_cad" role="tabpanel" aria-labelledby="gast_tab" tabindex="0">
          <div class="container-fluid bg-light pt-3"><b>
                    <?php while($dados_cad_2 = $con_cad_2->fetch_array()){?>
                      <div class="input-group mb-3">
                        <div class="container">
                          <div class="row">
                            <div class="col-md-2">
                              Condição de Moradia:
                            </div>
                            <div class="col-md-4">                              
                              <?php echo $dados_cad_2["COND_MORAD"];?>
                            </div>
                            <div class="col-md-2">
                              N° de cômodos:  
                            </div>
                            <div class="col-md-4">      
                              <?php echo $dados_cad_2["QUANT_COMOD"];?>
                            </div>
                          </div>
                        </div>
                      </div><br>
                      <div class="input-group mb-3">
                        <div class="container">  
                          <div class="row">
                            <div class="col-md-2">
                              Tempo de Moradia:
                            </div>
                            <div class="col-md-4">
                             <?php echo $dados_cad_2["TEMPO_MORAD"];?>
                          </div>
                            <div class="col-md-2">
                              Gasto com Alimentação:
                            </div>
                            <div class="col-md-4">
                            R$ <?php echo $dados_cad_2["VAL_ALIMENT"];?>
                            </div>
                          </div>
                        </div>
                      </div><br>
                      <div class="input-group mb-3">
                        <div class="container">  
                          <div class="row">
                            <div class="col-md-2">
                              Gastos com Água:
                            </div>
                            <div class="col-md-4">
                            R$ <?php echo $dados_cad_2["VAL_AGUA"];?>
                            </div>
                            <div class="col-md-2">
                              Gastos com Luz:
                            </div>
                            <div class="col-md-4">
                            R$ <?php echo $dados_cad_2["VAL_ENERGIA"];?>
                            </div>
                          </div>
                        </div>
                      </div><br>
                      <div class="input-group mb-3">
                        <div class="container">  
                          <div class="row">
                            <div class="col-md-2">
                              Gastos com Gás:
                            </div>
                            <div class="col-md-4">      
                            R$ <?php echo $dados_cad_2["VAL_GAS"];?>
                            </div>
                            <div class="col-md-2">
                              Gastos com Remédios:
                            </div>
                            <div class="col-md-4">      
                            R$ <?php echo $dados_cad_2["MEDICAMENTOS"];?>
                            </div>
                          </div>
                        </div>
                      </div><br>
                      <div class="input-group mb-3">
                        <div class="container">  
                          <div class="row">
                            <div class="col-md-2">
                              Gastos com Telefone:
                            </div>
                            <div class="col-md-4">      
                            R$ <?php echo $dados_cad_2["VAL_TELEFONE"];?>
                            </div>
                            <div class="col-md-2">
                              Preço do Aluguel:
                            </div>
                            <div class="col-md-4">      
                            R$ <?php echo $dados_cad_2["VAL_ALUGUEL"];?>
                            </div>
                          </div>
                        </div>
                      </div><br>
                      <div class="input-group mb-3">
                        <div class="container">  
                          <div class="row">
                            <div class="col-md-2">
                             Outros Gastos:
                            </div>
                            <div class="col-md-4">      
                            R$ <?php echo $dados_cad_2["OUTROS_GASTOS"];?>
                            </div>
                            <div class="col-md-2">
                             Gasto total:
                            </div>
                            <div class="col-md-4">  
                            R$ <?php echo $dados_cad_2["TOTAL_GASTOS"];?>
                            </div>
                          </div>
                        </div>
                      </div><br>
                      <div class="input-group mb-3">
                        <div class="container">  
                          <div class="row">
                            <div class="col-md-2">
                              Cadastro Editar:
                            </div>
                            <div class="col-md-2">
                            <th><a href="editar_Gastos.php?CPF=<?php echo $dados_cad_2["CPF"];?>" class="btn cor_botao mb-3" role="button">Editar</a></th>
                            </div>
                          </div>
                        </div>
                      </div>
                      </b>
                    <?php } ?>     
                </div>        
              </div>
          </div>
      </div>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade" id="tab1-pane" role="tabpanel" aria-labelledby="tab1" tabindex="0">
          <div class="container-fluid table-responsive bg-light text-center pt-3">
          <h1>Beneficios Recebidos pelo Governo</h1>  
          <button name="anotar" onclick="window.location.href = 'aba4.php?CPF=<?php echo $Visual_Cpf;?>'"  class="btn cor_botao mb-3" type="button">Adicionar</button>        
              <table class="table">
                    <tr>
                      <th class="py-3 px-md-4">Benefícios</th>
                      <th class="py-3 px-md-4">Categoria</th>
                      <th class="py-3 px-md-4 ">Valor</th>
                      <th class="py-3 px-md-4">Descrição</th>
                      <th class="py-3 px-md-4">Ações</th>

                    </tr>
                    <?php while($dados = $con_ben->fetch_array()){?>
                    <tr>
                      <th class="py-3 px-md-4"><?php echo $dados["NOME_BENEFI"];?></th>
                      <th class="py-3 px-md-4"><?php echo $dados["CATEGORIA_BENEFI"];?></th>
                      <th class="py-3 px-md-4"><?php echo $dados["VALOR_BENEFI"];?></th>
                      <th class="py-3 px-md-4"><?php echo $dados["DESCRICAO_BENEFI"];?></th>
                      <th class="py-3 px-md-4 "><a href="cad_prog.php?CPF=<?php echo $Visual_Cpf?>&Acao=excluir&ID=<?php echo $dados["IDBEN"]?>" class="btn btn-danger" role="button">Deletar(Não Recebe +)</a></th>

                    </tr>
                    <?php } ?>
              </table>
          </div>      
        </div>            
      </div>
      <?php if($_SESSION['nv_acesso'] == 1){?>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade" id="anot_cad" role="tabpanel" aria-labelledby="anot_tab" tabindex="0">
            <div class="container-fluid bg-light text-center"><br>

              <div class="input-group mb-3">
                  <div class="text-center container form-group">
                      <?php  if(mysqli_num_rows($con_folha)>0){?>
                        <?php while($dados_folha = $con_folha->fetch_array()){?>
                          <form action="cad_folha_procedimentos.php" method="POST">
                            <input type="hidden" value="<?php echo $Visual_Cpf;?>" name="cpf">
                            <div class="row d-flex justify-content-center">
                              <div class="col mx-auto">
                              <h1><?php echo $cont;?>º Anotação :)</h1>
                                <input type="hidden" name="id_anot" value="<?php echo $dados_folha['id_anot']?>">
                                <textarea id="txtArea" name="ANOTACAO" class="form-control mb-3" rows="4" value="<?php echo $dados_folha["Anotacoes"];?>"  placeholder="Digite a demanda apresentada, orientações, encaminhamentos e limite:512 caracteres"><?php echo $dados_folha["Anotacoes"];?></textarea>
                              </div>
                            </div>  
                            <div class="row d-flex justify-content-center">  
                              <div class="col mx-auto">
                                <button name="anotar"  value="editar"  class="btn btn-outline-success mb-3" type="Submit">Editar</button>
                              </div>
                            <!--  <div class="col mx-auto">
                                  <button name="anotar" value="excluir"  class="btn btn-outline-danger mb-3" type="Submit">Excluir</button>
                              </div>-->
                              <div class="col mx-auto">
                                  <button name="anotar" onclick="window.location.href = 'aba5.php?CPF=<?php echo $Visual_Cpf;?>'"  class="btn btn-outline-primary mb-3 mb-3" type="button">Adicionar anotação</button>
                              </div>
                            </div>
                          </form>
                            <?php $cont--;  } ?>
                        <?php }                  
                            else{ ?>
                            <form action="cad_folha_procedimentos.php" method="POST">
                              <h1>Anotações</h1>
                              <div class="row d-flex justify-content-center">
                                <div class="col mx-auto">  
                                  <button name="anotar" onclick="window.location.href = 'aba5.php?CPF=<?php echo $Visual_Cpf;?>'"  class="btn cor_botao mb-3" type="button">Adicionar</button>
                                </div> 
                              </div>
                            </form> 
                        <?php } ?>
                      </div>
                    </form>
                  </div> 
                </div>  
              </div>
            </div>  
          </div>           
        </div>
      <?php }?>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade" id="proc_cad" role="tabpanel" aria-labelledby="proc_tab" tabindex="0">
          <div class="container-fluid table-responsive bg-light"><br>
              <div class="text-center"><h1>Local de Doações</h1></div>        
              <div class="text-center">       
                  <a href="Processo_Benefi.php?CPF=<?php echo $_GET["CPF"];?>" class="btn cor_botao mb-3" role="button">Doar Beneficios</a>
              </div>
              <table class="table">        
                    <tr>
                      <th class="py-3 px-md-4">Data da Entrega</th>
                      <th class="py-3 px-md-4">Recebedor</th>
                      <th class="py-3 px-md-4">Quantidade</th>
                      <th class="py-3 px-md-4">Benefícios Doados</th>
                      <th class="py-3 px-md-4">CRAS</th>
                      <th class="py-3 px-md-4">Tempo de Concessão</th>
                    </tr>
                    <?php while($dados_proc = $con_proc->fetch_array()){?>
                    <tr>
                      <th class="py-3 px-md-4"><?php echo $dados_proc["DATA_ENT"];?></th>
                      <th class="py-3 px-md-4"><?php echo $dados_proc["RECEBEDOR"];?></th>
                      <th class="py-3 px-md-4"><?php echo $dados_proc["QUANTIDADE"];?></th>
                      <th class="py-3 px-md-4"><?php echo $dados_proc["NOME_BENEFI_PMT"];?></th>
                      <th class="py-3 px-md-4"><?php echo $dados_proc["nome_Cras"];?></th>
                      <th class="py-3 px-md-4"><?php echo $dados_proc["Temp_Concessao"];?></th>

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