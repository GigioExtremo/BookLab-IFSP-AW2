<?php

    include_once 'bancoDAO.php';
    include_once 'softwareDAO.php';
    include_once 'usuarioDAO.php';
    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/constantes.php';
    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/sessao.php';


    class RequisicaoDAO extends GenericoBookLabDAO
    {
        public function getRequisicoes()
        {
            $jsonBanco = json_decode($this->returnBanco(), true);

            $usuarioDAO = new UsuarioDAO();
            $usuariosSolicitantes = $usuarioDAO -> getUsuariosSolicitantes();

            
            $softwareDAO = new SoftwareDAO();
            $softwares = $softwareDAO -> getSoftwaresID();

            $requisicoes = array_map(function ($reqJSON) use ($usuariosSolicitantes, $softwares){

                $req = new stdClass();

                $req -> codigo = $reqJSON["idRequisicao"];
                $req -> nome = $usuariosSolicitantes[$reqJSON["idSolicitante"]];
                $req -> descricao = $reqJSON["descricao"];
                $req -> status = $reqJSON["status"];
                $req -> software = $softwares[$reqJSON["idSoftware"]];
                $req -> dataLimite = $reqJSON["dataLimite"];
                $req -> dataRequisicao = $reqJSON["dataRequisicao"];

                return $req;

            }, $jsonBanco["requisicoes"]);

            return $requisicoes;
        }

        public function getDetalhesRequisicao($codigoRequisicao) {
            $jsonBanco = json_decode($this->returnBanco(), true);

            $usuariosSolicitantes = []; 
            foreach ($jsonBanco["usuarios"] as $dadosUsuarios) {
                $usuariosSolicitantes[$dadosUsuarios["idUsuario"]] = $dadosUsuarios["nomeUsuario"];
            };

            $requisicoes = array_map(function ($reqJSON) use ($usuariosSolicitantes){

                $req = new stdClass();

                $req -> codigo = $reqJSON["idRequisicao"];
                $req -> nome = $usuariosSolicitantes[$reqJSON["idSolicitante"]];
                $req -> descricao = $reqJSON["descricao"];
                $req -> status = $reqJSON["status"];
                $req -> codSoftware = $reqJSON["idSoftware"];
                $req -> dataLimite = $reqJSON["dataLimite"];
                $req -> dataRequisicao = $reqJSON["dataRequisicao"];
                $req -> softwareObj = [];

                return $req;

            }, $jsonBanco["requisicoes"]);

            $requisicaoAlvo = array_filter(
                $requisicoes, 
                function($req) use ($codigoRequisicao) {
                    return $codigoRequisicao == ($req -> codigo);
                }
            );

            $requisicao = self :: getObjetoDoArrayFilter($requisicaoAlvo);

            $softwareDAO = new SoftwareDAO();
            $softwareRequisicao = $softwareDAO -> getSoftware($requisicao -> codSoftware);

            if (isset($requisicao)) {
                $requisicao -> softwareObj = $softwareRequisicao;
                return $requisicao;
            } else 
                return null;
        }
    }

?>