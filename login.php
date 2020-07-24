<?php 
require "config.php";
include 'header.php';


if($_SERVER['REQUEST_METHOD']==='POST'){
	$username=filter_input(INPUT_POST,'username', FILTER_SANITIZE_EMAIL);
	$heslo=$_POST['heslo'];
	$pamataj=$_POST['check'];

	$register=$auth->register($username,$heslo,$pamataj);
	//echo '<pre>';
	//print_r($register);
	//echo '</pre>';

	$login = $auth->login($_POST['username'], $_POST['heslo'], $_POST['check']);

    if($login['error']) {
    // Something went wrong, display error message
    echo '<div class="error">' . $login['message'] . '</div>';
   } else {
    // Logged in successfully, set cookie, display success message
   setcookie(
   	$config->cookie_name, 
   	$login['hash'], 
   	$login['expire'], 
   	$config->cookie_path, 
   	$config->cookie_domain, 
   	$config->cookie_secure, 
   	$config->cookie_http);
    header('Location: http://localhost/etenis');
    exit();
    echo '<div class="error success">' . $login['message'] . '</div>';
    
}
}

?>
<div class="zarovnaj">
 <h2>Prihlasenie do systemu</h2>

<form action="" class="registracia" method="post">
	<div class="reg">
	Prihlasovaci email: <input type="email" name="username">
	Prihlasovacie heslo: <input type="password" name="heslo">
	Zapamataj si ma: <input type="checkbox" name="check" checked>

	<button type="submit">Login</button> 
    </div>
	<p>
		alebo <a href="<?php echo BASE_URL ?>/register">zaregistruj sa</a>
	</p>
</div>



</form>