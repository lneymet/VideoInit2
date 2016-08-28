<?php

namespace VideoInit\dao;

session_start();

include_once('/../config.inc.php');
include_once(DAO_PATH.'/Connect.php');


class SignInDAO {
	
	public static function verifyAliasUser($aliasUser) {

		$pdo = \Connect::getConnection();
		$sql = "select login_adherent from adherent where login_adherent = \"".$aliasUser."\";";
		$result = $pdo->query($sql);
		$result->setFetchMode(\PDO::FETCH_OBJ);

		$ligne = $result->fetch(); // on récupère le string

		if ($ligne == null) {
			return false;
		} else {
		return true;
		}

		$result->closeCursor();
	}

    /**
     *
     */
    public static function openUserSession($aliasUser, $passUser)
    {
        $pdo = \Connect::getConnection();
        $sql = "select num_adherent, login_adherent, pwd_adherent, prenom_adherent from adherent where login_adherent = \"" . $aliasUser . "\";";
        $result = $pdo->query($sql);
        $result->setFetchMode(\PDO::FETCH_OBJ);

        $userIDR = null;
        $userAliasR = null;
        $passwordR = null;
        $nameUserR = null;
//        $passEncryp = md5($passUser);
        $passEncryp = $passUser;

        // transformer recordset en string
        if (($ligne = $result->fetch())!= null) { // on récupère le string
            $userIDR = $ligne->num_adherent;
            $userAliasR = $ligne->login_adherent;
            $passwordR = $ligne->pwd_adherent;
            $nameUserR = $ligne->prenom_adherent;

        $result->closeCursor(); // on ferme le curseur des résultats

        if (($aliasUser == null) || ($passUser == null)) {
            echo "Champs vides";
        } else if (($aliasUser != $userAliasR) || ($passwordR != $passEncryp)) {
            echo "No Match";
        } else {

            if ($userIDR != null) {
                $_SESSION['currentUserID'] = $userIDR;
                $_SESSION['currentUserName'] = $nameUserR;
                $_SESSION['CREATED'] = time();
                $_SESSION['LAST_ACTIVITY'] = time();
            }

            return true;
        }
        } else {

//            echo "User does not exist.";
            return false;
        }

    }


	public static function saveUserLogin(){
		
		$loginUser = $_POST['login'];
//		var_dump($loginUser);
		$aliasUser = SignInDAO::verifyAliasUser($loginUser);
		
		if ($aliasUser == false) {


			$bdd = \Connect::getConnection();

	//	$idUser2 = getUserID();

            $sql = "
            INSERT INTO adherent
            (login_adherent, pwd_adherent, nom_adherent, prenom_adherent, adr_adherent, adr2_adherent, codepostal_adherent, ville_adherent, tel_adherent, date_adhesion, ref_piece_identite) 
             values (:login_adherent, :pwd_adherent, :nom_adherent, :prenom_adherent, :adr_adherent, :adr2_adherent, :codepostal_adherent, :ville_adherent, :tel_adherent, :date_adhesion, :ref_piece_identite)

            ";


//            $params = array(
//                'login_adherent' => $loginUser,
//                'pwd_adherent' => md5($_POST['password']),
//                'nom_adherent' => ,
//                'prenom_adherent' => ,
//                'adr_adherent' => ,
//                'adr2_adherent' => ,
//                'codepostal_adherent' => ,
//                'ville_adherent' => ,
//                'tel_adherent' => ,
//                'date_adhesion' => ,
//                'ref_piece_identite' =>
//            );
//	var_dump($params);
            $date = date("y-m-d H:i:s");
            $req = $bdd->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
//            $req = bindParam(':calories', $calories, PDO::PARAM_INT);
            $req->bindParam(':login_adherent', $loginUser, \PDO::PARAM_STR, 12);
            $req->bindParam(':pwd_adherent', $_POST['password'], \PDO::PARAM_STR, 12);
            $req->bindParam(':nom_adherent', $_POST['nomUser'], \PDO::PARAM_STR, 12);
            $req->bindParam(':prenom_adherent', $_POST['prenUser'], \PDO::PARAM_STR, 12);
            $req->bindParam(':adr_adherent', $_POST['ad1user'], \PDO::PARAM_STR, 12);
            $req->bindParam(':adr2_adherent', $_POST['ad2user'], \PDO::PARAM_STR, 12);
            $req->bindParam(':codepostal_adherent', $_POST['cpUser'], \PDO::PARAM_STR, 12);
            $req->bindParam(':ville_adherent', $_POST['villeUser'], \PDO::PARAM_STR, 12);
            $req->bindParam(':tel_adherent', $_POST['telUser'], \PDO::PARAM_STR, 12);
            $req->bindParam(':date_adhesion', $date, \PDO::PARAM_STR, 12);
            $req->bindParam(':ref_piece_identite', $_POST['pieceID'], \PDO::PARAM_STR, 12);
            $req->execute();
            $bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

//	var_dump($reponse3);
		//  	if (isset($idUser2) != null) {
		// 	$_SESSION['currentUserID']=$idUser2;
		// 	$_SESSION['currentUserName']=$prenUser;
		//  	}
			
		$req->closeCursor();
	
	
		$idUser = $bdd->lastInsertId('num_adherent');
	
		if (isset($idUser) != null) {
			$_SESSION['currentUserID']=$idUser;
			$_SESSION['currentUserName']=$_POST['prenUser'];
		}
		
			return true;
		
		} else {
			
			return false;
		}
	}


}