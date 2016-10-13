<?
checkSession();

include("../resources/library/modules/CRM_products.php");
$produse = "Produse";
$produseData = $produse::CRM_loadAll();

include("../resources/library/modules/CRM_agents.php");
$agenti = "Agenti";
$agentiData = $agenti::CRM_loadAll();


$offerSettings = $oferte::CRM_loadSettings();
?>
<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-edit"></i>Listare oferte
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
							<table class="table table-striped table-hover table-bordered" id="CRM_listOffers">
							<thead>
							<tr>
							<? 
							$tableHeaderObject = array("Oferta", "Data oferta", "Tip produs", "Nume/Denumire", "CNP/CUI", "Telefon", "Email", "Agent", "Status", array("view", "edit"));
							$oferte::parseTableHeader($tableHeaderObject); ?>
							</tr>
							</thead>
							<tbody>
							<?
							foreach ($oferteData as $value)
							{
								
								$produseData = $produse::CRM_load($value["dateOferta_tipProdus"]);
								$agentiData = $agenti::CRM_load($value["administrare_agent"]);
								echo "<tr>";
								
									echo "<td>" . $value["idOferta"] . "</td>" .
										"<td>" . $value["dateOferta_dataCerereOferta"] . "</td>" .
										"<td>" . $produseData["dateProdus_tipProdus"] . "</td>" .
										"<td>" . $value["dateClient_numeDenumire"]  . "</td>" .
										"<td>" . $value["dateClient_cnpCui"] . "</td>" .
										"<td>" . $value["dateClient_telefon"] . "</td>" .
										"<td>" . $value["dateClient_email"] . "</td>" .
										"<td>" . $agentiData["dateAgent_numeDenumire"] . "</td>" .
										"<td>" . getValueByAlias($offerSettings, "offerStatus", $value["administrare_statusOferta"]) . "</td>";
									echo '<td><a  onclick="viewCRMElement('."'".$value["idOferta"]."',". "'" .basename($_SERVER['PHP_SELF']). "'" .')">
									Vezi/Editeaza </a>
								</td>
								<td>
									<a  onclick="deleteCRMElement('."'".$value["idOferta"]."', '".basename($_SERVER['PHP_SELF'])."'".')">
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
