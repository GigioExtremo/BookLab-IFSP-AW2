<?php

    function cria_cookie($nome_cookie, $valor_cookie, $duracao_cookie = 1, $tipo_tempo = null)
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

        setcookie($nome_cookie, $valor_cookie, $duracao_cookie_calculado);
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

    function set_valor_cookie($nome_cookie, $valor_cookie)
    {
        $constantes = new Constantes();

        if (isset($_COOKIE[$nome_cookie])) {
            $cookie = json_decode($_COOKIE[$nome_cookie]);
            $duracao_cookie_calculado = $cookie -> expiry;

            setcookie($nome_cookie, $valor_cookie, $duracao_cookie_calculado);

            return true;
        } else {
            return $constantes :: CookieUndefined;
        }
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
?>
