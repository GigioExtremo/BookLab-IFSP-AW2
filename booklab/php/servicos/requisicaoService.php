<?php

    include_once 'redirect.php';
    include_once 'alertaService.php';
    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/constantes.php';
    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/banco/requisicaoDAO.php';
    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/logger.php';

    if(!isset($_SESSION)) session_start();
        inicializa_sessao();

    class RequisicaoService extends GenericService {
        private $requisicaoDAO;
        private $urlImagens;
        private $logger;
        
        function __construct()
        {
            $this -> requisicaoDAO = new RequisicaoDAO();
            $this -> logger = new LoggerBooklab();
            /*$this -> logger -> logaMesg(" ---- Log UsuarioService ---- ");
            $this -> logger -> escreveTimestamp();
            $this -> logger -> sequenciaLigada(true);*/

        }

        function getDetalhesRequisicao($codigoRequisicao) {
            $requisicaoDetalhada = $this -> requisicaoDAO -> getDetalhesRequisicao($codigoRequisicao);

            return $requisicaoDetalhada;
        }

        function getUltimasRequisicoesRows()
        {
            $requisicoes = $this -> requisicaoDAO -> getRequisicoes();

            if (count($requisicoes) == 0)
                return null;

            uasort($requisicoes, function($req1, $req2) {
                return $req1 -> dataRequisicao <=> $req2 -> dataRequisicao;
            });

            $requisicoes = array_slice($requisicoes, 0, 5, false);

            $requisicoesRows = array_map(
                function ($req) {

                    $descricao = str_pad($req -> descricao, 75, " ", STR_PAD_RIGHT) . ' ...';
                    $status = strtoupper($req->status);
                    return <<< ROW
                        <tr>
                            <td>{$req->codigo}</td>
                            <td>{$req->dataRequisicao}</td>
                            <td>{$req->dataLimite}</td>
                            <td class="desc">{$descricao}</td>
                            <td>{$status}</td>
                            <td> <a href="analise.php?codRequisicao={$req->codigo}"> <img src="../images/sid-view.png" width="30px" height="30px"> </a> </td>
                        </tr>
                    ROW;
                },
                $requisicoes
            );

            return $requisicoesRows;

        }

        function getRequisicoesRows()
        {
            $requisicoes = $this -> requisicaoDAO -> getRequisicoes();

            if (count($requisicoes) == 0)
                return null;

            uasort($requisicoes, function($req1, $req2) {
                return $req1 -> dataRequisicao <=> $req2 -> dataRequisicao;
            });

            $requisicoesRows = array_map(
                function ($req) {

                    $status = strtoupper($req->status);
                    return <<< ROW
                        <tr class="info">
                            <td>{$req->codigo}</td>
                            <td>{$req->dataRequisicao}</td>
                            <td>{$req->dataLimite}</td>
                            <td class="desc">{$req -> descricao}</td>
                            <td>{$status}</td>
                            <td> <a href="analise.php?codRequisicao={$req->codigo}"> <img src="../images/sid-view.png" width="30px" height="30px"> </a> </td>
                        </tr>
                    ROW;
                },
                $requisicoes
            );

            return $requisicoesRows;

        }
    }

?>