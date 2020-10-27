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
    <title>Requsições</title>

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
                      <label>Filtrar por Professor </label> <br>
                      <input type="text" name="filtrarUser" placeholder="Insira o professor"> <br>
                      <label>Filtrar por Data </label> <br>
                      <input type="text" name="filtrarData" placeholder="Insira a Data"> <br>
                      <label>Filtrar por Hora </label> <br>
                      <input type="text" name="filtrarImp" placeholder="Insira a Hora"> <br>
                      <label>Filtrar por Importância </label> <br>
                      <select> 
                          <option value="regular">Regular</option>
                          <option value="moderada">Moderada</option>
                          <option value="urgente">Urgente</option>
                      </select>
                      <br> 
                      <label>Filtrar por Status </label> <br>
                      <select> 
                        <option value="aceita">Aceita</option>
                        <option value="indeferida">Indeferida</option>
                        <option value="analise">Em análise</option>
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

        <div class="pesq-container">
        <div class="container">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Pesquisar Requisição">
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="button">
                        <i class="material-icons md-24">search</i>
                    </button>
             </div>
             </div>
             </div>

            <div class="container-modalbtn">  <button type="button" class="modalbtn" data-toggle="modal"
                data-target="#meuModal">Pesquisa Avançada</button></div>
            

    <div class="container-req">
        <table>
            <tr>
                <td class="cod"> Código</td>
                <td class="date"> Data</td>
                <td class="imp"> Importância</td>

                <td class="status"> Status</td>
                <td class="edit">Visualizar</td>
            </tr>

            <tr>
                <td>IFSP0001</td>
                <td>25/05/2020</td>
                <td>URGENTE</td>

                <td>EM ANÁLISE</td>
                <td> <a href="detalhes-requisicoes.php"><img src="../images/sid-view.png" width="30px" height="30px"> </td> </a>
            </tr>

            <tr>
                <td>IFSP0002</td>
                <td>24/05/2020</td>
                <td>URGENTE</td>

                <td>EM ANÁLISE</td>
                <td> <a href="detalhes-requisicoes.php"><img src="../images/sid-view.png" width="30px" height="30px"> </td> </a>
            </tr>

            <tr>
                <td>IFSP0003</td>
                <td>24/05/2020</td>
                <td>URGENTE</td>

                <td>INDEFERIDA</td>
                <td> <a href="detalhes-requisicoes.php"><img src="../images/sid-view.png" width="30px" height="30px"> </td> </a>
            </tr>
            <tr>
                <td>IFSP0004</td>
                <td>24/05/2020</td>
                <td>URGENTE</td>
                <td>ACEITA</td>
                <td> <a href="detalhes-requisicoes.php"><img src="../images/sid-view.png" width="30px" height="30px"> </td> </a>
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