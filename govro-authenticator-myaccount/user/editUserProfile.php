<?php

define(PAGE, 'editUserProfile');
include("../resources/library/functions.php");
include("../resources/library/session.php");
include("../resources/library/modules.php");


checkSession();

$pageInfo = getPageInfo(PAGE, $_SESSION["rights"]);

$userDetails = loadUserDetails($_SESSION["userEmail"]);
$getUsersResponse = getUsers();
$restrictions["editUser"] = true;

$getUserById = getUserById($userDetails["id"]);

	if (isset($_POST["editUser"]))
	{
	if ($getUserById["name"] != $_POST["name"]){$queryEditUser[0] = "name = '" . $_POST["name"] . "'";}
	if ($getUserById["surname"] != $_POST["surname"]){$queryEditUser[1] = "surname = '" . $_POST["surname"] . "'";}
	if ($getUserById["email"] != $_POST["email"]){$queryEditUser[2] = "email = '" . $_POST["email"] . "'"; $emailChange = true;}
	if ($getUserById["phone"] != $_POST["phone"]){$queryEditUser[3] = "phone = '" . $_POST["phone"] . "'";}
	if ($getUserById["password"] != $_POST["password"]){$queryEditUser[7] = $_POST["password"];}
	if (isset($_FILES['imageProfile']) && !empty($_FILES['imageProfile']['name'])){$image = uploadProfileImage($_FILES["imageProfile"]); $queryEditUser[6] = "profileImage = '" . $image["URL"] . "'"; }
	updateUser($_SESSION["userEmail"], $userDetails["id"], $queryEditUser);
	$getUserById = getUserById($userDetails["id"]);
	if ($emailChange == true){header("Location: ../resources/library/logOut.php");}
	}


