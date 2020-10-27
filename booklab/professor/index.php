<?php

  include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/cookies.php';
  include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/sessao.php';
  include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/constantes.php';
  include_once $_SERVER["DOCUMENT_ROOT"] . '/php/servicos/alertaService.php';
  include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/logger.php';

  if (!isset($_SESSION)) session_start();
  inicializa_sessao();
		possui_permissao("professor");

?>

<!DOCTYPE html>
<html>

<head>
  <title>Home</title>

  <link href="https://fonts.googleapis.com/css?family=Economica&display=swap" rel="stylesheet">
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
  <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/estiloReservas.css">
  <link rel="stylesheet" type="text/css" href="../css/flaticon.css">
  <link rel="stylesheet" type="text/css" href="../css/estiloStandard.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

  <div id="mySidenav" class="sidenav">
    <div class="logo">
      <img src="../images/ifsp.png" width="75px" height="75px">
    </div>

    <br>

    <div class="user">
      <img src="<?php echo "../api/banco_de_dados/imagens/" . $_SESSION[Constantes::CaminhoFotoPerfil]; ?>" width="80px" height="80px">
      <div class="prontuario"><?php echo $_SESSION[Constantes::LoginCookie]; ?></div>
    </div>

    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">X</a>
    <a href="/professor"><span><i class="material-icons">home</i>Home</span></a>
    <a href="reservar.php"> <span class="flaticon-agenda">Reservar Lab</span> </a>
    <a href="pesquisa-software.php"> <span class="flaticon-marketing">Pesquisar Software</span> </a>
    <a href="req-software.php"> <span class="flaticon-request">Solicitar Software</span> </a>
    <a href="requisicoes.php"> <span class="flaticon-interview">Minhas Requisições</span> </a>
    <a href="reservas.php"> <span class="flaticon-null">Minhas Reservas</span> </a>
  </div>

  <ul id="hlist">
    <li> <span id="menu" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; BOOKLAB </span></li>

  </ul>


  <div class="cover">
    <img src="../images/pablo-finance.png" width="900px" height="500px">
  </div>

  <div class="flex-container">

    <div class="card">
      <img class="imgcard" src="../images/laptop.jpg" alt="ImgLaptop" style="width:100%">
      <p><button class="botao">FACILIDADE</button></p>
      <p>Reserve laboratórios disponíveis!</p>
    </div>

    <div class="card">
      <img class="imgcard" src="../images/grafico.jpg" alt="ImgGráfico" style="width:100%">
      <p><button class="botao">INFORMAÇÃO</button></p>
      <p>Analise informações!</p>
    </div>

    <div class="card">
      <img class="imgcard" src="../images/request.jpg" alt="ImgPc" style="width:100%">
      <p><button class="botao">SERVIÇOS</button></p>
      <p>Solicite softwares!</p>
    </div>

  </div>



  <script type="text/javascript" src="../js/script.js"> </script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>


</html>