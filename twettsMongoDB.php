
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
