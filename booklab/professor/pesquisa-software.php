<?php

  include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/cookies.php';
  include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/sessao.php';
  include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/constantes.php';
  include_once $_SERVER["DOCUMENT_ROOT"] . '/php/servicos/alertaService.php';
  include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/logger.php';

  if(!isset($_SESSION)) session_start();
    inicializa_sessao();
    
	
	possui_permissao("professor");

?>

<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
  

    <link rel="stylesheet" type="text/css" href="../css/flaticon.css">

    <link href="https://fonts.googleapis.com/css?family=Economica&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/estiloPesquisa.css">
    <link rel="stylesheet" type="text/css" href="../css/estiloFooter.css">
    <link rel="stylesheet" type="text/css" href="../css/flaticon.css">
</head>

<body>

<div id="mySidenav" class="sidenav">
        <div class="logo">
          <img src="../images/ifsp.png" width="75px" height="75px">
        </div>
    
        <br>
    
        <div class="user">
          <img src="<?php echo "../api/banco_de_dados/imagens/" . $_SESSION[Constantes :: CaminhoFotoPerfil]; ?>" width="80px" height="80px">
        <div class="prontuario"><?php echo $_SESSION[Constantes :: LoginCookie]; ?></div>
        </div>
    
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">X</a>
        <a href="/professor"><span class="flaticon-browser">Home</span></a>
        <a href="reservar.php"> <span class="flaticon-agenda">Reservar Lab</span> </a>
        <a href="pesquisa-software.php"> <span class="flaticon-marketing">Pesquisar Software</span> </a>
        <a href="req-software.php"> <span class="flaticon-request">Solicitar Software</span> </a>
        <a href="requisicoes.php"> <span class="flaticon-interview">Minhas Requisições</span> </a>
        <a href="reservas.php"> <span class="flaticon-null">Minhas Reservas</span> </a>
      </div>

    <ul id="hlist">
        <li> <span id="menu" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; BOOKLAB </span></li>
    </ul>

    <p id="titulo"> PESQUISAR SOFTWARE </p>

    <div class="pesq-container">
        <input type="text" name="pesquisaLab" placeholder="Pesquisar Software">
        <div class="pesq"> <button class="pesq"><i class="material-icons md-24">search</i></button> </div>
    </div>

    <div class="container">
        <div class="card">
            <div class="face face1">
                <div class="content">
                    <img
                        src="https://github.com/Jhonierpc/WebDevelopment/blob/master/CSS%20Card%20Hover%20Effects/img/design_128.png?raw=true">
                    <h3>Photoshop</h3>
                </div>
            </div>
            <div class="face face2">
                <div class="content">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas cum cumque minus iste veritatis
                        provident at.</p>
                    <a href="#">Read More</a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="face face1">
                <div class="content">
                    <img
                        src="https://github.com/Jhonierpc/WebDevelopment/blob/master/CSS%20Card%20Hover%20Effects/img/code_128.png?raw=true">
                    <h3>Visual Studio Code</h3>
                </div>
            </div>
            <div class="face face2">
                <div class="content">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas cum cumque minus iste veritatis
                        provident at.</p>
                    <a href="#">Read More</a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="face face1">
                <div class="content">
                    <img
                        src="https://github.com/Jhonierpc/WebDevelopment/blob/master/CSS%20Card%20Hover%20Effects/img/launch_128.png?raw=true">
                    <h3>Xampp</h3>
                </div>
            </div>
            <div class="face face2">
                <div class="content">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas cum cumque minus iste veritatis
                        provident at.</p>
                    <a href="#">Read More</a>
                </div>
            </div>
        </div>
    </div>
    

    <br> <br> <br> <br>

    <footer class="rodape_final">

<div class="div_rod">
    <a>Contatos</a></br>
    <div class="email">
        <img src="../images/email.png" style="width:6.5%">
        <a>booklab@gmail.com</a></br>
    </div>

    <div class="telefone">
        <img src="../images/telefone.png" style="width:5%">
        <a>(11)9547-5321</a>
    </div>

</div>

<div class="direit_rod">
    &copy; booklab.com | Desenvolvido por XXXX
</div>

<div class="div_rod"></div>

</footer>
    <script type="text/javascript" src="../js/script.js"> </script>




</body>


</html>