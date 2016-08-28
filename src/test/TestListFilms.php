<?php
include('../config.inc.php');
include('../dao/FilmsDAO.php');


$tFilms = FilmsDAO::getListFilms();

var_dump($list);

require("../view/TypeFilmVue.php");

//afficherListeTypeFilm($list);
