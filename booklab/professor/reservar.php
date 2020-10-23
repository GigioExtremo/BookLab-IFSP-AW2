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


  <link href="https://fonts.googleapis.com/css?family=Economica&display=swap" rel="stylesheet">
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/estiloReservas.css">
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

  <p id="titulo"> RESERVAR LABORATÓRIO </p>

  <!-- Botão que irá abrir o modal -->
  <button type="button" class="btn btn-success btn-lg mt-2 ml-2" data-toggle="modal" data-target="#meuModal"
    id="abrir-modal">Pesquisar</button>

  <!-- Modal -->
  <div id="meuModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Conteúdo do modal-->
      <div class="modal-content">

        <!-- Cabeçalho do modal -->
        <div class="modal-header">
          <h4 class="modal-title">Pesquisar Laboratório</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Corpo do modal -->
        <div class="modal-body">
          <label>Filtrar por:</label>

          <input type="radio" id="datahora" name="filtro" value="datahora" onclick="habilitar()"> <label>Data e/ou Hora (Disponibilidade) &nbsp ou
          &nbsp  </label>
          <input type="radio" id="numero" name="filtro" value="numero" onclick="habilitar2()"> <label> Número (Informações) </label>

          <div class="datahoracont" id="datahoracont">
            <label for="data">Data</label> <br>
            <input type="date" name="data" id="data-input" class="date"> <br>

            <label for="hora">Hora</label> <br>
            <input type="time" name="time" id="hora-input" class="time"> <br>
          </div>

          <div class="numerocont" id="numerocont"> <br>
            <label for="numero">Número</label> <br>
            <input type="number" placeholder="Insira o número do laboratório desejado" id="numero-input" class="numero-input">
          </div>

        </div>

        <!-- Rodapé do modal-->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary">Pesquisar</button>
        </div>

      </div>
    </div>
  </div>

  <br>
  <br>

  <!-- <div class="calendario" id="calendario"> </div> -->

  <div class="flex-container">



    <div class="card">
      <p>
      <div class="lab">Laboratório 01</div>
      </p>
      <img class="imgcard" src="../images/pc2.png" alt="Tomate" style="width:60%">
      <div class="info"> <span class="title">Número de Cadeiras:</span> <span class="resp"> 15 </span> </div>
      <div class="info"> <span class="title">Número de Computadores:</span> <span class="resp">10</span> </div>
      <div class="info"> <span class="title">Bloco:</span> <span class="resp">D</span> </div>
      <p><button onclick="addInfo()" class="status" style="background-color:red">RESERVADO</button></p>
      <p id="demo"></p>
    </div>

    <div class="card">
      <p>
      <div class="lab">Laboratório 02</div>
      </p>
      <img class="imgcard" src="../images/pc2.png" alt="Tomate" style="width:60%">
      <div class="info"> <span class="title">Número de Cadeiras:</span> <span class="resp"> 15 </span> </div>
      <div class="info"> <span class="title">Número de Computadores:</span> <span class="resp">10</span> </div>
      <div class="info"> <span class="title">Bloco:</span> <span class="resp">C</span> </div>
      <p><button onclick="addInfo()" class="status">RESERVAR</button></p>
       <div class="info"> 
         <label for="dataFinal">Data</label> <br>
         <input type="date" name="dataFinal" class="date">
         <label for="hora">Início</label> <br>
         <input type="time" name="horaInicio" class="date">
         <label for="hora">Fim</label> <br>
         <input type="time" name="horaFim" class="date">
       </div>
      <p id="demo"></p>
    </div>

    <div class="card">
      <p>
      <div class="lab">Laboratório 03</div>
      </p>
      <img class="imgcard" src="../images/pc2.png" alt="Tomate" style="width:60%">
      <div class="info"> <span class="title">Número de Cadeiras:</span> <span class="resp"> 15 </span> </div>
      <div class="info"> <span class="title">Número de Computadores:</span> <span class="resp">10</span> </div>
      <div class="info"> <span class="title">Bloco:</span> <span class="resp">H</span> </div>
      <p><button onclick="addInfo()" class="status">RESERVAR</button></p>
      <div class="info"> 
        <label for="dataFinal">Data</label> <br>
        <input type="date" name="dataFinal" class="date">
        <label for="hora">Início</label> <br>
        <input type="time" name="horaInicio" class="date">
        <label for="hora">Fim</label> <br>
        <input type="time" name="horaFim" class="date">
      </div>
      <p id="demo"></p>
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


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>

</body>


</html>