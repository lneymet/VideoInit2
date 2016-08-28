<?php
//namespace Video\test;

include('../config.inc.php');
include('../dao/TypeFilmDAO.php');


$tFilms = TypeFilmDAO::getListTypeFilm();

//var_dump($list);

require("../view/TypeFilmVue.php");

//afficherListeTypeFilm($list);

