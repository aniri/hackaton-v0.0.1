<?
checkSession();
$tableData = $contract::CRM_loadAll();
$contractSettingsData = $contract::CRM_loadSettings();

include("../resources/library/modules/CRM_asiguratorFurnizors.php");
$furnizori = "Asigurator";
$furnizoriData = $furnizori::CRM_loadAll();

include("../resources/library/modules/CRM_agents.php");
$agenti = "Agenti";
$agentiData = $agenti::CRM_loadAll();

?>
<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-edit"></i>Listare contracte
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
											Contract nou <i class="fa fa-plus"></i>
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
							<table class="table table-striped table-hover table-bordered" id="CRM_listContracts">
							<thead>
							<tr>
							<? 
							$tableHeaderObject = array("Contract", "Data emitere", "Tip produs", "Nume/Denumire", "CNP/CUI", "Asigurator/Furnizor", "Data inceput", "Data sfarsit", "Prima contract", "Agent", "Status", array("view", "edit"));
							$contract::parseTableHeader($tableHeaderObject); ?>
							</tr>
							</thead>
							<tbody>
							<?
							foreach ($tableData as $value)
							{
								$furnizoriData = $furnizori::CRM_load($value["dateContract_asiguratorFurnizor"]);
								$agentiData = $agenti::CRM_load($value["administrare_agent"]);
								echo "<tr>";
								
									echo "<td>" . $value["contractId"] . "</td>" .
										"<td>" . $value["dateContract_dataEmitere"] . "</td>" .
										"<td>" . $value["dateContract_tipProdus"] . $value["dateClient_cui"] . "</td>" .
										"<td>" . $value["dateClient_numeDenumire"] . "</td>" .
										"<td>" . $value["dateClient_cnpCui"] . "</td>" .
										"<td>" . $furnizoriData["dateAsiguratorFurnizor_denumire"] . "</td>" .
										"<td>" . $value["dataPlata_dataInceput"] . "</td>" .
										"<td>" . $value["dataPlata_dataSfarsit"] . "</td>" .
										"<td>" . $value["administrare_comisionContract"] . "</td>" .
										"<td>" . $agentiData["dateAgent_numeDenumire"] . "</td>" .
										"<td>" . getValueByAlias($contractSettingsData, "statusContract", $value["administrare_statusContract"]) . "</td>";
										
										
										echo '<td><a  onclick="viewCRMElement('."'".$value["contractId"]."',". "'" .basename($_SERVER['PHP_SELF']). "'" .')">
									Vezi/Editeaza </a>
								</td>
								<td>
									<a  onclick="deleteCRMElement('."'".$value["contractId"]."', '".basename($_SERVER['PHP_SELF'])."'".')">
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
