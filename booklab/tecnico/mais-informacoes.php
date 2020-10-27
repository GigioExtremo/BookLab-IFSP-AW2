<?php

  include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/cookies.php';
  include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/sessao.php';
  include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/constantes.php';
  include_once $_SERVER["DOCUMENT_ROOT"] . '/php/servicos/alertaService.php';
  include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/logger.php';

  if(!isset($_SESSION)) session_start();
inicializa_sessao();

?>

<!DOCTYPE html>
<html> 
    <head> 
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="../css/flaticon.css">

        <link href="https://fonts.googleapis.com/css?family=Economica&display=swap" rel="stylesheet">
        <meta charset="utf-8"> 
        <link rel="stylesheet" type="text/css" href="../css/estiloInfo.css">
        <link rel="stylesheet" type="text/css" href="../css/estiloMenu.css">
    </head>

<body>

<div id="mySidenav" class="sidenav">

<div class="user">
    <img src="<?php echo "../api/banco_de_dados/imagens/" . $_SESSION[Constantes :: CaminhoFotoPerfil]; ?>" width="80px" height="80px">
  <div class="prontuario"><?php echo $_SESSION[Constantes :: LoginCookie]; ?></div>
</div>
<a id="closebtn" href="javascript:void(0)" class="closebtn" onclick="closeNav()">X</a>
<div class="content">
    <a href="index.php">Home</a>
    <a href="requisicoes.php"> Requisições</a>
    <a href="reservas.php">Reservas </a>
    <a href="laboratorio.php">Laboratórios</a>
    <a href="software.php">Softwares </a>
    <a href="mais-informacoes.php">Mais Informações</a>
    <a href="../professor/index.php">Mudar Para Professor</a>
    <a href="../administrador/index.php">Mudar Para Administrador</a>
    <a href="../logout.php">Sair</a>
</div>
</div>

            <ul id="hlist">
                <li> <span id="menu" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span></li>
            </ul>

<div class="container"> 
      <div class="info-num"> 
          <img src="../images/warning.png" width="130px" height="130px"> 
          17  novas requisições essa semana
      </div>

      <div class="info-grafico"> 
          <img src="../images/grafico.png" width="450px" height="250px"> 
      </div>
    </div>

<br> 
<div class="container"> 
    <div class="info-grafico"> <img src="../images/grafico2.png"></div>
    <div class="info-num">
        <img src="../images/desktop.png" width="130px" height="130px"> 
        o softawe mais requisitado dessa semana foi: XAMPP
     </div>
</div>


<script src="../js/script.js"> </script>
    
   
 
</body>


</html>