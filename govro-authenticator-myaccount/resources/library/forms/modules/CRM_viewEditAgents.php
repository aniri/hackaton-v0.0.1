<?

checkSession();

include("../resources/library/modules/CRM_agents.php");
$agenti = "Agenti";
$agentSettingsData = $agenti::CRM_loadSettings();

include("../resources/library/modules/CRM_distribuitors.php");
$distribuitor = "Distribuitor";
$distribuitorData = $distribuitor::CRM_loadAll();

include("../resources/library/modules/CRM_recomandators.php");
$recomandatori = "Recomandatori";
$recomandatoriData = $recomandatori::CRM_loadAll();

include("../resources/library/modules/CRM_contracts.php");
$contracte = "Contract";
$contracteData = $contracte::CRM_loadAll();
$contracteSettingsData = $contracte::CRM_loadSettings();

?>

<div class="row">
				<div class="col-md-12">
					<form class="form-horizontal form-row-seperated" action="#" id="CRM_editAgentPOST" method="POST" enctype="multipart/form-data">
						<div class="portlet">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-shopping-cart"></i><? echo " Nume Agent" . " - " . $agentData["dateAgent_numeDenumire"]; //EDIT?>
								</div>
								<div class="actions btn-set">
									<button type="button" name="back" class="btn default" onclick="goBack()"><i class="fa fa-angle-left"></i> Inapoi</button>
									<button type="button" name="refresh" class="btn default" onclick="refresh()"><i class="fa fa-reply"></i> Reincarca</button>
									<button class="btn green"><i class="fa fa-check"></i> Salveaza</button>
								</div>
							</div>
							<div class="portlet-body">
								<div class="tabbable">
									<ul class="nav nav-tabs">
										<li class="active">
											<a href="#tab1" data-toggle="tab">
											Date Agent </a>
										</li>
										<li> 
											<a href="#tab2" data-toggle="tab">
											Adresa domiciliu/sediu </a>
										</li>
										<li>
											<a href="#tab3" data-toggle="tab">
											Contact </a>
										</li>
										<li>
											<a href="#tab4" data-toggle="tab">
											Persoana de contact </a>
										</li>
										<li>
											<a href="#tab5" data-toggle="tab">
											Administrare </a>
										</li>
										<li>
											<a href="#tab6" data-toggle="tab">
											Alte detalii </a>
										</li>
										<li>
											<a href="#tab7" data-toggle="tab">
											Atasare documente  </a>
										</li>
									</ul>
									<div class="tab-content no-space">
										<div class="tab-pane active" id="tab1">
										<h3 class="block">Date Agent</h3>
											<div class="form-body">
												<div class="form-group">
													<label class="col-md-2 control-label">Tip: <span class="required"> * </span>
													</label>
													<div class="col-md-2">
														<select class="form-control select2me" name="dateAgent_tip" id="dateAgent_tip">
															<option value="">Alege...</option>
															<?
															showEditModuleSettings($agentSettingsData, 'type', $agentData["dateAgent_tip"]);
															?>
														</select>															
													</div>
												</div>
												<div class="form-group">
														<label class="col-md-2 control-label">Nume/Denumire: <span class="required">	* </span>
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="dateAgent_numeDenumire" id="dateAgent_numeDenumire" value="<? echo $agentData["dateAgent_numeDenumire"];?>"></input>
														</div>
												</div>
												<div class="form-group">
														<label class="col-md-2 control-label">CNP/CUI:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="dateAgent_cnpCui" id="dateAgent_cnpCui" value="<? echo $agentData["dateAgent_cnpCui"];?>"></input>
														</div>
												</div>
											</div>
										</div>	
										<div class="tab-pane" id="tab2">
											<div class="form-body">
												<div class="tab-pane active" id="tab2">
													<h3 class="block">Adresa domiciliu/sediu</h3>
													<div class="form-group">
													<label class="col-md-2 control-label">Judet/sector
													</label>
														<div class="col-md-2">
															<select class="form-control select2me" name="adresaDomiciliuSediu_judetSector" onchange="updateLocalitati('adresaDomiciliuSediu_judetSector')" id="adresaDomiciliuSediu_judetSector"/>
																<?echo '<option value="'.$agentData["adresaDomiciliuSediu_judetSector"].'" selected="selected">'.$agentData["adresaDomiciliuSediu_judetSector"].'</option>';
																?>
															</select>
														</div>
													</div>
													<div class="form-group">
													<label class="col-md-2 control-label"> Localitate:
													</label>
														<div class="col-md-2">
															<select class="form-control select2me" name="adresaDomiciliuSediu_localitate" id="adresaDomiciliuSediu_localitate"/>
															<?echo '<option value="'.$agentData["adresaDomiciliuSediu_localitate"].'" selected="selected">'.$agentData["adresaDomiciliuSediu_localitate"].'</option>';
																?>
															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Strada:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="adresaDomiciliuSediu_strada" id="adresaDomiciliuSediu_strada" value="<? echo $agentData["adresaDomiciliuSediu_strada"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Numar:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="adresaDomiciliuSediu_numar" id="adresaDomiciliuSediu_numar" value="<? echo $agentData["adresaDomiciliuSediu_numar"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Cod postal:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="adresaDomiciliuSediu_codPostal" id="adresaDomiciliuSediu_codPostal" value="<? echo $agentData["adresaDomiciliuSediu_codPostal"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Bloc:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="adresaDomiciliuSediu_bloc" id="adresaDomiciliuSediu_bloc" value="<? echo $agentData["adresaDomiciliuSediu_bloc"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Scara:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="adresaDomiciliuSediu_scara" id="adresaDomiciliuSediu_scara" value="<? echo $agentData["adresaDomiciliuSediu_scara"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Etaj:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="adresaDomiciliuSediu_etaj" id="adresaDomiciliuSediu_etaj" value="<? echo $agentData["adresaDomiciliuSediu_etaj"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Apartament numar:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="adresaDomiciliuSediu_apNr" id="adresaDomiciliuSediu_apNr" value="<? echo $agentData["adresaDomiciliuSediu_apNr"];?>"></input>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab3">
											<div class="from-body">
												<div class="tab-pane active" id="tab3">
												<h3 class="block">Contact</h3>
													<div class="form-group">
														<label class="col-md-2 control-label">Telefon: <span class="required">	* </span>
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="contact_telefon" id="contact_telefon" value="<? echo $agentData["contact_telefon"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Email: <span class="required"> * </span>
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="contact_email" id="contact_email" value="<? echo $agentData["contact_email"];?>"></input>
														</div>
													</div>
												</div>	
											</div>
										</div>
										<div class="tab-pane" id="tab4">
											<div class="from-body">
												<div class="tab-pane active" id="tab4">
												<h3 class="block">Persoana de contact</h3>
													<div class="form-group">
														<label class="col-md-2 control-label">Nume: 
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="persoanaDeContact_nume" id="persoanaDeContact_nume" value="<? echo $agentData["persoanaDeContact_nume"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Telefon: 
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="persoanaDeContact_telefon" id="persoanaDeContact_telefon" value="<? echo $agentData["persoanaDeContact_telefon"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Email: 
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="persoanaDeContact_email" id="persoanaDeContact_email" value="<? echo $agentData["persoanaDeContact_email"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">In calitate de: 
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="persoanaDeContact_inCalitate" id="persoanaDeContact_inCalitate" value="<? echo $agentData["persoanaDeContact_inCalitate"];?>"></input>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab5">
											<div class="from-body">
												<div class="tab-pane active" id="tab5">
												<h3 class="block">Administrare</h3>
													<div class="form-group">
															<label class="col-md-2 control-label">Distribuitor  <span class="required"> * </span>
															</label>
															<div class="col-md-2">
																<select class="form-control select2me" name="administrare_distribuitor" id="administrare_distribuitor">
																	<option value="">Alege...</option>
																	
																	<?foreach ($distribuitorData as $value){
																		
																		if ($value["distribuitorId"] == $agentData["administrare_distribuitor"]){
																			echo "<option value='".$value["distribuitorId"]."' selected='selected'>" . $value["dateDistribuitor_numeDenumire"] . "</option>";
																			
																		}
																		else
																		{
																			echo "<option value='".$value["distribuitorId"]."'>" . $value["dateDistribuitor_numeDenumire"] . "</option>";
																		}
																		
																		}
																		
																		
																		?>
																</select>
															</div>
														</div>
													
													<div class="form-group">
														<label class="col-md-2 control-label">Tip comision: <span class="required"> * </span>
														</label>
														<div class="col-md-2">
															<select class="form-control select2me" name="administrare_tipComision" id="administrare_tipComision">
																<option value="">Alege...</option>
																<?
																showEditModuleSettings($contracteSettingsData, 'tipComisionNegociat', $agentData["administrare_tipComision"]);
																?>
															</select>															
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Valoare comision: <span class="required"> * </span>
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="administrare_valoareComision" id="administrare_valoareComision" value="<? echo $agentData["administrare_valoareComision"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Status: <span class="required"> * </span>
														</label>
														<div class="col-md-2">
															<select class="form-control select2me" name="administrare_status" id="administrare_status">
																<option value="">Alege...</option>
																<?
																showEditModuleSettings($agentSettingsData, 'status', $agentData["administrare_status"]);
																?>
															</select>															
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Contract: <span class="required"> * </span>
														</label>
														<div class="col-md-2">
															<select class="form-control select2me" name="administrare_contract" id="administrare_contract">
																<option value="">Alege...</option>
																<?
																showEditModuleSettings($agentSettingsData, 'contract', $agentData["administrare_contract"]);
																?>
															</select>															
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Data initiala: 
														</label>
														<div class="col-md-2">
															<input type="text" class="form-control" name="administrare_dataInitiala" id="administrare_dataInitiala" readonly="true" value="<? echo $agentData["administrare_dataInitiala"];?>"></input>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab6">
											<div class="from-body">
												<div class="tab-pane active" id="tab6">
												<h3 class="block">Alte detalii</h3>
													<div class="form-group">
														<label class="col-md-2 control-label">Numar Registrul Comertului: 
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="alteDetalii_nrRegCom" id="alteDetalii_nrRegCom" value="<? echo $agentData["alteDetalii_nrRegCom"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">RO:  <span class="required">	* </span>
														</label>
														<div class="col-md-2">
															<select class="form-control select2me" name="alteDetalii_ro" id="alteDetalii_ro">
																<option value="">Alege...</option>
																<?
																showEditModuleSettings($agentSettingsData, 'ro', $agentData["alteDetalii_ro"]);
																?>
															</select>															
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Banca: 
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="alteDetalii_banca" id="alteDetalii_banca" value="<? echo $agentData["alteDetalii_banca"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">IBAN: 
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="alteDetalii_iban" id="alteDetalii_iban" value="<? echo $agentData["alteDetalii_iban"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Observatii: 
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="alteDetalii_observatii" id="alteDetalii_observatii" value="<? echo $agentData["alteDetalii_observatii"];?>"></input>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab7">
											<div class="from-body">
												<div class="tab-pane active" id="tab7">
												<h3 class="block">Atasare documente</h3>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<input type="hidden" name="viewEdit" value="submited">
					</form>
				</div>
			</div>