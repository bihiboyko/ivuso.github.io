<?php
require "config.php"; 
include "header.php";

?>
<div class="zarovnaj">
  <h3>Detail oficiálnej TL pre rok 2020</h3>
 </div>
    




<?php  

     $dotaz=$database->prepare("SELECT turnaje.kategoria, turnaje.zaciatok, usporiadatel.meno_usp, turnaje.turnaje_id FROM turnaje JOIN usporiadatel ON turnaje.usporiadatel_id=usporiadatel.usporiadatel_id WHERE kategoria=? ");  //'{$_GET['kategoria']}'
     $dotaz->execute([$_GET['kategoria']]);
    if($dotaz->rowCount()){
    	$data=$dotaz->fetchAll(PDO::FETCH_ASSOC);
    
  }  
$pocet=count($data); ?>
 <p class="zarovnaj">Pocet zaznamov: <?php echo $pocet; ?></p>

    

    <table>
  <thead>
  	<tr>
  		<th>Zaciatok</th>
  		<th>Kategoria</th>
  		<th>Usporiadatel</th>
  		<th>Detail</th>
  	</tr>
  </thead>

  <?php 

  foreach($data as $tur){ 

  	?>

  <tbody>
  	<tr>
  		<td><?php echo $tur['zaciatok']; ?></td>
  		<td><?php echo $tur['kategoria']; ?></td>
  		<td><?php echo $tur['meno_usp']; ?></td>
  		<td><a href="<?php echo BASE_URL; ?>/listina/<?php echo $tur['turnaje_id'];?>">detail</a></td>
  	</tr>
  	 
  </tbody>

<?php
 }
  ?>
  
</table>

