<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/constantes.php';
    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/sessao.php';
    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/cookies.php';
    include_once $_SERVER["DOCUMENT_ROOT"] . '/php/utils/logger.php';

    if(!isset($_SESSION)) session_start();
    inicializa_sessao();

    class AlertaService {

        public static function registraAlerta($nomeErro, $mensagemAlerta, $tipoAlerta = 'I') {
            if (!isset($_SESSION[Constantes :: AlertasAtuais]))
                $_SESSION[Constantes :: AlertasAtuais] = [];

            $alertas = $_SESSION[Constantes :: AlertasAtuais];
            
            // $logger = new LoggerBooklab();
            // $logger -> sequenciaLigada(true);
            // $logger -> escreveTimestamp();

            $alertas[$nomeErro] = self :: criaObjetoAlerta($mensagemAlerta, $tipoAlerta);

            set_param_sessao(Constantes :: AlertasAtuais, $alertas);

        }

        public static function retiraAlerta($nomeAlerta) {
            $alertas = get_param_sessao(Constantes :: AlertasAtuais);

            unset($alertas[$nomeAlerta]);

            set_param_sessao(Constantes :: AlertasAtuais, $alertas);
        }

        public static function criaElemAlerta($nomeAlerta) {
            $alertas = get_param_sessao(Constantes :: AlertasAtuais);
            $mensagem = $alertas[$nomeAlerta]["mensagem"];
            $tipoAlerta = $alertas[$nomeAlerta]["tipoAlerta"];
            $div = <<< DIV
                <div class="alert alert-{$tipoAlerta}">
                    <strong>Erro!</strong> {$mensagem}
                </div>
            DIV;

            return $div;
        }

        public static function resetaAlertas() {
            set_param_sessao(Constantes :: AlertasAtuais, []);
        }

        public static function criaObjetoAlerta($mensagemAlerta, $tipoAlerta) {
            $objAlerta = "{" .
                         '   "mensagem" : "' . $mensagemAlerta . '",' .
                         '   "tipoAlerta" : "' .  self :: getNomeTipoAlerta($tipoAlerta) . '"' .
                         '}';

            return json_decode($objAlerta, true);
        }

        public static function getNomeTipoAlerta($tipoAlerta) {
            switch($tipoAlerta) {
                case Constantes :: AlertaSucesso:
                    return "success"; break;
                case Constantes :: AlertaInformacao:
                    return "info"; break;
                case Constantes :: AlertaAviso:
                    return "info"; break;
                case Constantes :: AlertaPerigo:
                    return "danger"; break;
                case Constantes :: AlertaPrimario:
                    return "primary"; break;
                case Constantes :: AlertaSecundario:
                    return "secondary"; break;
                case Constantes :: AlertaEscuro:
                    return "dark"; break;
                case Constantes :: AlertaClaro:
                    return "light"; break;
                
                default:
                    return null;
            }
                 
        }
    }

?>