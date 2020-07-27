let banco = {
    "sequencias": {
        "seqSalas": 1,
        "seqComputadores": 1,
        "seqSistemasOperacionais": 1,
        "seqSoftwares": 1,
        "seqAdministradores": 1,
        "seqTecnicos": 1,
        "seqAtendimentos": 1,
        "seqProfessores": 1,
        "seqTurmas": 1,
        "seqCursos": 1,
        "seqReservas": 1,
        "seqHorarios": 1
    },
    "salas":  
        {
            "idSala": "",
            "qtdCadeiras": ""
        }
     ,
    "computadores":  
        {
            "idComputador": "",
            "idSala": "",
            "processador": "",
            "tamMemoriaRAM": "",
            "tamMemoriaDisco": "",
            "placaDeVideo": "",
            "tamMemoriaPlacaDeVideo": ""
        }
     ,
    "sistemasOperacionais":  
        {
            "idSistemaOperacional": "",
            "nome": "",
            "versao": "",
            "bits": ""
        }
     ,
    "computadoresXsistemasOperacionais":  
        {
            "idComputador": "",
            "idSistemaOperacional": ""
        }
     ,
    "softwares":  
        {
            "idSoftware": "",
            "nomeSoftware": "",
            "versaoSoftware": "",
            "dataInicioLicenca": "",
            "dataExpiracaoLicenca": ""
        }
     ,
    "computadoresXsoftwares":  
        {
            "idComputador": "",
            "idSoftware": ""
        }
     ,
    "administradores" :  
        {
            "idAdministrador": 1,
            "prontuarioAdministrador": "SPXXXXXX",
            "nomeAdministrador": "Giovanni Dilly",
            "senhaAdministrador": "senhaAdministrador1",
            "sexoAdministrador": "M",
            "nomeArquivoFoto": "generico/generic_user_male.png"
        }
     ,
    "tecnicos":  
        {
            "idTecnico": "",
            "prontuarioTecnico": "",
            "nomeTecnico": "",
            "sexoTecnico": "",
            "senhaTecnico": "",
            "nomeArquivoFoto": ""
        }
     ,
    "atendimentos":  
        {
            "idAtendimento": "",
            "dataAtendimento": "",
            "importancia": "",
            "descricao": "",
            "status": ""
        }
     ,
    "professores":  
        {
            "idProfessor": "",
            "prontuarioProfessor": "",
            "nomeProfessor": "",
            "sexoProfessor": "",
            "senhaProfessor": "",
            "nomeArquivoFoto": ""
        }
     ,
    "turmas":  
        {
            "idTurma": "",
            "idCurso": "idCurso",
            "idProfessor": "idProfessor",
            "turnoTurma": "",
            "anoLetivo": ""
        }
     ,
    "cursos":  
        {
            "idCurso": "",
            "nomeCurso": "",
            "descricao": ""
        }
     ,
    "reservas":  
        {
            "idReserva": "",
            "dataReserva": "",
            "dataReservaEfetivo": "",
            "idProfessor": "",
            "idSala": "",
            "qtdSemanasReserva": ""
        }
     ,
    "horarios":  
        {
            "idHorario": "",
            "idReserva": "",
            "periodoInicio": "",
            "periodoTermino": "",
            "diaDaSemana": ""
        }
     
};

//-------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------

function faz_os_negocios(bancoOriginal) {
    let banco = Object.keys(bancoOriginal);
    let stringRetorno = "";

    banco.forEach(function (e) {
        let id = Object.keys(bancoOriginal[e])[0];
        //stringRetorno += "function get" + e.replace(/(^|_)./g, s => s.slice(-1).toUpperCase()) + "($id" + e.replace(/(^|_)./g, s => s.slice(-1).toUpperCase()) + ") {<br/>}<br/>"
        stringRetorno += "case \"" + e.toUpperCase() + "\": <br/>" +
                         "$nomeTabela = \"" + e + "\"; <br/>" +
                         "$nomeIdTabela = \"" + id + "\"; <br/> break; <br/><br/>";
    });

    return stringRetorno;
}

document.write(faz_os_negocios(banco));