//creacion de los metodos que hara uso el servicio restfull

module.exports= function(app){

		
    var TwettsBD = require('./twetts');

		//GET
		findAllTwetts = function(req, res) {
		Twetts.find(function(err, twetts){
			if(!err) res.send(twetts);
			else console.log('ERROR:' +err);
		})
		};

		//GET BY ID
		findByID = function(req, res){
		Twetts.findById(req.params.id, function(err, twetts){
			if(!err) res.send(twetts);
			else console.log('ERROR:' +err);
		});
		};

		

		//DELETE
		deleteTwetts =function(req, res){
		Twetts.findById(req.params.id, function(err, twetts){
		twetts.remove(function(err){
		if(!err) console.log('Twett Borrado!');
			else console.log('ERROR:' +err);	
				})
			});
		}

		//API routers
		app.get('/twetts', findAllTwetts);
		app.get('/twetts/:id', findByID);
		//app.post('/twetts', addTwett);
		//app.get('/twetts', updateTwett);
		app.delete('/twetts/:id', deleteTwetts);
	
}
