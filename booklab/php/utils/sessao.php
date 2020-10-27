<?php
    include_once 'cookies.php';
    include_once $_SERVER["DOCUMENT_ROOT"] .  '/php/servicos/usuarioService.php';

    function inicializa_sessao($usar_cookies = true) {

        set_param_sessao("CRIACAO", time());

        if ($usar_cookies) {
            $login_cookie = get_valor_cookie(Constantes :: LoginCookie);
            // $token_login = get_valor_cookie(TokenLogin);

            if ($login_cookie != Constantes :: CookieUndefined) {
                set_param_sessao(Constantes :: LoginCookie, $login_cookie);
                // set_param_sessao(TokenLogin, $token_login);
            }
        }
    }

    function possui_permissao($tela) {
        $usuarioService = new UsuarioService();
        return $usuarioService -> possuiPermissao($tela);
    }

    function set_param_sessao($nome_param, $valor_param) {
        $_SESSION[$nome_param] = $valor_param;
    }

    function get_param_sessao($nome_param) {
        return $_SESSION[$nome_param];
    }

    function deleta_params_sessao() {
        session_unset();
    }

    function deleta_sessao() {
        session_destroy();
    }

?>
