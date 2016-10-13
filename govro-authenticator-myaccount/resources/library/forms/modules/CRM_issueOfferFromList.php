<?php
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
							<tr class="thead-style">
							<?php 
							$tableHeaderObject = array("Cerere oferta", "Data cerere", "Tip cerere oferta", "Tip produs", "Tip oferta", "Nume/Denumire", "CNP/CUI", "Telefon", "Email", "Agent", "Status", array("view", "edit"));
							$cerereOferta::parseTableHeader($tableHeaderObject); ?>
							</tr>
							</thead>
							<tfoot>
								<tr>
								<?php$cerereOferta::parseTableHeader($tableHeaderObject); ?>
								</tr>
							</tfoot>
							<tbody class="tbody-style">
							<?php
							$colors = array("In asteptare" => "yellow", "Neacceptata" => "red", "Depasita!" => "red-thunderbird", "Oferta acceptata" => "green", "Expirata- fara raspuns" => "purple");
							
							foreach ($tableData as $value)
							{
								$agentiData = $agenti::CRM_load($value["administrare_agent"]);
								$produseData = $produse::CRM_load($value["dateCerereOferta_tipProdus"]);
								echo "<tr>";
								
									echo "<td style='padding-left:20px; padding-right:20px;'>" . $value["cerereOfertaId"] . "</td>" .
										"<td style='padding-left:20px; padding-right:20px;'>" . $value["dateCerereOferta_dataCerereOferta"] . "</td>" .
										"<td style='padding-left:20px; padding-right:20px;'>" . getValueByAlias($listRequestsSettingsOffer, "tipCerereOferta", $value["dateCerereOferta_tipCerereOferta"]) . "</td>" .
										"<td style='padding-left:20px; padding-right:20px;'>" . $produseData["dateProdus_tipProdus"] . "</td>" .
										"<td style='padding-left:20px; padding-right:20px;'>" . getValueByAlias($listRequestsSettingsOffer, "tipOferta", $value["dateCerereOferta_tipOferta"]) . "</td>" .
										"<td style='padding-left:20px; padding-right:20px;'>" . $value["dateClient_numeDenumire"] . "</td>" .
										"<td style='padding-left:20px; padding-right:20px;'>" . $value["dateClient_cnpCui"] . "</td>" .
										"<td style='padding-left:20px; padding-right:20px;'>" . $value["dateClient_telefon"] . "</td>" .
										"<td style='padding-left:20px; padding-right:20px;'>" . $value["dateClient_email"] . "</td>" .
										"<td style='padding-left:20px; padding-right:20px;'>" . $agentiData["dateAgent_numeDenumire"] . "</td>";
										echo '<td style="padding-left:20px; padding-right:20px;"><a class="btn default btn-sm '.$colors[getValueByAlias($listRequestsSettingsOffer, "statusOferta", $value["administrare_statusCerereOferta"])].'">' . getValueByAlias($listRequestsSettingsOffer, "statusOferta", $value["administrare_statusCerereOferta"]) . '</a></td>';
										
										
								echo '<td><a class="btn default btn-sm green" href="' . basename($_SERVER['PHP_SELF']) .  '?function=emiteOferta&id='.$value["cerereOfertaId"].'">
									Emite <i class="fa fa-plus"></i></a>
								</td>
								<td>
									<a class="btn default btn-sm black" onclick="deleteCRMElement('."'".$value["cerereOfertaId"]."', '".basename($_SERVER['PHP_SELF'])."'".')">
									<i class="fa fa-trash-o"></i>  Sterge </a></td>';
								
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
