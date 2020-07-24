<?php 
include "header.php";
?>

<h1>Naozaj vymazat ?</h1>

<?php  
  global $database;

$id=$_POST['id'];

  $dotaz=$database->prepare("DELETE FROM hraci WHERE hraci_id=:id ");

  $dotaz->execute(['id'=>$id]);

    if ($dotaz->rowCount())
     //echo "hrac bol uspesne editovany";
     header('Location: http://localhost/etenis/hraci');
    die();
   //else
     //echo "hraca sa nepodarilo editovat";
    

	 ?>