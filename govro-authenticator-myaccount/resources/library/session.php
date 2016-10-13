<?php

function createUserSession($userEmail, $rights)
{
	session_start();
	logAppend("Creating session for " . $userEmail . ".");
	$_SESSION["userEmail"] = $userEmail;
	$_SESSION["rights"] = $rights;
	
	if(($_SESSION["userEmail"] == $userEmail) && ($_SESSION["rights"] == $rights))
	{
		logAppend("Session " . $userEmail . " created successfully!");		
	}
}
function checkSession()
{
	session_start();
	if (isset($_SESSION["userEmail"]) && isset($_SESSION["rights"]))
	{	
		logAppend("Session for user " . $_SESSION["userEmail"] . " exists." );
		$result["error"] = false;
		$result["errorMessage"] = null;
		$email = $_SESSION["userEmail"];
		$rights = $_SESSION["rights"];

		session_regenerate_id();

	//	session_unset(); 
	//createUserSession($email, $rights);
	}
	else
	{	
		logAppend("Session for user " . $_SESSION["userEmail"] . " is not existing." );
		$result["error"] = true;
		$result["errorMessage"] = "Session for user " . $_SESSION["userEmail"] . " is not existing." ;
        $_SESSION["ipn"] = $_POST["ipn"];
		header ('Location: ../login');

		die();
	}
	return $result;
}
function checkLoginSession()
{
	session_start();
	if (isset($_SESSION["userEmail"]) && isset($_SESSION["rights"]))
	{	
		logAppend("Session for user " . $_SESSION["userEmail"] . " exists." );
		$result["error"] = false;
		$result["errorMessage"] = null;
		header ('Location: ../user');
		die();
	}
	else
	{	
		logAppend("Session for user " . $_SESSION["userEmail"] . " is not existing." );
		$result["error"] = true;
		$result["errorMessage"] = "'There are no active sessions." ;
	}
	return $result;
}

?>