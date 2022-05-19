<?php 

function connect_db(){

	$link = mysqli_connect(SERVERDB,USERDB,PASSDB,NAMEDB,PORTDB);

	if( mysqli_connect_errno( $link ) > 0 ){
		die( "Error (" . mysqli_connect_errno( $link ) . "): " . mysqli_connect_error( $link ) );
	}

	mysqli_set_charset($link,'utf8');
        
        
        //print_r($link);
	return $link;
}


function close_db( $link ){

	if( mysqli_ping( $link ) ){

		return mysqli_close( $link );
	
	}

	return true;

}

