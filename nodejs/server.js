//ARCHIVO DE SERVER PARA REALIZAR CONEXION A LA BD Y AL SERVIDRO NODEJS
var express = require('express'),//IMPORTAMOS LIBRERIAS
 mongoose=require('mongoose'),
 app = express();

//conexion a la BD
 mongoose.connect('mongodb://localhost/TwettsDB',function(err, res){
 	if(err) console.log('ERROR: Conectando a la BD: ' + err);
 	else console.log('Conexion a la BD realizada');
 });
 
//verificacion de conexion
app.get('/',function(req,res) {
res.send('SERVIDOR NODE.JS CORRIENDO');
});
require('./routers')(app);

app.listen(5000);
console.log('servidor node.js escuchando en el puerto 5000');
