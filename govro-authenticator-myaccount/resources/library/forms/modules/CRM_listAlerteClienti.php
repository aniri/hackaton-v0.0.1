<?
checkSession();
$tableData = CRM_loadAll();
?>
<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-edit"></i>Listare alerte clienti
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
											Alerta noua <i class="fa fa-plus"></i>
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
							<table class="table table-striped table-hover table-bordered" id="CRM_listAlerteClienti">
							<thead>
							<tr>
							<? 
							$tableHeaderObject = array("Tip alerta", "Nume/Denumire Client", "Data si ora", "Produs", "Angajat responsabil", "Observatii", array("view", "edit"));
							parseTableHeader($tableHeaderObject); ?>
							</tr>
							</thead>
							<tbody>							
							<?
							foreach ($offers as $value)
							{
								echo "<tr>";
								
									echo "<td>" . $value["alerteClientiId"] . "</td>" .
										"<td>" . $value["alerteClienti_tipAlerta"] . "</td>" .
										"<td>" . $value["alerteClienti_numeDenumireClient"] . "</td>" .
										"<td>" . $value["alerteClienti_dataSiOra"]  . "</td>" .
										"<td>" . $value["alerteClienti_produs"] . "</td>" .
										"<td>" . $value["alerteClienti_angajatResponsabil"] . "</td>" .
										"<td>" . $value["alerteClienti_observatii"] . "</td>";
										
								echo '<td><a  onclick="viewCRMElement('."'".$value["alerteClientiId"]."',". "'" .basename($_SERVER['PHP_SELF']). "'" .')">
									Vezi/Editeaza </a>
								</td>
								<td>
									<a  onclick="deleteCRMElement('."'".$value["alerteClientiId"]."', '".basename($_SERVER['PHP_SELF'])."'".')">
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
