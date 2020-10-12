<html>

<head>
    <title>Requisições</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="your_website_domain/css_root/flaticon.css">

    <link href="https://fonts.googleapis.com/css?family=Economica&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/estiloDetalhesAdm.css">
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

                    <p> Tem certeza que deseja recuperar essa requisição? Ela foi cancelada pelo professor.</p>
                </div>

                <!-- Rodapé do modal-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Recuperar Requisição</button>
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
        <br>   <br>  <br>

    <div class="container-req">
        <span class="title"> Requisição #IFSP0001</span>
        <br>  <br>
        <div class="info"> Feita por <span id="nome" name="nome">Maria Silva</span> às <span id="hora" name="hora">
                18:35</span> do dia <span name="data" id="data"> 03/08/2020 </span></div>

        <div class="info" id="info-ti"> Respondida por <span id="nome" name="nome">Alessandra Soares</span> às <span
                id="hora" name="hora">
                09:15</span> do dia <span name="data" id="data"> 05/08/2020 </span></div>


        <div class="req-body">
            <table>
                <tr>
                    <td class="desc">Software Requisitado</td>
                    <td class="answer">Adobe Photoshop</td>
                </tr>
                <tr>
                    <td class="desc" id="desc">Descrição</td>
                    <td class="answer">Boa tarde, gostaria de solicitar esse software pois
                        ele é muito limitado na instituição, o que quase sempre prejudica o aprendizado dos meus alunos.
                        <br>
                        Antecipadamente grata, Maria - SP123456.
                    </td>
                </tr>
                <tr>
                    <td class="desc">Precisa para</td>
                    <td class="answer"> 28/09/2020</td>
                </tr>

                <tr>
                    <td class="desc">Status</td>
                    <td class="answer"> Em análise </td>
                </tr>
                <tr>
                    <td class="desc">Prazo de Instalação</td>
                    <td class="answer"> Não definido</td>
                </tr>

                <tr> 
                  <td class="desc">Laboratório(s) a ser instalado</td>
                  <td class="answer">Não definido</td>
                </tr>

       
            </table>

            <br> 

          <div class="warn"> Atenção: esta requisição foi cancelada pelo professor. </div> 

          <br>

<div class="options">
    <button class="recbtn" type="button"  id="rec" data-toggle="modal"
    data-target="#meuModal">Recuperar Requisição</button>

    <button  class="recbtn" type="button" class="modalbtn" data-toggle="modal"
    data-target="#meuModal2">Falar com Professor</button>

    <button   class="recbtn"type="button" class="modalbtn" data-toggle="modal"
    data-target="#meuModal3">Falar com técnico</button>

        </div>
<br>
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
    <script src="js/script.js"> </script>
</body>


</html>