<?
checkSession();
$tableData = $agenti::CRM_loadAll();
$agentSettings = $agenti::CRM_loadSettings();

include("../resources/library/modules/CRM_distribuitors.php");
$distribuitori = "Distribuitor";
$distribuitorData = $distribuitori::CRM_loadAll();

include("../resources/library/modules/CRM_recomandators.php");
$recomandatori = "Recomandatori";
$recomandatoriData = $recomandatori::CRM_loadAll();

include("../resources/library/modules/CRM_contracts.php");
$contracte = "Contract";
$contractSettingsData = $contracte::CRM_loadSettings();
?>
<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-edit"></i>Listare Agenti
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
											Agent Nou <i class="fa fa-plus"></i>
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
							<table class="table table-striped table-hover table-bordered" id="CRM_listAgent">
							<thead>
							<tr>
							<? 
							$tableHeaderObject = array("Nume/Denumire", "Distribuitor", "Recomandator", "Tip comision", "Valoare comision", "Status", array("view", "edit"));
							$agenti::parseTableHeader($tableHeaderObject); ?>
							</tr>
							</thead>
							<tbody>
							<?
							foreach ($tableData as $value)
							{
								$distribuitorData = $distribuitori::CRM_load($value["administrare_distribuitor"]);
								$recomandatoriData = $recomandatori::CRM_load($value["administrare_recomandator"]);
								echo "<tr>";
								
									echo "<td>" . $value["dateAgent_numeDenumire"] . "</td>" .
										"<td>" . $distribuitorData["dateDistribuitor_numeDenumire"] . "</td>" .
										"<td>" . $recomandatoriData["dateRecomandator_numeDenumire"] . "</td>" .																				
										"<td>" . getValueByAlias($contractSettingsData, "tipComisionNegociat", $value["administrare_tipComision"]) . "</td>" .
										"<td>" . $value["administrare_valoareComision"] . "</td>" .
										"<td>" . getValueByAlias($agentSettings, "status", $value["administrare_status"]) . "</td>";
										
									echo '<td><a  onclick="viewCRMElement('."'".$value["agentId"]."',". "'" .basename($_SERVER['PHP_SELF']). "'" .')">
									Vezi/Editeaza </a>
								</td>
								<td>
									<a  onclick="deleteCRMElement('."'".$value["agentId"]."', '".basename($_SERVER['PHP_SELF'])."'".')">
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
