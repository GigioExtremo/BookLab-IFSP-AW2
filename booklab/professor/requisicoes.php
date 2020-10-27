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
        <link rel="stylesheet" type="text/css" href="../css/estiloReqUser.css">
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
      </div>
    <ul id="hlist"> 
     <li> <span id="menu" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; BOOKLAB </span></li>
    </ul>

    <p id="titulo"> MINHAS REQUISIÇÕES </p>


    <div class="req-sum">
      <div class="request">
          <table id="requisoes" class="table-responsive">
              <tr class="data-title">
                  <td class="cod"> Código</td>
                  <td class="date"> Data</td>
                  <td class="imp"> Importância</td>
                  <td class="desc2"> Descrição</td>
                  <td class="status"> Status</td>
                  <td class="previsao">Instalação</td>
                  <td class="edit">Visualizar</td>
                  <a href="../tecnico/index.php">Mudar Para Técnico</a>
                 <a href="../administrador/index.php">Mudar Para Administrador</a>
                 <a href="../logout.php">Sair</a>
              </tr>

              <tr class="t-body">
                  <td>IFSP0001</td>
                  <td>25/05/2020</td>
                  <td>URGENTE</td>
                  <td class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        
                  </td>
                  <td>PENDENTE</td>
                  <td>25/09/2020</td>
                  <td> <a href="detalhes-req.php"><img src="../images/sid-view.png" width="30px" height="30px"> </td> </a>
              </tr>

              <tr class="t-body">
                  <td>IFSP0002</td>
                  <td>24/05/2020</td>
                  <td>URGENTE</td>
                  <td class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  </td>
                  <td>EM ANÁLISE</td>
                  <td>Não definida</td>
                  <td> <a href="detalhes-req.php"><img src="../images/sid-view.png" width="30px" height="30px"> </td> </a>
              </tr>
          </table>
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