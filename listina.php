<?php 
include 'header.php'
 ?>
 <div class="zarovnaj">
  <h3>Detail usporiadatela TL pre rok 2020</h3>
 </div>

<?php 
  function get_post($id=0){
  //we have no id
  if(!$id AND !$id=segment(2)){   //ak nemam ziadne id a zaroven sa nam nepodari zistit id z druheho segmetnu
    return false;
  }

  global $database;

  $dotaz=$database->prepare("SELECT usporiadatel.meno_usp, usporiadatel.adresa, usporiadatel.kontakt, usporiadatel.pocet_kurtov, usporiadatel.povrch FROM usporiadatel JOIN turnaje ON turnaje.usporiadatel_id=usporiadatel.usporiadatel_id WHERE turnaje.turnaje_id= ?");

    $dotaz->execute([$id]);

    $data=$dotaz->fetch(PDO::FETCH_ASSOC);
    return $data;
 
    }

try{
  $tur=get_post();
}

catch(PDOException $e){
  //$tur= false;
  echo "Connection failed: " . $e->getMessage(); 
}



  ?>

<table>
  <thead>
  	<tr>
  		<th>Usporiadatel</th>
      <td><?php echo $tur['meno_usp']; ?></td>
    </tr>
    <tr>
  		<th>Adresa</th>
      <td><?php echo $tur['adresa']; ?></td>
    </tr>
    <tr>
  		<th>Kontakt</th>
      <td><?php echo $tur['kontakt']; ?></td>
    </tr>
    <tr>
  		<th>Pocet kurtov</th>
      <td><?php echo $tur['pocet_kurtov']; ?></td>
    </tr>  
    <tr>
      <th>Povrch</th>
      <td><?php echo $tur['povrch']; ?></td>
  	</tr>
  </thead>
  
</table>