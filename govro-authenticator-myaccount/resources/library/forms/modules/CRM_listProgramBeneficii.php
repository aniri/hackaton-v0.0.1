<?
checkSession();
$tableData = $beneficii::CRM_loadAll();


?>
<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-edit"></i>Listare program beneficii
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
											<a href="CRM_addProgramBenefits.php"><button class="btn green">
											Program de beneficii nou <i class="fa fa-plus"></i>
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
							<table class="table table-striped table-hover table-bordered" id="CRM_listProgramBeneficii">
							<thead>
							<tr>
							<? 
							$tableHeaderObject = array("Nume program", "Tip beneficiari", "Agent", "Status", "Site dedicat", array("view", "edit"));
							$beneficii::parseTableHeader($tableHeaderObject); ?>
							</tr>
							</thead>
							<tbody>
							<?
							foreach ($tableData as $value)
							{
								echo "<tr>";
								
									echo "<td>" . $value["dateProgramBeneficii_numeProgram"] . "</td>" .
										"<td>" . $value["administrare_tipBeneficiari"] . "</td>" .
										"<td>" . $value["administrare_agent"] . "</td>" .																				
										"<td>" . $value["administrare_status"] . "</td>" .
										"<td>" . $value["administrare_siteDedicat"] . "</td>";
								
								echo '<td><a  onclick="viewCRMElement('."'".$value["programBeneficiiId"]."',". "'" .basename($_SERVER['PHP_SELF']). "'" .')">
									Vezi/Editeaza </a>
								</td>
								<td>
									<a  onclick="deleteCRMElement('."'".$value["programBeneficiiId"]."', '".basename($_SERVER['PHP_SELF'])."'".')">
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
