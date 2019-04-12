const express = require('express');
const router = express.Router();

router.post('/', (req, res) => {
    const login = req.body.loginJSON;
    const senha = req.body.senhaJSON;
    console.log(login);
    if(login == undefined || login == "" || senha == undefined || senha ==""){
        console.log("Login e senha não podem estar vazios!!");
        return false;
    }

    

    console.log(login);
    console.log(senha);
    res.status(200).send();
});

router.post('/', (req, res) => {

});

module.exports = router;