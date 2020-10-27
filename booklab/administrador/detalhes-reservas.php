<?php

  include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/cookies.php';
  include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/sessao.php';
  include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/constantes.php';
  include_once $_SERVER["DOCUMENT_ROOT"] . '/php/servicos/alertaService.php';
  include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/logger.php';

  if(!isset($_SESSION)) session_start();
inicializa_sessao();
	possui_permissao("administrador");

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
    <link rel="stylesheet" type="text/css" href="../css/estiloDetalhesAdm.css">
    <link rel="stylesheet" type="text/css" href="../css/estiloMenu.css">
</head>

<body>

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

                    <p> Tem certeza que deseja recuperar essa reserva? Ela foi cancelada pelo técnico.</p>
                </div>

                <!-- Rodapé do modal-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Recuperar Reserva</button>
                </div>

            </div>
        </div>
    </div>

    <div id="meuModal2" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Conteúdo do modal-->
            <div class="modal-content">

                <!-- Cabeçalho do modal -->
                <div class="modal-header">
                    <h4 class="modal-title">Recuperar Requisição</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Corpo do modal -->
                <div class="modal-body">
                
                    <p>* Você está falando com o(a) professor(a) Maria</p>

                    <textarea> </textarea>
                   
                </div>

                <!-- Rodapé do modal-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Sim</button>
                </div>

            </div>
        </div>
    </div>

    <div id="meuModal3" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Conteúdo do modal-->
            <div class="modal-content">

                <!-- Cabeçalho do modal -->
                <div class="modal-header">
                    <h4 class="modal-title">Recuperar Requisição</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Corpo do modal -->
                <div class="modal-body">
                
                    <p>* Você está falando com o(a) técnico(a) João</p>

                    <textarea> </textarea>
                   
                </div>

                <!-- Rodapé do modal-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Sim</button>
                </div>

            </div>
        </div>
    </div>


    <div id="mySidenav" class="sidenav">

        <div class="user">
            <img src="../images/user.png" width="80px" height="80px">
          <div class="prontuario"><?php echo $_SESSION[Constantes :: LoginCookie]; ?></div>
        </div>

        <a id="closebtn" href="javascript:void(0)" class="closebtn" onclick="closeNav()">X</a>
        <div class="content">
            <a href="/administrador">Home</a>
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

        <br>   <br>  <br>

    <div class="container-req">
        <span class="title"> Reserva #RES0001</span>

        <br> <br>

        <div class="info"> Feita por <span id="nome" name="nome">João Silva</span> às <span id="hora" name="hora">
                18:35</span> do dia <span name="data" id="data"> 03/08/2020 </span></div>

        <div class="info" id="info-ti"> Cancelada por <span id="nome" name="nome">Alessandra Soares</span> às <span
                id="hora" name="hora">
                09:15</span> do dia <span name="data" id="data"> 05/08/2020 </span></div>


        <div class="req-body">
            <table>
                <tr>
                    <td class="desc">Laboratório</td>
                    <td class="answer">01</td>
                </tr>
                <tr>
                    <td class="desc">Dia</td>
                    <td class="answer"> 25/09/2021 </td>

                    </td>
                </tr>
                <tr>
                    <td class="desc">Horário</td>
                    <td class="answer">9h30-10h20 </td>
                </tr>

            </table>

            <div class="warn">Atenção: esta reserva foi cancelada pelo técnico. </div>

            <div class="options">
                <button class="recbtn" type="button"  id="rec" data-toggle="modal"
                data-target="#meuModal">Recuperar Reserva</button>
            
                <button  class="recbtn" type="button" class="modalbtn" data-toggle="modal"
                data-target="#meuModal2">Falar com Professor</button>
            
                <button   class="recbtn"type="button" class="modalbtn" data-toggle="modal"
                data-target="#meuModal3">Falar com técnico</button>
            
                    </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
    <script src="../js/script.js"> </script>
</body>


</html>