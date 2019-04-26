const express = require('express');
const router = express.Router();
const Database = require('../../Database');
const config = require('../../config');

router.post('/login', (req, res) => {
    const login = req.body.loginJSON;
    const senha = req.body.senhaJSON;
    console.log(login);
    if(login == undefined || login == "" || senha == undefined || senha ==""){
        console.log("Login e senha não podem estar vazios!!");
        return false;
    }
    else{
        console.log("Sucesso!!");
    }
    Database.query(`Select * from TB_FUNCIONARIO where nmEmail = '${login}' `).then(resultadoQuery =>{
      
        const linhas = resultadoQuery.recordsets[0];
        req.session.id = linhas[0].IDFUNCIONARIO;
        console.log(linhas);
        res.status(200).send(resultadoQuery);
        //console.log(resultadoQuery.recordset[0].nmSenha); // método 1 para capturar dado
        //console.log(linhas[0].nmSenha); //método 2 para capturar dado
        //console.log(valido);
        const senhaBanco = linhas[0].nmSenha;
        const valido = senha === senhaBanco ? true : false;
        console.log(valido);
        
    });
    

    console.log(login);
    console.log(senha);
});

router.get('/pc', (req, res) => {
    Database.query(`Select * from TB_COMPUTADOR inner join tb_leitura_pc on tb_computador.idcomputador = tb_leitura_pc.idcomputador WHERE IDFUNCIONARIO = '${req.session.id}' `).then(resultadoQuery =>{
        
        //resultado na variavel linhas
        //em json, basta colocar o nome do campo do banco após o recordsets
        const linhas = resultadoQuery.recordsets[0];
        
        
    });
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

    if( //IDEMPRESA == "" || IDEMPRESA == undefined || 
        //IDGESTOR == null || IDGESTOR == undefined || 
        NMFUNCIONARIO == "" || NMFUNCIONARIO == undefined || 
        NMEMAIL == "" || NMEMAIL == undefined || 
        NMCARGO == "" || NMCARGO == undefined || 
        NMSENHA == "" || NMSENHA == undefined ){
            console.log('Dados incorretos, preencher corretamente!');
            return false;
        }

        criarUser(null, null, NMFUNCIONARIO, NMEMAIL, NMCARGO, NMSENHA)
});

    function existeUsuario(emailFuncionario){
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

    function criarUser(IDEMPRESA, IDGESTOR, NMFUNCIONARIO, NMEMAIL, NMCARGO, NMSENHA){
        return new Promise((resolve, reject) => {
            existeUsuario(NMEMAIL).then(existe => {
                if(!existe){
                    //INSERT INTO TB_USUARIO(IDEMPRESA, IDGESTOR, NMFUNCIONARIO, NMEMAIL, NMCARGO, NMSENHA
                    Database.query(`INSERT INTO TB_FUNCIONARIO(NMFUNCIONARIO, NMEMAIL, NMCARGO, NMSENHA)
                    VALUES ('${NMFUNCIONARIO}', '${NMEMAIL}', '${NMCARGO}', '${NMSENHA}')`).then(results =>{
                        resolve(results);
                    }).catch(error => {
                        reject(error);
                    });
                }else{
                    console.log(`Usuario com o email ${NMEMAIL} já cadastrado.`);
                }
            }).catch((error) =>{
                reject(error);
            });
        }); 
    }
module.exports = router;