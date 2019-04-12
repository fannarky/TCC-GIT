const express = require('express');
const router = express.Router();
const Database = require('../../Database');
const config = require('../../config');

router.post('/cadastro', (req, res) => {
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
        console.log(linhas);
        res.status(200).send(resultadoQuery);
        //console.log(resultadoQuery.recordset[0].nmSenha); // método 1 para capturar dado
        //console.log(linhas[0].nmSenha); //método 2 para capturar dado
        //console.log(valido);
        const senhaBanco = linhas[0].nmSenha;
        const valido = senha === senhaBanco ? true : false;
        console.log(valido);
        
    })
    

    console.log(login);
    console.log(senha);
});

// router.post('/', (req, res) => {

// });

module.exports = router;