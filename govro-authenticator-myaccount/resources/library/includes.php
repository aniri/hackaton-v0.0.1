<?

switch (PAGE)
	{
		case "login":
			include("../resources/library/functions.php");
			include("../resources/library/session.php");
		
		break;
		default:
				
		checkSession();

		$pageInfo = getPageInfo(PAGE, $_SESSION["rights"]);

		$userDetails = loadUserDetails($_SESSION["userEmail"]);

		$form = "list";

			break;
		
	}

?>