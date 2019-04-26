const express = require('express');
const router = express.Router();
const Database = require('../../Database');
const config = require('../../config');

router.post('/login', (req, res) => {
    const login = req.body.loginJSON;
    const senha = req.body.senhaJSON;
    console.log(login);
    if (login == undefined || login == "" || senha == undefined || senha == "") {
        console.log("Login e senha não podem estar vazios!!");
        return false;
    }
    else {
        console.log("Sucesso!!");
    }
    Database.query(`Select * from TB_FUNCIONARIO where nmEmail = '${login}' `).then(resultadoQuery => {
        const linhas = resultadoQuery.recordsets[0];
        console.log(linhas);
        res.status(200).send(resultadoQuery);
        //console.log(resultadoQuery.recordset[0].nmSenha); // método 1 para capturar dado
        //console.log(linhas[0].nmSenha); //método 2 para capturar dado
        //console.log(valido);
        const senhaBanco = linhas[0].nmSenha;
        const valido = senha === senhaBanco ? true : false;
        let user = {
            nome = linhas[0].nmFuncionario,
            idGestor = linhas[0].idGestor
        }
        req.session.user = user;
        console.log(valido);

    })


    console.log(login);
    console.log(senha);
});

router.post('/cadastro', (req, res) => {

    //dados para cadastro do funcionario

    const IDEMPRESA = req.body.idEmpresa;
    const IDGESTOR = req.body.idGestor;
    const NMFUNCIONARIO = req.body.nmFuncionario;
    const NMEMAIL = req.body.email;
    const NMCARGO = req.body.cargo;
    const NMSENHA = req.body.senha;

    console.log(IDEMPRESA);
    console.log(IDGESTOR);
    console.log(NMFUNCIONARIO);
    console.log(NMEMAIL);
    console.log(NMCARGO);
    console.log(NMSENHA);

    if ( //IDEMPRESA == "" || IDEMPRESA == undefined || 
        //IDGESTOR == null || IDGESTOR == undefined || 
        NMFUNCIONARIO == "" || NMFUNCIONARIO == undefined ||
        NMEMAIL == "" || NMEMAIL == undefined ||
        NMCARGO == "" || NMCARGO == undefined ||
        NMSENHA == "" || NMSENHA == undefined) {
        console.log('Dados incorretos, preencher corretamente!');
        return false;
    }

    criarUser(null, NMFUNCIONARIO, NMEMAIL, NMCARGO, NMSENHA);
});

router.get('/funcionarios', (res, req) =>{

    //necessário dados no banco de dados para verificar se está funcionando
    getFuncionariosPCs(req.session.user.idGestor).then((resultado) =>{
        console.log(resultado);
    });

});

router.get('/apis', (res, req) => {
    
    //necessário dados no banco de dados para verificar se está funcionando
    // return new Promise((resolve, reject) => {
    //     Database.query("SELECT * FROM TB_FUNCIONARIO "+
    //         +"INNER JOIN FUNCIONARIO_API ON TB_FUNCIONARIO.IDFUNCIONARIO = FUNCIONARIO_API.IDFUNCIONARIO "+
    //         +    "INNER JOIN TB_API ON FUNCIONARIO_API.IDAPI = TB_API.IDAPI").then(resultado => {
    //             console.log(resultado);
    //         });
        
    // });


        
});

function getFuncionariosPCs(IDGESTOR){
    //caso seja necessário adicionar os registros de leitura do computador, adicionar a linha abaixo ao where.
    //INNER JOIN TB_LEITURA_PC ON TB_COMPUTADOR.IDCOMPUTADOR = TB_LEITURA_PC.IDCOMPUTADOR 
    let string = `SELECT * FROM TB_FUNCIONARIO
                     INNER JOIN TB_COMPUTADOR ON TB_FUNCIONARIO.IDFUNCIONARIO = TB_COMPUTADOR.IDFUNCIONARIO WHERE IDGESTOR = ${IDGESTOR}`;
    return new Promise((resolve, reject) => {
        Database.query(string).then(resultado => {
            //console.log(resultado.recordset);
            resolve(resultado.recordset);
        }).catch(erro => {
            console.log(erro);
        });
    });
}

function existeUsuario(emailFuncionario) {
    let querystring = `SELECT * FROM TB_FUNCIONARIO WHERE NMEMAIL = '${emailFuncionario}'`;
    return new Promise((resolve, reject) => {
        Database.query(querystring).then(results => {
            const existe = results.rowsAffected > 0 ? true : false;
            resolve(existe);
        }).catch(error => {
            reject(error);
        });
    });
}

function criarUser(IDEMPRESA, NMFUNCIONARIO, NMEMAIL, NMCARGO, NMSENHA) {
    return new Promise((resolve, reject) => {
        existeUsuario(NMEMAIL).then(existe => {
            if (!existe) {
                //INSERT INTO TB_USUARIO(IDEMPRESA, IDGESTOR, NMFUNCIONARIO, NMEMAIL, NMCARGO, NMSENHA
                Database.query(`INSERT INTO TB_FUNCIONARIO(NMFUNCIONARIO, NMEMAIL, NMCARGO, NMSENHA)
                    VALUES ('${NMFUNCIONARIO}', '${NMEMAIL}', '${NMCARGO}', '${NMSENHA}')`).then(results => {
                    resolve(results);
                }).catch(error => {
                    reject(error);
                });
            } else {
                console.log(`Usuario com o email ${NMEMAIL} já cadastrado.`);
            }
        }).catch((error) => {
            reject(error);
        });
    });
}



module.exports = router;