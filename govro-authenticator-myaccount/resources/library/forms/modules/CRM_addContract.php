<?

checkSession();
include("../resources/library/modules/CRM_ofertas.php");
$Oferte = "Oferte";
$OferteData = $Oferte::CRM_loadAll();

include("../resources/library/modules/CRM_products.php");
$produse = "Produse";
$produseData = $produse::CRM_loadAll();

include("../resources/library/modules/CRM_sucursaleFurnizors.php");
$sucursale = "Sucursale";
$sucursaleData = $sucursale::CRM_loadAll();

include("../resources/library/modules/CRM_brokers.php");
$brokeri = "Broker";
$brokeriData = $brokeri::CRM_loadAll();

include("../resources/library/modules/CRM_contracts.php");
$contracte = "Contract";
$contracteSettingsData = $contracte::CRM_loadSettings();

include("../resources/library/modules/CRM_angajatis.php");
$angajati = "Angajati";
$angajatiData = $angajati::CRM_loadAll();

include("../resources/library/modules/CRM_products.php");
$produse = "Produse";
$produseSettingsData = $produse::CRM_loadSettings();

?>
<div class="row">
				<div class="col-md-12">
					<div class="portlet box blue" id="addBeneficiiForm">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Adaugare contract - <span class="step-title">
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
							<form action="#" class="form-horizontal" id="CRM_addContractPOST" method="POST" enctype="multipart/form-data">
								<div class="form-wizard">
									<div class="form-body">
										<ul class="nav nav-pills nav-justified steps">
											<li>
												<a href="#tab1" data-toggle="tab" class="step">
												<span class="number">
												1 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Date contract </span>
												</a>
											</li>
											<li>
												<a href="#tab2" data-toggle="tab" class="step">
												<span class="number">
												2</span>
												<span class="desc">
												<i class="fa fa-check"></i> Date client</span>
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
												<i class="fa fa-check"></i> Date plata </span>
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
												<h3 class="block">Date contract</h3>
												<div class="form-group">
													<label class="control-label col-md-3"> Id oferta  <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<select class="form-control select2me" name="dateContract_idOferta" id="dateContract_idOferta" onChange="loadOfertaData()"/>
															<option value="">Alege...</option>
															<?foreach ($OferteData as $value){echo "<option value='".$value["idOferta"]."'>" . $value["idOferta"] . "</option>";}?>
														</select>
													</div>
													
												</div>												
												<div class="form-group">
													<label class="control-label col-md-3"> Serie contract <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dateContract_serieContract" id="dateContract_serieContract"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Numar contract <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dateContract_numarContract" id="dateContract_numarContract"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Data emitere <span class="required">	* </span>
													</label>
													<div class="col-md-4">
													<input type="text" class="form-control" name="dateContract_dataEmitere" id="dateContract_dataEmitere" value=<?echo '"' . date("d-m-Y H:i") . '"';?> readonly="true"/>
													</div>
												</div>	
												<div class="form-group">
													<label class="control-label col-md-3"> Tip produs
													</label>
													<div class="col-md-4">
													<select class="form-control" name="dateContract_tipProdus" id="dateContract_tipProdus" readonly="true">
															<option value="">Alege..</option>
													</select>
												</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Asigurator/Furnizor
													</label>
													<div class="col-md-4">
													<select class="form-control" name="dateContract_asiguratorFurnizor" id="dateContract_asiguratorFurnizor" readonly="true">
															<option value="">Alege..</option>
													</select>
													
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Produs
													</label>
													<div class="col-md-4">
														<select class="form-control" name="dateContract_produs" id="dateContract_produs">
															<option value="">Alege..</option>
															<?foreach ($produseData as $value){echo "<option value='".$value["idProduct"]."'>" . $value["dateProdus_denumire"] . "</option>";}?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Sucursala <span class="required"> * </span>
													</label>
													<div class="col-md-4">
														<select class="form-control" name="dateContract_sucursala" id="dateContract_sucursala">
															<option value="">Alege..</option>
															<?foreach ($sucursaleData as $value){echo "<option value='".$value["sucursaleFurnizorId"]."'>" . $value["dateSucursaleFurnizor_denumire"] . "</option>";}?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Broker 
													</label>
													<div class="col-md-4">
														<select class="form-control" name="dateContract_broker" id="dateContract_broker">
															<option value="">Alege..</option>
															<?foreach ($brokeriData as $value){echo "<option value='".$value["brokerId"]."'>" . $value["dateBroker_denumire"] . "</option>";}?>
														</select>
													</div>
												</div>															
											</div>
											<div class="tab-pane" id="tab2">
												<h3 class="block">Date client</h3>	
												<div class="form-group">
													<label class="control-label col-md-3"> Nume/Denumire 
													</label>
													<div class="col-md-4">
													<input type="text" class="form-control" name="dateClient_numeDenumire" id="dateClient_numeDenumire" readonly="true"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> CNP/CUI 
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dateClient_cnpCui" id="dateClient_cnpCui" readonly="true"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Telefon
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dateClient_telefon" id="dateClient_telefon" readonly="true"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Email
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dateClient_email" id="dateClient_email" readonly="true"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Nume/Denumire Contractant
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dateClient_numeDenumireContractant" id="dateClient_numeDenumireContractant" readonly="true"/>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab3">
												<h3 class="block">Administrare</h3>	
												<div class="form-group">
													<label class="control-label col-md-3"> Program de beneficii
													</label>
													<div class="col-md-4">
													<select class="form-control" name="administrare_programDeBeneficii" id="administrare_programDeBeneficii" readonly="true">
															<option value="">Alege..</option>
													</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Agent
													</label>
													<div class="col-md-4">
													<select class="form-control" name="administrare_agent" id="administrare_agent" readonly="true">
															<option value="">Alege..</option>
													</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Distribuitor
													</label>
													<div class="col-md-4">
													<select class="form-control" name="administrare_distribuitor" id="administrare_distribuitor" readonly="true">
															<option value="">Alege..</option>
													</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Angajat
													</label>
													<div class="col-md-4">
													<select class="form-control" name="administrare_angajat" id="administrare_angajat" readonly="true">
															<option value="">Alege..</option>
															
													</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Status contract 
													</label>
													<div class="col-md-4">
														<select class="form-control" name="administrare_statusContract" id="administrare_statusContract">
															<option value="">Alege..</option>
															<?
															showModuleSettings($contracteSettingsData, 'statusContract');
															?>
														</select>
													</div>
												</div>	
												<div class="form-group">
													<label class="control-label col-md-3"> Tip comision
													</label>
													<div class="col-md-4">
													<select class="form-control" name="administrare_tipComision" id="administrare_tipComision" readonly="true">
															<option value="">Alege..</option>
													</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Valoare comision 
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="administrare_valoareComision" id="administrare_valoareComision" readonly="true"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Tip comision negociat
													</label>
													<div class="col-md-4">
														<select class="form-control" name="administrare_tipComisionNegociat" id="administrare_tipComisionNegociat">
															<option value="">Alege..</option>
															<?
															showModuleSettings($contracteSettingsData, 'tipComisionNegociat');	
															?>												
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Valoare comision negociat
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="administrare_valoareComisionNegociat" id="administrare_valoareComisionNegociat"/>
													</div>
												</div>	
												<div class="form-group">
													<label class="control-label col-md-3"> Comision contract(Ron)
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="administrare_comisionContract" id="administrare_comisionContract"/>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab4">
												<h3 class="block">Data plata</h3>	
												<div class="form-group">
													<label class="control-label col-md-3"> Tip valabilitate <span class="required">	* </span>
													</label>
													<div class="col-md-4">
													<select class="form-control" name="dataPlata_tipValabilitate" id="dataPlata_tipValabilitate" readonly="true">
															<option value="">Alege..</option>
														
															
													</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Valabilitate <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dataPlata_valabilitate" id="dataPlata_valabilitate" readonly="true"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Data inceput <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dataPlata_dataInceput" id="dataPlata_dataInceput" readonly="true"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Data sfarsit <span class="required">	* </span>
													</label>
													<div class="col-md-4">
													<a href="javascript:;" id="dataPlata_dataSfarsitDtP" data-type="datetime" data-pk="1" data-url="/post" data-placement="right" title="Set date & time"><?echo date("d/m/Y H:i"); ?></a>
														<input type="hidden" name="dataPlata_dataSfarsit" id="dataPlata_dataSfarsit" value="<?echo date("d/m/Y H:i"); ?>">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Descriere obiect asigurat
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dataPlata_descriereObiectAsigurat" id="dataPlata_descriereObiectAsigurat"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Valuta contract <span class="required">	* </span>
													</label>
													<div class="col-md-4">
													<select class="form-control" name="dataPlata_valutaContract" id="dataPlata_valutaContract" readonly="true">
															<option value="">Alege..</option>
															<?
															showModuleSettings($contracteSettingsData, 'currency');	
															?>
													</select>
													
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Pret contract <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dataPlata_pretContract" id="dataPlata_pretContract" readonly="true"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Pret final <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dataPlata_pretFinal" id="dataPlata_pretFinal" readonly="true"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Reducere WS
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dataPlata_reducereWS" id="dataPlata_reducereWS" value="0" onchange="calculate()"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Tip plata <span class="required">	* </span>
													</label>
													<div class="col-md-4">
													<select class="form-control" name="dataPlata_tipPlata" id="dataPlata_tipPlata" readonly="true">
															<option value="">Alege..</option>
															<?
															showModuleSettings($contracteSettingsData, 'paymentType');	
															?>
													</select>
													
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Numar rate <span class="required">	* </span>
													</label>
													<div class="col-md-4">
													<input type="text" class="form-control" name="dataPlata_nrRate" id="dataPlata_nrRate" readonly="true"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Valoare R1
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dataPlata_valoareR1" id="dataPlata_valoareR1"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Valoare reducere R1
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dataPlata_valoareReducereR1" id="dataPlata_valoareReducereR1"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Valoare finala R1
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dataPlata_valoareFinalaR1" id="dataPlata_valoareFinalaR1"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Scadenta R1
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dataPlata_scadentaR1" id="dataPlata_scadentaR1"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Data plata
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dataPlata_dataDePlata" id="dataPlata_dataDePlata"/>
													</div>
												</div>												
												<div class="form-group">
													<label class="control-label col-md-3"> Status termen R1 
													</label>
													<div class="col-md-4">
														<select class="form-control" name="dataPlata_statusTermenR1" id="dataPlata_statusTermenR1">
															<option value="">Alege...</option>
															<option value="In termen">In termen</option>
															<option value="In ultimele 3 zile">In ultimele 3 zile</option>
															<option value="Ultima zi">Ultima zi</option>
															<option value="Depasita!">Depasita!</option>
															<option value="Finalizata">Finalizata</option>
															<option value="Nu se plateste/reinnoieste">Nu se plateste/reinnoieste</option>
															<option value="Amanata">Amanata</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Tip plata R1 
													</label>
													<div class="col-md-4">
														<select class="form-control" name="dataPlata_tipPlataR1" id="dataPlata_tipPlataR1">
															<option value="">Alege..</option>
															<option value="Op Broker">Op Broker</option>
															<option value="Op Web">Op Web</option>
															<option value="Op Asigurator">Op Asigurator</option>
															<option value="Curier">Curier</option>
															<option value="Numerar - broker">Numerare - broker</option>	
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Valoare plata R1(RON)
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dataPlata_valoarePlataR1" id="dataPlata_valoarePlataR1"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Observatii R1
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dataPlata_observatiiR1" id="dataPlata_observatiiR1"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Mentiuni contract
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dataPlata_mentiuniContract" id="dataPlata_mentiuniContract"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Observatii contract
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dataPlata_observatiiContract" id="dataPlata_observatiiContract"/>
													</div>
												</div>																																			
											</div>											
											<div class="tab-pane" id="tab5">
												<h3 class="block">Atasare documente</h3>												
												<input type="hidden" name="CRM_addContract" id="CRM_addContract" value="submitted">
												<input type="hidden" name="OferteDataJSON" id="OferteDataJSON" <?echo 'value="' . json_encode($OferteData) . '"';?>>
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