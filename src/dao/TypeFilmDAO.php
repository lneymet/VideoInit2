<?php

namespace VideoInit\dao;

use VideoInit\model\TypeFilm;
include_once('/../config.inc.php');
include_once(DAO_PATH.'/Connect.php');
include_once(MODEL_PATH.'/TypeFilm.php');

class TypeFilmDAO {


public static function getListTypeFilm(){
	
	// connection BDD
	$pdo = \Connect::getConnection();
	
	$sql = "SELECT * FROM typefilm;";
			
	$result = $pdo->query($sql);

	$result->setFetchMode(\PDO::FETCH_OBJ);

	$listCategories = array();
		
	// transformer recordset en tableau
	while( $ligne = $result->fetch() ) // on récupère la liste 
	{
			$tFilm = new TypeFilm($ligne->CODE_TYPE_FILM, $ligne->LIB_TYPE_FILM);

			array_push($listCategories, $tFilm);
	}
	
	$result->closeCursor(); // on ferme le curseur des résultats
		   
	

	return $listCategories;
	
	
}
	
	
}

?>