<?php

    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/cookies.php';
    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/sessao.php';
    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/constantes.php';
    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/servicos/alertaService.php';
    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/servicos/softwareService.php';
    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/logger.php';

    if(!isset($_SESSION)) session_start();

    inicializa_sessao();
	possui_permissao("tecnico");

    $softwareService = new SoftwareService();

    $softwareCards = $softwareService -> getSoftwaresCards();

?>

<!DOCTYPE html>
<html>

<head>
    <title>Software</title>

    <link href="https://fonts.googleapis.com/css?family=Economica&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/estiloSoftware.css">
</head>

<body>


<div id="mySidenav" class="sidenav">

<div class="user">
    <img src="<?php echo "../api/banco_de_dados/imagens/" . $_SESSION[Constantes :: CaminhoFotoPerfil]; ?>" width="80px" height="80px">
  <div class="prontuario"><?php echo $_SESSION[Constantes :: LoginCookie]; ?></div>
</div>
<a id="closebtn" href="javascript:void(0)" class="closebtn" onclick="closeNav()">X</a>
<div class="content">
    <a href="/tecnico">Home</a>
    <a href="requisicoes.php"> Requisições</a>
    <a href="reservas.php">Reservas </a>
    <a href="laboratorio.php">Laboratórios</a>
    <a href="software.php">Softwares </a>
    <a href="mais-informacoes.php">Mais Informações</a>
    <a href="../logout.php">Sair</a>
</div>
</div>

    <ul id="hlist">
        <li> <span id="menu" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span></li>
    </ul>

    <br>
    <div class="container">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Procurar software">
            <div class="input-group-append">
                <button class="btn btn-secondary" type="button">
                    <i class="material-icons md-24">search</i>
                </button>
            </div>
        </div>
        <br><br>
        <div class="flex-container">
            <?php
                foreach($softwareCards as $card)
                    echo $card;
            ?>
        </div>
    </div>

<script src="../js/script.js"> </script>

</body>


</html>