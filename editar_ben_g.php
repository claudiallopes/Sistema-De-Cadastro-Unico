<?php
include_once('protect.php');
include_once('config.php');
$ID=$_GET["ID"];
$consulta_ben = "Select * From beneficios where IDBEN like $ID";
$con_ben = mysqli_query($conexao,$consulta_ben) or die ("erro: ".mysqli_error($conexao));
$Ben = $con_ben->fetch_array();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/esse.css">   
    <title>Benefícios GOV(Editar)</title>
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
                <li><a class="dropdown-item" href="consultar_geral.php">Cadastros Geral(Prefeitura)</a></li>
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
    <form Action="edit_ben_g.php?ID=<?php echo $ID;?>&Acao=Editar" method="POST">
        <div class="container-xxl bd-gutter  flex-lg-nowrap shadow-sm p-3 mb-5 bg-body rounded">
        <center><h1>Benefícios do Governo</h1><p><a href="consultar_geral.php" class="btn btn-light shadow-sm p-3 bg-body rounded">Voltar</a></p></center>
            <div class="mb-3">
                <label for="nome_benef" class="form-label">Nome do Benefícios</label>
                <input value="<?php echo $Ben["NOME_BENEFI"]?>" type="text" class="form-control" id="nome_benefi" name="nome_benefi" placeholder="Exemplo:Bolsa Família" required><br>
                <label for="valor_benef" class="form-label">Valor R$:</label>
                <input value="<?php echo $Ben["VALOR_BENEFI"]?>" type="text" class="form-control" id="valor_benefi" name="valor_benefi" placeholder="Exemplo:150,00" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Descrição do Benefícios</label>
                <textarea value="<?php echo $Ben["DESCRICAO_BENEFI"]?>" id="desc_benefi" Name="desc_benefi" class="form-control" placeholder="Digite uma Descrição ao benefício" id="" rows="3"><?php echo $Ben["DESCRICAO_BENEFI"]?></textarea>
            </div class="mb-3">
                <select id="cad_Benefi" Name="categoria_benefi" class="form-select" aria-label="Default select example" required>
                    <option value="<?php echo $Ben["CATEGORIA_BENEFI"]?>" selected>Selecionado:<?php echo $Ben["CATEGORIA_BENEFI"]?></option>
                    <option value="Programas Sociais">Programas sociais</option>
                    <option value="Beneficios Eventuais">Benefícios Eventuais</option>
                    <option value="Proteção Social Basica">Proteção Social Basica</option>
                </select><br>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button name="bnt_bene" id="bnt_bene" class="btn btn-light shadow-sm p-3 mb-5 bg-body rounded" type="Submit">Cadastrar</button>
                </div>

        </div>
    </form>
      <div class="text-center bg-white text-black p-3">
        <div class="row">
          <div class="col-4">      
            <img src="images/logo.png" class="image"><br>
          </div>  
          <div class="col-4">  
            <b>Endereço:</b>
            <span class="site-titletextdados">Praça Dr. Aimone Salerno, 171 - Centro<br>Taquaritinga/SP 
            <br>    
            <b>CEP:</b> 15900-012
            </span>
          </div>
          <div class="col-4">
            <b>Telefone:</b>
            <span class="site-titletextdados">(16) 3252-2221</span>
          </div>
        </div>
      </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://plentz.github.io/jquery-maskmoney/javascripts/jquery.maskMoney.min.js" type="text/javascript"></script>
<script>
jQuery(function() {
    
    jQuery("#valor_benefi").maskMoney({
	prefix:'R$', 
	thousands:',', 
	decimal:'.'
})

});
</script>
</body>

</html>