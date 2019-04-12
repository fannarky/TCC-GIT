
const express = require('express');
const app = express();
const router = express.Router();


//Rotas
const index = require('./routes/index');
const personRoute = require('./routes/personRoute');
const user = require('./routes/usuario');


app.use(express.json());
app.use('/', index);
app.use('/persons', personRoute);
app.use('/usuario', user);

module.exports = app;