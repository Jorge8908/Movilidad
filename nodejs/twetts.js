//CREACION DE LA BD A ALMACENAR LOS TWETTS ,SE ALMACENAN LOS DATOS MAS IMPORTANTES 
//DEFINIDOS PARA EL USO DEL USUARIO
var mongoose=require('mongoose'),
Schema=mongoose.Schema;

//creamos el esquema de la BD
Twetts = new mongoose.Schema({
	id_tweet:Number,
    tweet:String,
    rts:String,
    favs:Number,
    fecha_creacion:String,
    usuario:String,
    url_imagen:String,
    followers:Number,
    following:Number,
    num_tweets:Number
},{collection : 'twettsMovilidad'});//indicamos cual es la coleccion a acceder

//añadimos el schema al modelo
Twetts= mongoose.model('tweets',Twetts);
