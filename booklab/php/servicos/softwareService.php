<?php

    include_once 'redirect.php';
    include_once 'alertaService.php';
    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/constantes.php';
    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/banco/softwareDAO.php';
    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/logger.php';

    if(!isset($_SESSION)) session_start();
        inicializa_sessao();

    class SoftwareService extends GenericService {
        private $softwareDAO;
        private $logger;
        
        function __construct()
        {
            $this -> softwareDAO = new SoftwareDAO();
            $this -> logger = new LoggerBooklab();
            /*$this -> logger -> logaMesg(" ---- Log UsuarioService ---- ");
            $this -> logger -> escreveTimestamp();
            $this -> logger -> sequenciaLigada(true);*/

        }

        function getSoftwaresCards() {
            $softwares = $this -> softwareDAO -> getSoftwaresComLabs();

            if (!isset($softwares) || count($softwares) == 0)
                return [];

            $softwareCards = array_map(
                function ($software) {
                    $countDisp = count($software -> disponibilidade);
                    
                    $disponibilidade  = "";
                    for($i = 0; $i < $countDisp; ++$i) {

                        $disp = $software -> disponibilidade[$i];

                        if ($i == 0)
                            $disponibilidade .= $disp;
                        else if ($i < $countDisp - 1)
                            $disponibilidade .= ', ' . $disp;
                        else
                            $disponibilidade .= ' e ' . $disp;
                        
                    }

                    return <<< CARD
                        <div class="card">
                            <div class="img-container">
                                <img class="imgcard" src="../api/banco_de_dados/imagens/softwares/{$software->urlIcone}" width="110px" height="110px" id="img{$software->nome}">
                            </div>
                            <div class="info">
                                <span class="title">{$software->nome}</span>
                                Versão: {$software->versao}
                                <div class="about">{$software->descricao}</div>
                                <div class="about">Disponibilidade: {$disponibilidade}</div>
                            </div>
                        </div>
                    CARD;
                },
                $softwares
            );

            return $softwareCards;
        }

        function getSoftwaresMaisRequisitados() {
            $softwares = $this -> softwareDAO -> getSoftwaresComQtdReqs();

            uasort($softwares, function($soft1, $soft2) {
                return $soft2 <=> $soft1;
            });

            $softwares = array_slice($softwares, 0, 6, true);

            $softwaresKeys = array_keys($softwares);

            $softwaresObjs = [];
            foreach($softwaresKeys as $key) {

                $textoReq = "";

                if ($softwares[$key] == 1) 
                    $textoReq = "1 requisição";
                else
                    $textoReq = $softwares[$key] . " requisições";

                $softwaresObjs[] = <<< SOFT_ROW
                    <tr>
                        <td>{$key}</td>
                        <td>-</td>
                        <td>{$textoReq}</td>
                    </tr>
                SOFT_ROW;
            }

            return $softwaresObjs;
        }
    }
?>

