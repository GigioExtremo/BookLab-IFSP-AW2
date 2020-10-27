<?php

class GenericBancoObject
{
    public $nomeTabela = "";
    public $nomeIdTabela = "";
    public $corpoObjeto = "";

    function __construct(TabelasConstantes $constanteClasse, $corpoObjeto)
    {
        $this->nomeTabela = $constanteClasse->nomeTabela;
        $this->nomeIdTabela = $constanteClasse->nomeIdTabela;
        $this->corpoObjeto = $corpoObjeto;
    }

    public function getNomeSeq()
    {
        return "seq" . ucfirst($this->nomeTabela);
    }

    public function getNomeTabela()
    {
        return $this->nomeTabela;
    }

    public function getNomeIdTabela()
    {
        return $this->nomeIdTabela;
    }

    public function getCorpoObjeto()
    {
        return $this->corpoObjeto;
    }
}

class GenericoBookLabDAO
{
    private function urlBanco() {
        return $_SERVER["DOCUMENT_ROOT"] . "/api/banco_de_dados/bancoAlpha.json";
    }

    public function returnBanco()
    {
        $arquivoBanco = fopen($this -> urlBanco(), "r") or die("Não é possível abrir o arquivo!");
        $jsonBanco = fread($arquivoBanco, filesize($this -> urlBanco()));
        fclose($arquivoBanco);
        return $jsonBanco;
    }

    function mergeBancoDeDados($novoJson) {
        $arquivoBanco = fopen($this -> urlBanco(), "w+") or die("Não é possível abrir o arquivo!"); // Abrimos o arquivo
        fwrite($arquivoBanco, json_encode($novoJson, JSON_PRETTY_PRINT)); // Sobreescrevemos ele
        fclose($arquivoBanco); // E fechamos ele
    }

    function sortTabela($arrayTabela, $nomeIdTabela) {
        usort($arrayTabela, function($obj1, $obj2) use ($nomeIdTabela) {
            return $obj1[$nomeIdTabela] <=> $obj2[$nomeIdTabela];
        });
    }

    static function getObjetoDoArrayFilter($array_filtrado) {
        // Caso a busca não tenha retornado nada, retornamos nulo
        $objetoFiltrado = null;
        if (array_keys($array_filtrado) !== [])
            $objetoFiltrado = $array_filtrado[array_keys($array_filtrado)[0]];
        else 
            $objetoFiltrado = null;

        if (isset($objetoFiltrado)) {
            return $objetoFiltrado;
        } else {
            return null;
        }
    }

    public function insert(GenericBancoObject $objetoInsert)
    {
        $bancoJson = json_decode($this -> returnBanco());

        $nomeTabela = ucfirst($objetoInsert -> getNomeTabela()); // pega o nome da tabela
        $novoRegistro = $objetoInsert -> getCorpoObjeto(); //pega o novo objeto em si

        if ($objetoInsert["nomeIdTabela"] != null) { // Não for uma tabela N - N
            $proximoSequencia = $bancoJson["sequencias"][$objetoInsert -> getNomeSeq()]++; // pega o próximo id da sequência da tabela

            $novoRegistro[$objetoInsert["nomeIdTabela"]] = $proximoSequencia; // Atribue o id ao novo registro
        }
        array_push($bancoJson[$nomeTabela], $novoRegistro);

        $this -> mergeBancoDeDados($bancoJson);
    }

    //não funciona com  tabelas N - N
    public function update(GenericBancoObject $objetoUpdate)
    {
        $bancoJson = json_decode($this->returnBanco());

        $nomeTabela = ucfirst($objetoUpdate -> getNomeTabela()); // pega o nome da tabela
        $nomeIdTabela = $objetoUpdate -> getNomeIdTabela(); // pega o nome do campo que representa o id da tabela
        $registroAtualizado = $objetoUpdate -> getCorpoObjeto(); // pega o objeto atualizado em si

        // Pegando o array que representa a tabela
        // Retirando o objeto que queremos atualizar
        // Adicionamos o objeto atualizado no array 
        $arrayTabela = $bancoJson[$nomeTabela];
        $arrayTabela = array_filter($arrayTabela, function ($obj) use ($nomeIdTabela, $registroAtualizado)  {
            return $obj[$nomeIdTabela] != $registroAtualizado[$nomeIdTabela];
        });
        array_push($arrayTabela, $registroAtualizado);

        // Vamos ordenar o array pelo ID e passar ele de volta pro objeto do banco
        $bancoJson[$nomeTabela] = $this -> sortTabela($arrayTabela, $nomeIdTabela);

        $this -> mergeBancoDeDados($bancoJson);
    }

    //não funciona com  tabelas N - N
    public function delete(GenericBancoObject $objetoUpdate)
    {
        $bancoJson = json_decode($this->returnBanco());

        $nomeTabela = ucfirst($objetoUpdate -> getNomeTabela()); // pega o nome da tabela
        $nomeIdTabela = $objetoUpdate -> getNomeIdTabela(); // pega o nome do campo que representa o id da tabela
        $registroAtualizado = $objetoUpdate -> getCorpoObjeto(); //pega o objeto atualizado em si

        // Pegando o array que representa a tabela e então retiramos o objeto que queremos deletar
        $arrayTabela = $bancoJson[$nomeTabela];
        $bancoJson[$nomeTabela] = array_filter($arrayTabela, function ($obj) use ($nomeIdTabela, $registroAtualizado)  {
            return $obj[$nomeIdTabela] != $registroAtualizado[$nomeIdTabela];
        });

        // Vamos ordenar o array pelo ID e passar ele de volta pro objeto do banco
        $bancoJson[$nomeTabela] = $this -> sortTabela($arrayTabela, $nomeIdTabela);

        $this -> mergeBancoDeDados($bancoJson);
    }

    // function getSequencia($idSequencia)
    // {
    // }

    // function getSala($idSala)
    // {
    // }

    // function getComputadores($idComputador)
    // {
    // }

    // function getSistemaOperacionais($idSistemaOperacional)
    // {
    // }

    // function getComputador_X_SistemaOperacional($idComputador, $idSistemaOperacional)
    // {
    // }

    // function getSoftwares($idSoftware)
    // {
    // }

    // function getComputador_X_Software($idComputador, $idSoftware)
    // {
    // }

    // function getTecnico($idTecnico)
    // {
    // }

    // function getAtendimento($idAtendimento)
    // {
    // }

    // function getProfessores($idProfessor)
    // {
    // }

    // function getTurma($idTurma)
    // {
    // }

    // function getCurso($idCurso)
    // {
    // }

    // function getReserva($idReserva)
    // {
    // }

    // function getHorario($idHorario)
    // {
    // }
}
