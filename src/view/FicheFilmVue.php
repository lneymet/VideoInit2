<?php

//include_once(CONTROLLERS_PATH.'/GeneralController.php');
//require_once(VIEW_PATH.'/GeneralLayoutView.php');
?>
 <link rel="stylesheet" href="../css/FicheFilm.css">

<ul id="filmsList">

<?php

foreach ($listFilms as $tf){
	
	echo '<ol ><a href="../src/controllers/GeneralController.php?action=resa&id_film='.$tf->getIdFilm().'"><button class="btnAddBasket">Add to basket</button></a></ol>';
	echo '<ol class="coverCont"><a><img src="'."../src/".$tf->getRefImage().'" class="coverLone"></a></ol>';
	echo '<li class= "filmTitleLi"><a class= "filmTitleLone">'.$tf->getTitreFilm().'</a></li>';
	echo '<ol><a>'.$tf->getAnneeFilm().'</a></ol>';
	echo '<ol><a class="resumeText">'.$tf->getResume().'</a></ol>';
	echo '<ol><a href="../src/index.php?code_type_film='.$tf->getCodeTypeFilm().'" class="filmTitleC">'.$tf->getCodeTypeFilm().'</a></ol>';
	echo '<ol ><a href="../src/controllers/GeneralController.php?action=resa&id_film='.$tf->getIdFilm().'"><button class="btnAddBasket">Add to basket</button></a></ol>';

	
}

echo "</select>";

?>
</ul>
