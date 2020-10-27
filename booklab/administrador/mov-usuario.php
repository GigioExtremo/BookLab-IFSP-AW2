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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="../css/flaticon.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Economica&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/estiloLogsAdm.css">
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
                      <input type="text" name="filtrarUser" placeholder="Insira o usuário"> <br>
                      <label>Filtrar por Data </label> <br>
                      <input type="text" name="filtrarData" placeholder="Insira a Data"> <br>
                      <label>Filtrar por Hora </label> <br>
                      <input type="text" name="filtrarHora" placeholder="Insira a Hora"> <br>
                      <label>Filtrar por Tempo da Sessão </label> <br>
                      <input type="text" name="filtrarTempSessao" placeholder="Insira o tempo da sessão"><br>
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
    
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Pesquisar Login">
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="button">
                        <i class="material-icons md-24">search</i>
                    </button>
                  </div>
            </div>

            <div class="container-modalbtn">  <button type="button" class="modalbtn" data-toggle="modal"
                data-target="#meuModal">Pesquisa Avançada</button></div>
        
   
    <div class="container-req">

        <span class="title">Últimos Logins </span> <br>

       <div class="table-container"> 
        <table class="table table-responsive">
            <tr>
                <td class="table-title">Nome do Usuário</td>
                <td class="table-title">Tipo de Usuário</td>
                <td class="table-title">Data</td>
                <td class="table-title">Hora</td>
                <td class="table-title"> Tempo da Sessão </td>
                <td class="table-title">IP</td>
            </tr>
            <tr>
                <td>Maria da Silva</td>
                <td>Professora</td>
                <td>29/10/2020</td>
                <td>15:36</td>
                <td> 30min </td>
                <td> 200.148.12.188 </td>
            </tr>
            <tr>
                <td>João Soares</td>
                <td>Técnico</td>
                <td>25/10/2020</td>
                <td>07:36</td>
                <td> 1h30min </td>
                <td> 300.148.12.188 </td>
            </tr>
            <tr>
                <td>Patrícia Lemos</td>
                <td>Técnica</td>
                <td>24/10/2020</td>
                <td>09:58</td>
                <td> 1h05min </td>
                <td> 695.425.12.784 </td>
            </tr>

            <tr>
                <td>Patrícia Lemos</td>
                <td>Técnica</td>
                <td>24/10/2020</td>
                <td>09:58</td>
                <td> 1h05min </td>
                <td> 695.425.12.784 </td>
            </tr>

            <tr>
                <td>Patrícia Lemos</td>
                <td>Técnica</td>
                <td>24/10/2020</td>
                <td>09:58</td>
                <td> 1h05min </td>
                <td> 695.425.12.784 </td>
            </tr>
        </table>
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