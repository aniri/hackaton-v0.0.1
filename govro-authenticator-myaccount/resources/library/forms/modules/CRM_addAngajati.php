<?

checkSession();

$userRights = getRights();
include("../resources/library/modules/CRM_angajatis.php");
$angajati = "Angajati";
$angajatiData = $angajati::CRM_loadAll();
$angajatSettingsData = $angajati::CRM_loadSettings();
?>
<div class="row">
				<div class="col-md-12">
					<div class="portlet box blue" id="addBeneficiiForm">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Adaugare angajat - <span class="step-title">
								Pas 1 din 6 </span>
							</div>
							<div class="tools hidden-xs">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body form">
							<form action="#" class="form-horizontal" id="CRM_addAngajatiPOST" method="POST" enctype="multipart/form-data">
								<div class="form-wizard">
									<div class="form-body">
										<ul class="nav nav-pills nav-justified steps">
											<li>
												<a href="#tab1" data-toggle="tab" class="step">
												<span class="number">
												1 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Date Angajat </span>
												</a>
											</li>
											<li>
												<a href="#tab2" data-toggle="tab" class="step">
												<span class="number">
												2</span>
												<span class="desc">
												<i class="fa fa-check"></i> Adresa domiciliu/sediu </span>
												</a>
											</li>
											<li>
												<a href="#tab3" data-toggle="tab" class="step">
												<span class="number">
												3</span>
												<span class="desc">
												<i class="fa fa-check"></i> Contact </span>
												</a>
											</li>											
											<li>
												<a href="#tab4" data-toggle="tab" class="step">
												<span class="number">
												4</span>
												<span class="desc">
												<i class="fa fa-check"></i> Administrare angajati </span>
												</a>
											</li>
											<li>
												<a href="#tab5" data-toggle="tab" class="step">
												<span class="number">
												5</span>
												<span class="desc">
												<i class="fa fa-check"></i> Alte detalii </span>
												</a>
											</li>
											<li>
												<a href="#tab6" data-toggle="tab" class="step">
												<span class="number">
												6</span>
												<span class="desc">
												<i class="fa fa-check"></i> Documente scanate </span>
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
												<h3 class="block">Date Recomandator</h3>
												
												<div class="form-group">
													<label class="control-label col-md-3"> Departament  <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<select class="form-control" name="dateAngajati_departament" id="dateAngajati_departament">
															<option value="">Alege...</option>
															<?
															showModuleSettings($angajatSettingsData, 'departament');	
															?>
														</select>
													</div>
												</div>			
												<div class="form-group">
													<label class="control-label col-md-3"> Nume <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dateAngajati_nume" id="dateAngajati_nume"/>
													</div>
												</div>												
												<div class="form-group">
													<label class="control-label col-md-3"> CNP <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dateAngajati_cnp" id="dateAngajati_cnp"/>
													</div>
												</div>												
											</div>
											<div class="tab-pane" id="tab2">
												<h3 class="block">Adresa domiciliu/sediu</h3>	
												<div class="form-group">
													<label class="control-label col-md-3"> Judet/Sector 
													</label>
													<div class="col-md-4">
														<select class="form-control select2me" name="adresaDomiciliu_judetSector" id="adresaDomiciliu_judetSector" onchange="updateLocalitati('adresaDomiciliu_judetSector')"/>
															<option value="">Alege...</option>															
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Localitatea 
													</label>
													<div class="col-md-4">
														<select class="form-control select2me" name="adresaDomiciliu_localitate" id="adresaDomiciliu_localitate"/>
															<option value="">Alege...</option>															
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Strada
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresaDomiciliu_strada" id="adresaDomiciliu_strada"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Numar
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresaDomiciliu_numar" id="adresaDomiciliu_numar"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Cod postal
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresaDomiciliu_codPostal" id="adresaDomiciliu_codPostal"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Bloc
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresaDomiciliu_bloc" id="adresaDomiciliu_bloc"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Scara
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresaDomiciliu_scara" id="adresaDomiciliu_scara"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Etaj
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresaDomiciliu_etaj" id="adresaDomiciliu_etaj"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Apartament numar
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresaDomiciliu_apNr" id="adresaDomiciliu_apNr"/>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab3">
												<h3 class="block">Contact</h3>	
												<div class="form-group">
													<label class="control-label col-md-3"> Telefon 1
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="contact_telefon1" id="contact_telefon1"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Telefon 2 
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="contact_telefon2" id="contact_telefon2"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Email 1 
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="contact_email1" id="contact_email1"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Email 2 
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="contact_email2" id="contact_email2"/>
													</div>
												</div>
											</div>											
											<div class="tab-pane" id="tab4">
												<h3 class="block">Administrare angajati</h3>												
												<div class="form-group">
													<label class="control-label col-md-3">Status <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<select class="form-control" name="administrareAngajati_status" id="administrareAngajati_status">
															<option value="">Alege...</option>
															<?
															showModuleSettings($angajatSettingsData, 'status');	
															?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Rol <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<select class="form-control" name="administrareAngajati_rol" id="administrareAngajati_rol">
															<option value="">Alege...</option>
															<?
																foreach ($userRights as $name => $value)
																{
																	
																echo '<option value="'.$value["id"].'">'.$value["value"].'</option>';
																			
																			
																		
																	
																}
															?>															
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Data initiala
													</label>
													<div class="col-md-4">
															<a href="javascript:;" id="administrareAngajati_dataInitialaDtP" data-type="datetime" data-pk="1" data-url="/post" data-placement="right" title="Set date & time"><?echo date("d/m/Y H:i"); ?></a>
														<input type="hidden" name="administrareAngajati_dataInitiala" id="administrareAngajati_dataInitiala" value="<?echo date("d/m/Y H:i"); ?>">
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab5">
												<h3 class="block">Alte detalii</h3>
												<div class="form-group">
													<label class="control-label col-md-3"> Banca
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="alteDetalii_banca" id="alteDetalii_banca"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> IBAN
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="alteDetalii_iban" id="alteDetalii_iban"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Observatii
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="alteDetalii_observatii" id="alteDetalii_observatii"/>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab6">
												<h3 class="block">Atasare documente</h3>												
												<input type="hidden" name="CRM_addAngajati" id="CRM_addAngajati" value="submitted">
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