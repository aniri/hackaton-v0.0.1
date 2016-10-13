<?
checkSession();
$tableData = $broker::CRM_loadAll();
?>
<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-edit"></i>Listare broker
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
											Adaugare Broker <i class="fa fa-plus"></i>
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
							<table class="table table-striped table-hover table-bordered" id="CRM_listBrokers">
							<thead>
							<tr>
							<? 
							$tableHeaderObject = array("Broker", "Nume", "Cui", "Telefon", "Email", "Website", array("view", "edit"));
							$broker::parseTableHeader($tableHeaderObject); ?>
							</tr>
							</thead>
							<tbody>
							<?
							foreach ($tableData as $value)
							{
								echo "<tr>";
								
									echo "<td>" . $value["brokerId"] . "</td>" .
										"<td>" . $value["dateBroker_denumire"] . "</td>" .
										"<td>" . $value["dateBroker_cui"] . "</td>" .
										"<td>" . $value["contact_telefon"] . "</td>" .
										"<td>" . $value["contact_email"] . "</td>" .										
										"<td>" . $value["contact_webSite"] . "</td>";
										echo '<td><a  onclick="viewCRMElement('."'".$value["brokerId"]."',". "'" .basename($_SERVER['PHP_SELF']). "'" .')">
									Vezi/Editeaza </a>
								</td>
								<td>
									<a  onclick="deleteCRMElement('."'".$value["brokerId"]."', '".basename($_SERVER['PHP_SELF'])."'".')">
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
