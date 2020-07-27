<?php
session_start();    

include_once '../utils/constantes.php';
include_once '../utils/sessao.php';

inicializa_sessao();
$urlImagens = "../../api/banco_de_dados/imagens/";
?>
<!DOCTYPE html>     
<html>

<head>
    <title>Página Principal - Técnico</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="your_website_domain/css_root/flaticon.css">

    <link href="https://fonts.googleapis.com/css?family=Economica&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../css/estiloHomeTI.css">
</head>

<body>

    <div id="mySidenav" class="sidenav">
        <div class="userprofile"> <img src="<?php echo ($urlImagens . get_param_sessao(Constantes :: CaminhoFotoPerfil)); ?>" width="80px" height="80px"></div>
        <div class="id"> <?php echo get_param_sessao(Constantes :: LoginCookie) ?> </div>
        <div class="id"> <?php echo get_param_sessao(Constantes :: NomeCookie) ?> </div>
        <div class="content">
            <a href="index-ti.php">Home</a> <br> <br>
            <a href="../../requisicao.html"> Requisições</a> <br><br>
            <a href="../../laboratorio.html">Laboratórios</a> <br><br>
            <a href="../../software.html"> Softwares </a><br><br>
            <a href="../../mais-informacoes.html">Mais informações</a> <br><br>
            <a href="../../logout.html">Sair</a>
        </div>
    </div>


    <div class="overall">
        <div class="title">Resumo de Informações</div>
        <div class="info"> <img src="../../images/statistics.png" width="70px" height="70px"> </div>
        <div class="info"> <img src="../../images/presentation.png" width="70px" height="70px"></div>
        <div class="info"> <img src="../../images/magic.png" width="70px" height="70px"> </div>
        <div class="info"> <img src="../../images/statistics2.png" width="70px" height="70px"> </div>
    </div> <br> <br>

    <div class="calendar">
        <div class="title">Calendário</div>
        <table>
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

    <br /> <br />

    <div class="naosei"> </div>

    <div class="req-sum">
        <div class="title" id="req-title"> Requisições Recentes</div>
        <div class="request">
            <table id="mes-passado">
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
            </table>
        </div>
    </div>

    <footer class="rodape_final">

        <div class="div_rod">
            <a>Contatos</a></br>
            <div class="email">
                <img src="../../images/email.png" style="width:6.5%">
                <a>booklab@gmail.com</a></br>
            </div>

            <div class="telefone">
                <img src="../../images/telefone.png" style="width:5%">
                <a>(11)9547-5321</a>
            </div>

        </div>

        <div class="direit_rod">
            &copy; booklab.com| desenvolvido por blabla
        </div>

        <div class="div_rod"></div>

    </footer>

</body>

</html>

<?php

    echo "zz --> " . $_SESSION["login_cookie"] . "<br/>";
    echo "XX --)> " . $_SESSION["caminho_foto_perfil"];

?>