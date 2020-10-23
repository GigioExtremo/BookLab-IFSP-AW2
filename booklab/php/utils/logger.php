<?php

class LoggerBooklab {
    private $urlLog;
    private $sequenciaLigada = false;
    private $sequencia = 1;

    public function __construct()
    {
        $this -> urlLog = $_SERVER["DOCUMENT_ROOT"] . "/api/log.txt";
    }

    public function escreveTimestamp($timezone = "America/Sao_Paulo") {
        date_default_timezone_set ($timezone);
        $logArquivo = fopen($this -> urlLog, "a") or die("Não é possível abrir o log!"); 
        $stringTimeStamp = "------> " . date("d/m/Y - H:i:s e") . "\n";
        fwrite($logArquivo, $stringTimeStamp);
        fclose($logArquivo); 
    }

    public function sequenciaLigada($ligar = true) {
        $this -> sequenciaLigada = $ligar;
    }

    public function resetarSequencia($comecaDo = 0) {
        $logArquivo = fopen($this -> urlLog, "a") or die("Não é possível abrir o log!"); 
        fwrite($logArquivo, "=============\n");
        fclose($logArquivo); 

        $this -> sequencia = $comecaDo;
    }

    public function logaMesg($mensagem, $eof = true) {
        $logArquivo = fopen($this -> urlLog, "a") or die("Não é possível abrir o log!"); 

        $mensagemFinal = "";
        if ($this -> sequenciaLigada) {
            $mensagemFinal = str_pad('' . $this -> sequencia, 4, '0', STR_PAD_LEFT) . " ";
            ++$this -> sequencia;
        }
        
        $mensagemFinal .= $mensagem . ($eof? "\n" : "");

        fwrite($logArquivo, $mensagemFinal);
        fclose($logArquivo); 
    }
}

?>