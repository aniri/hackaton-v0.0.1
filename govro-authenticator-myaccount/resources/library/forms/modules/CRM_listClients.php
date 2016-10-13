<?

checkSession();
$clients = $clienti::CRM_loadAllClients();
$clientiSettingData = $clienti::CRM_loadSettings();
?>
<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-edit"></i>Listare clienti
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
											<a href="CRM_addClient.php"><button class="btn green">
											Client nou <i class="fa fa-plus"></i>
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
							<table class="table table-striped table-hover table-bordered" id="CRM_listClients">
							<thead>
							<tr>
							<? 
							$tableHeaderObject = array("Id", "Nume/Denumire", "Tip client", "CNP/CUI", "Judet/Sector", "Telefon", "Email", "Agent", "Program de beneficii", "Categorie", "Status", array("view", "edit"));
							$clienti::parseTableHeader($tableHeaderObject); ?>
							</tr>
							</thead>
							<tbody>
							<?
							foreach ($clients as $value)
							{
								$beneficiiData = $beneficii::CRM_load($value["administrare_programBeneficii"]);
								$agentiData = $agenti::CRM_load($value["administrare_agentId"]);
								
								echo "<tr>";
								
									echo "<td>" . $value["idClient"] . "</td>" .
										"<td>" . $value["dateClient_denumire"] . $value["dateClient_nume"] . " ". $value["dateClient_prenume"] . "</td>" .
										"<td>" . getValueByAlias($clientiSettingData, "clientType", $value["dateClient_tipClient"]) . "</td>" .
										"<td>" . $value["dateClient_cnp"] . $value["dateClient_cui"] . "</td>" .
										"<td>" . $value["adresa_judetSector"] . "</td>" .
										"<td>" . $value["contact_telefon"] . "</td>" .
										"<td>" . $value["contact_email"] . "</td>" .
										"<td>" . $agentiData["dateAgent_numeDenumire"] . "</td>" .
										"<td>" . $beneficiiData["dateProgramBeneficii_numeProgram"] . "</td>" .
										"<td>" . getValueByAlias($clientiSettingData, "clientCategory", $value["administrare_categorie"]) . "</td>" .
										"<td>" . getValueByAlias($clientiSettingData, "status", $value["administrare_status"]) . "</td>";
										echo '<td><a  onclick="viewCRMClient('."'".$value["idClient"]."'".')">
									Vezi/Editeaza </a>
								</td>
								<td>
									<a  onclick="deleteCRMClient('."'".$value["idClient"]."', '".$value["contact_email"]."'".')">
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
