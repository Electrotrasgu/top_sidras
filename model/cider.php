<?php 

/******************************************************************
CRUD TABLE 1814_sidras
 columna           tipo de datos
 --------------------------------
 id                int, ai, pk
 name
 place
 email
 */
 
/*********CREAR SIDRA*************/

/********************************

CREATE_CIDER
 
 */
function create_cider($link,$name,$place,$email){

	$name 		= mysqli_real_escape_string($link,$name);
        $place          = mysqli_real_escape_string($link,$place);
	$email 		= mysqli_real_escape_string($link,$email);
        
	


	$sql = "INSERT INTO 1814_sidras (name, place,email)
			VALUES('$name','$place',$email)";
	$query = mysqli_query($link,$sql);


	if( !$query ){ return false; }

	return mysqli_insert_id( $link );
}


/*********LISTAR SIDRA*************/

 function read_cider($link,$id){
 	$sql = "SELECT * FROM 1814_sidras WHERE id = $id ";
	$query = mysqli_query($link,$sql);

	if( !$query ){ return false; }

	if( mysqli_num_rows( $query ) < 1 ){
		return 0;
	}
        return $query;
       
 }
 
 
 
 
 function read_all_ciders($link){
     $sql = "SELECT * FROM 1814_sidras";
    $query = mysqli_query($link,$sql);

    if( !$query ){ return false; }

    if( mysqli_num_rows($query) < 1 ){
        return "NO_REG";//no hay registros
    }else{
        return $query;
    }
 }
 
/*********LEER SIDRA POR ID*************/

function read_cider_by_id($link, $id){
	$id = (int) $id;
	$sql = "SELECT * FROM 1814_sidras WHERE id = $id";
	$query = mysqli_query($link,$sql);

	if( !$query ){ return false; }

	if( mysqli_num_rows( $query ) < 1 ){
		return 0;
	}

	return mysqli_fetch_assoc( $query );
}

/*********LEER SIDRA*************/


function search($link,$string){

	$string = mysqli_real_escape_string( $link, $string );
	$string = '%' . $string . '%';

	$sql = "SELECT * FROM 1814_sidras
			WHERE name LIKE '$string'
			OR place LIKE '$string'
                        OR email LIKE '$string'
			";
	$query = mysqli_query($link,$sql);

	if( !$query ){ return false; }

	if( mysqli_num_rows( $query ) < 1 ){
		return $query;
	}

	return $query;

}

/*********BORRAR SIDRA*************/


function delete_cider($link,$id){

	$id = (int) $id;

	$sql = "DELETE FROM 1814_sidras
			WHERE id = $id";
	$query = mysqli_query($link,$sql);

	if( !$query ){ return false; }

	return mysqli_affected_rows( $link );

}














