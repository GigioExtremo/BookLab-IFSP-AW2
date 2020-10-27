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
        <link rel="stylesheet" type="text/css" href="../css/estiloResUser.css">
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
        <a href="index.php"><span class="flaticon-browser">Home</span></a>
        <a href="reservar.php"> <span class="flaticon-agenda">Reservar Lab</span> </a>
        <a href="pesquisa-software.php"> <span class="flaticon-marketing">Pesquisar Software</span> </a>
        <a href="req-software.php"> <span class="flaticon-request">Solicitar Software</span> </a>
        <a href="requisicoes.php"> <span class="flaticon-interview">Minhas Requisições</span> </a>
        <a href="reservas.php"> <span class="flaticon-null">Minhas Reservas</span> </a>
        <a href="../professor/tecnico.php">Mudar Para Técnico</a>
        <a href="../administrador/index.php">Mudar Para Administrador</a>
        <a href="../logout.php">Sair</a>
      </div>
    
    <ul id="hlist"> 
     <li> <span id="menu" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; BOOKLAB </span></li>
    </ul>

    <p id="titulo"> MINHAS RESERVAS </p>


    <table class="table-responsive">
        <tr>
            <td class="title">Código</td>
            <td class="title">Laboratório</td> 
            <td class="title">Data</td>
            <td class="title">Horário</td>
            <td class="title">Quantidade Semanas</td>
            <td class="title">Status</td>
        </tr>

        <tr>
            <td>RES0001</td>
            <td>LAB 02</td>
            <td>25/05/2020</td>
            <td>14:30-15:40</td>
            <td>2 semanas</td>
            <td> ATIVA </td> </a>
        </tr>

        <tr>
            <td>RES0002</td>
            <td>LAB 03</td>
            <td>24/05/2020</td>
            <td>16:30-17:40</td>
            <td>indefinido</td>
            <td> CANCELADA </td> </a>
        </tr>

        <tr>
            <td>RES0003</td>
            <td>LAB 03</td>
            <td>25/07/2020</td>
            <td>18:30-17:40</td>
            <td>3 semanas</td>
            <td> CONCLUÍDA </td> </a>
        </tr>
        <tr>
            <td>RES0004</td>
            <td>LAB 04</td>
            <td>24/05/2020</td>
            <td>08:30-10:00</td>
            <td>1 semana</td>
            <td> CONCLUÍDA </td> </a>
        </tr>
    </table>


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