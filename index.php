<?php include_once('protect.php') ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/formMask.js" defer></script>
    <title>Formulário</title>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="https://media.discordapp.net/attachments/1019282538751070338/1019323267779149824/unknown.png?width=410&height=406"
                alt="">
        </div>
        <div class="form">
            
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
            <form action="connect.php" method="POST">
                <div class="form-header">
                    <div class="title">
                        <br>
                        <h1>Cadastre-se</h1>
                        <div class="input-group">
                            <div class="input-box">
                                <label for="adm_nome">Primeiro Nome</label>
                                <input autocomplete="off" id="adm_nome" type="text" name="adm_nome" placeholder="Digite o Nome" >
                            </div>

                            <div class="input-box">
                                <label for="c_adm_sobrenome">Sobrenome</label>
                                <input autocomplete="off" id="c_adm_sobrenome" type="text" name="c_adm_sobrenome" placeholder="Digite seu sobrenome" >
                            </div>
                            <div class="input-box">
                                <label for="c_adm_email">E-mail</label>
                                <input autocomplete="off" id="c_adm_email" type="email" name="c_adm_email" placeholder="Digite seu e-mail" required>
                            </div>

                            <div class="input-box">
                                <div class="input-box">
                                    <label for="c_adm_CPF">CPF</label>
                                    <input autocomplete="off" type="text" name="c_adm_cpf" id="c_adm_cpf" class="inputUser" placeholder="xxx.xxx.xxx-xx"  pattern="\d{3}.\d{3}.\d{3}-\d{2}"
                                        title="Digite um CPF no formato: xxx.xxx.xxx-xx">
                                </div>

                            </div>

                            <div class="input-box">
                                <label for="c_adm_number">Celular</label>
                                <input autocomplete="off" id="c_adm_number" type="tel" name="c_adm_number" placeholder="(xx) xxxx-xxxx" >
                            </div>

                            <div class="input-box">
                                <label for="c_adm_password">Senha</label>
                                <input autocomplete="off" id="c_adm_password" type="password" name="c_adm_password" placeholder="Digite sua senha" >
                            </div>


                            <div class="input-box">
                                <label for="c_adm_confirmSenha">Confirme sua Senha</label>
                                <input autocomplete="off" id="c_adm_confirmSenha" type="password" name="c_adm_confirmSenha" placeholder="Digite sua senha novamente" >
                            </div>

                        </div>

                        <div class="gender-inputs">
                            <div class="gender-title">
                                <h6>Gênero</h6>
                            </div>

                            <div id="gender" name="gender" class="gender-group">
                                <div class="gender-input">
                                    <input autocomplete="off" id="gender" type="radio" name="gender" value="Feminino">
                                    <label for="gender">Feminino</label>
                                </div>

                                <div class="gender-input">
                                    <input autocomplete="off" id="gender" type="radio" name="gender" value="Masculino">
                                    <label for="gender">Masculino</label>
                                </div>

                                <div class="gender-input">
                                    <input autocomplete="off" id="gender" type="radio" name="gender" value="Outros">
                                    <label for="gender">Outros</label>
                                </div>

                                <div class="gender-input">
                                    <input autocomplete="off" id="gender" type="radio" name="gender" value="Prefiro não dizer">
                                    <label for="gender">Prefiro não dizer</label>
                                </div>
                            </div>
                        </div>
                        <div class="continue-button">
                            <button id="btn_cad" name="btn_cad" type="submit">
                                <a href="">Continuar</a>
                            </button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>