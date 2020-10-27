<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/cookies.php';
    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/sessao.php';
    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/constantes.php';
    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/servicos/alertaService.php';
    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/servicos/requisicaoService.php';
    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/servicos/reservaService.php';
    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/logger.php';

    if (!isset($_SESSION)) session_start();

    inicializa_sessao();
	possui_permissao("tecnico");

    if ($_SERVER["REQUEST_METHOD"] == 'GET') {
        if (!isset($_GET["codRequisicao"]))
            $requisicao = null;
        else {
            $requisicaoService = new RequisicaoService();

            $requisicao = $requisicaoService -> getDetalhesRequisicao($_GET["codRequisicao"]);

            $reservaService = new reservaService();

            $labsOptions = $reservaService -> getLabsOptions();
        }
    }


?>

<!DOCTYPE html>
<html>

<head>
    <title>Análise #<?php echo $_GET["codRequisicao"] ?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Economica&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/estiloAnalise.css">
    <link rel="stylesheet" type="text/css" href="../css/flaticon.css">
    <link rel="stylesheet" type="text/css" href="../css/estiloStandard.css">
</head>

<body>

    <div id="mySidenav" class="sidenav">
        <div class="logo">
        <img src="../images/ifsp.png" width="75px" height="75px">
        </div>

        <br>

        <div class="user">
        <img src="<?php echo "../api/banco_de_dados/imagens/" . $_SESSION[Constantes::CaminhoFotoPerfil]; ?>" width="80px" height="80px">
        <div class="prontuario"><?php echo $_SESSION[Constantes::LoginCookie]; ?></div>
        </div>

        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">X</a>
        <a href="/tecnico"><span class="flaticon-browser">Home</span></a>
        <a href="requisicoes.php"> <span class="flaticon-agenda">Requisições</span> </a>
        <a href="reservas.php"> <span class="flaticon-marketing">Reservas</span> </a>
        <a href="laboratorio.php"> <span class="flaticon-request">Laboratórios</span> </a>
        <a href="software.php"> <span class="flaticon-interview">Softwares</span> </a>
        <a href="mais-informacoes.php"> <span class="flaticon-null">Mais Informações</span> </a>
        <a href="../logout.php"> <span class="flaticon-null">Sair</span> </a>
    </div>

    <ul id="hlist">
        <li> <span id="menu" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; BOOKLAB </span></li>

  </ul>

    <div id="mySidenav" class="sidenav">

        <div class="user">
            <img src="<?php echo "../api/banco_de_dados/imagens/" . $_SESSION[Constantes::CaminhoFotoPerfil]; ?>" width="80px" height="80px">
            <div class="prontuario"><?php echo $_SESSION[Constantes::LoginCookie]; ?></div>
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

    


    <div class="container">
        <div class="title">Dados da Requisição</div> <br>
        <div class="subtitle">Feito por &nbsp <div class="nome"> 
            <strong>
            <?php
                echo $requisicao -> nome;
            ?> 
            </strong>
            &nbsp </div> às 
            <?php $dataRequisicao = DateTime::createFromFormat('d/m/Y H:i', $requisicao -> dataRequisicao); ?>
            <div class="hora"> &nbsp
                <?php echo $dataRequisicao -> format('H:i'); ?> &nbsp
            </div>de &nbsp 
            <div class="data">
                <?php echo $dataRequisicao -> format('d/m/Y'); ?> 
            </div>
            <br> </div>

        <table>
            <tr>
                <td class="desc">Software Requisitado</td>
                <td class="answer">
                    <?php
                        $logger = new LoggerBooklab();
                        $logger-> logaMesg(json_encode($requisicao));
                        echo $requisicao -> softwareObj -> nome;
                    ?>
                </td>
            </tr>
            <tr>
                <td class="desc">Descrição</td>
                <td class="answer">
                    <?php
                        echo nl2br($requisicao -> descricao);
                    ?>
                </td>
            </tr>
            <tr>
                <td class="desc">Precisa para</td>
                <td class="answer">
                    <?php 
                    echo DateTime::createFromFormat('d/m/Y H:i', $requisicao -> dataRequisicao) -> format('d/m/Y');
                    ?>
                </td>
            </tr>



        </table>

        <button onclick="showResponse()" class="responder"> Responder à esta requisição </button>

        <div class="content-resp">
            <br> <br> <br>
            <form>
                <div class="i-resposta" id="i-resposta">
                    <label for="status" class="instrucao">Defina um status para a requisição:</label> <br>
                    <input type="radio" name="option" id="option-aceita" onclick="mostrarAceita()">
                    <label for="option-aceita" class="radio-option">Requisição aceita</label> <br>
                    <input type="radio" name="option" id="option-analise" onclick="mostrarAnalise()">
                    <label for="option-analise" class="radio-option">Requisição em análise</label> <br>
                    <input type="radio" name="option" id="option-indeferida" onclick="mostrarIndeferida()">
                    <label for="option-indeferida" class="radio-option">Requisição indeferida</label><br>
                    <br>
                </div>


                <div class="aceita" id="aceita">

                    <label class="instrucao">Definir prazo para instalação</label> <br>
                    <input type="date" name="dataInstalacao" id="dataInstalacao"> <br> <br>
                    <label class="instrucao">Definir laboratório(s) de instalação</label> <br>
                    <label class="instrucao2">Pressione e segure a tecla Ctrl para selecionar mais de uma opção.</label>
                    <br>
                    <select name="opcoes" id="labs" multiple>
                        <?php 
                            foreach($labsOptions as $lab)
                                echo $lab;
                        ?>
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

                    <br/> <br/>
                    <textarea class="addMotivo"></textarea><br>
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
                        <input type="date" name="dataAnalise">
                    </div>
                </div>


                <div class="resp-container" id="resp-container">
                    <label class="instrucao" for="resposta"> Resposta </label>
                    <textarea name="resposta" id="resposta" class="resposta form-control" rows="8">

                    </textarea>
                    <!--<div contenteditable="true" class="resposta" id="resposta">
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

                    </div>-->
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