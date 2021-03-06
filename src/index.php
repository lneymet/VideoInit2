<?php
session_start();

include_once('config.inc.php');
include_once(DAO_PATH . '/TypeFilmDAO.php');
include_once(DAO_PATH . '/FilmsDAO.php');
include_once(COMMON_PATH . '/CommonFunctions.php');
//include_once(DAO_PATH.'/SignInDAO.php');

//if (isset($_POST['btnOkLogin'])){
//    $userAliasP = $_POST['loginIn'];
//    $passUserP = $_POST['passwordIn'];
//
//    \VideoInit\dao\SignInDAO::openUserSession($userAliasP, $passUserP);
//}
//
//if (isset($_GET['action']) && $_GET['action']=="logout") {
//    session_unset();     // unset $_SESSION variable for the run-time
//    session_destroy();   // destroy session data in storage
//
//    echo $_SESSION['currentUserName']=null;
//    echo $_SESSION['currentUserID']=null;
//}
//
//if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 60)) {
//    // last request was more than 30 minutes ago
//    session_unset();     // unset $_SESSION variable for the run-time
//    session_destroy();   // destroy session data in storage
//    echo "<div style='position:absolute'>session destroyed</div>";
//}

/*if (!isset($_SESSION['CREATED'])) {
    $_SESSION['CREATED'] = time();
} else if (time() - $_SESSION['CREATED'] > 1800) {
// session started more than 30 minutes ago
    session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
    $_SESSION['CREATED'] = time();  // update creation time
}*/
?>
    <!--suppress ALL -->
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--    <meta http-equiv="refresh" content="30">-->
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/Films.css">
        <link rel="stylesheet" href="css/FicheFilm.css">
        <link rel="stylesheet" href="common/Common.css">


        <link rel="stylesheet" href="../resources/font-awesome-4.6.3/css/font-awesome.min.css">
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
        <!--    <script type="text/javascript" src="css3-mediaqueries.js"></script>-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!--    <script src="../resources/jquery-3.1.0.js"></script>-->
        <script src="javaScript/indexJs.js"></script>
        <script src="../resources/jquery-validation-1.15.0/dist/jquery.validate.min.js"></script>
        <!--    <script src="../resources/jQuery.dotdotdot-master/src/jquery.dotdotdot.js" type="text/javascript"></script>-->
        <script>
            $(document).ready(function () {
//            $( function() {
//                $( ".datepicker" ).datepicker();
//            } );
//            var input = $( this ).next();
//            console.log(input);
//            $("#logoutTextBtn2").bind('click', function () {
//                var input = $( this ).next();
//                input.removeAttr( "action" )
//                location.href=location.href.replace(/&?action=([^&]$|[^&]*)/i, "");
////                alert(input);
////                console.log("You're here");
//                $(window.location).attr('href', 'VideoInit/src/index.php');
//                window.location.href = "index.php";
//            });
//
//            $("#wrapper").dotdotdot({
//                after: "a.readmore"
//            });
                /*            $(".btn").click(function(){
                 $("p").hide();
                 });*/
                $("#btnLogin").click(function () {
                    $("#loginBlock").show();
                });
//            $("#btnOkLogin").click(function(){
//                $("#loginBlock").hide();
//            });
                $("#btnSignin").click(function () {
                    $("#signin_modal").show();
                });
//            console.log('test1');
//            $("#btnOkLogin").click(function() {
//                var input = $( this ).next();
//                console.log('Test');
//console.log(input);
//                if ( input.attr( "action" ) === inputTitle ) {
//                    input.removeAttr( "action" )
//                } else {
//                    input.attr( "action", inputTitle );
//                }
//                window.location.href = "VideoInit/src/index.php";
////                $(window.location).attr('href', 'VideoInit/src/index.php')
//            });
            });
        </script>
        <link rel="stylesheet" href="css/MobileIndex.css" media="(max-width: 830px)">
        <title>SciFi for all</title>

    </head>
    <body>
    <div id="signin_modal">
        <div class="background_fixed"></div>
        <div class="form_modal">
            <?php
            require_once(SRC_PATH . '/SignIn.php');
            ?>
        </div>

    </div>
    <div class="cols">
        <fieldset class="champtete" id="champtete">
            <!--         <legend>SciFi for all</legend> -->
            <div style="background-color: #626273; opacity: 0.5;">
                <p class="titleLogo">
                <span class="mainTitle">
                SciFi for all
                </span>
                </p>
            </div>
        </fieldset>

        <fieldset class="menuCont">
            <div class="menuBar">
                <div class="menuBtnsBlock" style="width: 20%; float: right; margin-top: 0.2%">
                    <?php
                    if (isset($_SESSION['currentUserID'])) {
                        ?>
                        <p class="logoutIcon">
                            <a href="Logout.php" id="logoutTextBtn"><i class="fa fa-power-off " aria-hidden="true"
                                                                       style="color: #880009"></i>
                                <!--<img src="images/LogoutIcon-Red.png" class="logoutImg">--></a>
                            <!--            <button type="submit" name="logoutBtn" value="logoutBtn" class="logoutBtn" id="logoutBtn">-->

                            <!--                </button>-->
                        </p>
                        <label class="logoutMess">
                            <a href="Logout.php" id="logoutTextBtn" class="logoutMessLink">
                                Logout
                            </a>
                        </label>
                        <?php
                    }

                    $typesList = TypeFilmDAO::getListTypeFilmLink();
                    ?>
                    <p class="menuItem"><a href="index.php" class="homeLink">Home</a></p>
                </div>
            </div>
            <link rel="stylesheet" type="text/css" media="screen" href="css/index.css">
        </fieldset>

        <?=
        menuDropdown($typesList, 'mobileCatMenu', 'mobileMenuIcon fa fa-bars', 'listMenuItems');

        ?>
        <table width="100%" border="0">
            <tr>
                <td width="7%" valign="top">
                    <fieldset class="champside" id="champside">
                        <legend>Categories</legend>
                        <p>
                            <?php
                            $tFilms = TypeFilmDAO::getListTypeFilm();
                            require(VIEW_PATH . '/TypeFilmVue.php');
                            ?>
                        </p>
                    </fieldset>
                </td>
                <td width="20%" valign="top">

                    <fieldset class="champfilms" id="champfilms">
                        <legend>
                            <?php
                            if (isset($_GET['code_type_film'])) {
                                $idTypeFilm = $_GET['code_type_film'];
                                $tFilmsTitle = FilmsDAO::getTitleCatType($idTypeFilm);
                                echo $tFilmsTitle;
                            } elseif (isset($_GET['id_film'])) {
                                $id_film = $_GET['id_film'];
                                echo $tFilmsTitle = FicheFilmDAO::getOneFilmTitle($id_film);

                            } else {
                                echo "New releases";
                            }
                            ?>
                        </legend>
                        <p>
                            <?php
                            if (isset($_GET['code_type_film'])) {
                                $idTypeFilm = $_GET['code_type_film'];
                                $tFilms2 = FilmsDAO::getChoiceFilmsList($idTypeFilm);
                                require_once(VIEW_PATH . '/FilmsVue.php');
                            } elseif (isset($_GET['id_film'])) {
                                require_once(VIEW_PATH . '/FicheFilmVue.php');
                            } else {
                                $tFilms2 = FilmsDAO::getNouveautes();
                                require_once(VIEW_PATH . '/FilmsVue.php');
                            }

                            ?>
                        </p>
                    </fieldset>
                </td>
                <td width="10%" valign="top">
                    <fieldset class="champPerso">
                        <div class="persoBox">

                            <p class="helloMess">
                                <span class="userNameMess">Hello </span><span id="userNameMess" class="userNameMess">
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
                            <div style="width: 60px; height:30px; margin-left: auto; margin-right: auto">
                                <p class="btnLoginP">
                                    <input type="submit" name="btnLogin" value="Login" id="btnLogin" tabindex="20"/>
                                </p>
                            </div>
                            <form id="loginBlock" style="display:none">
                                <label for="loginIn">Alias:</label><br/>
                                <input type="text" name="loginIn" id="loginIn" class="textField" size="20"
                                       maxlength="70" tabindex="1"/><br/>

                                <label for="passwordIn">Password:</label><br/>
                                <input type="password" name="passwordIn" id="passwordIn" class="textField" size="20"
                                       maxlength="70" tabindex="2"/><br/>

                                <input type="submit" formmethod="post" name="btnOkLogin" value="Ok" id="btnOkLogin"
                                       tabindex="20"/>
                            </form>

                            <p class="SignUpP">
                                <!--    		<a href= "SignIn.php" id="btnSignin" class="signInText">-->
                                <input type="button" id="btnSignin" class="signInText" value="Sign Up">
                                <!--    		Sign up-->
                                <!--    		</a>-->
                            </p>
                        </div>
                        <div>
                            <p>

                            </p>
                        </div>
                    </fieldset>
                </td>
            </tr>
        </table>
    </div>
    <style>
        @media () {
        }
    </style>

    <div class="foot">
        <footer class="footer">
            <p class="footText">© All rights reserved.</p>
        </footer>
    </div>
    </body>
    </html>

<?php
//session_destroy();
