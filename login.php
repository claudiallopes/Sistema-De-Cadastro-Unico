
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Formulário</title>
</head>

<body>
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
    <div class="container">
        <div class="form-image">
            <img src="https://media.discordapp.net/attachments/1019282538751070338/1019323267779149824/unknown.png?width=410&height=406" alt="">
        </div>
        <div class="form">
            
            <form action="login_con.php" method="POST">
                <div class="form-header">
                    <div class="title">
                        <h1>Login</h1>
                <div class="input-group">
                    <div class="input-box">
                        <label for="l_adm_email">E-mail</label>
                        <input autocomplete="off" id="l_adm_email" type="email" name="l_adm_email" placeholder="Digite seu e-mail">
                    </div>
                    <!--L de login-->                 
                    <div class="input-box">
                        <label for="l_adm_password">Senha</label>
                        <input autocomplete="off" id="l_adm_password" type="password" name="l_adm_password" placeholder="Digite sua senha">
                    </div>
                <div class="continue-button">
                    <button type="submit">Continuar</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>