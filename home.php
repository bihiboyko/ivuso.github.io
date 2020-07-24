<?php 
require "config.php";
include 'header.php';
?>

 <div class="obrazky">
             <div class="obr" style="background-image: url('images/djokovic.jpg')"></div>
             <div class="obr" style="background-image: url('images/nadal.jpg')"></div>
             <div class="obr" style="background-image: url('images/thiem.jpg')"></div>
</div>

<div class="zarovnaj">
  <h3>Oficiálna termínová listina pre rok 2020</h3>


 <form action="<?php echo BASE_URL; ?>/domov/" method="get">
 	Trieda:
  <select name="kategoria">
    <option value="a">A</option>
    <option value="b">B</option>
    <option value="c">C</option>
    <option value="d">D</option>
  </select>
  <input type="submit" value="zobraz">
  
</div>


<?php 
    $dotaz=$database->query("SELECT turnaje.kategoria, turnaje.zaciatok, usporiadatel.meno_usp, turnaje.turnaje_id FROM turnaje JOIN usporiadatel ON turnaje.usporiadatel_id=usporiadatel.usporiadatel_id ORDER BY zaciatok");
    if($dotaz->rowCount()){
      $data=$dotaz->fetchAll(PDO::FETCH_ASSOC);
      $pocet=count($data);
      ?>
      <p class="zarovnaj"><?php echo 'zaznamov: '. $pocet; ?></p> 
 <?php    }
?>

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

