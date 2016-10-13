<?
checkSession();
$tableData = $asigurator::CRM_loadAll();
$asiguratorSettingsData = $asigurator::CRM_loadSettings();
?>
<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-edit"></i>Listare Asigurator/Furnizor
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
											Asigurator/Furnizor Nou <i class="fa fa-plus"></i>
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
							<table class="table table-striped table-hover table-bordered" id="CRM_AsiguratorFurnizors">
							<thead>
							<tr>
							<? 
							$tableHeaderObject = array("Asigurator/Furnizor", "Categorie produs", "Denumire", "Status", array("view", "edit"));
							$asigurator::parseTableHeader($tableHeaderObject); ?>
							</tr>
							</thead>
							<tbody>
							<?
							foreach ($tableData as $value)
							{
								echo "<tr>";
								
									echo "<td>" . $value["asiguratorFurnizorId"] . "</td>" .
										"<td>" . getValueByAlias($asiguratorSettingsData, "categoriiProduse", $value["dateAsiguratorFurnizor_categorieProdus"]) . "</td>" .
										"<td>" . $value["dateAsiguratorFurnizor_denumire"] . "</td>" .																				
										"<td>" . $value["dateAsiguratorFurnizor_status"] . "</td>";
										echo '<td><a  onclick="viewCRMElement('."'".$value["asiguratorFurnizorId"]."',". "'" .basename($_SERVER['PHP_SELF']). "'" .')">
									Vezi/Editeaza </a>
								</td>
								<td>
									<a  onclick="deleteCRMElement('."'".$value["asiguratorFurnizorId"]."', '".basename($_SERVER['PHP_SELF'])."'".')">
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
