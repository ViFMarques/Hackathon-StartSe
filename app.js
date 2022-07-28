const express = require('express');
const PORT = process.env.PORT || 3000;
const cors = require('cors');

//teste


const app = express();

const rotaExemplo = require('./routes/rota_exemplo.js');
const rotaInicio = require('./routes/rota_inicio.js');
const rotaUsuario = require('./routes/usuarios.js');

app.use(express.json());
app.use(cors());
app.options('*', cors());

app.listen(PORT, () =>{
    console.log(`Servidor rodando em http://localhost:${PORT}`);
});

app.use((res,req,next) => {
    res.header('Access-Control-Allow-Origin', '*')
    next();
});

app.use('/', rotaInicio);
app.use('/exemplo', rotaExemplo);
app.use('/usuarios', rotaUsuario);

module.exports = app;