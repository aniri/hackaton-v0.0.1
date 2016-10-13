<?

checkSession();

include("../resources/library/modules/CRM_distribuitors.php");
$distribuitor = "Distribuitor";
$distribuitorSettingsData = $distribuitor::CRM_loadSettings();
?>
<div class="row">
				<div class="col-md-12">
					<div class="portlet box blue" id="addBeneficiiForm">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Adaugare Distribuitor - <span class="step-title">
								Pas 1 din 5 </span>
							</div>
							<div class="tools hidden-xs">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body form">
							<form action="#" class="form-horizontal" id="CRM_addDistribuitorPOST" method="POST" enctype="multipart/form-data">
								<div class="form-wizard">
									<div class="form-body">
										<ul class="nav nav-pills nav-justified steps">
											<li>
												<a href="#tab1" data-toggle="tab" class="step">
												<span class="number">
												1 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Date distribuitor </span>
												</a>
											</li>
											<li>
												<a href="#tab2" data-toggle="tab" class="step">
												<span class="number">
												2</span>
												<span class="desc">
												<i class="fa fa-check"></i> Contact </span>
												</a>
											</li>
											<li>
												<a href="#tab3" data-toggle="tab" class="step">
												<span class="number">
												3</span>
												<span class="desc">
												<i class="fa fa-check"></i> Administrare </span>
												</a>
											</li>
											<li>
												<a href="#tab4" data-toggle="tab" class="step">
												<span class="number">
												4</span>
												<span class="desc">
												<i class="fa fa-check"></i> Alte detalii </span>
												</a>
											</li>											
											<li>
												<a href="#tab5" data-toggle="tab" class="step">
												<span class="number">
												5</span>
												<span class="desc">
												<i class="fa fa-check"></i> Atasare documente </span>
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
												<h3 class="block">Date Distribuitor</h3>
												<div class="form-group">
													<label class="control-label col-md-3"> Nume/Denumire <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dateDistribuitor_numeDenumire" id="dateDistribuitor_numeDenumire"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Judet/Sector 
													</label>
													<div class="col-md-4">
														<select class="form-control select2me" name="dateDistribuitor_judetSector" id="dateDistribuitor_judetSector" onchange="updateLocalitati('dateDistribuitor_judetSector')"/>
															<option value="">Alege...</option>															
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Localitatea 
													</label>
													<div class="col-md-4">
														<select class="form-control select2me" name="dateDistribuitor_localitate" id="dateDistribuitor_localitate"/>
															<option value="">Alege...</option>															
														</select>
													</div>
												</div>												
											</div>
											<div class="tab-pane" id="tab2">
												<h3 class="block">Contact</h3>	
												<div class="form-group">
													<label class="control-label col-md-3"> Telefon  <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="contact_telefon" id="contact_telefon"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Email <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="contact_email" id="contact_email"/>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab3">
												<h3 class="block">Administrare</h3>	
												<div class="form-group">
													<label class="control-label col-md-3"> Comision Asigurari <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="administrare_comisionAsigurari" id="administrare_comisionAsigurari"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Comision asistenta rutiera <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="administrare_comisionAsistentaRutiera" id="administrare_comisionAsistentaRutiera"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Comision alte produse <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="administrare_comisionAlteProduse" id="administrare_comisionAlteProduse"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Status <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<select class="form-control" name="administrare_status" id="administrare_status">
															<option value="">Alege...</option>
															<?
															showModuleSettings($distribuitorSettingsData, 'status');	
															?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Contract <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<select class="form-control" name="administrare_contract" id="administrare_contract">
															<option value="">Alege...</option>
															<?
															showModuleSettings($distribuitorSettingsData, 'contract');	
															?>																													
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Data initiala
													</label>
													<div class="col-md-4">
															<a href="javascript:;" id="administrare_dataInitialaDtP" data-type="datetime" data-pk="1" data-url="/post" data-placement="right" title="Set date & time"><?echo date("d/m/Y H:i"); ?></a>
														<input type="hidden" name="administrare_dataInitiala" id="administrare_dataInitiala" value="<?echo date("d/m/Y H:i"); ?>">
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab4">
												<h3 class="block">Alte detalii</h3>												
												<div class="form-group">
													<label class="control-label col-md-3"> Observatii
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="alteDetalii_observatii" id="alteDetalii_observatii"/>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab5">
												<h3 class="block">Atasare documente</h3>												
												<input type="hidden" name="CRM_addDistribuitor" id="CRM_addDistribuitor" value="submitted">
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