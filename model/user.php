<?php 

/*
 * 
      TABLA: 1814_users

	  Nombre	        Tipo	       Nulo         Extra	
        
       idPrimaria	       int(11)	        No        AUTO_INCREMENT		
       
        	  			

         email               varchar(150)       No


/*CREATE_USER
Crea un nuevo registro en la tabla user

Requiere: 
- $link 	: link de la conexión
- $email 	: email del usuario


Devuelve:
- false si no se ha podido ejecutar la consulta
- 0 si no se ha añadido un nuevo registro
- Un valor int correspondiente a la id del nuevo registro generado
 
 
  
 /*********CREAR USUARIO*************/



function create_user($link,$email,$name){

	
	$email= mysqli_real_escape_string($link,$email);
	


	$sql = "INSERT INTO 1814_users (email,name)
			VALUES('$email','$name')";
	$query = mysqli_query($link,$sql);


	if( !$query ){ return false; }

	return mysqli_insert_id( $link );
}


/*********LEER USUARIO*************/

 function read_user($link){
 	$sql = "SELECT * FROM 1814_users";
	$query = mysqli_query($link,$sql);

	if( !$query ){ return false; }

	if( mysqli_num_rows( $query ) < 1 ){
		return 0;
	}

	return $query;
 }
 
 function read_user_by_email($link, $email){
     $sql = "SELECT * FROM 1814_users
			WHERE email = '$email'";
     
     $query = mysqli_query($link,$sql);

	if( !$query ){ return false; }

	if( mysqli_num_rows( $query ) > 0 ){
		return $query;
	}

	return 0;
 }

/*********LEER USUARIO POR ID*************/

function read_user_by_id($link, $id){
	$id = (int) $id;
	$sql = "SELECT * FROM 1814_users WHERE id = $id";
	$query = mysqli_query($link,$sql);

	if( !$query ){ return false; }

	if( mysqli_num_rows( $query ) < 1 ){
		return 0;
	}

	return mysqli_fetch_assoc( $query );
}

/*********BORRAR USUARIO*************/


function delete_user($link,$id){

	$id = (int) $id;

	$sql = "DELETE FROM 1814_users
			WHERE id = $id";
	$query = mysqli_query($link,$sql);

	if( !$query ){ return false; }

	return mysqli_affected_rows( $link );

}














