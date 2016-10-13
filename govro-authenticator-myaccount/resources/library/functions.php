<?
function dbConnect()
	{
	
	$serverName = "S-05\SQLEXPRESS"; //serverName\instanceName
	
	$connectionInfo = array( "Database"=>"", "UID"=>"sa", "PWD"=>".", "ReturnDatesAsStrings" => true);
	
	$conn = sqlsrv_connect( $serverName, $connectionInfo);

	if( !$conn ) 
	{
		
		logAppend("Connection could not be established." . sqlsrv_errors());
		die( print_r( sqlsrv_errors(), true));
	}
	return $conn;
}
function checkUser($email, $password)
	{
		$conn = dbConnect();
		$pass = selectPass($email);
		$sql = "SELECT email, password, active, rights FROM users WHERE email = '".$email."' and password = '".md5(md5($password.$pass))."'"; //urmeaza sa schimb metoda de criptare
		$stmt = sqlsrv_query( $conn, $sql );
		$result = array("error" => true, "errorMessage" => null);
		$rows = sqlsrv_has_rows( $stmt );
		logAppend($row_count);
		if($rows === true)
		{
			// output data of each row
			while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
				{	
					logAppend("User " . $email . " was found!");
					$active  = $row["active"];
					$rights  = $row["rights"];	
				}
				switch ($active)
					{
						case "1":
							logAppend("User " . $email . " is active!");
							switch ($rights)
								{
									case "0":
										logAppend("User " . $email . " has full rights!");
										logAppend("User " . $email . " logged in successfully.");
										$result["error"] = false;
										$result["rights"] = $rights;
										break;
										
									case "1":
										logAppend("User " . $email . " has 1 rights!");
										logAppend("User " . $email . " logged in successfully.");
										$result["error"] = false;
										$result["rights"] = $rights;
										break;
									case "2":
										logAppend("User " . $email . " has 1 rights!");
										logAppend("User " . $email . " logged in successfully.");
										$result["error"] = false;
										$result["rights"] = $rights;
										break;
									
									default:
										$result["error"] = true;
										$result["errorMessage"] = "User " . $email . " has no rights.";
										logAppend("User " . $email . " has no rights.");
										logAppend("User " . $email . " login failed.");
								}
						break;
						
						case "0":
							$result["error"] = true;
							$result["errorMessage"] = "User " . $email . " is not active.";
							logAppend("User " . $email . " is not active.");
							logAppend("User " . $email . " login failed.");
						break;
						default:
							$result["error"] = true;
							$result["errorMessage"] = "User " . $email . " doesn't exist.";
							logAppend("User " . $email . " doesn't exist.");
					
					}
		} 
		else
		{
			$result["error"] = true;
			$result["errorMessage"] = "User " . $email . " doesn't exist.";
			logAppend("User " . $email . " doesn't exist.");
		}
		sqlsrv_free_stmt( $stmt);
		return $result;
	}
function loadUserDetails($email)
	{
		$conn = dbConnect();
		$sql = "SELECT * FROM users WHERE email = '".$email."'"; //urmeaza sa schimb metoda de criptare
		$stmt = sqlsrv_query( $conn, $sql );
		$result = array("error" => true, "errorMessage" => null);
		if( $stmt)
		{
			// output data of each row
			while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
				{	
					$result = array("id" => $row["id"], "name" => $row["surname"] . " " . $row["name"], "phone" => $row["phone"], "email" => $row["email"], "profileImage" => $row["profileImage"], "cnp" => $row["cnp"], "joinDate" => $row["joinDate"], "rights" => $row["rights"]);
				}
		} 
		else
		{
			$result["error"] = true;
			$result["errorMessage"] = "User " . $email . " doesn't exist.";
			logAppend("User " . $email . " doesn't exist.");
		}
		sqlsrv_free_stmt( $stmt);
		return $result;
	}
