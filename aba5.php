
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Folha de Procedimentos</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>    
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
<div class="container  text-center bg-light">
    <form action="cad_folha_procedimentos.php" method="POST">
              <br> <br> 
                  <center><h1>Folha de Procedimentos</h1></center>
                    <br>          
       <div class="input-group mb-3">
        <div class="container text-center">
            <div class="row">
                    <div class="col">
                            <textarea id="txtArea" name="ANOTACAO"  class="form-control" rows="7"  placeholder="Digite a demanda apresentada, orientações, encaminhamentos e limite:512 caracteres"></textarea>
                    </div> 
            </div>
        </div>
       </div>  
       <br>
       <input type="hidden" name="cpf" id="cpf" value="<?php echo $_GET['CPF'];?>">
        <div class="input-group mb-3">
            <div class="container text-center">
                <div class="row">
                    <div class="col">
                                <button name="anotar" value="adicionar"  class="btn mb-3 cor_botao me-md-2" type="Submit">Salvar</button>
                    </div>
            </div>
       </div>  
    </form>
</div>
</body>
</html>