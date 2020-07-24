<?php 

include "header.php";
?>

<div class="zarovnaj">
 <h3>Oficiálna termínová listina pre rok 2020</h3>

 <form action="<?php echo BASE_URL; ?>/domov/" method="get">
  <select name="kategoria">
    <option value="a">A</option>
    <option value="b">B</option>
    <option value="c">C</option>
    <option value="d">D</option>
  </select>
  <input type="submit" value="odoslat">
</div>


<?php 
    $dotaz=$database->query("SELECT turnaje.kategoria, turnaje.zaciatok, usporiadatel.meno_usp, turnaje.turnaje_id FROM turnaje JOIN usporiadatel ON turnaje.usporiadatel_id=usporiadatel.usporiadatel_id ORDER BY zaciatok");
    if($dotaz->rowCount()){
    	$data=$dotaz->fetchAll(PDO::FETCH_ASSOC);
    }

  ?>
<p class="zarovnaj">Pocet zaznamov: <?php echo count($data) ?></p>
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
