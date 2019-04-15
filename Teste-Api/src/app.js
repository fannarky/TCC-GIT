
const express = require('express');
const app = express();
const router = express.Router();


//Rotas
const index = require('./routes/index');
const personRoute = require('./routes/personRoute');
const dev = require('./routes/desenvolvedor');


app.use(express.json());
app.use('/', index);
app.use('/persons', personRoute);
app.use('/dev', dev);

module.exports = app;