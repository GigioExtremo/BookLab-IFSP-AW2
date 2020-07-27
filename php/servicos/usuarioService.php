<?php

    include 'redirect.php';
    include_once '../utils/constantes.php';
    include_once '../banco/usuarioDAO.php';

    class UsuarioService extends GenericService {
        private $usuarioDAO;
        private $urlImagens;
        function __construct()
        {
            $this -> usuarioDAO = new UsuarioDAO();
            $this -> urlImagens = "../../api/banco_de_dados/imagens/";
        }

        function fazerLogin($prontuarioUsuario, $senhaUsuario, $lembrarDaSessao)
        {
            $dadosLogin = $this -> usuarioDAO -> fazerLogin($prontuarioUsuario, $senhaUsuario);

            if (!isset($dadosLogin)) {
                $this->redirecionaParaPagina(404, "../web/login.php");  
                return "O Prontuário e a Senha não foram encontrados";
            } else {
                set_param_sessao(Constantes :: NomeCookie, $dadosLogin -> nome);
                set_param_sessao(Constantes :: LoginCookie, $prontuarioUsuario);
                set_param_sessao(Constantes :: TipoUsuario, $dadosLogin -> tipo);
                set_param_sessao(Constantes :: CaminhoFotoPerfil, ($dadosLogin->nomeArquivoFoto));
                if ($lembrarDaSessao == true) {
                    set_param_sessao(Constantes :: LembrarDaSessao, true);
                }
                // $tokenLogin
                
                // set_param_sessao(TokenLogin, $tokenLogin);
                $this->redirecionaParaPagina(200, "../web/index-ti.php");
            }

        }


        // private function geraToken() {
        //     $provider = new OAuthProvider();

        //     return bin2hex($provider->generateToken(16));
        // }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuarioService = new UsuarioService();

        $prontuarioLogin = strtoupper($_POST["prontuario"]);
        $senhaLogin = $_POST["senha"];
        $lembrarSessao = false; 
        //($_POST["lembrarSessao"]? $_POST["lembrarSessao"] : "false") === "true"
        $usuarioService = new UsuarioService();
        
        $usuarioService -> fazerLogin($prontuarioLogin, $senhaLogin, $lembrarSessao);

    }

?>