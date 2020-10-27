<?php

    include_once 'redirect.php';
    include_once 'alertaService.php';
    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/constantes.php';
    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/banco/reservaDAO.php';
    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/logger.php';

    if(!isset($_SESSION)) session_start();
        inicializa_sessao();

    class ReservaService extends GenericService {
        private $reservaDAO;
        private $logger;

        function __construct()
        {
            $this -> reservaDAO = new ReservaDAO();
            $this -> logger = new LoggerBooklab();
            /*$this -> logger -> logaMesg(" ---- Log UsuarioService ---- ");
            $this -> logger -> escreveTimestamp();
            $this -> logger -> sequenciaLigada(true);*/

        }

        function getLabsOptions() {
            $labs = $this -> reservaDAO -> getLabsNome();
            
            $labsOptions = array_map(
                function ($lab) {
                    return <<< OPTION
                        <option value="{$lab->id}">{$lab->nome}</option>
                    OPTION;
                }, 
                $labs
            );

            return $labsOptions;
        }

    }

?>