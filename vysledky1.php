<?php 

include "header.php";
?>
<div class="zarovnaj">
 <h3>Vysledky detail</h3>
</div>
<?php

  function get_post($id=0){
  //we have no id
  if(!$id AND !$id=segment(2)){   //ak nemam ziadne id a zaroven sa nam nepodari zistit id z druheho segmetnu
    return false;
  }

  global $database;

  $dotaz=$database->prepare("SELECT vysledky.vysledok_1kolo, vysledky.vysledok_semi, vysledky.vysledok_finale FROM vysledky JOIN turnaje ON vysledky.turnaje_id=turnaje.turnaje_id WHERE turnaje.turnaje_id= ?");

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

  
foreach ($tur as $value) {
  ?>

<table>
  <thead>
    <tr>
      <th>Vysledky 1.kolo</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php echo $value['vysledok_1kolo']; ?></td>
    </tr>
  </tbody>
</table>

<table>
  <thead>
    <tr>
      <th>Vysledky Semifinale</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php echo $value['vysledok_semi']; ?></td>
    </tr>
  </tbody>
</table>

<table>
  <thead>
    <tr>
      <th>Vysledky Finale</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php echo $value['vysledok_finale']; ?></td>
    </tr>
  </tbody>
</table>
       

<?php 
}
 ?>
 