<?php

    include_once 'bancoDAO.php';
    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/constantes.php';
    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/sessao.php';


    class ReservaDAO extends GenericoBookLabDAO
    {
        function getLabsNome() {
            $jsonBanco = json_decode($this->returnBanco(), true);

            $salas = array_map(function ($sala){

                $req = new stdClass();
                $req -> id = $sala["idSala"];
                $req -> nome = "Laboratório " . $sala["idSala"];
                
                return $req;

            }, $jsonBanco["salas"]);

            return $salas;
        }
    }

?>