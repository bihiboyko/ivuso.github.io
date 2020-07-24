<?php 
include "header.php";
?>
<div class="zarovnaj">
  <h1>Editovanie hraca vysledok</h1>
</div>

<?php  
  global $database;

$meno=$_POST['a'];
$priezvisko=$_POST['b'];
$narodenie=$_POST['c'];
$klub=$_POST['d'];
$id=$_POST['id'];

  $dotaz=$database->prepare("UPDATE hraci SET meno=:k, priezvisko=:l, narodenie=:m, klub=:n WHERE hraci_id=:id ");

  $dotaz->execute(['k'=>$meno, 'l'=>$priezvisko, 'm'=>$narodenie, 'n'=>$klub, 'id'=>$id]);

    if ($dotaz->rowCount())
     //echo "hrac bol uspesne editovany";
     header('Location: http://localhost/etenis/hraci');
    die();
   //else
     //echo "hraca sa nepodarilo editovat";
    

	 ?>