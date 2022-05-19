<?php
function delete_rate($link,$id){
        
	$id = (int) $id;
        $id = $_POST['id']; 
       $sql = "DELETE FROM 1814_rating
			WHERE id_rating = $id";
        
      $query = mysqli_query($link,$sql);

	if( !$query ){ return false; }

	return mysqli_affected_rows( $link );

}







