<?
checkSession();
$tableData = $angajati::CRM_loadAll();
$angajatSettingsData = $angajati::CRM_loadSettings();
?>
<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-edit"></i>Listare Angajati
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-6">
										<div class="btn-group">
											<a onclick="<?echo "addCRMElement('" . basename($_SERVER['PHP_SELF']). "'";?>)"><button class="btn green">
											Angajat Nou <i class="fa fa-plus"></i>
											</button></a>
										</div>
									</div>
									<div class="col-md-6">
										<div class="btn-group pull-right">
											<button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
											</button>
											<ul class="dropdown-menu pull-right">
												<li>
													<a href="javascript:;">
													Print </a>
												</li>
												<li>
													<a href="javascript:;">
													Save as PDF </a>
												</li>
												<li>
													<a href="javascript:;">
													Export to Excel </a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<table class="table table-striped table-hover table-bordered" id="CRM_listAngajati">
							<thead>
							<tr>
							<? 
							$tableHeaderObject = array("Nume", "Departament", "Telefon 1", "Telefon 2", "Email 1", "Email 2", "Status", array("view", "edit"));
							$angajati::parseTableHeader($tableHeaderObject); ?>
							</tr>
							</thead>
							<tbody>
							<?
							foreach ($tableData as $value)
							{
								echo "<tr>";
								
									echo "<td>" . $value["dateAngajati_nume"] . "</td>" .
										"<td>" . getValueByAlias($angajatSettingsData, "departament", $value["dateAngajati_departament"]) . "</td>" .
										"<td>" . $value["contact_telefon1"] . "</td>" .																				
										"<td>" . $value["contact_telefon2"] . "</td>" .
										"<td>" . $value["contact_email1"] . "</td>" .
										"<td>" . $value["contact_email2"] . "</td>" .
										"<td>" . getValueByAlias($angajatSettingsData, "status", $value["administrareAngajati_status"]) . "</td>";
										
								echo '<td><a  onclick="viewCRMElement('."'".$value["angajatiId"]."',". "'" .basename($_SERVER['PHP_SELF']). "'" .')">
									Vezi/Editeaza </a>
								</td>
								<td>
									<a  onclick="deleteCRMElement('."'".$value["angajatiId"]."', '".basename($_SERVER['PHP_SELF'])."'".')">
									Sterge </a></td>';
								echo "</tr>";
								
							}
							?>
							
								
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
