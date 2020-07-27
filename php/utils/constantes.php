<?php

class Constantes
{
    // Tempo
    public const SegundosCookie = 1;
    public const MinutosCookie = 2;
    public const HorasCookie = 3;
    public const DiasCookie = 4;

    // Cookies
    public const TipoUsuario = "tipo_usuario";
    public const LoginCookie = "login_cookie";
    public const TokenLogin = "token_login";
    public const NomeCookie = "nome_cookie";
    public const CookieUndefined = "Cookie não existe. Erro 404";

    //Sessão
    public const LembrarDaSessao = "sessao_vai_expirar";
    public const CaminhoFotoPerfil = "caminho_foto_perfil";
}

// Banco    
class TabelasConstantes
{
    private $nomeTabela;
    private $nomeIdTabela;

    function __construct($nomeDaTabelaParam)
    {
        $nomeDaTabela = strtoupper($nomeDaTabelaParam);

        switch ($nomeDaTabela) {
            case "SEQUENCIAS":
                $this -> nomeTabela = "sequencias";
                $this -> nomeIdTabela = "seqSalas";
                break;

            case "SALAS":   
                $this -> nomeTabela = "salas";
                $this -> nomeIdTabela = "idSala";
                break;

            case "COMPUTADORES":
                $this -> nomeTabela = "computadores";
                $this -> nomeIdTabela = "idComputador";
                break;

            case "SISTEMASOPERACIONAIS":
                $this -> nomeTabela = "sistemasOperacionais";
                $this -> nomeIdTabela = "idSistemaOperacional";
                break;

            case "COMPUTADORESXSISTEMASOPERACIONAIS":
                $this -> nomeTabela = "computadoresXsistemasOperacionais";
                $this -> nomeIdTabela = "idComputador";
                break;

            case "SOFTWARES":
                $this -> nomeTabela = "softwares";
                $this -> nomeIdTabela = "idSoftware";
                break;

            case "COMPUTADORESXSOFTWARES":
                $this -> nomeTabela = "computadoresXsoftwares";
                $this -> nomeIdTabela = "idComputador";
                break;

            case "ADMINISTRADORES":
                $this -> nomeTabela = "administradores";
                $this -> nomeIdTabela = "idAdministrador";
                break;

            case "TECNICOS":
                $this -> nomeTabela = "tecnicos";
                $this -> nomeIdTabela = "idTecnico";
                break;

            case "ATENDIMENTOS":
                $this -> nomeTabela = "atendimentos";
                $this -> nomeIdTabela = "idAtendimento";
                break;

            case "PROFESSORES":
                $this -> nomeTabela = "professores";
                $this -> nomeIdTabela = "idProfessor";
                break;

            case "TURMAS":
                $this -> nomeTabela = "turmas";
                $this -> nomeIdTabela = "idTurma";
                break;

            case "CURSOS":
                $this -> nomeTabela = "cursos";
                $this -> nomeIdTabela = "idCurso";
                break;

            case "RESERVAS":
                $this -> nomeTabela = "reservas";
                $this -> nomeIdTabela = "idReserva";
                break;

            case "HORARIOS":
                $this -> nomeTabela = "horarios";
                $this -> nomeIdTabela = "idHorario";
                break;
        }
    }

    public function getNomeTabela()
    {
        return $this->nomeTabela;
    }

    public function getNomeIdTabela()
    {
        return $this->nomeIdTabela;
    }
}
