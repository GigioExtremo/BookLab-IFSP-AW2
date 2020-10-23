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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../css/flaticon.css">

    <link href="https://fonts.googleapis.com/css?family=Economica&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/estiloIndexAdm.css">
    <link rel="stylesheet" type="text/css" href="../css/estiloMenu.css">
</head>

<body>



    <div id="mySidenav" class="sidenav">

        <div class="user">
            <?php
                $logger = new LoggerBooklab();
                $logger -> logaMesg("\n0001" . "../api/banco_de_dados/imagens/" . $_SESSION[Constantes :: CaminhoFotoPerfil]);
                $logger -> logaMesg("\n0002" . json_encode($_SESSION));
            ?>
            <img src="<?php echo "../api/banco_de_dados/imagens/" . $_SESSION[Constantes :: CaminhoFotoPerfil]; ?>" width="80px" height="80px">
            <div class="prontuario"><?php echo $_SESSION[Constantes :: LoginCookie]; ?></div>
            
        </div>

        <a id="closebtn" href="javascript:void(0)" class="closebtn" onclick="closeNav()">X</a>
        <div class="content">
            <a href="index.php">Home</a>
            <a href="mov-usuario.php" class="linkAtivo">Movimento de usuário</a>
            <a href="requisicoes.php">Requisições</a>
            <a href="reservas.php">Reservas</a>
            <a href="falhas.php">Falhas</a>
            <a href="../logout.php">Sair</a>
        </div>
    </div>


    <ul id="hlist">
        <li> <span id="menu" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span></li>
        </ul>


    <div class="container">
        <div class="info"> 35 NOVAS REQUISIÇÕES <div class="img-container"><img src="../images/statistics.png"></div></div>
        <div class="info"> 10 NOVAS RESERVAS  <div class="img-container"><img src="../images/statistics2.png"></div></div>
        <div class="info">5 NOVAS FALHAS  <div class="img-container"><img src="../images/magic.png"></div> </div>
    </div>

    <div class="img-container2"> 
    <img id="data" src="../images/data.png"  width="700px" height="500px">
</div>




    <script src="../js/script.js"> </script>
</body>


</html>