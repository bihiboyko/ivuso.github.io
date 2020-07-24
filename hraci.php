<?php 
   include 'header.php';

   $hash=$_COOKIE[$config->cookie_name];
   $phpauth_users=$auth->getSessionUID($hash);
   $tento=$auth->getUser($phpauth_users);

?>

 <div class="zarovnaj">
  <h2>Karty hracov - vyhladavanie</h2>
 	 <form action="<?php echo BASE_URL; ?>/hraci/">
 		Priezvisko a meno hráča: <input type="text" name="hladaj">
 		<input type="submit" value="hladat hraca">
 	 </form>
 </div>
<?php  

$sql=$database->query("SELECT * FROM hraci WHERE priezvisko LIKE '%".$_GET['hladaj']."%' OR meno LIKE '%".$_GET['hladaj']."%' ");
if($sql->rowCount()){
$dat=$sql->fetchAll(PDO::FETCH_ASSOC);
}
else{
	echo '<br>'; ?>
  <div class="zarovnaj">
    <?php  
	echo 'neboli najdene ziadne data'; ?>
   </div>
   <?php 
  die();
}

     ?>

<p class="zarovnaj">Pocet zaznamov: <?php echo count($dat)?></p>

<table>
  <thead>
  	<tr>
  		<th>Meno</th>
  		<th>Priezvisko</th>
  		<th>Narodenie</th>
  		<th>Klub</th>
  		<th>Detail hraca</th>
  		<?php if($tento['id']==2) :?>
  		<th>Edit</th>
  		<th>Vymazanie</th>
  		 <?php endif	?>
  	</tr>
  </thead>

  <?php 

  foreach($dat as $tur){ 

  	?>
 
  <tbody>
  	<tr>
  		<td><?php echo $tur['meno']; ?></td>
  		<td><?php echo $tur['priezvisko']; ?></td>
  		<td><?php echo $tur['narodenie']; ?></td>
  		<td><?php echo $tur['klub']; ?></td>
  		<td><a href="<?php echo BASE_URL; ?>/hrac/<?php echo $tur['hraci_id'];?>">Odohrane turnaje</a></td>
  		<?php if($tento['id']==2) :?>

  		<td><a href="<?php echo BASE_URL; ?>/edit/<?php echo $tur['hraci_id'];?>">Edit</a></td>
  		<td><a href="<?php echo BASE_URL; ?>/delete/<?php echo $tur['hraci_id'];?>">Delete</a></td>
  	    <?php endif	?>
  		
  	
  	</tr>
  	 
  </tbody>

<?php

 }
  ?>
  
</table>
</div>  



