<?php


$query=array(
    'feedback_code'    => null,//codigo del mensaje
    'feedback_message' =>null, //mensaje
    'query'            =>null,//datos procedentes de la consulta
    'action'	       => null, // Recoge la acción que se corresponde a la página solicitada
    'template'	       => null, // Vista que quieres mostrar por pantalla
	
 );



   function list_ciders(){
	global $query;

	$link = connect_db();

	$query['query'] = read_all_ciders($link);


	return $query;

}
    



function search_cider(){
 global $query;


	if( !isset( $_GET['search'] ) || empty( $_GET['search'] ) ){
		$query['feedback_code']	= 2001;
		$query['feedback_message']= "No se han recibido datos";
		return $query;
	}
        
        $result= $_GET['search'];
       

	$link = connect_db();
        
        $result = mysqli_real_escape_string($link,$string);
        
        
	$query['query'] = search($link,$string);
       

	if( $query['query'] === false ){
		$query['feedback_code'] = 1000;
		$query['feedback_message'] = "Error en la base de datos. Vuelva a intentarlo más tarde";
		return $query;
	} 


	if( $query['query'] < 1 ){
		$query['feedback_code']	= 2002;
		$query['feedback_message']= "no hay coincidencias";
		return $query;
	}
        
       return $query;
       
      

	
        
       
    
}



  
 


 





