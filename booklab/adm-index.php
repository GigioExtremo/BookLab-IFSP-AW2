<html>

<head>
    <title>Home</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="your_website_domain/css_root/flaticon.css">

    <link href="https://fonts.googleapis.com/css?family=Economica&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/estiloIndexAdm.css">
    <link rel="stylesheet" type="text/css" href="css/estiloMenu.css">
</head>

<body>



    <div id="mySidenav" class="sidenav">

        <div class="user">
            <img src="images/user.png" width="80px" height="80px">
            <div class="prontuario">SP684557</div>
        </div>

        <a id="closebtn" href="javascript:void(0)" class="closebtn" onclick="closeNav()">X</a>
        <div class="content">
            <a href="adm-index.php">Home</a>
            <a href="adm-mov-usuario.php" class="linkAtivo">Movimento de usuário</a>
            <a href="adm-requisicoes.php">Requisições</a>
            <a href="adm-reservas.php">Reservas</a>
            <a href="adm-falhas.php">Falhas</a>
            <a href="logout.php">Sair</a>
        </div>
    </div>


    <ul id="hlist">
        <li> <span id="menu" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span></li>
        </ul>


    <div class="container">
        <div class="info"> 35 NOVAS REQUISIÇÕES <div class="img-container"><img src="images/statistics.png"></div></div>
        <div class="info"> 10 NOVAS RESERVAS  <div class="img-container"><img src="images/statistics2.png"></div></div>
        <div class="info">5 NOVAS FALHAS  <div class="img-container"><img src="images/magic.png"></div> </div>
    </div>

    <div class="img-container2"> 
    <img id="data" src="images/data.png"  width="700px" height="500px">
</div>




    <script src="js/script.js"> </script>
</body>


</html>