<html> 
    <head> 
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="your_website_domain/css_root/flaticon.css">

        <link href="https://fonts.googleapis.com/css?family=Economica&display=swap" rel="stylesheet">
        <meta charset="utf-8"> 
        <link rel="stylesheet" type="text/css" href="css/estiloSolicitacao.css">
        <link rel="stylesheet" type="text/css" href="css/estiloFooter.css">
        <link rel="stylesheet" type="text/css" href="css/flaticon.css">
    </head>

<body>

<div id="mySidenav" class="sidenav">
        <div class="logo">
          <img src="images/ifsp.png" width="75px" height="75px">
        </div>
    
        <br>
    
        <div class="user">
          <img src="images/user3.png" width="80px" height="80px">
          <div class="prontuario">SP684557</div>
        </div>
    
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">X</a>
        <a href="prof-index.php"><span class="flaticon-browser">Home</span></a>
        <a href="prof-reservar.php"> <span class="flaticon-agenda">Reservar Lab</span> </a>
        <a href="prof-pesquisa-software.php"> <span class="flaticon-marketing">Pesquisar Software</span> </a>
        <a href="prof-req-software.php"> <span class="flaticon-request">Solicitar Software</span> </a>
        <a href="prof-requisicoes.php"> <span class="flaticon-interview">Minhas Requisições</span> </a>
        <a href="prof-reservas.php"> <span class="flaticon-null">Minhas Reservas</span> </a>
      </div>
    
    <ul id="hlist"> 
     <li> <span id="menu" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; BOOKLAB </span></li>
    </ul>

 <p id="titulo"> SOLICITAR SOFTWARE </p>

<div class="container-form">
<form action="/action_page.php" method="post">
 
  <div class="container">
    <label for="uname"><b>Nome do Software</b></label>
    <input type="text" placeholder="Nome do Sofware" name="uname" required>

    <label for="uname"><b>Descrição</b></label>
    <input type="text" placeholder="Descreva sua Requisição" name="uname" required> <br>

    <label for="uname"><b>Precisa para:</b></label> <br>
    <input type="date" name="data-instalacao"/>

        
    <button type="submit">Enviar Requisição</button>
    <label>
   
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancelar</button>
   
  </div>
</form>
</div>

<br> <br> <br> <br>

<footer class="rodape_final">

<div class="div_rod">
    <a>Contatos</a></br>
    <div class="email">
        <img src="images/email.png" style="width:6.5%">
        <a>booklab@gmail.com</a></br>
    </div>

    <div class="telefone">
        <img src="images/telefone.png" style="width:5%">
        <a>(11)9547-5321</a>
    </div>

</div>

<div class="direit_rod">
    &copy; booklab.com | Desenvolvido por XXXX
</div>

<div class="div_rod"></div>

</footer>

<script type="text/javascript" src="js/script.js"> </script>
 
</body>


</html>