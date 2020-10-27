<?php

include_once 'bancoDAO.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/constantes.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/sessao.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/logger.php';


class UsuarioDAO extends GenericoBookLabDAO
{

    public function fazerLogin($prontuarioUsuario, $senhaUsuario)
    {
        $jsonBanco = json_decode($this->returnBanco(), true);

        //pegamos todos os usuários do banco e mapeamos na forma de um objeto
        //que representa o perfil do usuário
        $usuarios = array_map(function ($dadosLogin) {
            $perfil = new stdClass();
            $perfil->tipoUsuario = $dadosLogin["permissoes"][0];
            $perfil->nome = $dadosLogin["nomeUsuario"];
            $perfil->prontuario = $dadosLogin["prontuarioUsuario"];
            $perfil->senha = $dadosLogin["senhaUsuario"];
            $perfil->nomeArquivoFoto = $dadosLogin["nomeArquivoFoto"];

            return $perfil;
        }, $jsonBanco["usuarios"]);

        //Filtramos o nosso login da lista de usuário
        $usuarioLogin = array_filter(
            $usuarios,
            function ($obj) use ($prontuarioUsuario, $senhaUsuario) {
                return ($obj->prontuario) === $prontuarioUsuario
                    && ($obj->senha) === $senhaUsuario;
            }
        );

        return self :: getObjetoDoArrayFilter($usuarioLogin);
    }

    public function getPermissoes($prontuarioUsuario) {
        $jsonBanco = json_decode($this->returnBanco(), true);

        $usuarioLogin = array_filter(
            $jsonBanco["usuarios"],
            function ($obj) use ($prontuarioUsuario) {
                return ($obj["prontuarioUsuario"] === $prontuarioUsuario);
            }
        );


        $usuarioLogin = self :: getObjetoDoArrayFilter($usuarioLogin);

        if (!isset($usuarioLogin))
            return null;

        return $usuarioLogin["permissoes"];

    }

    public function getUsuariosSolicitantes() 
    {
        $jsonBanco = json_decode($this->returnBanco(), true);

        $usuariosSolicitantes = []; 
        foreach ($jsonBanco["usuarios"] as $dadosUsuarios) {
            $usuariosSolicitantes[$dadosUsuarios["idUsuario"]] = $dadosUsuarios["nomeUsuario"];
        };

        return $usuariosSolicitantes; 

    }
}
