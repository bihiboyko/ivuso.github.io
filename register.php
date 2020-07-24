<?php 
require "config.php";
include 'header.php';


if($_SERVER['REQUEST_METHOD']==='POST'){
	$email=filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL);
	$heslo=$_POST['heslo'];
	$heslo_opak=$_POST['opakovanie'];

	$register=$auth->register($email,$heslo,$heslo_opak);
	if($register['error']) {
    // Something went wrong, display error message
    echo '<div class="error">' . $register['message'] . '</div>';
   }
	
	
}

?>
<div class="zarovnaj">
<h2>Prihlasenie do systemu</h2>

<form action="" class="registracia" method="post">
	<div class="reg">
	Prihlasovaci email: <input type="text" name="email">
	Prihlasovacie heslo: <input type="password" name="heslo">
	Prihlasovacie heslo opakovanie: <input type="password" name="opakovanie">
	

	<button type="submit">Zaregistruj sa</button> 
    </div>
	<p>
		alebo <a href="<?php echo BASE_URL ?>/login">prihlas sa</a>
	</p>
</div>



</form>