<?php 
   include 'header.php';
   
 ?>
 <div class="zarovnaj">
   <h2>Karta hraca</h2>
 </div>


<?php 
  function get_post($id=0){
  //we have no id
  if(!$id AND !$id=segment(2)){   //ak nemam ziadne id a zaroven sa nam nepodari zistit id z druheho segmetnu
    return false;
  }

  global $database;

  $dotaz=$database->prepare("SELECT turnaje.zaciatok, turnaje.kategoria, usporiadatel.meno_usp, vysledky_riadok.vysledok_prvekolo, vysledky_riadok.vysledok_semifinale, vysledky_riadok.vysledok_finale  FROM hraci JOIN hraci_turnaje_vysledky ON hraci.hraci_id=hraci_turnaje_vysledky.hraci_id JOIN turnaje ON turnaje.turnaje_id=hraci_turnaje_vysledky.turnaje_id JOIN vysledky_riadok ON vysledky_riadok.vysledky_riadok_ID=hraci_turnaje_vysledky.vysledky_riadok_ID JOIN usporiadatel ON turnaje.usporiadatel_id=usporiadatel.usporiadatel_id WHERE hraci.hraci_id= ?");

    $dotaz->execute([$id]);

    $data=$dotaz->fetchAll(PDO::FETCH_ASSOC);
    return $data;


   
    }

try{
  $tur=get_post();
}

catch(PDOException $e){
  $tur= false;
}


    ?>
<!--
<table class='hrac'>
  	<tr>
  		<th>Meno</th>
      <td><?php echo $tur['meno']; ?></td>
    </tr>

    <tr>
  		<th>Priezvisko</th>
      <td><?php echo $tur['priezvisko']; ?></td>
    </tr>

    <tr>
  		<th>Narodenie</th>
      <td><?php echo $tur['narodenie']; ?></td>
    </tr>

    <tr>
  		<th>Klub</th>
      <td><?php echo $tur['klub']; ?></td>
  	</tr>
</table>
-->
<?php  
foreach ($tur as $value) {
  ?>
<div class="zarovnaj">
  <table class='hrac'>
    <tr>
      <th>Zaciatok</th>
      <th>Kategoria</th>
      <th>Usporiadatel</th>
      <th>Vysledok 1.kolo</th>
      <th>Vysledok semifinale</th>
      <th>Vysledok finale</th>
    </tr>

    <tr>
      <td><?php echo $value['zaciatok']; ?></td>
      <td><?php echo $value['kategoria']; ?></td>
      <td><?php echo $value['meno_usp']; ?></td>
      <td><?php echo $value['vysledok_prvekolo']; ?></td>
      <td><?php echo $value['vysledok_semifinale']; ?></td>
      <td><?php echo $value['vysledok_finale']; ?></td>
    </tr>

    <br>
    <br>
  </table>
</div>

<?php 
}
 ?>
   



      