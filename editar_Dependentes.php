<?php

include_once('protect.php');
include_once('config.php');
$CHF_CPF = $_GET["CHF_CPF"];
$CPF = $_GET['CPF'];
$editar_cad = "Select * From cadastro_dependentes Where d_cpf = '$CPF' and cadastro_pessoa_CPF = '$CHF_CPF'";
$edi_cad = mysqli_query($conexao,$editar_cad) or die ("erro: ".mysqli_error($conexao));

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aba2</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
 
    <link rel="stylesheet" type="text/css" href="css/esse.css" media="screen" />
</head>
<body class="corfundo pt-5 pb-5" id="checkout-page">
<div class="container  text-center bg-light"> 
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
    
        <form action="edit_dependentes.php" method="POST">
        <div>
                    <br> <br> <br>
                    <center><h2>Composição Famíliar</h2></center>
                    <br>
            <?php while($dados_edi = $edi_cad->fetch_array()){?>
                <div class="input-group mb-3">
                    <div class="container text-center">
                        <div class="row">
                            <div class="col">
                                    <label for="d_nome">Digite o nome completo</label>
                                    <input autocomplete="off" value="<?php echo $dados_edi["d_nome"];?>" type="text"  class="form-control" class="teste" name="d_nome" id="d_nome" placeholder="Digite o nome completo">
                            </div>
                            <div class="col">
                                    <label for="d_nascimento">Data de Nascimento</label>
                                    <input autocomplete="off" value="<?php echo $dados_edi["d_nascimento"];?>" type="date" class="form-control" class="teste" name="d_nascimento" id="d_nascimento" readonly>

                            </div>
                            <div class="col">
                                <label for="d_parentesco">Parentesco</label>
                                <select name="d_parentesco" class="form-select">
                                    <option value="<?php echo $dados_edi["d_parentesco"];?>" selected>Selecionado:<?php echo $dados_edi["d_parentesco"];?></option>
                                    <option name="d_parentesco" value="Pai">Pai</option>
                                    <option name="d_parentesco" value="Mãe">Mãe</option>
                                    <option name="d_parentesco" value="Esposo(a)">Esposo(a)</option>
                                    <option name="d_parentesco" value="Irmao">Irmão</option>
                                    <option name="d_parentesco" value="Filho(a)">Filho(a)</option>
                                    <option name="d_parentesco" value="Primo(a)">Primo(a)</option>
                                    <option name="d_parentesco" value="Neto(a)">Neto(a)</option>
                                    <option name="d_parentesco" value="Tio(a)">Tio(a)</option>
                                    <option name="d_parentesco" value="Avô(ó)">Avô(ó)</option>
                                    <option name="d_parentesco" value="Bisavô(ó)">Bisavô(ó)</option>
                                    <option name="d_parentesco" value="Sogro(a)">Sogro(a)</option>
                                    <option name="d_parentesco" value="Genro/Nora">Genro/Nora</option>
                                    <option name="d_parentesco" value="Cunhado(a)">Cunhado(a)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>        
                                            
                <div class="input-group mb-3">
                    <div class="container text-center">
                        <div class="row">
                            <div class="col">
                                    <label for="d_cpf">Digite o CPF</label>
                                    <input autocomplete="off" value="<?php echo $dados_edi["d_cpf"];?>" id="CPF" class="form-control" name="d_cpf" placeholder="CPF" autocomplete="off" placeholder="Digite o CPF">
                            </div>
                            
                        <div class="col">
                        <label for="d_escolaridade">Escolaridade</label>
                            <select name="d_escolaridade" id="d_escolaridade" class="form-select" required>
                                <option selected value="<?php echo $dados_edi["d_escolaridade"];?>">Selecionado:<?php echo $dados_edi["d_escolaridade"];?></option>
                                <option id="completo" name="d_escolaridade" value="Ensino Fundamental completo">Ensino Fundamental Completo</option>
                                <option id="incompleto" name="d_escolaridade" value="Ensino Fundamental incompleto">Ensino Fundamental Incompleto</option>
                                <option id="completo" name="d_escolaridade" value="Ensino Medio completo">Ensino Médio Completo</option>
                                <option id="incompleto" name="d_escolaridade" value="Ensino Medio incompleto">Ensino Médio Incompleto</option>
                                <option id="completo" name="d_escolaridade" value="Ensino Superior completo">Ensino Superior Completo</option>
                                <option id="incompleto" name="d_escolaridade" value="Ensino Superior incompleto">Ensino Superior Incompleto</option>
                                <option id="nao_alfabetizado" name="d_escolaridade" value="não alfabetizado">Não alfabetizado</option>
                            </select>
                        </div>

                                
                            <div class="col">
                                        <label for="d_profissao">Digite a profissão</label>
                                        <input autocomplete="off" value="<?php echo $dados_edi["d_profissao"];?>" type="num" class="form-control" name="d_profissao" id="d_profissao" placeholder="Digite a profissão">
                            </div>                

                        </div>
                    </div>
                </div> 
                <div class="input-group mb-3">
                    <div class="container text-center">
                        <div class="row">
                            <div class=col>
                                        <label for="d_deficiecia">Tem Deficiencia?</label>
                                        <select class="form-select" name="d_deficiencia" id="d_deficiencia" required>
                                            <option value="<?php echo $dados_edi["d_deficiencia"];?>" selected disabled>Selecionado:<?php echo $dados_edi["d_deficiencia"];?></option>
                                            <option value="Sim">Sim</option>
                                            <option value="Não">Não</option>
                                        </select>
                            </div>
                            <div class=col>
                                        <label for="d_deficiente">Caso tenha, Digite abaixo:</label>
                                        <input autocomplete="off" value="<?php echo $dados_edi["d_deficiencia_qual"]?>" type="text" class="form-control" name="d_deficiente" id="d_deficiencia" placeholder="deficiencia">
                            </div>
                            <div class="col">
                                        <label for="d_renda" class="">Digite a Renda Total</label>
                                        <input autocomplete="off" value="<?php echo $dados_edi["d_renda_total"];?>" name="d_renda" type="text" class="form-control" id="valores" placeholder="Digite a Renda Total" required>
                            </div>
                    </div>
                </div>
            <?php } ?>
            <input autocomplete="off" type="hidden" name="cpf" id="cpf" value="<?php echo $CHF_CPF?>">
                <div class="input-group mb-3">
                    <div class="container text-center">
                        <div class="row">
                            <div class="col"><a href="cadastro_visualizar.php?CPF=<?php echo $CHF_CPF;?>" class="btn cor_botao mt-4" role="button">Voltar</a></div>
                            <div class="col">
                                        <button name="editar" value="editar" class="btn cor_botao me-md-2 mt-4" type="Submit">Salvar Registro</button>
                            </div>
                            <div class="col">
                                        <button name="editar" value="apagar" class="btn btn-danger me-md-2 mt-4" type="Submit">Deletar Registro</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>    
        </form>
    
</div>   
</body>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://plentz.github.io/jquery-maskmoney/javascripts/jquery.maskMoney.min.js" type="text/javascript"></script>



<script>
jQuery("#valores").click(function() {
  if (jQuery(this).val() == '') {
    jQuery(this).val('0,00').maskMoney({
      prefix: '', 
      thousands: ',', 
      decimal: '.'
    });
  }
});
</script>
</html>