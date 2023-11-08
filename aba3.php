<?php

include_once('protect.php');

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css\esse.css">

    <title>Informações de Gastos</title>
</head>

<body class="corfundo pt-5"> 
    <div class="container text-center bg-light">
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
        <form action="cad_gastos.php" method="POST">
            <fieldset>
            <center><h1>Gastos</h1></center> <br>
            
            <div class="input-group mb-3">
                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <label></label>
                            <select class="form-select" name="cond_moradia" required>
                                <option selected disabled>Moradia</option>
                                <option name="check" id="Propria" value="Propria">Própria</option>
                                <option name="check" id="Alugada" value="Alugada">Alugada</option>
                                <option name="check" id="Cedida" value="Cedida">Cedida</option>
                                <option name="check" id="Financiada" value="Financiada">Financiada</option>
                                <option name="check" id="Situaçao" value="Situaçao">Situação de Rua</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="comodos"></label>
                            <input autocomplete="off" type="number" class="form-control" name="comodos" id="comodos" placeholder="N° de cômodos:"required>
                        </div>
                        <div class="col">
                            <label for="moradia"></label>
                            <input autocomplete="off" type="text" class="form-control" name="moradia" id="moradia" placeholder="Tempo de Moradia:"required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <label for="alimentacao"></label>
                            <input autocomplete="off" type="text" class="form-control" name="alimentacao" id="alimentacao" placeholder="Alimentação: R$"required>
                        </div>
                        <div class="col">
                            <label for="agua"></label>
                            <input autocomplete="off" type="text" class="form-control" name="agua" id="agua" placeholder="Água: R$"required>
                        </div>
                        <div class="col">
                            <label for="luz"></label>
                            <input autocomplete="off" type="text" class="form-control" name="luz" id="luz" placeholder="Luz: R$"required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <label for="gas"></label>
                            <input autocomplete="off" type="text" class="form-control" name="gas" id="gas" placeholder="Gás: R$"required>
                        </div>
                        <div class="col">
                            <label for="medicamento"></label>
                            <input autocomplete="off" type="text" class="form-control" name="medicamento" id="medicamento" placeholder="Medicamento: R$"required>
                        </div>
                        <div class="col">
                            <label for="telefone"></label>
                            <input autocomplete="off" type="text" class="form-control" name="telefone" id="telefone" placeholder="Telefone: R$"required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <label for="aluguel"></label>
                            <input autocomplete="off" type="text" class="form-control" name="aluguel" id="aluguel" placeholder="Aluguel: R$"required>
                        </div>
                        <div class="col">
                            <label for=""></label>
                            <input autocomplete="off" type="text" class="form-control" name="outros" id="outros" placeholder="Outros: R$"required>
                        </div>
                    </div>
                </div>
            </div>

                    
                    <input type="hidden" name="cpf" id="cpf" value="<?php echo $_GET['CPF'];?>">

                       
           
                <div class="input-group mb-3">
                    <div class="container text-center">
                        <div class="row">
                            <div class="col">

                                <button class="btn cor_botao mt-3 me-md-2" onclick="window.location.href = 'aba2.php?CPF=<?php echo $_GET['CPF'];?>'" type="button">Voltar</button>

                            </div>
                            <div class="col">
                            </div>
                            <div class="col">
                            </div>
                            <div class="col">
                            </div>
                            <div class="col">
                            </div>
                            <div class="col">
                            </div>
                            <div class="col">
                                <button class="btn cor_botao mt-3 me-md-2" type="submit"  >Proximo</button>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
<!--

                <div class="input-group mb-3">
                    <div class="container text-center">
                        <div class="row">
                            <div class="col">

                                <button class="btn btn-primary me-md-2" type="button">Proximo</button>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>

                </b>
-->
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