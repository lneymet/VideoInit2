<?php 

include_once(CONTROLLERS_PATH.'/GeneralController.php');

?>

<ul id="type_films">
<link rel="stylesheet" href="css/index.css">
<?php
foreach($listCategories as $test){
	$cat[] = $test->getCodeFilm();
}

	foreach ($listCategories as $tf){


		echo '<li class="afficheTypeFilm"><a href="../src/index.php?code_type_film='.$tf->getCodeFilm().'" class="linkText"><span class="catText">'.$tf->getLibelle().'</span></a></li>';
		
	}
	
	echo "</select>";
	
?>
</ul>