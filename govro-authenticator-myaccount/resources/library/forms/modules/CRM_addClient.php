<?

checkSession();

include("../resources/library/modules/CRM_programBeneficiis.php");
$beneficii = 'Beneficii';
$beneficiiData = $beneficii::CRM_loadAll();

include("../resources/library/modules/CRM_agents.php");
$agenti = "Agenti";
$agentiData = $agenti::CRM_loadAll();

include("../resources/library/modules/CRM_recomandators.php");
$recomandatori = "Recomandatori";
$recomandatoriData = $recomandatori::CRM_loadAll();

$clientiSettingsData = $clienti::CRM_loadSettings();
?>
<div class="row">
				<div class="col-md-12">
					<div class="portlet box blue" id="addBeneficiiForm">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Adaugare client - <span class="step-title">
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
							<form action="#" class="form-horizontal" id="CRM_addClientPOST" method="POST" enctype="multipart/form-data">
								<div class="form-wizard">
									<div class="form-body">
										<ul class="nav nav-pills nav-justified steps">
											<li>
												<a href="#tab1" data-toggle="tab" class="step">
												<span class="number">
												1 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Date client </span>
												</a>
											</li>
											<li>
												<a href="#tab2" data-toggle="tab" class="step">
												<span class="number">
												2 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Adresa domiciliu/sediu </span>
												</a>
											</li>
											<li>
												<a href="#tab3" data-toggle="tab" class="step active">
												<span class="number">
												3 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Contact/Persoana de contact </span>
												</a>
											</li>
											<li>
												<a href="#tab4" data-toggle="tab" class="step">
												<span class="number">
												4 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Adresa de corespondenta </span>
												</a>
											</li>
											<li>
												<a href="#tab5" data-toggle="tab" class="step">
												<span class="number">
												5 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Administrare </span>
												</a>
											</li>
											<li>
												<a href="#tab6" data-toggle="tab" class="step">
												<span class="number">
												6</span>
												<span class="desc">
												<i class="fa fa-check"></i> Alte detalii / fisiere </span>
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
											<div class="tab-pane active" id="tab1">
												<h3 class="block">Completati campurile de mai jos</h3>
												<div class="form-group">
													<label class="control-label col-md-3">Tip client <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<select class="form-control" name="dateClient_tipClient" id="dateClient_tipClient" onchange="CRM_clientTypeChange()">
															<option value="">Alege...</option>
															<?
															showModuleSettings($clientiSettingsData, 'clientType');	
															?>		
														</select>
													</div>
												</div>
												<div id="dateClientPFCT">
												<div class="form-group">
													<label class="control-label col-md-3">Nume <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dateClient_nume" id="dateClient_nume"/>
														<span class="help-block">
														Nume (Ex. Popescu). </span>
													</div>
													</div>
													<div class="form-group">
													<label class="control-label col-md-3">Prenume <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dateClient_prenume" id="dateClient_prenume"/>
														<span class="help-block">
														Prenume (Ex. Andrei). </span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">CNP 
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dateClient_cnp" id="dateClient_cnp"/>
														<span class="help-block" id="helpblocktest">
														CNP (Ex. 1700402430065). </span>
													</div>
												</div>
												</div>
												<div id="dateClientPJCT">
												<div class="form-group">
													<label class="control-label col-md-3">Denumire <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dateClient_denumire" id="dateClient_denumire"/>
														<span class="help-block">
														Denumire (Ex. SC Firma S.R.L.). </span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">CUI 
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dateClient_cui" id="dateClient_cui"/>
														<span class="help-block">
														CUI (Ex. 24368843). </span>
													</div>
												</div>
												</div>	
											</div>
											<div class="tab-pane" id="tab2">
												<h3 class="block">Adresa domiciliu/sediu</h3>
												<div class="form-group">
													<label class="control-label col-md-3">Judet/sector
													</label>
													<div class="col-md-4">
														<select class="form-control select2me" name="adresa_judetSector" onchange="updateLocalitati('adresa_judetSector')" id="adresa_judetSector"/>
															<option value="">Alege...</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Localitate
													</label>
													<div class="col-md-4">
														<select class="form-control select2me" name="adresa_localitate" id="adresa_localitate"/>
															<option value="">Alege...</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Strada 
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresa_strada" id="adresa_strada"/>
														<span class="help-block">
														 </span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Numar 
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresa_numar" id="adresa_numar"/>
														<span class="help-block">
														 </span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Cod postal 
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresa_codPostal" id="adresa_codPostal"/>
														<span class="help-block">
														 </span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Bloc 
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresa_bloc" id="adresa_bloc"/>
														<span class="help-block">
														 </span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Scara 
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresa_scara" id="adresa_scara"/>
														<span class="help-block">
														 </span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Etaj 
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresa_etaj" id="adresa_etaj"/>
														<span class="help-block">
														 </span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Apartament 
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresa_apartament" id="adresa_apartament"/>
														<span class="help-block">
														 </span>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab3">
												<h3 class="block">Date de contact</h3>
												<div class="form-group">
													<label class="control-label col-md-3">Telefon  <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="contact_telefon" id="contact_telefon"/>
														<span class="help-block">
														 </span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Email  <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="contact_email" id="contact_email"/>
														<span class="help-block">
														 Email (Ex. mail@exemplu.ro)</span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Website 
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="contact_webSite" id="contact_webSite"/>
														<span class="help-block"><span class="help-block">
														URL (Ex. http://www.exemplu.ro) </span>
													</div>
												</div>
												<h3 class="block">Persoana de contact</h3>
												<div class="form-group">
													<label class="control-label col-md-3">Nume 
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="persoanaContact_nume" id="persoanaContact_nume"/>
														<span class="help-block">
														 </span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Prenume 
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="persoanaContact_prenume" id="persoanaContact_prenume"/>
														<span class="help-block">
														 </span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Telefon 
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="persoanaContact_telefon" id="persoanaContact_telefon"/>
														<span class="help-block">
														 </span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Email 
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="persoanaContact_email" id="persoanaContact_email"/>
														<span class="help-block">
														 </span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">In calitate de 
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="persoanaContact_calitate" id="persoanaContact_calitate"/>
														<span class="help-block">
														 </span>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab4">
												<h3 class="block">Adresa de corespondenta</h3>
												<div class="form-group">
													<label class="control-label col-md-3">Foloseste adresa de domiciliu <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<select class="form-control" name="adresaCorespondenta_adresa" id="adresaCorespondenta_adresa" onchange="adresaCorespondenta()">
															<option value="">Alege...</option>
															<option value="1">Da</option>
															<option value="0">Nu</option>
														</select>
													</div>
												</div>											
												<div class="form-group">
												<label class="control-label col-md-3">Judet/sector<span class="required">
												* </span>
												</label>
													<div class="col-md-4">
														<select class="form-control select2me" name="adresaCorespondenta_judetSector" onchange="updateLocalitati('adresaCorespondenta_judetSector')" id="adresaCorespondenta_judetSector"/>
															<option value="">Alege...</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Localitate<span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<select class="form-control select2me" name="adresaCorespondenta_localitate" id="adresaCorespondenta_localitate"/>
															<option value="">Alege...</option>
														</select>
													</div>
												</div>												
												<div class="form-group">
													<label class="control-label col-md-3">Strada  <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresaCorespondenta_strada" id="adresaCorespondenta_strada"/>
														<span class="help-block">
														 </span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Numar  <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresaCorespondenta_numar" id="adresaCorespondenta_numar"/>
														<span class="help-block">
														 </span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Cod postal 
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresaCorespondenta_codPostal" id="adresaCorespondenta_codPostal"/>
														<span class="help-block">
														 </span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Bloc 
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresaCorespondenta_bloc" id="adresaCorespondenta_bloc"/>
														<span class="help-block">
														 </span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Scara 
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresaCorespondenta_scara" id="adresaCorespondenta_scara"/>
														<span class="help-block">
														 </span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Etaj 
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresaCorespondenta_etaj" id="adresaCorespondenta_etaj"/>
														<span class="help-block">
														 </span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Numar apartament
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresaCorespondenta_apartament" id="adresaCorespondenta_apartament"/>
														<span class="help-block">
														 </span>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab5">
												<h3 class="block">Administrare</h3>											
												<div class="form-group">
													<label class="control-label col-md-3">Categorie<span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<select class="form-control" name="administrare_categorie" id="administrare_categorie"/>
															<option value="">Alege...</option>
															<?
															showModuleSettings($clientiSettingsData, 'clientCategory');	
															?>	
															
														</select>
													</div>
												</div>	
												<div class="form-group">
													<label class="control-label col-md-3">Status
													</label>
													<div class="col-md-4">
														<select class="form-control" name="administrare_status" id="administrare_status"/>
															<option value="">Alege...</option>
															<?
															showModuleSettings($clientiSettingsData, 'status');	
															?>
															
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Program de beneficii
													</label>
													<div class="col-md-4">
														<select class="form-control select2me" name="administrare_programBeneficii" id="administrare_programBeneficii" onchange='updateFieldData("beneficii")'/>
															<option value="">Alege...</option>
															<?foreach ($beneficiiData as $value){echo "<option value='".$value["programBeneficiiId"]."'>" . $value["dateProgramBeneficii_numeProgram"] . "</option>";}?>
														</select>
													</div>
													
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Agent
													</label>
													<div class="col-md-4">
														<select class="form-control select2me" name="administrare_agentId" id="administrare_agentId" onchange='updateFieldData("agent")'/>
															<option value="">Alege...</option>
															<?foreach ($agentiData as $value){echo "<option value='".$value["agentId"]."'>" . $value["dateAgent_numeDenumire"] . "</option>";}?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Recomandator 
													</label>
													<div class="col-md-4">
														<select class="form-control select2me" name="administrare_recomandator" id="administrare_recomandator"/>
															<option value="">Alege...</option>
															<?foreach ($recomandatoriData as $value){echo "<option value='".$value["recomandatorId"]."'>" . $value["dateRecomandator_numeDenumire"] . "</option>";}?>
														</select>
													</div>
												</div>
												
												
												<div class="form-group">
													<label class="control-label col-md-3">Notificari automate 
													</label>
													<div class="col-md-4">
														<select class="form-control" name="administrare_automaticNotifications" id="administrare_automaticNotifications">
															<option value="">Alege...</option>
															<?
															showModuleSettings($clientiSettingsData, 'automaticNotifications');	
															?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Newsletter 
													</label>
													<div class="col-md-4">
														<select class="form-control" name="administrare_newsletter" id="administrare_newsletter">
															<option value="">Alege...</option>
															<?
															showModuleSettings($clientiSettingsData, 'newsletter');	
															?>
																														
														</select>
													</div>
												</div>											
											</div>
											<div class="tab-pane" id="tab6">
												<h3 class="block">Alte detalii</h3>												
												<div class="form-group">
												
													<label class="control-label col-md-3">Societate de leasing <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
													<select class="form-control" name="alteDetalii_societateLeasing" id="alteDetalii_societateLeasing">
															<option value="">Alege...</option>
															<?
															showModuleSettings($clientiSettingsData, 'societateLeasing');	
															?>
														</select>
														
													</div>
												</div>	
												<div  id="dateClientPJCT_2">												
												<div class="form-group">
													<label class="control-label col-md-3">Nr. Registrul comertului 
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="alteDetalii_nrRegCom" id="alteDetalii_nrRegCom"/>
														<span class="help-block">
														Ex: J01/1234/1900 </span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">RO <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<select class="form-control" name="alteDetalii_RO" id="alteDetalii_RO">
															<option value="">Alege..</option>
															<option value="1" selected="selected">Da</option>
															<option value="0">Nu</option>
														</select>
													</div>
												</div>	
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Banca
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="alteDetalii_banca" id="alteDetalii_banca"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">IBAN 
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="alteDetalii_IBAN" id="alteDetalii_IBAN"/>
														<span class="help-block">
														Ex: RO12QWER3456789101112131</span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Observatii 
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="alteDetalii_observatii" id="alteDetalii_observatii"/>
													</div>
												</div>
												<input type="hidden" name="CRM_addClient" id="CRM_addClient" value="submitted">
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