function logAppend($string) 
	{
    $log_file = fopen("../logs/log_". date("d-m-y") .".txt", "a") or die("Unable to open file!");
	fwrite($log_file, date("H:i:s") . ": " . $string . PHP_EOL);
	fclose($log_file);
	}
function selectPass($email)
	{
		$conn = dbConnect();
		$sql = "SELECT pass FROM users WHERE email='".$email."'";
		$stmt = sqlsrv_query( $conn, $sql );
		if( $stmt)
			{
				// output data of each row
				while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
					{
						$pass = $row["pass"];
					}
			}
		sqlsrv_free_stmt( $stmt);
		return $pass;
}
function loadMenus($menuId)
	{
		$conn = dbConnect();
		$sql = "SELECT * FROM menus WHERE id='".$menuId."'";
		$stmt = sqlsrv_query( $conn, $sql );
		if( $stmt)
			{
				$i = 0;
				while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
					{
						$result[$i] = array("id" => $row["id"], "alias" => $row["alias"], "name" => $row["name"]);
						$i = $i+1;
					}
			}
		sqlsrv_free_stmt( $stmt);
		return $result;	
	}
function menuOptions($menuId, $userRights)
	{
		$conn = dbConnect();
		logAppend("Checking menu options for " . $menuId . " and " . $userRights);
		$sql = "SELECT id, alias, name,  href, rights, (SELECT name from menus where menus.id = menuOptions.menuId) as 'menu', (SELECT alias from icons where icons.id = menuOptions.iconId) as 'icon' FROM menuOptions where menuId = " . $menuId . " and rights like '%" . $userRights . "%'";
		$stmt = sqlsrv_query( $conn, $sql );
		logAppend($sql);
		if( $stmt)
			{
				$i = 0;
				while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
					{
						$result[$i] = array("id" => $row["id"], "alias" => $row["alias"], "name" => $row["name"], "href" => $row["href"], "rights" => $row["rights"], "menu" => $row["menu"], "icon" => $row["icon"]);
						$i = $i+1;
						
					}
			}
		sqlsrv_free_stmt( $stmt);
		return $result;	
	}
function subMenuOption($menuOptionId, $userRights)
	{
		$conn = dbConnect();
		$sql = "SELECT id, (SELECT name from menuOptions where menuOptions.id = subMenuOption.menuOptionId) as 'menuOption', alias, name, (SELECT alias from icons where icons.id = subMenuOption.iconId) as 'icon', href, rights from subMenuOption where menuOptionId = " . $menuOptionId . " and rights like '%" . $userRights . "%'";
		$stmt = sqlsrv_query( $conn, $sql );
		if( $stmt)
			{
				$i = 0;
				while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
					{
						$result[$i] = array("id" => $row["id"], "alias" => $row["alias"], "name" => $row["name"], "href" => $row["href"], "rights" => $row["rights"], "menuOption" => $row["menuOption"], "icon" => $row["icon"]);
						$i = $i+1;
					}
			}
		sqlsrv_free_stmt( $stmt);
		return $result;	
	}	
