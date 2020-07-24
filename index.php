<?php
//include "header.php";
    require "functions.php";


$routes= [
          

          '/'=> ['GET' =>'home.php'],

 
          
	      '/turnaje'=>['GET'=>'turnaje.php',   
	                'POST'=>'add_turnaj.php'],         


          
	      '/register'=>['GET'=>'register.php',   
	                'POST'=>'register.php'],         

          
          
	      '/login'=>['GET'=>'login.php',   
	                'POST'=>'login.php'],         

          
	      '/logout'=>['GET'=>'logout.php',  
	                'POST'=>'logout.php'],        


	       
	      '/domov'=>['GET'=>'domov.php',   
	                'POST'=>'domov.php'],                  

          
	      '/listina'=>['GET'=>'listina.php',   
	                'POST'=>'listina.php'],         


	      '/listina/turnaje'=>['GET'=>'turnaje.php',   
	                'POST'=>'turnaje.php'],        
	                        

          
	      '/vysledky'=>['GET'=>'vysledky.php',  
	                'POST'=>'vysledky.php'],         

	       
	      '/vysledkydetail'=>['GET'=>'vysledky1.php',   
	                'POST'=>'vysledky1.php'],         

	                
	   
	             
	      '/edit'=>['GET'=>'edit.php',   
	                'POST'=>'edit_new.php'],        


         
	      '/delete'=>['GET'=>'delete.php',   
	                'POST'=>'delete_new.php'],         
          

	      
	      '/hraci'=>['GET'=>'hraci.php',  
	                  'POST'=>'hraci.php'],          

           
	      '/hrac'=>['GET'=>'hrac.php',  
	                  'POST'=>'hrac.php'],          

          
	      '/hracvysledky'=>['GET'=>'hrac_vysledky.php',  
	                  'POST'=>'hrac_vysledky.php'],          
	  ];

$page= segment(1);
$method= $_SERVER['REQUEST_METHOD'];

/*
echo '<pre>';
print_r($method);
echo '</pre>';
*/

if(!isset($routes["/$page"][$method])){
  echo '404 stranka nenajdena';
}

require $routes["/$page"][$method];


 /*
echo '<pre>';
print_r(segmenty());
echo '</pre>';

echo '<pre>';
print_r(BASE_URL);
echo '</pre>';
*/
 ?>