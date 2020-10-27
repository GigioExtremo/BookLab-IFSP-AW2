<?php

  include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/cookies.php';
  include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/sessao.php';
  include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/constantes.php';
  include_once $_SERVER["DOCUMENT_ROOT"] . '/php/servicos/alertaService.php';
  include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/logger.php';

  if(!isset($_SESSION)) session_start();
inicializa_sessao();
	possui_permissao("tecnico");

?>

<!DOCTYPE html>
<html>

<head>
    <title>Reservas</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Economica&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="../css/estiloReservasTI.css">
    <link rel="stylesheet" type="text/css" href="../css/estiloMenu.css">
</head>

<body>
     <div id="meuModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Conteúdo do modal-->
            <div class="modal-content">

                <!-- Cabeçalho do modal -->
                <div class="modal-header">
                    <h4 class="modal-title">Falar com Professor</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Corpo do modal -->
                <div class="modal-body">

                    <div class="id-professor"> * Você está falando com <span>Carlos Alberto</span></div>
                 
                     <form> 
                         <textarea> </textarea>
                     </form>
                </div>

                

                <!-- Rodapé do modal-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary">Enviar</button>
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
                    <h4 class="modal-title">Cancelar Reserva </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Corpo do modal -->
                <div class="modal-body">

                 <p class="info-cancelamento"> Você está cancelando essa reserva. 
                     O professor será notificado via e-mail.
                Insira abaixo um motivo para o cancelamento.</p>
                 
                     <form> 
                         <textarea> </textarea>
                     </form>
                </div>

                

                <!-- Rodapé do modal-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary">Enviar</button>
                </div>

            </div>
        </div>
    </div>


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

            <div class="pesquisar">
                <input type="text" name="pesq" class="pesq">
                <button class="enviar"> <i class="material-icons" style="font-size:20px;">search</i> </button>
            </div>

            <div class="container">

                <div class="title">Recentes </div> <br>

                <div class="request">
                    <table id="recentes">

                       
                        <tr class="data-title">
                            <td class="cod"> Código</td>
                            <td class="status"> Laboraório</td>
                            <td class="status"> Professor</td>
                            <td class="date"> Data</td>
                            <td class="desc"> Horário</td>
                            <td class="status"> Status</td>
                        </tr>

                        <tr class="info">
                            <td>RES0001</td>
                            <td>Laboratório 1</td>
                            <td>Carlos Alberto</td>
                            <td>25/11/2020</td>
                            <td>13:15-14:45</td>
                            <td>Confirmada</td>
                        </tr>

                        <tr class="acoes">
                            <td class="falar-prof"> <button type="button" class="modalbtn" data-toggle="modal"
                                data-target="#meuModal2">Cancelar Reserva</button></td>
                         <td class="falar-prof"> <button type="button" class="modalbtn" data-toggle="modal"
                            data-target="#meuModal">Falar com Professor</button></td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>

                    </table>
                </div>

                <div class="title">Este Mês</div> <br>

                <div class="request">
                    <table id="este-mes">

                        <tr class="data-title">
                            <td class="cod"> Código</td>
                            <td class="status"> Laboraório</td>
                            <td class="status"> Professor</td>
                            <td class="date"> Data</td>
                            <td class="desc"> Horário</td>
                            <td class="status"> Status</td>
                        </tr>

                        <tr class="info">
                            <td>RES0001</td>
                            <td>Laboratório 1</td>
                            <td>Carlos Alberto</td>
                            <td>25/11/2020</td>
                            <td>13:15-14:45</td>
                            <td>Confirmada</td>
                        </tr>

                        <tr class="acoes">
                            <td class="falar-prof"> <button type="button" class="modalbtn" data-toggle="modal"
                                data-target="#meuModal2">Cancelar Reserva</button></td>
                         <td class="falar-prof"> <button type="button" class="modalbtn" data-toggle="modal"
                            data-target="#meuModal">Falar com Professor</button></td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>


                    </table>
                </div>

                <div class="title">Mês Passado</div> <br>

                <div class="request">
                    <table id="mes-passado">

                        <tr class="data-title">
                            <td class="cod"> Código</td>
                            <td class="status"> Laboraório</td>
                            <td class="status"> Professor</td>
                            <td class="date"> Data</td>
                            <td class="desc"> Horário</td>
                            <td class="status"> Status</td>
                        </tr>

                        <tr class="info">
                            <td>RES0001</td>
                            <td>Laboratório 1</td>
                            <td>Carlos Alberto</td>
                            <td>25/11/2020</td>
                            <td>13:15-14:45</td>
                            <td>Cancelada</td>
                        </tr>

                        <tr class="acoes">
                            <td class="falar-prof"> <button type="button" class="modalbtn" data-toggle="modal"
                                data-target="#meuModal2">Cancelar Reserva</button></td>
                         <td class="falar-prof"> <button type="button" class="modalbtn" data-toggle="modal"
                            data-target="#meuModal">Falar com Professor</button></td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>

                    </table>
                </div>

                <div class="title">Este Ano</div>

                <div class="request">
                    <table id="este-ano">

                     
                        <tr class="data-title">
                            <td class="cod"> Código</td>
                            <td class="status"> Laboraório</td>
                            <td class="status"> Professor</td>
                            <td class="date"> Data</td>
                            <td class="desc"> Horário</td>
                            <td class="status"> Status</td>
                        </tr>

                        <tr class="info">
                            <td>RES0001</td>
                            <td>Laboratório 1</td>
                            <td>Carlos Alberto</td>
                            <td>25/11/2020</td>
                            <td>13:15-14:45</td>
                            <td>Concluída</td>
                        </tr>
                        <tr class="acoes">
                            <td class="falar-prof"> <button type="button" class="modalbtn" data-toggle="modal"
                                data-target="#meuModal2">Cancelar Reserva</button></td>
                         <td class="falar-prof"> <button type="button" class="modalbtn" data-toggle="modal"
                            data-target="#meuModal">Falar com Professor</button></td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>


                    </table>
                </div>

            </div>

          

            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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