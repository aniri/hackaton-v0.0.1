<?
checkSession();

include("../resources/library/modules/CRM_products.php");
$produse = "Produse";
$products = $produse::CRM_loadAll();
$produseDataSettings = $produse::CRM_loadSettings();
?>
<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-edit"></i>Listare produse
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
											<a href="CRM_addProducts.php"><button class="btn green">
											Produs nou <i class="fa fa-plus"></i>
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
							<table class="table table-striped table-hover table-bordered" id="CRM_listProducts">
							<thead>
							<tr>
							<? 
							$tableHeaderObject = array("Categorie", "Tip produs", "Denumire", "Tip pret", "Pret standard", "Tip comision", "Valoare comision", "Status", array("view", "edit"));
							$produse::parseTableHeader($tableHeaderObject); ?>
							</tr>
							</thead>
							<tbody>
							<?
							foreach ($products as $value)
							{
								echo "<tr>";
								
									echo "<td>" . getValueByAlias($produseDataSettings, "categoriiProduse", $value["dateProdus_categorie"]) . "</td>" .
										"<td>" . getValueByAlias($produseDataSettings, "tipuriProduse", $value["dateProdus_tipProdus"]) . "</td>" .
										"<td>" . $value["dateProdus_denumire"] . $value["dateClient_cui"] . "</td>" .
										"<td>" . getValueByAlias($produseDataSettings, "tipPret", $value["dateProdus_tipPret"]) . "</td>" .
										"<td>" . $value["dateProdus_pretStandardMediu"] . "</td>" .
										"<td>" . getValueByAlias($produseDataSettings, "tipComision", $value["dateProdus_tipComision"]) . "</td>" .
										"<td>" . $value["dateProdus_valoareComision"] . "</td>" .
										"<td>" . getValueByAlias($produseDataSettings, "status", $value["dateProdus_status"]) . "</td>";
										echo '<td><a  onclick="viewCRMProduct('."'".$value["idProduct"]."'".')">
									Vezi/Editeaza </a>
								</td>
								<td>
									<a  onclick="deleteCRMProduct('."'".$value["idProduct"]."', '".$value["dateProdus_denumire"]."'".')">
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
