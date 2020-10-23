<?php

include 'bancoDAO.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/constantes.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/sessao.php';


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

        // Caso a busca não tenha retornado nada, retornamos nulo
        if (array_keys($usuarioLogin) !== [])
            $usuarioLogin = $usuarioLogin[array_keys($usuarioLogin)[0]];
        else 
            $usuarioLogin = null;

        if (isset($usuarioLogin)) {
            return $usuarioLogin;
        } else {
            return null;
        }
    }
}
