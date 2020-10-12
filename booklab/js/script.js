// Interface professor

function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
  }
  
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }


  function reservar(){
    document.getElementsByClassName("info-reserva").style.display="block";
  }

function habilitar(){
  if (document.getElementById("datahora").checked = true){
    document.getElementById("datahoracont").style.display = "block";
    document.getElementById("numerocont").style.display = "none";
  }
}

function habilitar2(){
  if(document.getElementById("numero").checked = true){
    document.getElementById("numerocont").style.display = "block";
    document.getElementById("datahoracont").style.display = "none";
  }
}

// Interface TI

function showResponse(){
  document.getElementById("i-resposta").style.display = "block";
}

function mostrarAceita(){
  if(document.getElementById("option-aceita").checked = true){
    document.getElementById("aceita").style.display = "block";
    document.getElementById("resp-container").style.display = "block";
    document.getElementById("resposta").style.display = "block";
    document.getElementById("indeferida").style.display = "none";
    document.getElementById("analise").style.display = "none";
    document.getElementById("resp-requisicao-aceita").style.display = "block";
    document.getElementById("resp-requisicao-analise").style.display = "none";
    document.getElementById("resp-requisicao-indeferida").style.display = "none";
  }
}

function mostrarAnalise(){
  if(document.getElementById("option-analise").checked = true){
    document.getElementById("aceita").style.display = "none";
    document.getElementById("resp-container").style.display = "block";
    document.getElementById("resposta").style.display = "block";
    document.getElementById("indeferida").style.display = "none";
    document.getElementById("analise").style.display = "block";
    document.getElementById("resp-requisicao-analise").style.display = "block";
    document.getElementById("resp-requisicao-aceita").style.display = "none";
    document.getElementById("resp-requisicao-indeferida").style.display = "none";
  }
}

function mostrarIndeferida(){
  if(document.getElementById("option-indeferida").checked = true){
    document.getElementById("aceita").style.display = "none";
    document.getElementById("resp-container").style.display = "block";
    document.getElementById("resposta").style.display = "block";
    document.getElementById("indeferida").style.display = "block";
    document.getElementById("analise").style.display = "none";
    document.getElementById("resp-requisicao-indeferida").style.display = "block";
    document.getElementById("resp-requisicao-aceita").style.display = "none";
    document.getElementById("resp-requisicao-analise").style.display = "none";
  }
}

function mostrarDataInstalacao(){
 //var dataInstalacao =  document.getElementById("dataInstalacao").value;
 
}

function addInfo(){
  document.getElementsByClassName("info").style.display="block";
  }


  


