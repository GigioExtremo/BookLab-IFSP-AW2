<?php

    function cria_cookie($nome_cookie, $valor_cookie, $duracao_cookie = 1, $tipo_tempo = null)
    {
        set_valor_cookie($nome_cookie, $valor_cookie, $duracao_cookie, $tipo_tempo);
    }

    function get_tempo_calc_cookie($duracao_cookie = 1, $tipo_tempo = null) {

        $tipo_tempo = isset($tipo_tempo) ? $tipo_tempo : Constantes :: DiasCookie;
        $duracao_cookie_calculado = time();

        switch ($tipo_tempo) {
            case 1:
                $duracao_cookie_calculado += $duracao_cookie * 30;
                break;
            case 2:
                $duracao_cookie_calculado += ($duracao_cookie * 60) * 30;
                break;
            case 3:
                $duracao_cookie_calculado += ($duracao_cookie * 3600) * 30;
                break;
            case 4:
                $duracao_cookie_calculado += ($duracao_cookie * 86400) * 30;
                break;
        }
    }

    function get_valor_cookie($nome_cookie)
    {
        $constantes = new Constantes();

        if (isset($_COOKIE[$nome_cookie])) {
            return $_COOKIE[$nome_cookie];
        } else {
            return $constantes :: CookieUndefined;
        }
    }

    function set_valor_cookie($nome_cookie, $valor_cookie, $duracao_cookie = 1, $tipo_tempo = null)
    {
        if (isset($_COOKIE[$nome_cookie])) 
            unset($_COOKIE[$nome_cookie]);

        setcookie($nome_cookie, $valor_cookie, get_tempo_calc_cookie($duracao_cookie, $tipo_tempo), '/');
    }

    function set_duracao_cookie($nome_cookie, $duracao_cookie = 1, $tipo_tempo = null)
    {
        $constantes = new Constantes();
        $tipo_tempo = isset($tipo_tempo) ? $tipo_tempo : $constantes :: DiasCookie;
        $duracao_cookie_calculado = time();

        switch ($tipo_tempo) {
            case 1:
                $duracao_cookie_calculado += $duracao_cookie * 30;
                break;
            case 2:
                $duracao_cookie_calculado += ($duracao_cookie * 60) * 30;
                break;
            case 3:
                $duracao_cookie_calculado += ($duracao_cookie * 3600) * 30;
                break;
            case 4:
                $duracao_cookie_calculado += ($duracao_cookie * 86400) * 30;
                break;
        }

        if (isset($_COOKIE[$nome_cookie])) {
            setcookie($nome_cookie, $_COOKIE[$nome_cookie], $duracao_cookie_calculado);
            return true;
        } else {
            return $constantes :: CookieUndefined;
        }
    }

    function delete_cookie($nome_cookie)
    {
        setcookie($nome_cookie, "", time() - 3600);
    }

    function getDominioLocalhost() {
        if ( isset($_SERVER['HTTP_HOST']) ) {
            // Get domain
            $dom = $_SERVER['HTTP_HOST'];
            // Strip www from the domain
            if (strtolower(substr($dom, 0, 4)) == 'www.') { $dom = substr($dom, 4); }
            // Check if a port is used, and if it is, strip that info
            $uses_port = strpos($dom, ':');
            if ($uses_port) { $dom = substr($dom, 0, $uses_port); }
            // Add period to Domain (to work with or without www and on subdomains)
            $dom = '.' . $dom;
        } else {
            $dom = false;
        }
        return $dom;
     }
?>
