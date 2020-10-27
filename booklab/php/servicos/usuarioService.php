<?php

    include_once 'redirect.php';
    include_once 'alertaService.php';
    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/constantes.php';
    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/banco/usuarioDAO.php';
    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/logger.php';

    if(!isset($_SESSION)) session_start();
        inicializa_sessao();

    class UsuarioService extends GenericService {
        private $usuarioDAO;
        private $urlImagens;
        private $logger;
        
        function __construct()
        {
            $this -> usuarioDAO = new UsuarioDAO();
            $this -> urlImagens = "../../api/banco_de_dados/imagens/";
            $this -> logger = new LoggerBooklab();
            /*$this -> logger -> logaMesg(" ---- Log UsuarioService ---- ");
            $this -> logger -> escreveTimestamp();
            $this -> logger -> sequenciaLigada(true);*/

        }

        function fazerLogin($prontuarioUsuario, $senhaUsuario, $lembrarDaSessao)
        {
            $dadosLogin = $this -> usuarioDAO -> fazerLogin($prontuarioUsuario, $senhaUsuario);

            if (empty($dadosLogin) == true) {
                $this->redirecionaParaPagina(404, "../../login.php");  
                $this -> logger -> logaMesg("Usuario Service --> " . $_SESSION[Constantes :: AlertasAtuais]);
                AlertaService :: registraAlerta("ErroLogin", "O Prontuário e a Senha não foram encontrados", Constantes :: AlertaPerigo);

                return;
            } else {

                set_param_sessao(Constantes :: NomeCookie, $dadosLogin -> nome);
                set_param_sessao(Constantes :: LoginCookie, $dadosLogin -> prontuario);
                set_param_sessao(Constantes :: TipoUsuario, $dadosLogin -> tipoUsuario);
                set_param_sessao(Constantes :: CaminhoFotoPerfil, $dadosLogin -> nomeArquivoFoto);
                if ($lembrarDaSessao == true) {
                    set_param_sessao(Constantes :: LembrarDaSessao, true);
                }
                // $tokenLogin
                
                // set_param_sessao(TokenLogin, $tokenLogin);
                $this -> logger -> logaMesg(json_encode($dadosLogin));
                $this -> logger -> logaMesg("****-> " . "../../" . $dadosLogin -> tipoUsuario);
                $this->redirecionaParaPagina(200, "../../" . $dadosLogin -> tipoUsuario);
            }

        }

        public function possuiPermissao($tela) {

            if(!isset($_SESSION[Constantes :: LoginCookie])) {
                $this -> redirecionaParaPagina(401, "../../erro/unauthorized.php");
                return;
            }


            $prontuarioUsuario = $_SESSION[Constantes :: LoginCookie];

            $permissoes = $this -> usuarioDAO -> getPermissoes($prontuarioUsuario);

            if (!isset($permissoes))
                return null;

            if (!in_array($tela, $permissoes))
                $this -> redirecionaParaPagina(401, "../../erro/unathorized.php");
            
        }

    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuarioService = new UsuarioService();

        $prontuarioLogin = $_POST["prontuario"];
        $senhaLogin = $_POST["senha"];

        $lembrarSessao = false; 
        //($_POST["lembrarSessao"]? $_POST["lembrarSessao"] : "false") === "true"
        $usuarioService = new UsuarioService();
        
        $usuarioService -> fazerLogin($prontuarioLogin, $senhaLogin, $lembrarSessao);

    }

?>