const express = require('express');
const router = express.Router();


router.get('/', function (req, res, next) {
    res.status(200).send({
        title: "Node Express API",
        version: "0.0.1"
    });
});

router.post('/postado', (req, res) => {
    //JSON.stringify(req.body);
    console.log(req.params);
    console.log(req.body.login);
    res.status(200).send(`hello, ${req.body.login}, ${req.header('Content-Type')}`);
});


module.exports = router;