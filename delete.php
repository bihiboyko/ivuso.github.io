<?php 
include "header.php";

?>
<div class="zarovnaj"> 
  <h1>Naozaj vymazat ?</h1>
</div>

<?php 
  function get_post($id=0){
  //we have no id
  if(!$id AND !$id=segment(2)){   //ak nemam ziadne id a zaroven sa nam nepodari zistit id z druheho segmetnu
    return false;
  }

  global $database;

  $dotaz=$database->prepare("SELECT hraci.meno, hraci.priezvisko, hraci.narodenie, hraci.klub, hraci.hraci_id FROM hraci WHERE hraci.hraci_id= ?");

    $dotaz->execute([$id]);

    $data=$dotaz->fetchAll(PDO::FETCH_ASSOC);
    return $data;

    }

try{
  $tur=get_post();
}

catch(PDOException $e){
   //$tur= false;
  echo "Connection failed: " . $e->getMessage(); 
}
foreach ($tur as $value){
	?>	
	<div class="zarovnaj">
	  <form action="delete_new.php" method="post" >
		Meno: <input disabled type="text" name="a" value="<?php echo $value['meno'] ?>">
		Priezvisko: <input disabled type="text" name="b" value="<?php echo $value['priezvisko'] ?>">
		Narodenie: <input disabled type="text" name="c" value="<?php echo $value['narodenie'] ?>">
		Klub: <input disabled type="text" name="d" value="<?php echo $value['klub'] ?>">

		      <input type="hidden" name="id" value="<?php echo $value['hraci_id'] ?> ">
        	  <input type="submit" value="delete">
	  </form>
	</div>
	<?php 
     }
	 ?>