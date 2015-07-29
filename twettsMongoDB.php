
<meta charset="utf-8">
<?php
//creacion de la clase tWITTER QUE TIENE LOS CREDENCIALES PARA EL USO DE LA API
//ACCESO A L API SEARCH DE TWETTER QUE RETORNARA LOS ONJETOS EN FORMATO JSON
class Twitter{
    //funcion para obtener los twetts
		 function getJsonTweets($query,$num_tweets){
         ini_set('display_errors', 1);
         require_once('TwitterAPIExchange.php');
         //credenciales
         $settings = array(
            'oauth_access_token' => "3363234647-eh1jyazkhP5eg1RN1oFwOEC19zL1M1Fjodb4Pb4",
            'oauth_access_token_secret' => "LItRFlPIfRQd9e5EvUyqXe1iXu7hGvPDg9eMiED8nd5GI",
            'consumer_key' => "AMWvzdBaiYUs6PxceLkuco1EJ",
            'consumer_secret' => "Ylp82XFaAJWeAjlXt9mMj3Q8c6m5sBcJbLn6mDs8CMckIgHY3a"
        );
		 
         if($num_tweets>50) $num_tweets = 50;
		  $url = 'https://api.twitter.com/1.1/search/tweets.json';
          $getfield = '?q='.$query.'&count='.$num_tweets;		
		  $requestMethod = 'GET';
		  $twitter = new TwitterAPIExchange($settings);
		  $json =  $twitter->setGetfield($getfield)
                     ->buildOauth($url, $requestMethod)
                     ->performRequest();

					        return $json;						
	   }


        //funcion para gaurdar los tweets en la BD
        function insertarTweetInfo(
            $id_tweet,
            $tweet,
            $rts,
            $favs,
            $fecha_creacion,
            $usuario,
            $url_imagen,
            $followers,
            $following,
            $num_tweets
         ){   
        //creamos la conexion con la BD
        $mongo = new Mongo();
        $db =$mongo->selectDB("TwettsDB");
        $c_twettsMovilidad = $mongo->selectCollection("TwettsDB","twettsMovilidad");

        $nuevoTweet = array("ID"=>$id_tweet,"TWETT"=>$tweet,"RETWETTS"=>$rts,"FAVORITOS"=>$favs,"FECHA_CREACION"=>$fecha_creacion,"USUARIO"=>$usuario,"URL_IMAGEN"=>$url_imagen,"N_MIS_SEGUIDORES"=>$followers,"N_SEGUIDORES"=>$following,"N_TWETTS_ENVIADOS"=>$num_tweets);

        $c_twettsMovilidad->insert($nuevoTweet);

        $twettsMovilidad = $c_twettsMovilidad->find();
        foreach ($twettsMovilidad as $twett){
        print_r($twett);}
        }  
}
