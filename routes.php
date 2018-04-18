<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->post('/api/v1/login', function (Request $request, Response $response) {
		$result='';
		$data = $request->getParsedBody();

	$cnn = getConnexion('jungle');
	$res = $cnn->prepare('SELECT * FROM `tbl_users` WHERE users_email = :email AND users_pass = :password');
	$res->bindParam(':email', $data['email'], PDO::PARAM_STR);
    $res->bindParam(':password', $data['password'], PDO::PARAM_STR);
    $res->execute();
     if($res->rowCount())
          {
			 $result="true";	
          }  
          elseif(!$res->rowCount())
          {
			  	$result="false";
          }
		  
		  // send result back to android
   		  echo $result;
	
});


$app->post('/api/v1/register', function (Request $request, Response $response) {
$result='';
$data = $request->getParsedBody();

 $cnn = getConnexion('jungle');
 
    $res = $cnn->prepare("INSERT INTO tbl_users (users_name, users_email, users_pass) 
    VALUES (:name, :email, :password)");
    $res->bindParam(':name', $data['name'], PDO::PARAM_STR);
    $res->bindParam(':email', $data['email'], PDO::PARAM_STR);
    $res->bindParam(':password', $data['password'], PDO::PARAM_STR);
 $res->execute();
     if($res->rowCount())
          {
			 $result="true";	
          }  
          elseif(!$res->rowCount())
          {
			  	$result="false";
          }
		  
		  // send result back to android
   		  echo $result;
	
});


