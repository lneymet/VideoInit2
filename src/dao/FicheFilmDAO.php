<?php

namespace VideoInit\dao;

use VideoInit\model\Films;

include_once('/../config.inc.php');
include_once(DAO_PATH.'/Connect.php');
include_once(MODEL_PATH.'/Films.php');



class FicheFilmDAO {

	public static function getOneFilm($idFilm){
		// connection BDD
		$pdo = \Connect::getConnection();

		$sql = "select * from film where id_film =".$idFilm.";";

		$result = $pdo->query($sql);

		$result->setFetchMode(\PDO::FETCH_OBJ);

		$tfilms = array();
//		$tFilm = null;
		$ligne = $result->fetch();

		// transformer recordset en tableau

		$tFilm = new Films($ligne->ID_FILM, $ligne->CODE_TYPE_FILM, $ligne->TITRE_FILM, $ligne->ANNEE_FILM, $ligne->REF_IMAGE, $ligne->RESUME);
		
//		var_dump($tFilm);
		
		array_push($tfilms, $tFilm);

//		var_dump($tfilms);
		
		$result->closeCursor(); // on ferme le curseur des résultats



		return $tfilms;
	}

    public static function getOneFilmTitle($idFilm){
        // connection BDD
        $pdo = \Connect::getConnection();

        $sql = "select TITRE_FILM from film where id_film =".$idFilm.";";

        $result = $pdo->query($sql);

        $result->setFetchMode(\PDO::FETCH_OBJ);

        $ligne = $result->fetch();

        // transformer recordset en tableau

        $titleFilm = $ligne->TITRE_FILM;

        $result->closeCursor(); // on ferme le curseur des résultats



        return $titleFilm;
    }

	public static function getNouveautes(){

		// connection BDD
		$pdo = \Connect::getConnection();

		$sql = "select * from film order by annee_film desc limit 5;";

		$result = $pdo->query($sql);

		$result->setFetchMode(\PDO::FETCH_OBJ);


		$tfilms = array();

		// transformer recordset en tableau
		while( $ligne = $result->fetch() ) // on récupère la liste
		{
			$tFilm = new Films($ligne->ID_FILM, $ligne->CODE_TYPE_FILM, $ligne->TITRE_FILM, $ligne->ANNEE_FILM, $ligne->REF_IMAGE, $ligne->RESUME);
			array_push($tfilms, $tFilm);
		}

		$result->closeCursor(); // on ferme le curseur des résultats



		return $tfilms;
	}

	public static function getChoiceFilmsList($idTypeFilm){

		// connection BDD
		$pdo = \Connect::getConnection();

		$sql = "select * from film where code_type_film = \"".$idTypeFilm."\";";

		$result = $pdo->query($sql);
		$result->setFetchMode(\PDO::FETCH_OBJ);


		$tfilms = array();

		// transformer recordset en tableau
		while( $ligne = $result->fetch() ) // on récupère la liste
		{
			$tFilm = new Films($ligne->ID_FILM, $ligne->CODE_TYPE_FILM, $ligne->TITRE_FILM, $ligne->ANNEE_FILM, $ligne->REF_IMAGE, $ligne->RESUME);
			array_push($tfilms, $tFilm);
		}

		$result->closeCursor(); // on ferme le curseur des résultats

		return $tfilms;

	}

	public static function getOneTitleFilm($idFilm){

		// connection BDD
		$pdo = \Connect::getConnection();

		$sql = "select typefilm.LIB_TYPE_FILM from typefilm where CODE_TYPE_FILM = \"".$idFilm."\";";

		$result = $pdo->query($sql);
		$result->setFetchMode(\PDO::FETCH_OBJ);

		$titleCenterColumn = null;

		// transformer recordset en string
		$ligne = $result->fetch(); // on récupère le string
		$titleCenterColumn = $ligne->LIB_TYPE_FILM;

		$result->closeCursor(); // on ferme le curseur des résultats

		return $titleCenterColumn;
	}


}