<h2>Odohrane turnaje</h2>

<?php 

function get_second($id=0, $auto_format = true){
  //we have no id
  if(!$id AND !$id=segment(2)){   //ak nemam ziadne id a zaroven sa nam nepodari zistit id z druheho segmetnu
    return false;
  }
  global $database;


    $dotaz=$database->prepare("SELECT turnaje.kategoria, turnaje.zaciatok, usporiadatel.meno_usp FROM turnaje JOIN usporiadatel ON turnaje.usporiadatel_id=usporiadatel.usporiadatel_id WHERE turnaje.turnaje_id= ?");

    $dotaz->execute([$id]);

    $data=$dotaz->fetchAll(PDO::FETCH_ASSOC);
    return $data;
 
}
   
    
try{
  $tur=get_second();
}

catch(PDOException $e){
  $tur= false;
}
    

  ?>

<table>
  <thead>
    <tr>
      <th>Zaciatok</th>
      <th>Kategoria</th>
      <th>Usporiadatel</th>
      <th>Vysledok</th>
    </tr>
  </thead>


  <tbody>
    <tr>
      <td><?php echo $tur['zaciatok']; ?></td>
      <td><?php echo $tur['kategoria']; ?></td>
      <td><?php echo $tur['meno_usp']; ?></td>
      <td><?php echo $tur['meno_usp']; ?></td>
    </tr>
     
  </tbody>

  
</table>