<?php

    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/constantes.php';
    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/sessao.php';
    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/cookies.php';
    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/servicos/alertaService.php';

    if(!isset($_SESSION)) session_start();
        inicializa_sessao();

    if (isset($_SESSION[Constantes :: LoginCookie]))
        header("Location: " . $_SESSION[Constantes :: TipoUsuario]);
    

?>

<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/flaticon.css">

    <link href="https://fonts.googleapis.com/css?family=Economica&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/estiloStandard.css">
</head>

<body>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">X</a>
        <a href="login.php">Logar</a>
    </div>

    <ul id="hlist">
        <li> <span id="menu" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; BOOKLAB </span></li>
    </ul>
    


    <div class="cover">
        <img src="images/pablo-finance.png" width="900px" height="500px">
    </div>

    <div class="flex-container">

        <div class="card">
            <img class="imgcard" src="images/laptop.jpg" alt="ImgLaptop" style="width:100%">
            <p><button class="botao">FACILIDADE</button></p>
            <p>Reserve laboratórios disponíveis!</p>
        </div>

        <div class="card">
            <img class="imgcard" src="images/grafico.jpg" alt="ImgGráfico" style="width:100%">
            <p><button class="botao">INFORMAÇÃO</button></p>
            <p>Analise informações!</p>
        </div>

        <div class="card">
            <img class="imgcard" src="images/request.jpg" alt="ImgPc" style="width:100%">
            <p><button class="botao">SERVIÇOS</button></p>
            <p>Solicite softwares!</p>
        </div>

    </div>

    <script type="text/javascript" src="js/script.js"> </script>

</body>

</html>