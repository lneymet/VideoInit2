<?php
//session_start();

include_once('/../config.inc.php');
include_once(DAO_PATH.'/TypeFilmDAO.php');
include_once(DAO_PATH.'/FilmsDAO.php');
include_once(DAO_PATH.'/FicheFilmDAO.php');
include_once(DAO_PATH.'/SignInDAO.php');



//Kint::dump($_POST);

if (isset($_POST['btnOkLogin'])){
    $userAliasP = $_POST['loginIn'];
    $passUserP = $_POST['passwordIn'];

    SignInDAO::openUserSession($userAliasP, $passUserP);
}
//var_dump($_SESSION);
//if (isset($_GET['action']) && $_GET['action']=="logout") {
//    SignInDAO::closeUserSession();
//    unset($_GET['action']);
//    header("Location: index.php");
//    echo "Test";
//    if(isset($_SESSION['currentUserID'])) {
//        echo "Now";
//        $sessionUnset = session_unset();     // unset $_SESSION variable for the run-time
//        $sessionDestroy = session_destroy();   // destroy session data in storage
//    var_dump($sessionUnset);
//        var_dump($sessionDestroy);
//        echo $_SESSION['currentUserName'] = null;
//        echo $_SESSION['currentUserID'] = null;
//        if($sessionDestroy == true){
//            header( 'Location: http://www.yoursite.com/new_page.html' );
//
//        }
//    }
//}
//var_dump($_SESSION);
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minutes ago
    $sessionUnset = session_unset();     // unset $_SESSION variable for the run-time
    $sessionDestroy = session_destroy();   // destroy session data in storage


}

/*if (!isset($_SESSION['CREATED'])) {
    $_SESSION['CREATED'] = time();
} else if (time() - $_SESSION['CREATED'] > 1800) {
// session started more than 30 minutes ago
    session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
    $_SESSION['CREATED'] = time();  // update creation time
}*/
// Get categories

$listCategories = TypeFilmDAO::getListTypeFilm();

// Get user's Title choice
if (isset($_GET['code_type_film'])) {
    $idTypeFilm = $_GET['code_type_film'];
    $titleCenterColumn = FilmsDAO::getTitleCatType($idTypeFilm);
//    echo $titleCenterColumn;

    $listFilms = FilmsDAO::getChoiceFilmsList($idTypeFilm);
//    require_once(VIEW_PATH.'/GeneralLayoutVue.php');
//    require_once(VIEW_PATH.'/FilmsVue.php');

}else if (isset($_GET['id_film'])){
        $idFilm = $_GET['id_film'];
        $listFilms = FicheFilmDAO::getOneFilm($idFilm);
//    require_once(VIEW_PATH.'/GeneralLayoutVue.php');
//    require_once(VIEW_PATH.'/FicheFilmVue.php');

} else {
    $listFilms = FilmsDAO::getNouveautes();
//    require_once(VIEW_PATH.'/GeneralLayoutVue.php');
    $titleCenterColumn = "New releases";
}

// Welcome user message
    if (isset($_SESSION['currentUserName']) && !empty($_SESSION['currentUserName'])) {

        $welcomeText = $_SESSION['currentUserName'];


    } else {
        $welcomeText = "stranger";
    }

