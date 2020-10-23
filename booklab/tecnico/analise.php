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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Economica&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/estiloAnalise.css">
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
            <a href="../logout.php">Sair</a>
        </div>
    </div>

    <ul id="hlist">
        <li> <span id="menu" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span></li>
    </ul>


    <div class="container">
        <div class="title">Dados da Requisição</div> <br>
        <div class="subtitle">Feito por &nbsp <div class="nome"> Maria Silva &nbsp </div>
            às <div class="hora"> &nbsp 18:51 &nbsp</div>de &nbsp <div class="data">hoje </div>
            <br> </div>

        <table>
            <tr>
                <td class="desc">Software Requisitado</td>
                <td class="answer">Adobe Photoshop</td>
            </tr>
            <tr>
                <td class="desc">Descrição</td>
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



        </table>

        <button onclick="showResponse()" class="responder"> Responder à esta requisição </button>

        <div class="content-resp">
            <br> <br> <br>
            <form>
            <div class="i-resposta" id="i-resposta">
                <label for="status" class="instrucao">Defina um status para a requisição:</label> <br>
                <input type="radio" name="option" id="option-aceita" onclick="mostrarAceita()">
                <label for="aceita" class="radio-option">Requisição aceita</label> <br>
                <input type="radio" name="option" id="option-analise" onclick="mostrarAnalise()">
                <label for="analise" class="radio-option">Requisição em análise</label> <br>
                <input type="radio" name="option" id="option-indeferida" onclick="mostrarIndeferida()">
                <label for="indeferida" class="radio-option">Requisição indeferida</label><br>
                <br>
            </div>


            <div class="aceita" id="aceita">

                <label class="instrucao">Definir prazo para instalação</label> <br>
                <input type="date" name="dataInstalacao" id="dataInstalacao"> <br> <br>
                <label class="instrucao">Definir laboratório(s) de instalação</label> <br>
                <label class="instrucao2">Pressione e segure a tecla Ctrl para selecionar mais de uma opção.</label>
                <br>
                <select name="opcoes" id="labs" multiple>
                    <option value="1">Laboratório 01</option>
                    <option value="2">Laboratório 02</option>
                    <option value="3">Laboratório 03</option>
                    <option value="4">Laboratório 04</option>
                    <option value="4">Laboratório 05</option>
                </select>
                <br>

            </div>


            <div class="indeferida" id="indeferida">
                <label class="instrucao">Definir motivo:</label> <br>
                <select name="reasons1" id="reasons1">
                    <option value="motivo_indeferida01">Não há laboratório com a estrutura necessária para este
                        software.</option>
                    <option value="motivo_indeferida02">Não há verbas para obter a licença desse software.</option>
                    <option value="motivo_indeferida02"> Não conseguiremos instalar o software até a data definida.
                    </option>
                </select>

                <br> <br>
                <textarea class="addMotivo"> </textarea><br>
                <button class="add" onClick="adicionaMotivo();"><i class="material-icons md-18">add_circle_outline</i> </button>
                <label class="addLabel"> Adicionar Motivo</label>
                </a>
            </div>

        

            <div class="pendente" id="analise">
                <label class="instrucao">Definir motivo:</label> <br>
                <select name="reasons1" id="reasons1">
                    <option value="pendente">Sua requisição está sendo analisada pelo departamento financeiro</option>
                    <option value="pendente02">Sua requisição está sendo analisada por outro departamento.</option>
                </select>
                <br>
                <br>
                <textarea class="addMotivo"> </textarea><br>
                <button class="add"><i class="material-icons md-18">add_circle_outline</i> </button>
                <label class="addLabel"> Adicionar Motivo</label>
                </a>

                <br><br>
                <div class="prazo">
                    <label>Definir prazo para análise</label> <br>
                    <input type="date">
                </div>
            </div>


            <div class="resp-container" id="resp-container">
                <label class="instrucao"> Prévia de Resposta </label>
                <div contenteditable="true" class="resposta" id="resposta">
                    <div class="vocativo"> Prezadx <span class="nome"> Maria</span>,<div> <br>

                            <div class="resp-requisicao-aceita" id="resp-requisicao-aceita">
                                
                              <div class="status-requisicao">Sua requisição foi aceita. </div>  
                              <div class="info-instalacao">O software requisitado será instalado
                                no(s) laboratório(s): 
                                <span class="labs-instalacao" id="labs-instalacao" onload="mostrarLabs()"> </span>
                                até o dia 
                                <span class="data-instalacao" id="data-instalacao">
                                    <script> 
                                     document.getElementById("data-instalacao").innerHTML = document.getElementById("dataInstalacao").value;
                                    </script>
                                 </span>

                              </div>
                            
                            </div>

                            <div class="resp-requisicao-analise" id="resp-requisicao-analise"> Sua requisição está em análise.</div>

                            <div class="resp-requisicao-indeferida" id="resp-requisicao-indeferida"> Sua requisição foi indeferida. </div>

                            <div class="despedida"> Atenciosamente, </div> <br>

                            <div class="nome-tecnico"> Marcelo Silva </div>
                            <div class="info-tecnico"> Técnico de Informática</div>
                            <div class="info-campus"> Campus São Paulo</div>
                        </div>

                    </div>

                </div>
                <br>
                <input type="submit" value="Enviar Resposta" class="responder">
            </form>
            </div>
            <br>
        </div>


    </div>

    <script src="../js/script.js"></script>
</body>

</html>