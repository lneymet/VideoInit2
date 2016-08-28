<?php
session_start();
include_once('dao/TypeFilmDAO.php');
include_once('dao/FilmsDAO.php');
include_once ('dao/FicheFilmDAO.php');
include_once('config.inc.php');


?>

<html>
<head>
<meta charset="utf-8">

<link rel="stylesheet" href="css/FicheFilm.css">


<title>SciFi for all</title>

</head>
<body>

<div class="cols">
    <fieldset class="champtete" id="champtete" >
<!--         <legend>SciFi for all</legend> -->
        <p class = "titleLogo">
        <span class= "mainTitle">
		SciFi for all
		</span>
    	</p>
    </fieldset>
    
    <fieldset class="menuCont">
    <div class="menuBar"><p class= "menuItem">Hola</p></div>
    </fieldset>
    
	<fieldset class="champside" id="champside" >
        <legend>Categories</legend>       
        <p>
<?php

$tFilms = TypeFilmDAO::getListTypeFilm();
require("view/TypeFilmVue.php");

?>
    	</p>
    </fieldset>

    <fieldset class="champfilms2" id="champfilms2" >
<!--         <legend> -->
        <?php 
// //         if (isset($_GET['code_type_film'])) {
// //         $idTypeFilm =$_GET['code_type_film'];
// //         $titleCenterColumn = FilmsDAO::getTitleCatType($idTypeFilm);
// //         echo $titleCenterColumn;
// //         } else {
// //         	echo "New releases";
// //         }
//         ?>
<!--         </legend> -->
        <p>
<?php

	$idFilm = $_GET['id_film'];
	$tFilms2 = FicheFilmDAO::getOneFilm($idFilm);
	require("view/FicheFilmVue.php");


?>
    	</p>
    	
<?php 
// if (isset($_GET['id_film'])) {
// 	header("Location: http://localhost:89/videoinit_lion/src/FicheFilm/");
// }

?>
    </fieldset>
    
        <fieldset class= "champPerso">
    	<div class= "persoBox">
            <p class="helloMess">
                Hello <span id="userNameMess">
    		<?php

            if (isset($_SESSION['currentUserName']) && !empty($_SESSION['currentUserName'])) {

                echo $_SESSION['currentUserName'];

            } else {
                ?>
                stranger
            <?php
            }
            ?>
                    </span>
            </p>
    		<p>
    		<a href="#login_form" id="login_pop">
    		Login
    		</a>
    		</p>
    		<p class= "persoText">
    			<a href= "SignIn" class="signInText">Sign up</a>
    		</p>
    	</div>
    	<div>
    		<p>
    		
    		</p>
    	</div>
    </fieldset>
    
</div>

<div class="foot">
    <footer class="footer">
    <p class="footText">© All rights reserved.</p>
    </footer>
</div>

</body>
</html>