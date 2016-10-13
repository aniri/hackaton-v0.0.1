<?
checkSession();
$tableData = $cerereOferta::CRM_loadAll();
$listRequestsSettingsOffer = $cerereOferta::CRM_loadSettings();

include("../resources/library/modules/CRM_agents.php");
$agenti = "Agenti";
$agentiData = $agenti::CRM_loadAll();

include("../resources/library/modules/CRM_products.php");
$produse = "Produse";
$produseData = $produse::CRM_loadAll();
?>
<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-edit"></i>Listare cereri oferta
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
											<a href="CRM_requestsAddOffer.php"><button class="btn green">
											Adaugare cerere oferta <i class="fa fa-plus"></i>
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
							<table class="table table-striped table-hover table-bordered" id="CRM_RequestsListOffer">
							<thead>
							<tr>
							<? 
							$tableHeaderObject = array("Cerere oferta", "Data cerere", "Tip cerere oferta", "Tip produs", "Tip oferta", "Nume/Denumire", "CNP/CUI", "Telefon", "Email", "Agent", "Status", array("view", "edit"));
							$cerereOferta::parseTableHeader($tableHeaderObject); ?>
							</tr>
							</thead>
							<tbody>
							<?
							foreach ($tableData as $value)
							{
								$agentiData = $agenti::CRM_load($value["administrare_agent"]);
								$produseData = $produse::CRM_load($value["dateCerereOferta_tipProdus"]);
								echo "<tr>";
								
									echo "<td>" . $value["cerereOfertaId"] . "</td>" .
										"<td>" . $value["dateCerereOferta_dataCerereOferta"] . "</td>" .
										"<td>" . getValueByAlias($listRequestsSettingsOffer, "tipCerereOferta", $value["dateCerereOferta_tipCerereOferta"]) . "</td>" .
										"<td>" . $produseData["dateProdus_denumire"] . "</td>" .
										"<td>" . getValueByAlias($listRequestsSettingsOffer, "tipOferta", $value["dateCerereOferta_tipOferta"]) . "</td>" .
										"<td>" . $value["dateClient_numeDenumire"] . "</td>" .
										"<td>" . $value["dateClient_cnpCui"] . "</td>" .
										"<td>" . $value["dateClient_telefon"] . "</td>" .
										"<td>" . $value["dateClient_email"] . "</td>" .
										"<td>" . $agentiData["dateAgent_numeDenumire"] . "</td>" .																				
										"<td>" . getValueByAlias($listRequestsSettingsOffer, "statusOferta", $value["administrare_statusCerereOferta"]) . "</td>";
										echo '<td><a  onclick="viewCRMElement('."'".$value["cerereOfertaId"]."',". "'" .basename($_SERVER['PHP_SELF']). "'" .')">
									Vezi/Editeaza </a>
								</td>
								<td>
									<a  onclick="deleteCRMElement('."'".$value["cerereOfertaId"]."', '".basename($_SERVER['PHP_SELF'])."'".')">
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
