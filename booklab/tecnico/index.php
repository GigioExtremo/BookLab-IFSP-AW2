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
    <link rel="stylesheet" type="text/css" href="../css/estiloHomeTI.css">
    <link rel="stylesheet" type="text/css" href="../css/estiloMenu.css">
</head>

<body>
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
        <a href="../professor/index.php">Mudar Para Professor</a>
        <a href="../administrador/index.php">Mudar Para Administrador</a>
        <a href="../logout.php">Sair</a>
    </div>
    </div>

    <ul id="hlist">
        <li> <span id="menu" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span></li>
    </ul>

    <div class="flex-container"> 
    
        <div class="overall">
            <div class="title">Resumo de Informações</div>
            <div class="info"> <img src="../images/statistics.png" width="70px" height="70px"> </div>
            <div class="info"> <img src="../images/presentation.png" width="70px" height="70px"></div>
            <div class="info"> <img src="../images/magic.png" width="70px" height="70px"> </div>
            <div class="info"> <img src="../images/statistics2.png" width="70px" height="70px"> </div>
        </div> 


        <div class="calendar">
            <div class="title">Calendário</div>
            <table >
                <tr class="weekdays">
                    <td class="weekdays">D</td>
                    <td class="weekdays">S</td>
                    <td class="weekdays">T</td>
                    <td class="weekdays">Q</td>
                    <td class="weekdays">Q</td>
                    <td class="weekdays">S</td>
                    <td class="weekdays">S</td>
                </tr>
                <tr>
                    <td>30 </td>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                    <td>6</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td class="weekdays">8</td>
                    <td>9</td>
                    <td class="weekdays"> 10</td>
                    <td>11</td>
                    <td class="weekdays">12</td>
                    <td>13</td>
                </tr>
                <tr>
                    <td>14</td>
                    <td>15</td>
                    <td>16</td>
                    <td>17</td>
                    <td>18</td>
                    <td>19</td>
                    <td>20</td>
                </tr>
                <tr>
                    <td>21</td>
                    <td class="weekdays">22</td>
                    <td class="weekdays">23</td>
                    <td>24</td>
                    <td>25</td>
                    <td class="weekdays">26</td>
                    <td>27</td>
                </tr>
            </table> <br>
            <div class="weekdays"> * Últimas requisições</div>
        </div>

        <div class="softwares-requisitados">
            <div class="title"> Softwares Mais Requisitados</div>
        </div>

        <div class="req-sum">
            <div class="title" id="req-title"> Requisições Recentes</div>
            <div class="request">
                <table id="mes-passado" class="table-responsive">
                    <tr class="data-title">
                        <td class="cod"> Código</td>
                        <td class="date"> Data</td>
                        <td class="imp"> Importância</td>
                        <td class="desc"> Descrição</td>
                        <td class="status"> Status</td>
                        <td class="edit">Visualizar</td>
                    </tr>

                    <tr>
                        <td>IFSP0001</td>
                        <td>25/05/2020</td>
                        <td>URGENTE</td>
                        <td class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus rutrum arcu.
                        </td>
                        <td>PENDENTE</td>
                        <td> <img src="../images/sid-view.png" width="30px" height="30px"> </td>
                    </tr>

                    <tr>
                        <td>IFSP0002</td>
                        <td>24/05/2020</td>
                        <td>URGENTE</td>
                        <td class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus rutrum arcu.
                        </td>
                        <td>EM ANÁLISE</td>
                        <td> <img src="../images/sid-view.png" width="30px" height="30px"> </td>
                    </tr>

                    <tr>
                        <td>IFSP0003</td>
                        <td>24/05/2020</td>
                        <td>URGENTE</td>
                        <td class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus rutrum arcu.
                        </td>
                        <td>RECUSADA</td>
                        <td> <img src="../images/sid-view.png" width="30px" height="30px"> </td>
                    </tr>
                    <tr>
                        <td>IFSP0004</td>
                        <td>24/05/2020</td>
                        <td>URGENTE</td>
                        <td class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus rutrum arcu.
                        </td>
                        <td>ACEITA</td>
                        <td> <img src="../images/sid-view.png" width="30px" height="30px"> </td>
                    </tr>
                </table>
            </div>
        </div>

    </div>


    </div>


    <script src="../js/script.js"> </script>

</body>
</html>