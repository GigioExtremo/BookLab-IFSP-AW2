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
    <title>Reservas</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../css/flaticon.css">

    <link href="https://fonts.googleapis.com/css?family=Economica&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/estiloReqAdm.css">
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

                     <form> 
                         <div class="container-filtro"> 
                        <label>Filtrar por Código </label> <br>
                        <input type="text" name="filtrarCod" placeholder="Insira o código"> <br>
                        <label>Filtrar por Usuário </label> <br>
                        <input type="text" name="filtrarUser" placeholder="Insira o professor"> <br>
                        <label>Filtrar por Data </label> <br>
                        <input type="text" name="filtrarData" placeholder="Insira a Data"> <br>
                        <label>Filtrar por Horário Inicial </label> <br>
                        <input type="text" name="filtrarHoraInicio" placeholder="Insira a Hora de Início"> <br>
                        <label>Filtrar por Horário Final </label> <br>
                        <input type="text" name="filtrarHoraFim" placeholder="Insira a Hora de Fim"> <br>
                        <label>Filtrar por Interface </label> <br>
                        <select>
                            <option value="professor">Professor</option>
                            <option value="tecnico">Técnico</option>
                            <option value="administrador">Administrador</option>
                        </select>
                        <label>Filtrar por Erro </label> <br>
                        <select>
                            <option value="erro01">Erro 01</option>
                            <option value="erro02">Erro 02</option>
                            <option value="erro03">Erro 03</option>
                        </select>
                    </div>
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
            <img src="../images/user.png" width="80px" height="80px">
          <div class="prontuario"><?php echo $_SESSION[Constantes :: LoginCookie]; ?></div>
        </div>

        <a id="closebtn" href="javascript:void(0)" class="closebtn" onclick="closeNav()">X</a>
        <div class="content">
            <a href="index.php">Home</a>
            <a href="mov-usuario.php" class="linkAtivo">Movimento de usuário</a>
            <a href="requisicoes.php">Requisições</a>
            <a href="reservas.php">Reservas</a>
            <a href="falhas.php">Falhas</a>
            <a href="../tecnico/index.php">Mudar Para Técnico</a>
            <a href="../professor/index.php">Mudar Para Professor</a>
            <a href="../logout.php">Sair</a>
        </div>
    </div>

        <ul id="hlist">
            <li> <span id="menu" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span></li>
        </ul>


        <div class="pesq-container">
            <div class="container">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Pesquisar Falha">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="button">
                            <i class="material-icons md-24">search</i>
                        </button>
                    </div>
                </div>
            </div>


            <div class="container-modalbtn"> <button type="button" class="modalbtn" data-toggle="modal"
                    data-target="#meuModal">Pesquisa Avançada</button></div>


            <div class="container-req">
                <table class="table-responsive">
                    <tr>
                        <td class="cod"> Código</td>
                        <td class="date">Usuário</td>
                        <td class="imp"> Data</td>
                        <td class="imp"> Hora</td>
                        <td class="imp"> Interface</td>
                        <td class="imp"> Erro </td>
                    </tr>

                    <tr>
                        <td>RES0001</td>
                        <td>MARIA</td>
                        <td>25/05/2020</td>
                        <td>14:30-15:40 </td>
                        <td>PROFESSOR</td>
                        <td>0001</td>
                    </tr>

                    <tr>
                        <td>RES0002</td>
                        <td>GUSTAVO</td>
                        <td>24/05/2020</td>
                        <td>16:30-17:40</td>
                        <td>TÉCNICO</td>
                        <td>0002</td>
                    </tr>

                    <tr>
                        <td>RES0003</td>
                        <td>AMANDA</td>
                        <td>25/07/2020</td>
                        <td>18:30-17:40</td>
                        <td>TÉCNICO</td>
                        <td>0003</td>
                        </td> </a>
                    </tr>
                    <tr>
                        <td>RES0004</td>
                        <td>HIGOR</td>
                        <td>24/05/2020</td>
                        <td>08:30-10:00</td>
                        <td>PROFESSOR</td>
                        <td>0004</td>
                    </tr>
                </table>

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