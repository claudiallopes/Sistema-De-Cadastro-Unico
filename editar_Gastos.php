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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css\esse.css">

    <title>Aba 3</title>
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
    <br><br>
    <div class="container bg-light text-center">
        <form action="edit_gastos.php" method="POST">
            <fieldset>
                
                <center><h1>Gastos</h1></center> <br>
                    <?php while($dados_edi = $edi_cad->fetch_array()){?>
                        <div class="input-group mb-3">
                            <div class="container text-center">
                                <div class="row">
                                    <div class="col">
                                        <label>Condição de moradia</label>
                                        <select class="form-select" name="cond_moradia">
                                        <option value="<?php echo $dados_edi["COND_MORAD"];?>" selected>Moradia:<?php echo $dados_edi["COND_MORAD"];?></option>
                                        <option name="check" id="Propria" value="Propria">Própria</option>
                                        <option name="check" id="Alugada" value="Alugada">Alugada</option>
                                        <option name="check" id="Cedida" value="Cedida">Cedida</option>
                                        <option name="check" id="Financiada" value="Financiada">Financiada</option>
                                        <option name="check" id="Situaçao" value="Situaçao">Situação de Rua</option>
                                        </select>
                                    </div>   
                                    <div class="col">
                                        <label for="comodos">N° de cômodos</label>
                                        <input autocomplete="off" value="<?php echo $dados_edi["QUANT_COMOD"];?>" type="number" class="form-control" name="comodos" id="comodos" placeholder="N° de cômodos:">
                                    </div>
                                    <div class="col">
                                        <label for="moradia">Tempo de Moradia</label>
                                        <input autocomplete="off" value="<?php echo $dados_edi["TEMPO_MORAD"];?>" type="text" class="form-control" name="moradia" id="moradia" placeholder="Tempo de Moradia:">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="container text-center">
                                <div class="row">
                                    <div class="col">
                                        <label for="alimentacao">Alimentação: R$</label>
                                        <input autocomplete="off" value="<?php echo $dados_edi["VAL_ALIMENT"];?>" type="text" class="form-control" name="alimentacao" id="alimentacao" placeholder="Alimentação: R$">
                                    </div>
                                    <div class="col">
                                        <label for="agua">Água: R$</label>
                                        <input autocomplete="off" value="<?php echo $dados_edi["VAL_AGUA"];?>" type="text" class="form-control" name="agua" id="agua" placeholder="Água: R$">
                                    </div>
                                    <div class="col">
                                        <label for="luz">Luz: R$</label>
                                        <input autocomplete="off" value="<?php echo $dados_edi["VAL_ENERGIA"];?>" type="text" class="form-control" name="luz" id="luz" placeholder="Luz: R$">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="container text-center">
                                <div class="row">
                                    <div class="col">
                                        <label for="gas">Gás: R$</label>
                                        <input autocomplete="off" value="<?php echo $dados_edi["VAL_GAS"];?>" type="text" class="form-control" name="gas" id="gas" placeholder="Gás: R$">
                                    </div>
                                    <div class="col">
                                        <label for="medicamento">Medicamento: R$</label>
                                        <input autocomplete="off" value="<?php echo $dados_edi["MEDICAMENTOS"];?>" type="text" class="form-control" name="medicamento" id="medicamento" placeholder="Medicamento: R$">
                                    </div>
                                    <div class="col">
                                        <label for="telefone">Telefone: R$</label>
                                        <input autocomplete="off" value="<?php echo $dados_edi["VAL_TELEFONE"];?>" type="text" class="form-control" name="telefone" id="telefone" placeholder="Telefone: R$">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="container text-center">
                                <div class="row">
                                    <div class="col">
                                        <label for="aluguel">Aluguel: R$</label>
                                        <input autocomplete="off" value="<?php echo $dados_edi["VAL_ALUGUEL"];?>" type="text" class="form-control" name="aluguel" id="aluguel" placeholder="Aluguel: R$">
                                    </div>
                                    <div class="col">
                                        <label for="">Outros: R$</label>
                                        <input value="<?php echo $dados_edi["OUTROS_GASTOS"];?>" type="text" class="form-control" name="outros" id="outros" placeholder="Outros: R$">
                                    </div>
                                </div>
                            </div>
                        </div>

                                <input autocomplete="off" type="hidden" name="cpf" id="cpf" value="<?php echo $CPF?>">

                                
                    
                            <div class="input-group mb-3">
                                <div class="container text-center">
                                    <div class="row">
                                        <div class="col">
                                        <button class="btn cor_botao me-md-2 mt-3" type="Submit">Salvar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                   <?php } ?> 
            </fieldset>
        </form>
    </div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://plentz.github.io/jquery-maskmoney/javascripts/jquery.maskMoney.min.js" type="text/javascript"></script>

<script>
jQuery("#alimentacao,#agua,#luz,#gas,#medicamento,#telefone,#aluguel,#outros").click(function() {
  if (jQuery(this).val() == '') {
    jQuery(this).val('0,00').maskMoney({
      prefix: '', 
      thousands: ',', 
      decimal: '.'
    });
  }
});
</script>

</body>

</html>