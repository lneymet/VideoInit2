<?php

include_once('config.inc.php');
include_once(DAO_PATH.'/Connect.php');
include_once(DAO_PATH.'/SignInDAO.php');



?>


<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">

    <link rel="stylesheet" href="../css/SignIn.css">
    <link rel="stylesheet" href="../../resources/jquery-ui-1.12.0/jquery-ui.theme.css">
    <script src="../../resources/jquery-3.1.0.js"></script>
    <!--    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
    <script src="../../resources/jquery-ui-1.12.0/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#ad1user").click(function(){
                $("#ad1user").datepicker();
            });
        });
    </script>

    <title>Sign In</title>
</head>
<body>

<form name="capture" id="register-form" method="post" action="SignIn.php" novalidate="novalidate">

    <fieldset class="champ" id="champ" >
        <legend>Sign In</legend>

        <div style="float: left">
            <label for="login" class="labelForm">Alias*:</label>
            <input type="text" name="login" id="login" class="textFieldForm" size="30" maxlength="150" tabindex="1" /><br />

            <label for="password" class="labelForm">Password*:</label>
            <input type="password" name="password" id="password" class="textFieldForm" size="30" maxlength="70" tabindex="2" /><br/>

            <label for="passwordRep" class="labelForm">Repeat Password*:</label>
            <input type="password" name="passwordRep" id="passwordRep" class="textFieldForm" size="30" maxlength="70" tabindex="3" /><br/>

            <label for="nomUser" class="labelForm">Lastname*:</label>
            <input type="text" name="nomUser" id="nomUser" class="textFieldForm" size="30" maxlength="150" tabindex="4" /><br/>

            <label for="prenUser" class="labelForm">Name*:</label>
            <input type="text" name="prenUser" id="prenUser" class="textFieldForm" size="30" maxlength="150" tabindex="5" /><br />
        </div>
        <div style="float: left">

            <label for="ad1user" class="labelForm">Address:</label>
            <input type="text" name="ad1user" id="ad1user" class="textFieldForm datepicker" size="30" maxlength="150" tabindex="6" /><br />

            <label for="ad2user" class="labelForm">Address complement:</label>
            <input type="text" name="ad2user" id="ad2user" class="textFieldForm" size="30" maxlength="150" tabindex="7" /><br />

            <label for="cpUser" class="labelForm">Zip Code:</label>
            <input type="text" name="cpUser" id="cpUser" class="textFieldForm" size="30" maxlength="150" tabindex="8" /><br />

            <label for="villeUser" class="labelForm">City:</label>
            <input type="text" name="villeUser" id="villeUser" class="textFieldForm" size="30" maxlength="150" tabindex="9" /><br />

            <label for="telUser" class="labelForm">Telephone:</label>
            <input type="text" name="telUser" id="telUser" class="textFieldForm" size="30" maxlength="150" tabindex="10" /><br />

            <label for="pieceID" class="labelForm">ID:</label>
            <input type="text" name="pieceID" id="pieceID" class="textFieldForm" size="30" maxlength="150" tabindex="11" /><br />
        </div>

        <div class="formBtns">
            <p id="boutons">
                <input type="submit" formaction="controllers/SignInController.php" name="submit" value="Submit" id="envoyer" tabindex="20" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                <input type="reset"  value="Clear" tabindex="21" />

                <!--        <input type="submit" formmethod="post" name="submitclose" value="Close" id="close" tabindex="21" />-->

            <p class="closeBtn"><a class="close" href="index.php">Close</a></p>
            </p>
        </div>
    </fieldset>

</form>

</body>
</html>