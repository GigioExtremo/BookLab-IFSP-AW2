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

            <div class="card">
                <div class="img-container">
                    <img src="../images/geogebra.png" width="120px" height="120px">
                </div>
                <div class="info">
                    <span class="title">Geogebra</span>
                    <div class="about"> Aplicativo de matemática dinâmica </div>
                    <div class="about"> Disponibilidade: 07 </div>
                </div>
            </div>

            <div class="card">
                <div class="img-container">
                    <img src="../images/xampp.png" width="100px" height="100px" id="imgxampp">
                </div>
                <div class="info">
                    <span class="title">XAMPP</span>
                    <div class="about"> Aplicação com os principais servidores </div>
                    <div class="about"> Disponibilidade: 03 e 12</div>
                </div>
            </div>

            <div class="card">
                <div class="img-container">
                    <img src="../images/photoshop.png" width="100px" height="100px" id="imgphoto">
                </div>
                <div class="info">
                    <span class="title">Photoshop</span>
                    <div class="about"> Aplicativo de edição de fotos</div>
                    <div class="about"> Disponibilidade: 01, 05 e 11</div>
                </div>
            </div>
            

        </div>
    </div>

<script src="../js/script.js"> </script>

</body>


</html>