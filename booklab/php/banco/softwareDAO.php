<?php

include_once 'bancoDAO.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/constantes.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/sessao.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/logger.php';

class SoftwareDAO extends GenericoBookLabDAO
{
    public function getSoftwares() {
        $jsonBanco = json_decode($this -> returnBanco(), true);

        $softwares = array_map(
            function ($software) {
                $softwareObj = new stdClass();
                $softwareObj -> codigo = $software["idSoftware"];
                $softwareObj -> nome = $software["nomeSoftware"];
                $softwareObj -> descricao = $software["descricaoSoftware"];
                $softwareObj -> versao = $software["versaoSoftware"];
                $softwareObj -> dataInicioLicenca = $software["dataInicioLicenca"];
                $softwareObj -> dataExpiracaoLicenca = $software["dataExpiracaoLicenca"];
                $softwareObj -> foiInstalado = $software["foiInstalado"];

                return $softwareObj;
            }, $jsonBanco["softwares"]
        );

        return $softwares;
    }

    public function getSoftwaresComLabs() {

        $logger = new LoggerBooklab();

        $jsonBanco = json_decode($this -> returnBanco(), true);

        $softwares = array_map(
            function ($software) use ($jsonBanco, $logger) {

                $disponibilidadeJSON = array_filter(
                    $jsonBanco["salasXsoftwares"],
                    function ($sala_x_soft) use ($software) {
                        return $sala_x_soft["idSoftware"] == $software["idSoftware"];
                    }
                );

                $disponibilidade = array_map(
                    function ($sala_x_soft) {
                        return $sala_x_soft["idSala"];
                    },
                    $disponibilidadeJSON
                );

                $softwareObj = new stdClass();
                $softwareObj -> codigo = $software["idSoftware"];
                $softwareObj -> nome = $software["nomeSoftware"];
                $softwareObj -> descricao = $software["descricaoSoftware"];
                $softwareObj -> versao = $software["versaoSoftware"];
                $softwareObj -> urlIcone = $software["iconeSoftware"];
                $softwareObj -> dataInicioLicenca = $software["dataInicioLicenca"];
                $softwareObj -> dataExpiracaoLicenca = $software["dataExpiracaoLicenca"];
                $softwareObj -> disponibilidade = array_values($disponibilidade);

                return $softwareObj;
            }, $jsonBanco["softwares"]
        );

        return $softwares;
    }

    public function getSoftware($codSoftware) {
        $jsonBanco = json_decode($this->returnBanco(), true);

        $software = array_filter(
            $jsonBanco["softwares"],
            function ($software) use ($codSoftware) {
                return $software["idSoftware"] === $codSoftware;
            }
        );

        $software = self :: getObjetoDoArrayFilter($software);

        if (!isset($software))
            return null;

        $softwareObj = new stdClass();
        $softwareObj -> codigo = $software["idSoftware"];
        $softwareObj -> nome = $software["nomeSoftware"];
        $softwareObj -> descricao = $software["descricaoSoftware"];
        $softwareObj -> versao = $software["versaoSoftware"];
        $softwareObj -> urlIcone = $software["iconeSoftware"];
        $softwareObj -> dataInicioLicenca = $software["dataInicioLicenca"];
        $softwareObj -> dataExpiracaoLicenca = $software["dataExpiracaoLicenca"];
        $softwareObj -> foiInstalado = $software["foiInstalado"];

        return $softwareObj;

    }

    function getSoftwaresID() {
        $jsonBanco = json_decode($this->returnBanco(), true);

        $softwares = []; 
        foreach ($jsonBanco["softwares"] as $soft) {
            $softwares[$soft["idSoftware"]] = $soft;
        };

        return $softwares; 
    }

    function getSoftwaresComQtdReqs() {
        $jsonBanco = json_decode($this->returnBanco(), true);
        
        $softwaresBanco = [];

        foreach($jsonBanco["softwares"] as $soft) {
            $softwaresBanco[$soft["idSoftware"]] = $soft;
        }

        $softwares = []; 
        
        foreach ($jsonBanco["requisicoes"] as $req) {
            if(!isset($softwares[ $softwaresBanco[ $req["idSoftware"]] ["nomeSoftware"] ]))
                $softwares[ $softwaresBanco[ $req["idSoftware"]] ["nomeSoftware"] ] = 0;

            ++$softwares[ $softwaresBanco[ $req["idSoftware"]] ["nomeSoftware"] ];
        };

        return $softwares; 
    }
}

?>