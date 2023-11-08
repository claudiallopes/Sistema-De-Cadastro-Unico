<?php

include_once('protect.php');
include_once('config.php');
$CPF = $_GET['CPF'];
$editar_cad = "Select * From cadastro_pessoa Where Cpf = '$CPF'";
$edi_cad = mysqli_query($conexao,$editar_cad) or die ("erro: ".mysqli_error($conexao));
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="js/script.js" defer></script>
  <script src="js/formMask.js" defer></script>
  <script src="js/formMask_V2.js" defer></script>
  <link rel="stylesheet" href="css/aba1.css">
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="css/esse.css" media="screen" />  
<title>Aba 1</title>
</head>

<body class="corfundo pt-5 pb-5" id="checkout-page">

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

<div class="container text-center bg-light">
  <form action="edit_pessoa.php" method="POST">

    <fieldset>
    
                <center><h1>Ficha Social</h1></center>
        <?php while($dados_edi = $edi_cad->fetch_array()){?>
          <div class="input-group mb-3">
            <div class="container text-center">
              <div class="row">
                <div class="col">
                  <label for="chf_nome">Nome completo:</label>
                <input autocomplete="off" value="<?php echo $dados_edi["NOME"];?>" type="text" class="form-control" name="chf_nome" id="chf_nome" placeholder="Digite o nome completo" required>

                </div>
                <div class="col">
                  <label for="chf_telefone" id="basic-addon1">Telefone:</label>
                  <input value="<?php echo $dados_edi["TELEFONE"];?>" name="chf_tel" class="form-control" id="chf_tel" placeholder="Digite o telefone" autocomplete="off" placeholder="(xx) x xxxx-xxxx">

                </div>
                <div class="col">
                  <label for="chf_nis" id="basic-addon1">N° NIS:</label>
                  <input autocomplete="off" value="<?php echo $dados_edi["Nis"];?>" type="num" class="form-control" name="chf_nis" id="chf_nis" placeholder="Digite o N° NIS:">

                </div>
              </div>
            </div>
          </div>
      

                <div class="input-group mb-3">
                  <div class="container text-center">
                    <div class="row">
                      <div class="col">
                        <label for="chf_cpf">CPF:</label>
                        <input autocomplete="off" readonly value="<?php echo $dados_edi["CPF"];?>" id="chf_cpf" class="form-control" name="chf_cpf" placeholder="Digite o CPF">
                      </div>
                      <div class="col">
                        <label for="chf_rg">RG:</label>
                        <input autocomplete="off" value="<?php echo $dados_edi["RG"];?>" type="text" name="chf_rg" id="chf_rg" pattern="/^[0-9]{2}\.[0-9]{3}\.[0-9]{3}\-[0-9]{1}$/" title="Digite um RG no formato: xx.xxx.xxx-x"
                          placeholder="Digite o RG" class="form-control">
                      </div>
                      <div class="col">
                        <label for="chf_uf" class="labelInput">Unidade Federativa:</label>
                        <input autocomplete="off" value="<?php echo $dados_edi["UF"];?>" type="text" class="form-control" name="chf_uf" id="chf_uf" placeholder="Digite a Unidade Federativa">
                      </div>
                    </div>
                  </div>  
                </div>

      

                <div class="input-group mb-3">
                  <div class="container text-center">
                    <div class="row">
                      <div class="col">
                        <label for="chf_org_em">Órgão Emissor do RG:</label>
                        <input autocomplete="off" value="<?php echo $dados_edi["RG_ORG_EMISSOR"];?>" type="text" class="form-control" name="chf_org_em" id="chf_org_em" placeholder="Digite o Órgão Emissor">
                      </div>
                      <div class="col">
                        <label for="chf_data_nasc">Data de Nascimento:</label>
                        <input autocomplete="off" value="<?php echo $dados_edi["DATA_NASCIMENTO"];?>" type="date" class="form-control" name="chf_data_nasc" id="chf_data_nasc">
                      </div>
                      <div class="col">
                        <label for="chf_vida_melhor">N° Vida Melhor:</label>
                        <input autocomplete="off" value="<?php echo $dados_edi["NUM_VIDAMELHOR"];?>" type="text" class="form-control" name="chf_vida_melhor" id="chf_vida_melhor" placeholder="Digite o vida melhor">
                      </div>
                    </div>
                  </div>
                </div>


                <div class="input-group mb-3">
                  <div class="container text-center">
                    <div class="row">
                      <div class="col">
                        <label for="chf_naturalidade">Naturalidade:</label>
                        <input autocomplete="off" value="<?php echo $dados_edi["NATURALIDADE"];?>" type="text" class="form-control" name="chf_naturalidade" id="chf_naturalidade" placeholder="Digite a naturalidade">
                      </div>
                      <div class="col">
                        <label for="chf_mae">Mãe:</label>
                        <input autocomplete="off" value="<?php echo $dados_edi["MAE"];?>" type="text" class="form-control" name="chf_mae" id="chf_mae" placeholder="Digite o nome da mãe">
                      </div>
                      <div class="col">
                        <label for="chf_pai">Pai:</label>
                        <input autocomplete="off" value="<?php echo $dados_edi["PAI"];?>" type="text" class="form-control" name="chf_pai" id="chf_pai" placeholder="Digite o nome do Pai">
                      </div>
                      <div class="col">
                        <label for="chf_profissao">Profissão:</label>
                        <input autocomplete="off" value="<?php echo $dados_edi["PROFISSAO"];?>" type="text" class="form-control" name="chf_profissao" id="chf_profissao" placeholder="Digite a profissão">
                      </div>
                    </div>
                  </div>
                </div>

                                <br>
                                <br>
                <div class="input-group mb-3">
                  <div class="container text-center">
                    <div class="row">
                      <div class="col">
                        <label for="chf_sexo">Sexo:</label>
                        <select name="chf_sexo" id="chf_sexo" class="form-select" required>
                          <option selected value="<?php echo $dados_edi["SEXO"];?>">Sexo: <?php echo $dados_edi["SEXO"];?></option>
                          <option id="chf_sexo" name="chf_sexo" value="Feminino">Feminino</option>
                          <option id="chf_sexo" name="chf_sexo" value="Masculino">Masculino</option>
                        </select>
                      </div>

                      <div class="col">
                        <label for="chf_cor">Etnia:</label>
                        <select name="chf_cor" id="chf_cor" class="form-select" required>
                          <option selected value="<?php echo $dados_edi["RACA_COR_"];?>">Cor: <?php echo $dados_edi["RACA_COR_"];?></option>
                          <option id="branca" name="chf_cor" value="branca">Branca</option>
                          <option id="negra" name="chf_cor" value="negra">Negra</option>
                          <option id="parda" name="chf_cor" value="parda">Parda</option>
                        </select>
                      </div>

                      <div class="col">
                        <label for="chf_est">Estado Civil:</label>
                        <select name="chf_est" id="chf_est" class="form-select" required>
                          <option selected value="<?php echo $dados_edi["EST_CIVIL"];?>">Estado Civil: <?php echo $dados_edi["EST_CIVIL"];?></option>
                          <option name="chf_est" id="solteiro" value="solteiro">Solteiro</option>
                          <option name="chf_est" id="casado" value="casado">Casado</option>
                          <option name="chf_est" id="separado" value="separado">Separado</option>
                          <option name="chf_est" id="divorciado" value="divorciado">Divoriciado</option>
                          <option name="chf_est" id="viuvo" value="viuvo">Viúvo</option>
                          <option name="chf_est" id="uni_est" value="uni_est">União Estável</option>
                          <option name="chf_est" id="amasiado" value="amasiado">Amasiado</option>

                        </select>
                      </div>
                      <div class="col">
                        <label for="chf_esc">Escolaridade:</label>
                        <select name="chf_esc" id="chf_esc" class="form-select" required>
                          <option selected value="<?php echo $dados_edi["ESCOLARIDADE"];?>"><?php echo $dados_edi["ESCOLARIDADE"];?></option>
                          <option disabled value="">Ensino Fundamental</option>
                          <option id="completo" name="chf_esc" value="Fundamental completo">Ensino Fundamental Completo</option>
                          <option id="incompleto" name="chf_esc" value="Fundamental incompleto">Ensino Fundamental Incompleto</option>

                    
                          <option disabled value="">Ensino Medio</option>
                          <option id="completo" name="chf_esc" value="Medio completo">Ensino Médio Completo</option>
                          <option id="incompleto" name="chf_esc" value="Medio incompleto">Ensino Médio Incompleto</option>

                          <option disabled value="">Ensino Superior</option>
                          <option id="completo" name="chf_esc" value="Superior completo">Ensino Superior Completo</option>
                          <option id="incompleto" name="chf_esc" value="Superior incompleto">Ensino Superior Incompleto</option>
                          <option id="nao_alfabetizado" name="chf_esc" value="não alfabetizado">Não alfabetizado</option>

                        </select>
                      </div>
                      <div class="col">
                        <label for="chf_empreg">Situação Financeira:</label>
                        <select name="chf_empreg" id="chf_empreg" class="form-select" required>
                          <option selected value="<?php echo $dados_edi["SITUACAO"];?>">Situação: <?php echo $dados_edi["SITUACAO"];?></option>
                          <option name="chf_empreg" id="empregado" value="empregado">Empregado</option>
                          <option name="chf_empreg" id="desempregado" value="desmpregado">Desempregado</option>
                          <option name="chf_empreg" id="pensionista" value="pensionista">Pensionista</option>
                          <option name="chf_empreg" id="aposentado" value="aposentado">Aposentado</option>
                        </select>
                
                      </div>
                    </div>
                  </div>
                </div>

                <div id="fade" class="hide">
                  <div id="loader" role="status">
                  </div>
                  <div id="message" class="hide">

                    <br>
                    <div id="form-header">
                      <center>
                        <h2>Cadastre o endereço</h2>
                      </center>

                    </div>
                    <form id="address-form">
                          
                          <div class="input-group mb-3">
                            <div class="container text-center">
                              <div class="row">
                                <div class="col">
                                  <label for="cep">Digite o CEP:</label>
                                  <input autocomplete="off" value="<?php echo $dados_edi["CEP"];?>" type="text" class="form-control" id="cep" name="cep" placeholder="Digite o seu CEP" maxlength="8" minlength="8" />
                                </div>
                              </div>
                            </div>
                          </div>   
                          <div class="input-group mb-3">
                            <div class="container text-center">
                              <div class="row">
                                <div class="col">
                                  <label for="address"></label>
                                  <input type="text" value="<?php echo $dados_edi["RUA"];?>" class="form-control" id="address" name="address" placeholder="Rua" readonly data-input />
                                </div>
                                <div class="col">
                                  <label for="number"></label>
                                  <input autocomplete="off" type="text" value="<?php echo $dados_edi["NUM_RESIDENCIA"];?>" class="form-control" id="number" name="number" placeholder="Digite o número da residência"  data-input />
                                </div>
                                <div class="col">
                                  <label for="complement"></label>
                                  <input autocomplete="off" type="text" value="<?php echo $dados_edi["COMPLEMENTO"];?>" class="form-control" id="complement" name="complement" placeholder="Digite o complemento"  data-input />
                                </div>
                              </div>
                            </div>
                          </div> 
                          <div class="input-group mb-3">
                            <div class="container text-center">
                              <div class="row">
                                <div class="col"> 
                                  <label for="neighborhood"></label>
                                  <input type="text" value="<?php echo $dados_edi["BAIRRO"];?>" class="form-control"  id="neighborhood" name="neighborhood" placeholder="Bairro" readonly data-input/>
                                </div>
                                <div class="col">
                                  <label for="city"></label>
                                  <input autocomplete="off" type="text" value="<?php echo $dados_edi["CEP"];?>" class="form-control" id="city" name="city" placeholder="Cidade" Readonly data-input/>
                                </div>
                                <div class="col">
                                <label for="region"></label>
                                  <select class="form-select" id="region" disabled data-input>
                                    <option disabled selected>Estado</option>
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="DF">Distrito Federal</option>
                                    <option value="ES">Espírito Santo</option>
                                    <option value="GO">Goiás</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option value="MG">Minas Gerais</option>
                                    <option value="PA">Pará</option>
                                    <option value="PB">Paraíba</option>
                                    <option value="PR">Paraná</option>
                                    <option value="PE">Pernambuco</option>
                                    <option value="PI">Piauí</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="RN">Rio Grande do Norte</option>
                                    <option value="RS">Rio Grande do Sul</option>
                                    <option value="RO">Rondônia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="SE">Sergipe</option>
                                    <option value="TO">Tocantins</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div> 
                      <br>
                      <div class="input-group mb-3">
                        <div class="container text-center">
                        <button id="save-btn" name="save-btn" type="submit" class="btn cor_botao">
                            Salvar
                          </button> 
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
        <?php } ?>  
    </fieldset>
  </form>

    <script src="js/formMask_V2.js"></script>
    <script>
      new FormMask(document.querySelector("#chf_cpf"), "___.___.___-__", "_", [".", "-"])
      new FormMask(document.querySelector("#chf_tel"), "(__)_____-____", "_", ["(", ")", "-"])
    </script>
</div>

</body>
</html>