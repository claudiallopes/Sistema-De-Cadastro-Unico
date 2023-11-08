<?php

include_once('protect.php');


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/formMask.js" defer></script>
    <title>Dependentes</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="js/moneyMask.js" defer></script>
 
    <link rel="stylesheet" type="text/css" href="css/esse.css" media="screen" />
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
<div class="container text-center bg-light pt-3">
    
        <form action="cad_dep.php" method="POST">
        <div>
                    
                    <center><h1 class= mt-5>Composição Familiar</h1></center>
                    <br>

                <div class="input-group mb-3">
                    <div class="container text-center">
                        <div class="row">
                            <div class="col">
                                    <label for="d_nome"></label>
                                    <input  autocomplete="off" type="text"  class="form-control" class="teste" name="d_nome" id="d_nome" placeholder="Digite o nome completo">
                            </div>
                            <div class="col">
                                    <label for="d_nascimento"></label>
                                    <input  autocomplete="off" type="date"  class="form-control" class="teste" name="d_nascimento" id="d_nascimento">

                            </div>
                            <div class="col">
                                    <label for="d_parentesco"></label>
                                    <!--<input type="num" class="teste" name="d_parentesco" id="d_parentesco" placeholder="Digite seu parentesco">-->
                                <select name="d_parentesco" class="form-select">
                                    <option selected disabled>Parentesco</option>
                                    <option name="d_parentesco" value="Pai">Pai</option>
                                    <option name="d_parentesco" value="Mãe">Mãe</option>
                                    <option name="d_parentesco" value="Irmão">Irmão</option>
                                    <option name="d_parentesco" value="Esposo(a)">Esposo(a)</option>
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
                                    <label for="d_cpf"></label>
                                    <input id="chf_cpf" class="form-control" class="teste" name="d_cpf" placeholder="CPF" autocomplete="off" placeholder="Digite o CPF">
                            </div>
                            
                        <div class="col">
                        <label for="d_escolaridade"></label>
                            <select name="d_escolaridade" id="d_escolaridade" class="form-select" required>
                                <option selected disabled value="">Escolaridade</option>
                                <option id="completo" name="d_escolaridade" value="Ensino Fundamental completo">Ensino Fundamental Completo</option>
                                <option id="incompleto" name="d_escolaridade" value="Ensino Fundamental incompleto">Ensino Fundamental Incompleto</option>
                                <option id="completo" name="d_escolaridade" value="Ensino Medio completo">Ensino Medio Completo</option>
                                <option id="incompleto" name="d_escolaridade" value="Ensino Medio incompleto">Ensino Medio Incompleto</option>
                                <option id="completo" name="d_escolaridade" value="Ensino Superior completo">Ensino Superior Completo</option>
                                <option id="incompleto" name="d_escolaridade" value="Ensino Superior incompleto">Ensino Superior Incompleto</option>
                                <option id="nao_alfabetizado" name="d_escolaridade" value="não alfabetizado">Não alfabetizado</option>
                            </select>
                        </div>

                                
                            <div class="col">
                                        <label for="d_profissao"></label>
                                        <input  autocomplete="off" type="num" class="form-control" name="d_profissao" id="d_profissao" placeholder="Digite a profissão">
                            </div>                

                        </div>
                    </div>
                </div> 

                <div class="input-group mb-3">
                    <div class="container text-center">
                        <div class="row">
                            <div class=col>
                                        <label for="d_deficiecia"></label>
                                        <select class="form-select" name="d_deficiencia" id="d_deficiencia" required>
                                            <option selected disabled>Tem Alguma Deficiencia?</option>
                                            <option value="Sim">Sim</option>
                                            <option value="Não">Não</option>
                                        </select>
                            </div>
                            <div class=col>
                                        <label for="d_deficiente"></label>
                                        <input  autocomplete="off" type="text" class="form-control" name="d_deficiente" id="d_deficiencia" placeholder="Caso Tenha Digite Aqui:">
                            </div>
                            <div class="col">
                                        <label for="d_renda" class="form-label"></label>
                                        <input name="d_renda" type="text" class="form-control" id="valor" placeholder="Digite a Renda Total" required>
                            </div>
                    </div>
                </div>
                <div class="input-group mb-2">
                    <div class="container text-center">
                        <div class="row">
                            <div class="col">
                                        <button class="btn cor_botao mt-5 me-md-2" type="Submit">Salvar</button>
                            </div>
                            <div class="col"> </div>
                            <div class="col"> </div> 
                            <div Class="col">
                                        <button onclick="window.location.href = 'aba3.php?CPF=<?php echo $_GET['CPF'];?>'" class="btn cor_botao mt-5 me-md-2" type="button">Proximo</button>
                            </div> 
                        </div>
                    </div>
                </div>
                                
                                
                                <div  class="bt3">
                                <input  autocomplete="off" type="hidden" name="cpf" id="cpf" value="<?php echo $_GET['CPF'];?>">
                                </div>
        </div>    
        </form>
    
</div>   
</body>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://plentz.github.io/jquery-maskmoney/javascripts/jquery.maskMoney.min.js" type="text/javascript"></script>



<script>
jQuery("#valor").click(function() {
  if (jQuery(this).val() == '') {
    jQuery(this).val('0,00').maskMoney({
      prefix: '', 
      thousands: ',', 
      decimal: '.'
    });
  }
});
</script>


<br>
</html>