function getSettings($alias)
	{
		$conn = dbConnect();
		$sql = "SELECT * FROM settings WHERE alias='".$alias."'";
		$stmt = sqlsrv_query( $conn, $sql );
		if( $stmt)
			{
				// output data of each row
				while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
					{
						$result = array("alias" => $row["alias"], "name" => $row["name"], "value" => $row["value"]);
					}
			}
		sqlsrv_free_stmt( $stmt);
		return $result;
}
function getPageInfo($alias, $userRights)
	{ 
		$conn = dbConnect();
		$sql = "select title, shortDescription, 
				(SELECT name from menuOptions where menuOptions.id = pages.menuOptionId) as 'menuOption',
				(SELECT href from menuOptions where menuOptions.id = pages.menuOptionId) as 'menuOptionHREF',
				(SELECT alias from icons where icons.id = (SELECT iconId from menuOptions where menuOptions.id = pages.menuOptionId)) as 'icon',
				(SELECT name from subMenuOption where subMenuOption.id = pages.subMenuOptionId) as 'subMenuOption',
				(SELECT href from subMenuOption where subMenuOption.id = pages.subMenuOptionId) as 'subMenuOptionHREF' 
				from pages where alias = '".$alias."' and active = 1 and rights like '%" . $userRights . "%'";
		$stmt = sqlsrv_query( $conn, $sql );
		if($stmt)
			{
				 $rows = sqlsrv_has_rows( $stmt );
   
				if ($rows)
				{
				// output data of each row
				while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
					{
						$result = array("title" => $row["title"], "menuOption" => $row["menuOption"], "shortDescription" => $row["shortDescription"], "menuOptionHREF" => $row["menuOptionHREF"], "subMenuOption" => $row["subMenuOption"], "subMenuOptionHREF" => $row["subMenuOptionHREF"], "icon" => $row["icon"]);
					}
				}
				else
		{
			header ('Location: ../login/error.php');
			
		}
			}
		else
		{
			header ('Location: ../login/error.php');
			
		}
		sqlsrv_free_stmt( $stmt);
		return $result;
}
function generate_uuid()
	{
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
        mt_rand( 0, 0xffff ),
        mt_rand( 0, 0x0fff ) | 0x4000,
        mt_rand( 0, 0x3fff ) | 0x8000,
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
}
function uploadImage($uuid, $image)
	{
	mkdir("../resources/modules/addBeneficii/" . $uuid, 0700);
	$target_dir = "../resources/modules/addBeneficii/" . $uuid . "/";
	$target_file = $target_dir . basename($image["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	
    $check = getimagesize($image["tmp_name"]);
    if($check !== false) {
       logAppend("File is an image - " . $check["mime"] . ".");
        $uploadOk = 1;
    } else {
       logAppend("File is not an image.");
        $uploadOk = 0;
    }
	// Check if file already exists
if (file_exists($target_file)) {
   logAppend("Sorry, file already exists.");
    $uploadOk = 0;
}
// Check file size
if ($image["size"] > 500000) {
   logAppend("Sorry, your file is too large.");
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
   logAppend("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    logAppend("Sorry, your file was not uploaded.");
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($image["tmp_name"], $target_file)) {
        logAppend("The file ". basename($image["name"]). " has been uploaded.");
		logAppend($target_file);
    } else {
       logAppend("Sorry, there was an error uploading your file.");
    }
}
	return array("URL"=> "http://govauth.whiz.ro/resources/modules/addBeneficii/" . $uuid . "/" . basename($image["name"]));
	
}
function getUsers()
	{
		$conn = dbConnect();
		$sql = "SELECT [id],[name],[surname],[phone],[email],[profileImage],[joinDate],(SELECT value from [userRights] where [userRights].[id] = rights) as 'rights',[active] FROM [users] ORDER by id";
		$stmt = sqlsrv_query($conn, $sql);
		if( $stmt)
			{
				$i = 0;
				// output data of each row
				while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
					{
						$result[$i] = array("id" => $row["id"], "name" => $row["name"], "surname" => $row["surname"], "phone" => $row["phone"], "email" => $row["email"], "profileImage" => $row["profileImage"], "joinDate" => $row["joinDate"], "rights" => $row["rights"], "active" => $row["active"]);
						$i++;
					}
			}
		sqlsrv_free_stmt( $stmt);
		return $result;	
}
function getUserByEmail($email)
	{
		$conn = dbConnect();
		$sql = "SELECT [id],[name],[surname],[phone],[email],[profileImage],[joinDate],(SELECT value from [userRights] where [userRights].[id] = rights) as 'rights',[active] FROM [users] where [email] = '" . $email . "'";
		$stmt = sqlsrv_query($conn, $sql);
		if( $stmt)
			{
				
				// output data of each row
				while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
					{
						$result = array("id" => $row["id"], "name" => $row["name"], "surname" => $row["surname"], "phone" => $row["phone"], "email" => $row["email"], "profileImage" => $row["profileImage"], "joinDate" => $row["joinDate"], "rights" => $row["rights"], "active" => $row["active"]);
				
					}
			}
		sqlsrv_free_stmt( $stmt);
		return $result;	
}
function getUserById($id)
	{
		$conn = dbConnect();
		$sql = "SELECT [id],[name],[surname],[phone],[email],[profileImage],[joinDate],(SELECT value from [userRights] where [userRights].[id] = rights) as 'rights',[active] FROM [users] where [id] = '" . $id . "'";
		$stmt = sqlsrv_query($conn, $sql);
		if( $stmt)
			{
				
				// output data of each row
				while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
					{
						$result = array("id" => $row["id"], "name" => $row["name"], "surname" => $row["surname"], "phone" => $row["phone"], "email" => $row["email"], "profileImage" => $row["profileImage"], "joinDate" => $row["joinDate"], "rights" => $row["rights"], "active" => $row["active"]);
				
					}
			}
		sqlsrv_free_stmt( $stmt);
		return $result;	
}
function deleteUser($who, $id)
	{
	$conn = dbConnect();
		$sql = "DELETE from users where id= " . $id;
		$stmt = sqlsrv_query($conn, $sql);
		sqlsrv_free_stmt( $stmt);
		logAppend("User " . $who . " deleted user id: " . $id);
		return $result;	
	
}
function generateRandomString($length = 10) 
	{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
	}
function addUser($array)
	{
		$getUserByEmail = getUserByEmail($array["email"]);
		$result["error"] = false;
		if ($getUserByEmail["id"] == null)
		{
			logAppend("User ". $array["email"] . " not exist");
			$date = date('Y-m-d H:i:s');
			$pass = generateRandomString();
			logAppend($pass);
			$password = md5(md5($array["password"] . $pass));
			logAppend($password);
			$uploadProfileImage = uploadProfileImage($array["profileImage"]);



			$conn = dbConnect();
			$sql = "INSERT INTO [users] ([name], [surname], [phone], [email], [profileImage], [pass], [password], [rights], [active], [joinDate], [cnp]) VALUES ('".$array["name"]."', '".$array["surname"]."', '".$array["phone"]."', '".$array["email"]."', '".$array["profileImage"]."', '".$pass."', '".$password."', '".$array["userRights"]."', '".$array["active"]."', '".$date."', '".$array["cnp"]."')";
			$stmt = sqlsrv_query($conn, $sql);
			sqlsrv_free_stmt( $stmt);	
			logAppend("User " . $array["who"] . " added a new user: " . $array["email"]);

		}
		else
		{
			$result["error"] = true;
			$result["errorMessage"] = "Utilizatorul " . $array["email"] . " exista deja!";
		}
		return $result;
}
function uploadProfileImage($image)
	{
	if (isset($image) && $image["error"] != UPLOAD_ERR_NO_FILE)
	{
	$uuid = generate_uuid();
	mkdir("../resources/library/images/profile/" . $uuid, 0700);
	$target_dir = "../resources/library/images/profile/" . $uuid . "/";
	$target_file = $target_dir . basename($image["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	
    $check = getimagesize($image["tmp_name"]);
    if($check !== false) {
       logAppend("File is an image - " . $check["mime"] . ".");
        $uploadOk = 1;
    } else {
       logAppend("File is not an image.");
        $uploadOk = 0;
    }
	// Check if file already exists
if (file_exists($target_file)) {
   logAppend("Sorry, file already exists.");
    $uploadOk = 0;
}
// Check file size
if ($image["size"] > 500000) {
   logAppend("Sorry, your file is too large.");
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
   logAppend("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    logAppend("Sorry, your file was not uploaded.");
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($image["tmp_name"], $target_file)) {
        logAppend("The file ". basename($image["name"]). " has been uploaded.");
		logAppend($target_file);
    } else {
       logAppend("Sorry, there was an error uploading your file.");
    }
}
	return array("URL"=> "http://govauth.whiz.ro/resources/library/images/profile/" . $uuid . "/" . basename($image["name"]));
	}
	else{
	return array ("URL" => "http://govauth.whiz.ro/resources/library/images/profile/default/profile.png");}
}
function updateUser($who, $id, $query)
	{
		if ($query != null)
		{
			if ($query[7] != null) {
				$pass = generateRandomString();
			logAppend($pass);
			$password = md5(md5($query[7] . $pass));
			$query[7] = "password = '" . $password . "'";
			$query[8] = "pass = '" . $pass . "'";		
			}
		$comma_separated = implode(",", $query);

		$conn = dbConnect();
		$sql = "UPDATE [users] SET ".$comma_separated." where id = ".$id."";
		logAppend($sql);
		$stmt = sqlsrv_query( $conn, $sql );
		if( $stmt)
			{
			logAppend("Updated profile " . $id . " by " . $who);	
			}
		else
		{
			logAppend("An error was received when update for " . $id);
			
		}			
			
		sqlsrv_free_stmt( $stmt);
		}
		
	}
function getRights()
	{
		$conn = dbConnect();
		$sql = "SELECT [id], [value] FROM [userRights] ORDER by id";
		$stmt = sqlsrv_query($conn, $sql);
		if( $stmt)
			{
				$i = 0;
				// output data of each row
				while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
					{
						$result[$i] = array("id" => $row["id"], "value" => $row["value"]);
						$i++;
					}
			}
		sqlsrv_free_stmt( $stmt);
		return $result;	
}
function getRightsDescription($id)
	{
		$conn = dbConnect();
		$sql = "SELECT [description] FROM [userRightsInfo] WHERE idUserRights = " . $id;
		$stmt = sqlsrv_query($conn, $sql);
		if( $stmt)
			{
				$i = 0;
				// output data of each row
				while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
					{
						$result[$i] = array("description" => $row["description"]);
						$i++;
					}
			}
		sqlsrv_free_stmt( $stmt);
		return $result;	
}
function updateUserRights($id, $data)
	{
		$conn = dbConnect();
		$sql = "UPDATE [userRights] SET [value] = '".$data."' WHERE id=" . $id;
		$stmt = sqlsrv_query($conn, $sql);
		sqlsrv_free_stmt( $stmt);
		return $result;	
}

function insertIcon($data)
	{
	$conn = dbConnect();
		$sql = "INSERT INTO [icons] ([alias],[name],[url]) VALUES ('".$data["alias"]."', '".$data["name"]."', '".$data["url"]."')";
		$stmt = sqlsrv_query($conn, $sql);
		sqlsrv_free_stmt( $stmt);
		return $result;	
		logAppend("User " . $userDetails["id"] . " has inserted a new icon");
}
function objToJSON($data)
{
   return json_encode($data);
 
    return $data;
}
function showModuleSettings($object, $element)
{
	foreach ($object as $name => $value)
	{
		if ($name == $element)
		{
			foreach ($value as $name => $data)
			{
				if ($data["isDefault"] == "true")
				{
					echo '<option value="'.$data["alias"].'" selected="selected">'.$data["value"].'</option>';
				}
				else
				{
					echo '<option value="'.$data["alias"].'">'.$data["value"].'</option>';
				}
			}
		}
	}
}
function showEditModuleSettings($object, $element, $defaultValue)
{
	foreach ($object as $name => $value)
	{
		if ($name == $element)
		{
			foreach ($value as $name => $data)
			{
				if ($data["alias"] == $defaultValue)
				{
					echo '<option value="'.$data["alias"].'" selected="selected">'.$data["value"].'</option>';
				}
				else
				{
					echo '<option value="'.$data["alias"].'">'.$data["value"].'</option>';
				}
			}
		}
	}
}
function getValueByAlias($object, $type, $alias)
{
foreach($object as $name => $settingsValue)
	{
		if($name == $type)
		{
			foreach($settingsValue as $name => $data)
			{
				if($data["alias"] == $alias)
				{
					$result = $data["value"];	
				}
		
				
			}
			
		}
	}
	return $result;
}

?>