<?php
// session_start();

/*

include(DAO_PATH.'/TypeFilmDAO.php');
include_once(DAO_PATH.'/FilmsDAO.php');
include(DAO_PATH.'/FicheFilmDAO.php');
include(DAO_PATH.'/SignInDAO.php');*/
//include_once('../config.inc.php');
//include_once(CONTROLLERS_PATH.'/GeneralController.php');
include_once(MODEL_PATH.'/Films.php');
include_once(DAO_PATH.'/SignInDAO.php')

?>

<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <!--    <meta http-equiv="refresh" content="30">-->
    <link rel="stylesheet" href="../css/index.css">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
$(document).ready(function(){
    /*            $("#btnLogin").click(function(){
                    $("#loginBlock").hide();
                 });*/
    $("#btnLogin").click(function(){
        $("#loginBlock").show();
    });
    $("#btnSignup").click(function(){
        $(".windowOverCont").show();
    });
});
    </script>

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
        <div class="menuBar">
            <p class="logoutIcon">
                <a href="../controllers/GeneralController.php?action=logout"><img src="../images/LogoutIcon-Red.png" class="logoutImg"></a>
                <!--            <button type="submit" name="logoutBtn" value="logoutBtn" class="logoutBtn" id="logoutBtn">-->

                <!--                </button>-->
            </p>
            <label class="logoutMess">
                <a href="../controllers/GeneralController.php?action=logout" class="logoutMessLink">
                    Logout
                </a>
            </label>
            <p class= "menuItem"><a href="../controllers/GeneralController.php" class="homeLink">Home</a></p>


        </div>
    </fieldset>

    <fieldset class="champside" id="champside" >
        <legend>Categories</legend>
        <p>
            <?php
            require('TypeFilmVue.php');
            ?>
</p>
</fieldset>

<fieldset class="champfilms" id="champfilms" >
    <?php
    if (isset($_GET['code_type_film'])) {
        ?>

        <legend>
            <?php

            echo $titleCenterColumn;
            ?>
        </legend>
    <?php
    } else if (isset($_GET['id_film'])){

    } else {
        ?>

        <legend>
            <?php

            echo $titleCenterColumn;

            ?>
        </legend>
    <?php
    }
    ?>

    <p>
        <?php

        if (isset($_GET['code_type_film'])) {
            require('FilmsVue.php');

        }else if (isset($_GET['id_film'])){
            require('FicheFilmVue.php');

        } else {
            require('FilmsVue.php');
        }

        ?>
    </p>

</fieldset>

<fieldset class= "champPerso">
    <div class= "persoBox">

        <p class="helloMess">
            Hello <span id="userNameMess">
    		<?php
            // Welcome user message
            if (isset($_SESSION['currentUserName']) && !empty($_SESSION['currentUserName'])) {

                echo $welcomeText = $_SESSION['currentUserName'];


            } else {
                echo $welcomeText = "stranger";
            }

            ?>

                    </span>
        </p>

        <p class="btnLoginP">
            <input type="submit" name="btnLogin" value="Login" id="btnLogin" tabindex="20" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </p>

        <form id="loginBlock" style= "display:none">
            <label for="loginIn">Alias:</label><br />
            <input type="text" name="loginIn" id="loginIn" class="textField" size="20" maxlength="70" tabindex="1" /><br />

            <label for="passwordIn">Password:</label><br />
            <input type="password" name="passwordIn" id="passwordIn" class="textField" size="20" maxlength="70" tabindex="2" /><br/>

            <input type="submit" formmethod="post" name="btnOkLogin" value="Ok" id="btnOkLogin" class="btns" tabindex="20" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </form>

        <p class= "SignUpP">
            <input type="submit" name="btnSignup" value="Sign Up" id="btnSignup" class="btnSignupC" tabindex="20" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </p>
    </div>
    <div>
        <p>
            <a>
                <?php
                if(isset($_GET['action'] )== "resa"){
                require(SRC_PATH.'/basket.php');
                }else if(isset($_SESSION['basket'])) {
                    require(SRC_PATH.'/basket.php');
                }
                    ?>
            </a>
        </p>
    </div>
</fieldset>
</div>

<div class="foot">
    <footer class="footer">
        <p class="footText">© All rights reserved.</p>
    </footer>
</div>

<div class="windowOverCont" style= "display:none">

    <?php
    require(SRC_PATH.'/SignIn.php');
    ?>
<!--    <p>
        Hello
    </p>-->
</div>
<!--<div class="windowOverModal">This is the content in your pop-up window.</div>-->

</body>
</html>