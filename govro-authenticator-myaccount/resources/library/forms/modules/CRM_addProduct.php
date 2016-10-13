<?

checkSession();

include("../resources/library/modules/CRM_asiguratorFurnizors.php");
$furnizori = "Asigurator";
$furnizoriData = $furnizori::CRM_loadAll();



?>
<div class="row">
				<div class="col-md-12">
					<div class="portlet box blue" id="addBeneficiiForm">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Adaugare produs - <span class="step-title">
								Pas 1 din 2 </span>
							</div>
							<div class="tools hidden-xs">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body form">
							<form action="#" class="form-horizontal" id="CRM_addProductPOST" method="POST" enctype="multipart/form-data">
								<div class="form-wizard">
									<div class="form-body">
										<ul class="nav nav-pills nav-justified steps">
											<li>
												<a href="#tab1" data-toggle="tab" class="step">
												<span class="number">
												1 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Date produs </span>
												</a>
											</li>
											<li>
												<a href="#tab2" data-toggle="tab" class="step">
												<span class="number">
												2</span>
												<span class="desc">
												<i class="fa fa-check"></i> Fisiere </span>
												</a>
											</li>
										</ul>
										<div id="bar" class="progress progress-striped" role="progressbar">
											<div class="progress-bar progress-bar-success">
											</div>
										</div>
										<div class="tab-content">
											<div class="alert alert-danger display-none">
												<button class="close" data-dismiss="alert"></button>
												Te rugam sa corectezi erorile aparute.
											</div>
											<div class="alert alert-success display-none">
												<button class="close" data-dismiss="alert"></button>
												Datele au fost validate cu succes!
											</div>
											<div class="tab-pane" id="tab1">
												<h3 class="block">Date produs</h3>	
												<div class="form-group">
													<label class="control-label col-md-3">Categorie<span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<select class="form-control select2me" name="dateProdus_categorie" id="dateProdus_categorie" onChange='updateProductType("dateProdus_categorie")'>
															</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Tip produs<span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<select class="form-control select2me" name="dateProdus_tipProdus" id="dateProdus_tipProdus"/>
															<option value="">Alege...</option>
															
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Furnizor
													</label>
													<div class="col-md-4">
														<select class="form-control select2me" name="dateProdus_furnizor" id="dateProdus_furnizor"/>
															<option value="">Alege...</option>
															<?foreach ($furnizoriData as $value){echo "<option value='".$value["asiguratorFurnizorId"]."'>" . $value["dateAsiguratorFurnizor_denumire"] . "</option>";}?>
														</select>
													</div>
													
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Denumire<span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dateProdus_denumire" id="dateProdus_denumire"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Tip pret<span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<select class="form-control select2me" name="dateProdus_tipPret" id="dateProdus_tipPret"/>
															<option value="">Alege...</option>
															<?
																foreach ($produseSettings as $name => $value)
																{
																	if ($name == "tipPret")
																	{
																		foreach ($value as $name => $data)
																		{
																			if ($data["isDefault"] == "true")
																			{
																				echo '<option value="'.$data["alias"].'" selected="selected">'.$data["value"].'</option>';
																			}
																			else
																			{
																				echo '<option value="'.$data["alias"].'">'.$data["value"].'</option>';
																			}
																		}
																	}
																}
															?>
															</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Pret standard/mediu
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dateProdus_pretStandardMediu" id="dateProdus_pretStandardMediu"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Tip comision<span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<select class="form-control select2me" name="dateProdus_tipComision" id="dateProdus_tipComision"/>
															<option value="">Alege...</option>
															<?
																foreach ($produseSettings as $name => $value)
																{
																	if ($name == "tipComision")
																	{
																		foreach ($value as $name => $data)
																		{
																			if ($data["isDefault"] == "true")
																			{
																				echo '<option value="'.$data["alias"].'" selected="selected">'.$data["value"].'</option>';
																			}
																			else
																			{
																				echo '<option value="'.$data["alias"].'">'.$data["value"].'</option>';
																			}
																		}
																	}
																}
															?>
															</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Valoare comision<span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dateProdus_valoareComision" id="dateProdus_valoareComision"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Observatii
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dateProdus_observatii" id="dateProdus_observatii"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Status<span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<select class="form-control select2me" name="dateProdus_status" id="dateProdus_status"/>
															<option value="">Alege...</option>
															<?
																foreach ($produseSettings as $name => $value)
																{
																	if ($name == "status")
																	{
																		foreach ($value as $name => $data)
																		{
																			if ($data["isDefault"] == "true")
																			{
																				echo '<option value="'.$data["alias"].'" selected="selected">'.$data["value"].'</option>';
																			}
																			else
																			{
																				echo '<option value="'.$data["alias"].'">'.$data["value"].'</option>';
																			}
																		}
																	}
																}
															?>
															</select>
													</div>
												</div>										
											</div>
											<div class="tab-pane" id="tab2">
												<h3 class="block">Atasare documente</h3>
												<input type="hidden" name="CRM_addProduct" id="CRM_addProduct" value="submitted">
											</div>
										</div>
									</div>
									<div class="form-actions">
										<div class="row">
											<div class="col-md-offset-3 col-md-9">
												<a href="javascript:;" class="btn default button-previous">
												<i class="m-icon-swapleft"></i> Inapoi </a>
												<a href="javascript:;" class="btn blue button-next">
												Continua <i class="m-icon-swapright m-icon-white"></i>
												</a>
												<a href="javascript:;" class="btn green button-submit">
												Valideaza <i class="m-icon-swapright m-icon-white"></i>
												</a>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>