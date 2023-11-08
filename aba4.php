<?php

include_once('protect.php');
include_once('config.php');
$beneficios_consulta = "Select * From beneficios Order BY CATEGORIA_BENEFI";
$beneficios_con = mysqli_query($conexao,$beneficios_consulta) or die ("erro: ".mysqli_error($conexao));
$beneficios_consulta2 = "Select * From beneficios Order BY CATEGORIA_BENEFI";
$beneficios_con2 = mysqli_query($conexao,$beneficios_consulta2) or die ("erro: ".mysqli_error($conexao));
$beneficios_consulta3 = "Select * From beneficios Order BY CATEGORIA_BENEFI";
$beneficios_con3 = mysqli_query($conexao,$beneficios_consulta3) or die ("erro: ".mysqli_error($conexao));


?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beneficios Governo</title>
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
<div class="container bg-light"> 
 <br>
  <form action="cad_prog.php" method="POST">
          
          <center><h1>Programas Sociais</h1></center> 

      <br>

      <div class="text">
        <h4>Escolha apenas os Benefícios que vc ja recebe</h4>
            <h5>Programas Sociais</h5>
            <?php while($beneficios = $beneficios_con->fetch_array()){?>
              <?php 
                      
              if($beneficios["CATEGORIA_BENEFI"] == "Programas Sociais"){ ?>
              
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="cad" name="programa_social[]<?php echo $valor_programa ?>" value="<?php echo $beneficios["IDBEN"];?>" >
                <label class="form-check-label" for="cad"><?php echo $beneficios["NOME_BENEFI"];?></label>
              </div>
              <?php }; ?>
            <?php } ?>
            <br>
            <h5>Benefícios Eventuais</h5>  
            <?php while($beneficios2 = $beneficios_con2->fetch_array()){?>


              <?php  if($beneficios2["CATEGORIA_BENEFI"] == "Beneficios Eventuais"){ ?>

              
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="cad" name="programa_social[]" value="<?php echo $beneficios2["IDBEN"];?>" >
                <label class="form-check-label" for="cad"><?php echo $beneficios2["NOME_BENEFI"];?></label>
              </div>
              <?php }; ?> 


            <?php } ?>
            <br>
            <h5>Proteção Social Básica</h5>
      
            <?php while($beneficios3 = $beneficios_con3->fetch_array()){?>


            <?php  if($beneficios3["CATEGORIA_BENEFI"] == "Proteção Social Basica"){?>

              
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="cad" name="programa_social[]" value="<?php echo $beneficios3["IDBEN"];?>" >
                <label class="form-check-label" for="cad"><?php echo $beneficios3["NOME_BENEFI"];?></label>
            </div>
              <?php }; ?> 
            <?php } ?>
 
    </div>   

            <input type="hidden" name="cpf" id="cpf" value="<?php echo $_GET['CPF'];?>">
            <br><br>
      <div class="input-group mb-3">
        <div class="container text-center">
            <div class="row">
                <div class="col">
                  <button class="btn cor_botao mt-3 me-md-2" type="submit">Salvar</button>
                </div>
                <div class="col">
                  <button class="btn cor_botao mt-3 me-md-2" onclick="window.location.href = 'cadastro_visualizar.php?CPF=<?php echo $_GET['CPF'];?>'" type="button">Finalizar</button> 
                </div>
                <div class="col">
                  <button class="btn cor_botao mt-3 me-md-2" onclick="window.location.href = 'aba5.php?CPF=<?php echo $_GET['CPF'];?>'" type="button">Folha de Procedimentos</button>  
                </div> 
          </div><br>
        </div>
        <br>
                
  </form>
</div>      
</body>
</html>











    