?>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Dashboard - CRM CMS</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<link href="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="../assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="../assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="../assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="../assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="../assets/admin/layout/css/themes/light.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="../assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-header-fixed page-quick-sidebar-over-content page-sidebar-closed-hide-logo page-container-bg-solid">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="<? $logoUrl = getSettings("crmLogoUrl"); echo $logoUrl["value"]; ?>">
			<img src="<? $logoImg = getSettings("crmLogo"); echo $logoImg["value"]; ?>" alt="logo" class="logo-default" style="max-width:148px;" />
			</a>
			<div class="menu-toggler sidebar-toggler hide">
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				
				
				
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img alt="" class="img-circle" src=<? echo "'".$userDetails["profileImage"]."'"?>/>
					<span class="username username-hide-on-mobile">
					<!-- <img src="https://www.gravatar.com/avatar/<?php echo md5($userDetails["email"]); ?>" style="width:25px;"> -->
					<? echo $userDetails["name"];?> </span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
						<?
						$userMenuOptions = menuOptions(2, $_SESSION["rights"]);
						
						if (!empty($userMenuOptions))
								{						
									foreach ($userMenuOptions as $value) 
									{
										echo '<li>
							<a href="'.$value["href"].'">
							<i class="'.$value["icon"].'"></i>'.$value["name"].'</a>
						
						</li>';
									}
								}
					?>
						
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
				<!-- BEGIN QUICK SIDEBAR TOGGLER -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				
				<!-- END QUICK SIDEBAR TOGGLER -->
			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<li>
				</br>
				</li>
				<li>
				</br>
				</li>
				<li>
				</br>
				</li>
				<li class="start active open">
					<a href="../login">
					<i class="icon-home"></i>
					<span class="title">Acasa</span>
					<span class="selected"></span>
					
					</a>
				</li>
				<li>
					<a href="editUserProfile.php">
					<i class="icon-user"></i>
					Profilul meu</a>
				</li>
				<li>
					<a href="../resources/library/logOut.php">
					<i class="icon-key"></i>
					Iesire</a>
				</li>
				<!--
				<?
						$mainMenuOptions = menuOptions(1, $_SESSION["rights"]);
						
						if (!empty($mainMenuOptions))
								{
									
									
									foreach ($mainMenuOptions as $value) 
									{
										echo "<li>";
										echo '<a href="javascript:;">
												<i class="'.$value["icon"].'"></i>
											<span class="title">'.$value["name"].'</span>
											<span class="arrow "></span>
											</a>';
										$subMenuOption =  subMenuOption($value["id"], $_SESSION["rights"]);
										
										if (!empty($subMenuOption))
										{
											echo '<ul class="sub-menu">';
											foreach ($subMenuOption as $value)
											{
												echo '<li>
													<a href="'.$value["href"].'">
													<i class="'.$value["icon"].'"></i>
													'.$value["name"].'</a>
													</li>';
											}
											echo '</ul>';
										}
										echo "</li>"; 
									}
								
								}
					?>						
				-->
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN STYLE CUSTOMIZER -->
			
			<!-- END STYLE CUSTOMIZER -->
			<!-- BEGIN PAGE HEADER-->
			<div class="page-bar">
				<ul class="page-breadcrumb">
				<?
					
					
					if (!empty($pageInfo))
								{	
										echo '<li> 
												<i class="'.$pageInfo["icon"].'"></i>
												<a href="'.$pageInfo["menuOptionHREF"].'">'.$pageInfo["menuOption"].'</a>
												<i class="fa fa-angle-right"></i>
											</li>';
										echo '<li>
												<a href="'.$pageInfo["subMenuOptionHREF"].'">'.$pageInfo["title"].'</a>
											</li>';
								}
				
				?>
				</ul>
				
			</div>
			<h3 class="page-title">
			<? echo $pageInfo["title"];
			if (strlen($pageInfo["shortDescription"]) > 0)
			{
				echo " <small>".$pageInfo["shortDescription"]."</small>";
			}
				?>
			</h3>
			<!-- END PAGE HEADER-->
			<!-- BEGIN DASHBOARD STATS -->
			
			<!-- END DASHBOARD STATS -->
			<div class="portlet light">
					<div class="portlet-body">
					<?
					if ($restrictions["selectUsers"] == true)
					{
						echo '<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-edit"></i>Utilizatori
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							
							<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
							<thead>
							<tr>
								<th>
									 Id
								</th>
								<th>
									 Imagine profil
								</th>
								<th>
									 Nume
								</th>
								<th>
									E-mail
								</th>
								<th>
									 Telefon
								</th>
								<th>
									 Data adaugare
								</th>
								<th>
									 Tip utilizator
								</th>
								<th>
									 Activ
								</th>
								<th>
									 
								</th>
								<th>
									 
								</th>
							</tr>
							</thead>
							<tbody>';
							foreach ($getUsersResponse as $value)
							 {
								 $date = strtotime("2015-10-05 12:23:23");
								 echo "<tr>";
								echo "<td>" . $value["id"] . "</td>";	
								 echo "<td  class='center'><img src='" . $value["profileImage"] . "' style='width:50px;'/></td>";
								 echo "<td>" . $value["surname"] . " " . $value["name"] . "</td>";
								 echo "<td>" . $value["email"] . "</td>";
								 echo "<td>" . $value["phone"] . "</td>";
								 echo "<td>".$value["joinDate"]."</td>";
								 echo "<td>" . $value["rights"] . "</td>";
								 switch ($value["active"]){
									 case "1":
											echo "<td>Yes</td>";
										break;
									case "0":
											echo "<td>No</td>";
										break;
								 }
								 
								  echo '<td>
									<a  onclick="editUser('."'".$value["id"]."'".')">
									Edit </a>
								</td>';
								   echo "<td><a href='users.php?delete=true&id=" . $value['id'] . "'" . ' onclick="return confirm(\'Esti sigur ca vrei sa stergi utilizatorul '.$value["email"].'?\');">Delete</a></td>';
								 echo "</tr>";
							 }
							 echo '</tbody>
							</table>
						</div>
					</div>
					</div>
					</div>';

					}	
					else
					{
						
						echo '<div class="portlet light">
							<div class="portlet-body">'; 
						include("../resources/library/forms/editUserFromProfile.php");
						echo '</div></div>';

					}
							?>
							
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<?
			if ($restrictions["selectUsers"])
			{
				echo '<div class="portlet light">
					<div class="portlet-body">'; 
				include("../resources/library/forms/addUser.php");
				echo '</div></div>';
			}
			?>
			
					</div>
			</div>
			
		</div>
	</div>
	<!-- END CONTENT -->
	
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
		 <? $getCopyright = getSettings("copyright"); echo date('Y') . " " . $getCopyright["value"];?>
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="../assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="../assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
<script type="text/javascript" src="../assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="../assets/global/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="../assets/admin/pages/scripts/addBeneficii.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="../../assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../../assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="../../assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="../../assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="../../assets/admin/pages/scripts/table-editable.js"></script>
<script src="../../assets/admin/pages/scripts/editUserFromProfile.js"></script>
<script>
jQuery(document).ready(function() {       
   // initiate layout and plugins
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
   FormValidation.init();
});
function editUser(id)
	{
	
	window.location.href = "users.php?function=editUserGET&id=" + id;
	return false;
	}
function showPassword()
	{
		if (document.getElementById("showPass").innerHTML == "Arata parola")
		{
		document.getElementById("showPass").innerHTML = "Ascunde parola";
		$('#password').attr('type', 'text');
		$('#rpassword').attr('type', 'text');
		}
		else
		{
		document.getElementById("showPass").innerHTML = "Arata parola";
		$('#password').attr('type', 'password');
		$('#rpassword').attr('type', 'password');
		}
	}
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>