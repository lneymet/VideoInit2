<?php
// session_start();

?>
    <link rel="stylesheet" href="../css/Basket.css">
<?php
include_once('config.inc.php');
include_once(MODEL_PATH.'/Films.php');

if (isset ( $_SESSION['currentUserName'] )) {
    if (! isset ( $_SESSION['basket'] ))

        $_SESSION['basket'] = array();
    if (isset ( $_GET['action'] ) && ($_GET['action']) == 'resa') {
        // test si existe deja
        $ref = $_GET['id_film']; // référence du produit à retirer
        $array = $_SESSION['basket']; // attribue le tableau à $array
        $key = array_search( $ref, $array ); // recherche la référence et attribue son rang dans le tableau à $key

        if ($key === false) {
            array_push ( $_SESSION['basket'], $_GET['id_film'] ); // Ajouter un nouvel article
        } else {
            echo '<h4 id= "deja_resa">Film already included !!!</h4> ';
        }
    }

    if (isset ( $_GET['action'] ) && ($_GET['action']) == 'retrait') {
        $array = $_SESSION['basket']; // attribue le tableau a $array
        $ref = $_GET['id_film']; // reference du film a retirer
        $key = array_search( $ref, $array ); // recherche la reference et attribue son rang dans le tableau a $key
        unset ( $_SESSION['basket'] [$key] ); // fonction PHP qui retire l'element situe au rang enregistre dans $key
    } else {
    }
    echo '<div class="basketContainer"><h2 id= "basketTitle">Your basket:</h2><ul class="containerListFilms">';


    foreach ( $_SESSION['basket'] as $resa ) {

        $tfilms = FicheFilmDAO::getOneFilm( $resa );
        $tFilm = $tfilms[0];

        echo '<ol class="itemListFilms">', $tFilm->getTitreFilm(), '<a class="x_delete" href= "GeneralController.php?action=retrait&id_film='.$tFilm->getIdFilm().'"><p class="x_del2">X</p></a></ol>';
        // echo '<a id=sup href="index2.php?action=retrait&ID_FILM=' . $Tfilm->getSIdFilm () . '">X</a>';
//        var_dump($tFilms->getTitreFilm());
    }
    echo '</ul></div>';

} else {
    echo 'You have to login to access this page';
}

?>