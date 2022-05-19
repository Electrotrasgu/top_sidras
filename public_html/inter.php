<?php 
include '../config.php';
include '../model/db.php';
$link=  connect_db();


$sql_delete="DELETE FROM 1814_rating
			WHERE id_rating = $id"; 
$result=mysqli_query($sql_delete) or die ("Error al Eliminar"); 

var_dump(sql_delete);

?>
