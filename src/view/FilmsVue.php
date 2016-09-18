<?php

//include_once(CONTROLLERS_PATH.'/GeneralController.php');

?>


<link rel="stylesheet" href="css/Films.css">
<script src="../resources/jQuery.dotdotdot-master/src/jquery.dotdotdot.js"></script>
<!--<script src="../../resources/jquery-3.1.0.js"></script>-->
<!--<script src="../../resources/jQuery.dotdotdot-master/src/jquery.dotdotdot.min.js"></script>-->
<script>
	$(document).ready(function () {
		$(".ellipsis").dotdotdot({
			after: "a.readmore"
            watch: "window"
		});
	});
</script>
<div class="modalFilms">
<!--	<ul id="filmsList">-->

	<?php

	foreach ($listFilms as $tf){
		echo '<table width="100%" border="0">
		  <tr>
			<td colspan="2" class="filmListTitleTD">
			  <h1 class="filmTitleH1"><a href="../src/index.php?id_film='.$tf->getIdFilm().'" class= "filmTitleC"><p class="filmTitleCont">'.$tf->getTitreFilm().'</p></a></h1>
			</td>
		  </tr>
		  <tr valign="top">
			<td bgcolor="#aaa"  height="200">
			<div class="dot-ellipsis dot-resize-update" style="height: 200px">
				<span class="resumText">'.$tf->getResume().'</span>
				</div>
			</td>
			<td bgcolor="#eee" width="20%" height="200">
				<div class="divImage"><a href="../src/index.php?id_film='.$tf->getIdFilm().'" class= "filmImg"><img src="'."../src/".$tf->getRefImage().'" class="cover"></a></div>
			</td>
		  </tr>
		  <tr>
			<td colspan="2" class="filmListFooter">
			  <a href="../src/index.php?code_type_film='.$tf->getCodeTypeFilm().'" class="catTextTag"><span class="tagCont">'.$tf->getCodeTypeFilm().'</span></a>
			</td>
		  </tr>
		</table>';


//		echo '
//		<div style="display:block; border:solid 1px; border-color: gray;"><br>
//		<ol class="coverCont"><div class="divImage"><a href="../src/index.php?id_film='.$tf->getIdFilm().'" class= "filmImg"><img src="'."../src/".$tf->getRefImage().'" class="cover"></a></div></ol>
//		<li class= "filmTitleLi"><a href="../src/index.php?id_film='.$tf->getIdFilm().'" class= "filmTitleC">'.$tf->getTitreFilm().'</a></li>
//		<ol><a>'.$tf->getAnneeFilm().'</a></ol>
//		<ol class="resumTextOl"><a><span class="resumText">'.$tf->getResume().'</span></a></ol>
//		<ol><a href="../src/index.php?code_type_film='.$tf->getCodeTypeFilm().'" class="filmTitleC">'.$tf->getCodeTypeFilm().'</a></ol>
//		<br></div><br><br>';

	}

	echo "</select>";

	?>
<!--	</ul>-->
</div>