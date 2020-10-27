<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/cookies.php';
    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/sessao.php';
    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/constantes.php';
    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/servicos/alertaService.php';
    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/logger.php';
   
    if(!isset($_SESSION)) session_start();
    
    inicializa_sessao();

    if (isset($_SESSION[Constantes :: LoginCookie])){
        session_unset();   
    }

    header("Location:index.php");
    
?>