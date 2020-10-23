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
    <link rel="stylesheet" type="text/css" href="../css/estiloReqUser.css">
    <link rel="stylesheet" type="text/css" href="../css/estiloFooter.css">
    <link rel="stylesheet" type="text/css" href="../css/flaticon.css">
</head>

<body>

    <div id="mySidenav" class="sidenav">
        <div class="logo">
          <img src="../images/ifsp.png" width="75px" height="75px">
        </div>
    
        <br>
    
        <div class="user">
          <img src="<?php echo "../api/banco_de_dados/imagens/" . $_SESSION[Constantes :: CaminhoFotoPerfil]; ?>" width="80px" height="80px">
        <div class="prontuario"><?php echo $_SESSION[Constantes :: LoginCookie]; ?></div>
        </div>
    
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">X</a>
        <a href="index.php"><span class="flaticon-browser">Home</span></a>
        <a href="reservar.php"> <span class="flaticon-agenda">Reservar Lab</span> </a>
        <a href="pesquisa-software.php"> <span class="flaticon-marketing">Pesquisar Software</span> </a>
        <a href="req-software.php"> <span class="flaticon-request">Solicitar Software</span> </a>
        <a href="requisicoes.php"> <span class="flaticon-interview">Minhas Requisições</span> </a>
        <a href="reservas.php"> <span class="flaticon-null">Minhas Reservas</span> </a>
      </div>
    
    
      <ul id="hlist">
        <li> <span id="menu" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; BOOKLAB </span></li>
    
      </ul>
    
    <div class="container-req">
        <span class="title"> Requisição #IFSP0001</span>
        <br> <br>
        <div class="info"> Feita por você às <span id="hora" name="hora">
                18:35</span> do dia <span name="data" id="data"> 03/08/2020 </span></div>

        <div class="info" id="info-ti"> Respondida por <span id="nome" name="nome">Alessandra Soares</span> às <span
                id="hora" name="hora">
                09:15</span> do dia <span name="data" id="data"> 05/08/2020 </span></div>


        <div class="req-body">
            <table>
                <tr>
                    <td class="label-tabela">Software Requisitado</td>
                    <td class="answer">Adobe Photoshop</td>
                </tr>
                <tr>
                    <td class="label-tabela">Descrição</td>
                    <td class="answer">Boa tarde, gostaria de solicitar esse software pois
                        ele é muito limitado na instituição, o que quase sempre prejudica o aprendizado dos meus alunos.
                        <br>
                        Antecipadamente grata, Maria - SP123456.
                    </td>
                </tr>
                <tr>
                    <td class="label-tabela">Precisa para</td>
                    <td class="answer"> 28/09/2020</td>
                </tr>

                <tr>
                    <td class="label-tabela">Status</td>
                    <td class="answer"> Em análise </td>
                </tr>
                <tr>
                    <td class="label-tabela">Prazo de Instalação</td>
                    <td class="answer"> Não definido</td>
                </tr>

                <tr>
                    <td class="label-tabela">Laboratório(s) a ser instalado</td>
                    <td class="answer">Não definido</td>
                </tr>


            </table>
<br> <br>



<footer class="rodape_final">

<div class="div_rod">
    <a>Contatos</a></br>
    <div class="email">
        <img src="../images/email.png" style="width:6.5%">
        <a>booklab@gmail.com</a></br>
    </div>

    <div class="telefone">
        <img src="../images/telefone.png" style="width:5%">
        <a>(11)9547-5321</a>
    </div>

</div>

<div class="direit_rod">
    &copy; booklab.com | Desenvolvido por XXXX
</div>

<div class="div_rod"></div>

</footer>

            <script type="text/javascript" src="../js/script.js"> </script>



</body>


</html>