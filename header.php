<?php 
require "config.php";

function login(){
	global $auth, $config;
	return isset($_COOKIE[$config->cookie_name]) AND $auth->checkSession($_COOKIE[$config->cookie_name]);
}

function logout(){
    if(!login()) return true;

    global $auth, $config;
    return $auth->logout($_COOKIE[$config->cookie_name]);
}

$page_name=basename($_SERVER['SCRIPT_NAME'],'.php');
//if ($page_name=='index') 
	//$page_name='turnaje';

 ?>
<!DOCTYPE html>
<html>
<head>	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $page_name; ?> / etenis.sk</title>
	<link rel="stylesheet" href="<?php echo BASE_URL ?>/css/1.css">
	<script src="js/jquery-3.4.1.js"></script>
    <script src="js/script.js"></script>

</head>

<body>
	<header>
		<nav>
			<ul>
				<li><a href="turnaje">turnaje</a></li>
				<li><a href="vysledky">vysledky</a></li>
				<li><a href="hraci">hraci</a></li>
				<li><a href="login">prihlasenie</a></li>
			</ul>
		</nav>
	</header>
	<?php 
if (login()){

	
	$hash=$_COOKIE[$config->cookie_name];
	$phpauth_users=$auth->getSessionUID($hash);

	//echo '<pre>';
	//print_r($auth->getUser($phpauth_users));	
	//'</pre>';

	$tento=$auth->getUser($phpauth_users);
    echo '<div class="uprava">'. "prihlaseny: ".$tento['email'].'</div>';

	//echo '<pre>';
	//print_r($tento['email']);	
	//'</pre>';

	?>
	<span class="odhlasit">
	  <a href="<?php echo BASE_URL ?>/logout">logout</a>
	</span>
    <?php 
}
//else{
	//echo '<div class="error success">'. "odhlaseny". '</div>';
//}
  

	 ?>

</body>