<?
checkSession();
$tableData = $agentie::CRM_loadAll();
$agentieSettings = $agentie::CRM_loadSettings();

include("../resources/library/modules/CRM_distribuitors.php");
$distribuitor = "Distribuitor";
$distribuitoriData = $distribuitor::CRM_loadAll();


include("../resources/library/modules/CRM_contracts.php");
$contracte = "Contract";
$contracteData = $contracte::CRM_loadAll();
$contracteSettingsData = $contracte::CRM_loadSettings();

?>
<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-edit"></i>Listare Agentii
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
							<table class="table table-striped table-hover table-bordered" id="CRM_listAgentie">
							<thead>
							<tr>
							<? 
							$tableHeaderObject = array("Nume/Denumire", "Distribuitor", "Tip comision", "Valoare comision", "Status", array("view", "edit"));
							$agentie::parseTableHeader($tableHeaderObject); ?>
							</tr>
							</thead>
							<tbody>
							<?
							foreach ($tableData as $value)
							{
								$distribuitorData = $distribuitor::CRM_load($value["administrare_distribuitor"]);
								echo "<tr>";
								
									echo "<td>" . $value["dateAgentie_numeDenumire"] . "</td>" .
										"<td>" . $distribuitorData["dateDistribuitor_numeDenumire"] . "</td>" .
										"<td>" . getValueByAlias($contracteSettingsData, "tipComisionNegociat", $value["administrare_tipComision"]) . "</td>" .																				
										"<td>" . $value["administrare_valoareComision"] . "</td>" .
										"<td>" . getValueByAlias($agentieSettings, "status", $value["administrare_status"]) . "</td>";
								
								echo '<td><a  onclick="viewCRMElement('."'".$value["agentieId"]."',". "'" .basename($_SERVER['PHP_SELF']). "'" .')">
									Vezi/Editeaza </a>
								</td>
								<td>
									<a  onclick="deleteCRMElement('."'".$value["agentieId"]."', '".basename($_SERVER['PHP_SELF'])."'".')">
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
