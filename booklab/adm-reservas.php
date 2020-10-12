<html>

<head>
    <title>Reservas</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="your_website_domain/css_root/flaticon.css">

    <link href="https://fonts.googleapis.com/css?family=Economica&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/estiloReqAdm.css">
    <link rel="stylesheet" type="text/css" href="css/estiloMenu.css">
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
                        <label>Filtrar por Laboratório </label> <br>
                        <select> 
                            <option value="lab1"> Laboratório 1</option>
                            <option value="lab2"> Laboratório 2</option>
                            <option value="lab3"> Laboratório 3</option>
                        </select>
                        <label>Filtrar por Professor </label> <br>
                        <input type="text" name="filtrarProf" placeholder="Insira o professor"> <br>
                        <label>Filtrar por Data </label> <br>
                        <input type="text" name="filtrarData" placeholder="Insira a Data"> <br>
                        <label>Filtrar por Horário Inicial </label> <br>
                        <input type="text" name="filtrarHoraInicio" placeholder="Insira a Hora de Início"> <br>
                        <label>Filtrar por Horário Final </label> <br>
                        <input type="text" name="filtrarHoraFim" placeholder="Insira a Hora de Fim"> <br>
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
            <img src="images/user.png" width="80px" height="80px">
            <div class="prontuario">SP684557</div>
        </div>

        <a id="closebtn" href="javascript:void(0)" class="closebtn" onclick="closeNav()">X</a>
        <div class="content">
            <a href="adm-index.php">Home</a>
            <a href="adm-mov-usuario.php" class="linkAtivo">Movimento de usuário</a>
            <a href="adm-requisicoes.php">Requisições</a>
            <a href="adm-reservas.php">Reservas</a>
            <a href="adm-falhas.php">Falhas</a>
            <a href="logout.php">Sair</a>
        </div>
    </div>

    <ul id="hlist">
        <li> <span id="menu" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span></li>
        </ul>

        <div class="pesq-container">
        <div class="container">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Pesquisar Reserva">
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
                <td class="cod">Laboratório</td> 
                <td class="date"> Data</td>
                <td class="imp"> Horário</td>
                <td class="imp"> Professor</td>
             
                <td class="edit">Visualizar</td>
            </tr>

            <tr>
                <td>RES0001</td>
                <td>LAB 02</td>
                <td>25/05/2020</td>
                <td>14:30-15:40  </td>
                <td>MARIA</td>
                <td> <a href="adm-detalhes-reservas.html"><img src="images/sid-view.png" width="30px" height="30px"> </td> </a>
            </tr>

            <tr>
                <td>RES0002</td>
                <td>LAB 03</td>
                <td>24/05/2020</td>
                <td>16:30-17:40</td>
                <td>JOÃO</td>
                <td> <a href="adm-detalhes-reservas.html"><img src="images/sid-view.png" width="30px" height="30px"> </td> </a>
            </tr>

            <tr>
                <td>RES0003</td>
                <td>LAB 03</td>
                <td>25/07/2020</td>
                <td>18:30-17:40</td>
                <td>JAQUELINE</td>
                <td> <a href="adm-detalhes-reservas.html"><img src="images/sid-view.png" width="30px" height="30px"> </td> </a>
            </tr>
            <tr>
                <td>RES0004</td>
                <td>LAB 04</td>
                <td>24/05/2020</td>
                <td>08:30-10:00</td>
                <td>JOSÉ</td>
                <td> <a href="adm-detalhes-reservas.html"><img src="images/sid-view.png" width="30px" height="30px"> </td> </a>
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

    <script src="js/script.js"> </script>
</body>


</html>