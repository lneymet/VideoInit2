<?php
/**
 * Created by PhpStorm.
 * User: Spiritus
 * Date: 16/07/30
 * Time: 23:49
 */

include_once '/../config.inc.php';
include_once(DAO_PATH.'/SignInDAO.php');
//include_once(VIEW_PATH.'SignInVue.php');

//var_dump($_POST);

//if(isset($_POST[''])){
$signUp = \VideoInit\dao\SignInDAO::saveUserLogin();

if($signUp == true){
    header('Location: /DevSessions/0TestPhp/VideoInit/src/index.php');
}
//}

//if (isset($_POST['submit']))
//{
//    ?>
<!--    <script type="text/javascript">-->
<!--        window.location = '/DevSessions/0TestPhp/VideoInit/src/index.php';-->
<!--    </script>-->
<!--    --><?php
//}