<?

checkSession();

?>
<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>Tipuri utilizatori
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-hover table-bordered" id="editUserRights">
							<thead>
							<tr>
								<th>
									 Id
								</th>
								<th>
									 Denumire tip
								</th>
								<th>
									 Drepturi
								</th>
								<th>
									 
								</th>
								<th>
									 
								</th>
							</tr>
							</thead>
							<tbody>
							<?
							foreach ($userRights as $value)
							{
								echo "<tr>";
								echo "<td>" .$value["id"]. "</td>";
								echo "<td>" .$value["value"]. "</td>";
								$getRightsDescription = getRightsDescription($value["id"]);
								echo "<td><ul>";
								
								foreach ($getRightsDescription as $getRightsDescriptionValue)
								{
									echo "<li>" . $getRightsDescriptionValue["description"] . "</li>";
									
								}
								echo "</ul></td>";
								echo '
								<td>
									<a class="edit" href="javascript:;">
									Editeaza </a>
								</td>
								<td>
									
								</td>';
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
			
<div class="row">
				<div class="col-md-4">
					<!-- BEGIN VALIDATION STATES-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>Adauga icon nou
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="#"  method="POST" id="addIconForm" class="form-horizontal" enctype="multipart/form-data">
								<div class="form-body">
									<div class="alert alert-danger display-hide">
										<button class="close" data-close="alert"></button>
										Sunt cateva erori de completare. Te rugam sa le verifici.
									</div>
									<div class="alert alert-success display-hide">
										<button class="close" data-close="alert"></button>
										Formularul a fost completat cu succes!
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Alias <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="alias" id="alias" data-required="1" class="form-control"/>
										</div>
									</div><div class="form-group">
										<label class="control-label col-md-3">Name <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="name" id="name" data-required="1" class="form-control"/>
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-md-3">URL 
										</label>
										<div class="col-md-4">
											<input name="url" id="url" type="text" class="form-control"/>
										</div>
									</div>								
								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn green" name="addIcon" id="addIcon">Submit</button>
											<a href="index.php"><button type="button" class="btn default">Cancel</button></a>
										</div>
									</div>
								</div>
							</form>
							<!-- END FORM-->
						</div>
					</div>
					<!-- END VALIDATION STATES-->
				</div>
			</div>