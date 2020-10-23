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
    <title>Laboratório</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Economica&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="../css/estiloLab.css">
    <link rel="stylesheet" type="text/css" href="../css/estiloMenu.css">

</head>

<body>

<!-- Modal -->
<div id="meuModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Conteúdo do modal-->
    <div class="modal-content">

      <!-- Cabeçalho do modal -->
      <div class="modal-header">
        <h4 class="modal-title">Pesquisa Avançada</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Corpo do modal -->
      <div class="modal-body">
        <div class="conteudo">
            <form>
                <label for="processador" class="subtitle"> Processador </label> <br>
                <select name="tiposDeMemoria">
                    <option value="i3">i3</option>
                    <option value="i5">i5</option>
                    <option value="i7">i7</option>
                    <option value="irrelevante">Irrelevante</option>
                </select>
            
                <br> 

                <label for="memoriaRam" class="subtitle"> Memória RAM </label> <br>
                <select name="tiposDeMemoria">
                    <option value="4gb">4GB</option>
                    <option value="8gb">8GB</option>
                    <option value="irrelevante">Irrelevante</option>
                </select>
                <br> 

                <label for="so" class="subtitle"> Sistema Operacional </label> <br>
                <select> 
                <option value="windows7">Windows 7</option>
                <option value="windows10">Windows 10</option>
                <option value="8gb">Linux</option>
                <option value="irrelevante">Irrelevante</option>
                </select>
     

                <label for="placaVideo" class="subtitle">Insira o placa de vídeo desejada </label> <br>
                <select name="tiposPlaca">
                    <option value="dedicada">Dedicada</option>
                    <option value="integrada">Integrada</option>
                    <option value="irrelevante">Irrelevante</option>
                </select>

                <br>
                <label for="placaVideoM"> Memória da Placa de Vídeo </label> <br>
                <select name="memoriaPlaca">
                    <option value="4gb">4gb</option>
                    <option value="8gb">8gb</option>
                    <option value="irrelevante">Irrelevante</option>
                </select>
            </form>
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

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


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
    <a href="../logout.php">Sair</a>
</div>
</div>


        <ul id="hlist">
            <li> <span id="menu" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span></li>
        </ul>
    
    <div class="pesquisar">
        <input type="text" name="pesq" class="pesq">
        <button class="enviar"> <i class="material-icons" style="font-size:20px;">search</i> </button>
        <button type="button" class="pesq2 ml-2" data-toggle="modal" data-target="#meuModal">Pesquisa Avançada</button>
    </div>

    <br>


    <div class="container"> 

    <div class="lab-content">
        <div class="infoLab">
            <a href="" id="close"> </a>
            <div class="titulo">Laboratório 01</div>
            <div class="img"><img src="../images/laboratory.png" width="70px" height="70px"></div>
        </div>
        <div class="infoLab">
            <div class="titulo"> Nº de Computadores</div>
            <div class="info"> 10 </div>
        </div>
        <div class="infoLab">
            <div class="titulo"> Nº de Cadeiras</div>
            <div class="info"> 13 </div>
        </div>
        <div class="infoLab">
            <div class="titulo">Processador</div>
            <div class="info"> Intel Core i5 </div>
        </div>
        <div class="infoLab">
            <div class="titulo">Memória RAM</div>
            <div class="info">4gb </div>
        </div>
        <div class="infoLab">
            <div class="titulo">Sistema Operacional</div>
            <div class="info">Windows 10</div>
        </div>
        <div class="infoLab">
            <div class="titulo">Placa de Vídeo</div>
            <div class="info"> dedicada </div>
        </div>
        <div class="infoLab">
            <div class="titulo">Memória da Placa de Vídeo</div>
            <div class="info"> 2gb</div>
        </div>

        <div class="infoLab">
            <div class="titulo">Bits</div>
            <div class="info">64</div>
        </div>
        <div class="infoLab">
            <div class="titulo">Ano</div>
            <div class="info"> 2019</div>
        </div>

    </div>

    <div class="lab-content">
        <div class="infoLab">
            <a href="" id="close"> </a>
            <div class="titulo">Laboratório 01</div>
            <div class="img"><img src="../images/laboratory.png" width="70px" height="70px"></div>
        </div>
        <div class="infoLab">
            <div class="titulo"> Nº de Computadores</div>
            <div class="info"> 10 </div>
        </div>
        <div class="infoLab">
            <div class="titulo"> Nº de Cadeiras</div>
            <div class="info"> 13 </div>
        </div>
        <div class="infoLab">
            <div class="titulo">Processador</div>
            <div class="info"> Intel Core i5 </div>
        </div>
        <div class="infoLab">
            <div class="titulo">Memória RAM</div>
            <div class="info">4gb </div>
        </div>
        <div class="infoLab">
            <div class="titulo">Sistema Operacional</div>
            <div class="info">Windows 10</div>
        </div>
        <div class="infoLab">
            <div class="titulo">Placa de Vídeo</div>
            <div class="info"> dedicada </div>
        </div>
        <div class="infoLab">
            <div class="titulo">Memória da Placa de Vídeo</div>
            <div class="info"> 2gb</div>
        </div>

        <div class="infoLab">
            <div class="titulo">Bits</div>
            <div class="info">64</div>
        </div>
        <div class="infoLab">
            <div class="titulo">Ano</div>
            <div class="info"> 2019</div>
        </div>

    </div>

     <div class="lab-content">
        <div class="infoLab">
            <a href="" id="close"> </a>
            <div class="titulo">Laboratório 02</div>
            <div class="img"><img src="../images/laboratory.png" width="70px" height="70px"></div>
        </div>
        <div class="infoLab">
            <div class="titulo"> Nº de Computadores</div>
            <div class="info"> 10 </div>
        </div>
        <div class="infoLab">
            <div class="titulo"> Nº de Cadeiras</div>
            <div class="info"> 13 </div>
        </div>
        <div class="infoLab">
            <div class="titulo">Processador</div>
            <div class="info"> Intel Core i5 </div>
        </div>
        <div class="infoLab">
            <div class="titulo">Memória RAM</div>
            <div class="info">4gb </div>
        </div>
        <div class="infoLab">
            <div class="titulo">Sistema Operacional</div>
            <div class="info">Windows 10</div>
        </div>
        <div class="infoLab">
            <div class="titulo">Placa de Vídeo</div>
            <div class="info"> dedicada </div>
        </div>
        <div class="infoLab">
            <div class="titulo">Memória da Placa de Vídeo</div>
            <div class="info"> 2gb</div>
        </div>

        <div class="infoLab">
            <div class="titulo">Bits</div>
            <div class="info">64</div>
        </div>
        <div class="infoLab">
            <div class="titulo">Ano</div>
            <div class="info"> 2019</div>
        </div>

    
</div>


    <script src="../js/script.js"> </script>

</body>

</html>