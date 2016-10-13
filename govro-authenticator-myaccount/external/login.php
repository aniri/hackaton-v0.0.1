<?php

if (isset($_POST["f"]))
{
    switch ($_POST["f"])
    {
        case "ApiLogin":

            //define(PAGE, 'users');
            include("../resources/library/functions.php");
            include("../resources/library/session.php");
            include("../resources/library/modules.php");

            checkSession();

            //$pageInfo = getPageInfo(PAGE, $_SESSION["rights"]);

            //$userDetails = loadUserDetails($_SESSION["userEmail"]);
            logAppend(json_encode($_POST));
            echo json_encode(loadUserDetails($_SESSION["userEmail"]));
            header('Location: ' . $_POST['ipn'] . '?status=Ok&obj='. json_encode(loadUserDetails($_SESSION["userEmail"])));
            break;



    }
}
//f=ApiLogin&ipn=www.google.round()
?>