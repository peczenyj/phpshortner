<?php
  require_once './vendor/autoload.php';
  require_once './url_shortner.php';

  $app = new \Slim\Slim();
  
  $app->put('/add/:url', function($url) use ($app){
    $s = new Shortener();
    $short = $s->shortUrl($url);
		
		$res = $app->response();
		$res['Content-Type'] = 'application/json';
		$res->write(json_encode($short));
  });
  
  $app->get('/:id', function($id) use ($app){
    $s = new Shortener();
		try {
			$url = $s->expandUrl($id);
			$app->redirect($url);
		}catch(Exception $e){
			$app->response()->status(404);
		}
  });
  
  $app->run();