<?php 
require('../../config.php');
require('../../model/db.php');


$link = connect_db();

if(mysqli_ping($link)){

	echo "Estás conectado!!!";
	var_dump($link);

}else{

	echo "no se ha encontrado nada";
}