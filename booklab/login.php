<?php
  include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/sessao.php';
  include_once $_SERVER["DOCUMENT_ROOT"] . '/php/servicos/usuarioService.php';
  include_once $_SERVER["DOCUMENT_ROOT"] . '/php/servicos/alertaService.php';
  include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/constantes.php';
  include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/logger.php';

  if(!isset($_SESSION)) session_start();
    inicializa_sessao();

?>

<!DOCTYPE html>
<html>

<head>
  <title>Login</title>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="../css/flaticon.css">
  <link href="https://fonts.googleapis.com/css?family=Economica&display=swap" rel="stylesheet">
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../../css/estiloLogin.css">
  <link rel="stylesheet" type="text/css" href="../../css/estiloStandard.css">
</head>

<body>

  <?php
    $logger = new LoggerBooklab();
    $logger -> escreveTimestamp();
    $logger -> logaMesg("\n");
    $logger -> logaMesg(json_encode($_SESSION));

    if (isset($_SESSION[Constantes :: AlertasAtuais]["ErroLogin"])) {
      echo AlertaService :: criaElemAlerta ("ErroLogin");
      AlertaService :: retiraAlerta ("ErroLogin");
    }

    $logger -> logaMesg("Depois: " . json_encode($_SESSION));

  ?>
  
  <ul id="hlist">
    <li> <span id="menu" style="font-size:30px;cursor:pointer">&#9776; BOOKLAB </span></li>
  </ul>

  <div class="flex-container">
    <form action="../php/servicos/usuarioService.php" method="post">
      <div class="imgcontainer">
        <img src="../images/user2.png" alt="Avatar" class="avatar">
      </div>
      <div class="container">
        <!--<div class="alert alert-success">
          <strong>Success!</strong> Indicates a successful or positive action.
        </div>-->
        <label for="prontuario"><b>Prontuário:</b></label>
        <input type="text" placeholder="Ex: 175067X" id="uname" name="prontuario" required>
        <label for="senhaID"><b>Senha:</b></label>
        <input type="password" placeholder="Ex: abc123" id="senhaID" name="senha" required>
        <input type="checkbox" name="showPassword" onclick="mostraSenha()"> Mostrar senha
        <br /><br />
        <input type="checkbox" id="lembrarSessao" name="lembrarSessao" value="true"> Lembrar de mim

        <script>
          function mostraSenha() {
            var x = document.getElementById("senhaID");
            if (x.type === "password") {
              x.type = "text";
            } else {
              x.type = "password";
            }
          }
        </script>

        <button type="submit">Login</button>

      </div>

      <div class="container" style="text-align: center; background-color:#f1f1f1">
        <span class="psw"><a href="#">Esqueceu a senha??</a>
        </span>
      </div>
    </form>
  </div>

</body>

</html>