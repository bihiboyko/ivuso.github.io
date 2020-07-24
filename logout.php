<?php 
require "header.php";

if(!login()){
	header('Location: http://localhost/etenis');
}

logout();
header('Location: http://localhost/etenis');

 ?> 