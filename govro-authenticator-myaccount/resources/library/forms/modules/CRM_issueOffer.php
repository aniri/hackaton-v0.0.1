<?

checkSession();

include("../resources/library/modules/CRM_cerereOfertas.php");
$cerereOferta = "CerereOferta";
$cerereOfertaData = $cerereOferta::CRM_load($_GET["id"]);
$cerereOfertaSettings = $cerereOferta::CRM_loadSettings();

include("../resources/library/modules/CRM_ofertas.php");
$oferte = "Oferte";
$oferteData = $oferte::CRM_loadAll();
$ofertaSettings = $oferte::CRM_loadSettings();

include("../resources/library/modules/CRM_programBeneficiis.php");
$beneficii = "Beneficii";
$beneficiiData = $beneficii::CRM_load($cerereOfertaData["administrare_programBeneficii"]);

include("../resources/library/modules/CRM_agents.php");
$agenti = "Agenti";
$agentiData = $agenti::CRM_load($cerereOfertaData["administrare_agent"]);

include("../resources/library/modules/CRM_angajatis.php");
$angajati = "Angajati";
$angajatiData = $angajati::CRM_load($cerereOfertaData["administrare_angajatResponsabil"]);

include("../resources/library/modules/CRM_products.php");
$produse = "Produse";
$produseData = $produse::CRM_loadAll();

include("../resources/library/modules/CRM_asiguratorFurnizors.php");
$asiguratori = "Asigurator";
$asiguratoriData = $asiguratori::CRM_loadAll();

/*include("../resources/library/modules/CRM_clients.php");
$clienti = "Clienti";
$clientiData = $clienti::CRM_loadAllClients();







include("../resources/library/modules/CRM_cerereOfertas.php");
$CereriOferte = "CerereOferta";
$CereriOferteData = $CereriOferte::CRM_loadAll();*/

?>
<div class="row">
				<div class="col-md-12">
					<div class="portlet box blue" id="addBeneficiiForm">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Emitere oferta - <span class="step-title">
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
							<form action="#" class="form-horizontal" id="CRM_AddOfferPOST" method="POST" enctype="multipart/form-data">
								<div class="form-wizard">
									<div class="form-body">
										<ul class="nav nav-pills nav-justified steps">
											<li>
												<a href="#tab1" data-toggle="tab" class="step">
												<span class="number">
												1 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Date oferta </span>
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
												<i class="fa fa-check"></i> Oferta </span>
												</a>
											</li>
											<li>
												<a href="#tab5" data-toggle="tab" class="step">
												<span class="number">
												5</span>
												<span class="desc">
												<i class="fa fa-check"></i> Decizie oferta </span>
												</a>
											</li>
											<li>
												<a href="#tab6" data-toggle="tab" class="step">
												<span class="number">
												6</span>
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
												<h3 class="block">Date oferta</h3>
												<div class="form-group">
													<label class="control-label col-md-3"> ID cerere oferta
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dateOferta_idCerereOferta" id="dateOferta_idCerereOferta" readonly="readonly" value="<? echo $cerereOfertaData["cerereOfertaId"]; ?>"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Data cerere oferta
													</label>
													<div class="col-md-4">
														<input type="text" readonly="readonly" class="form-control" name="dateOferta_dataCerereOferta" id="dateOferta_dataCerereOferta" readonly="readonly" value="<? echo $cerereOfertaData["dateCerereOferta_dataCerereOferta"]; ?>"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Data transmitere oferta
													</label>
													<div class="col-md-4">
														<input type="text" readonly="readonly" class="form-control" name="dateOferta_dataTransmitereOferta" id="dateOferta_dataTransmitereOferta" readonly="readonly" value="<? echo date("d/m/Y H:i"); ?>"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Tip cerere oferta <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<select class="form-control" name="dateOferta_tipCerereOferta" id="dateOferta_tipCerereOferta">
															<option value="">Alege...</option>
															<?
															showEditModuleSettings($cerereOfertaSettings, 'tipCerereOferta', $cerereOfertaData["dateCerereOferta_tipCerereOferta"]);
															?>	
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Tip produs <span class="required"> * </span>
													</label>
													<div class="col-md-4">
														<select class="form-control select2me" name="dateOferta_tipProdus" id="dateOferta_tipProdus"/>
															<option value="">Alege...</option>
															<?foreach ($produseData as $value)
																	{
																	if ($value["idProduct"] == $cerereOfertaData["dateCerereOferta_tipProdus"])
																	{
																		echo "<option value='".$value["idProduct"]."' selected='selected'>" . $value["dateProdus_tipProdus"] . "</option>";
																	}
																	else
																	{
																		echo "<option value='".$value["idProduct"]."'>" . $value["dateProdus_tipProdus"] . "</option>";
																	}															
																}
																?>
														</select>
													</div>
													
												</div>
											</div>
											<div class="tab-pane" id="tab2">
												<h3 class="block">Date client</h3>
												<div class="form-group">
													<label class="control-label col-md-3"> Nume/Denumire <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dateClient_numeDenumire" id="dateClient_numeDenumire" <?echo 'value="'.$cerereOfertaData["dateClient_numeDenumire"].'"'?> readonly="readonly"/>
														<input type="hidden" class="form-control" name="dateClient_idClientExistent" id="dateClient_idClientExistent" <?echo 'value="'.$cerereOfertaData["dateClient_clientId"].'"'?> readonly="readonly"/>
														
														
														
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> CNP/CUI <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dateClient_cnpCui" id="dateClient_cnpCui"<?echo 'value="'.$cerereOfertaData["dateClient_cnpCui"].'"'?>readonly="readonly"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Telefon
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dateClient_telefon" id="dateClient_telefon"<?echo 'value="'.$cerereOfertaData["dateClient_telefon"].'"'?>readonly="readonly"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Email
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dateClient_email" id="dateClient_email"<?echo 'value="'.$cerereOfertaData["dateClient_email"].'"'?>readonly="readonly"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Nume/Denumire contractant<span class="required"> * </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dateClient_numeDenumireContractant" id="dateClient_numeDenumireContractant" <?echo 'value="'.$cerereOfertaData["dateContractant_numeDenumire"].'"'?>readonly="readonly"/>
													</div>
												</div>																																		
											</div>
											<div class="tab-pane" id="tab3">
												<h3 class="block">Administrare</h3>
												<div class="form-group">
													<label class="control-label col-md-3">Program de beneficii
													</label>
													<div class="col-md-4">
														<select class="form-control" name="administrare_programDeBeneficii" id="administrare_programDeBeneficii" readonly="true">
															<?
															
																echo "<option value='".$beneficiiData["programBeneficiiId"]."' selected='selected'>" . $beneficiiData["dateProgramBeneficii_numeProgram"] . "</option>";
																?>
															
															
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Agent
													</label>
													<div class="col-md-4">
													<select class="form-control" name="administrare_agent" id="administrare_agent" readonly="true">
															<?
															
																echo "<option value='".$agentiData["agentId"]."' selected='selected'>" . $agentiData["dateAgent_numeDenumire"] . "</option>";
																?>
															
															
														</select>
														</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Angajat
													</label>
													<div class="col-md-4">
													<select class="form-control" name="administrare_angajat" id="administrare_angajat" readonly="true">
															<?
															
																echo "<option value='".$angajatiData["angajatiId"]."' selected='selected'>" . $angajatiData["dateAngajati_nume"] . "</option>";
																?>
															
															
														</select>
													</div>
												</div>
												
												<div class="form-group">
													<label class="control-label col-md-3"> Status cerere oferta
													</label>
													<div class="col-md-4">
														<select class="form-control" name="administrare_statusOferta" id="administrare_statusOferta">
														
															<?
															showEditModuleSettings($cerereOfertaSettings, 'statusOferta', $cerereOfertaData["dateCerereOferta_statusOferta"]);
															?>	
															
														</select>
													</div>
												</div>															
											</div>
											<div class="tab-pane" id="tab4">
												<h3 class="block">Descriere oferta</h3>	
												<div class="form-group">
													<label class="control-label col-md-3"> Descriere oferta
													</label>
													<div class="col-md-4">
														<textarea id="txtArea" rows="5" cols="70" class="form-control" name="oferta_descriereOferta" id="oferta_descriereOferta" readonly="readonly"><?echo $cerereOfertaData["detaliiCerere_descriereCerere"]?></textarea>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Valuta
													</label>
													<div class="col-md-4">
														<select class="form-control" name="oferta_valuta" id="oferta_valuta" onchange="updateMedieOferta()">
															<option value="">Alege...</option>
															<?
															showModuleSettings($ofertaSettings, 'currency');
															?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Data inceput
													</label>
													<div class="col-md-4">
													<a href="javascript:;" id="oferta_dataInceputDtP" data-type="datetime" data-pk="1" data-url="/post" data-placement="right" title="Set date & time"><?echo $cerereOfertaData["dateCerereOferta_dataInceput"]?></a>
														<input type="hidden" name="oferta_dataInceput" id="oferta_dataInceput" value="<?echo $cerereOfertaData["dateCerereOferta_dataInceput"]?>">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Tip valabilitate
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="oferta_tipValabilitate" id="oferta_tipValabilitate"<?echo 'value="'.$cerereOfertaData["detaliiCerere_tipValabilitate"].'"'?> readonly="readonly"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Valabilitate
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="oferta_valabilitate" id="oferta_valabilitate"<?echo 'value="'.$cerereOfertaData["detaliiCerere_valabilitate"].'"'?> readonly="readonly"/>
													</div>
												</div>	
												<div class="form-group">
													<label class="control-label col-md-3"> Prima medie oferta (Ron)
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="oferta_primaMedieOferta" id="oferta_primaMedieOferta" value="" readonly="readonly"/>
													</div>
												</div>
												<div id="varianteOferte">
													<div id="ofertaV1">
														<div class="form-group">
															<label class="control-label col-md-3">Asigurator/Furnizor V1
															</label>
															<div class="col-md-4">
																	<select class="form-control select2me" name="oferta_asiguratorFurnizorV1" id="oferta_asiguratorFurnizorV1"/>
																		<option value="">Alege...</option>
																		<?foreach ($asiguratoriData as $value)
																				{
																					echo "<option value='".$value["asiguratorFurnizorId"]."'>" . $value["dateAsiguratorFurnizor_denumire"] . "</option>";
																																		
																			}
																			?>
																	</select>
															</div>
															<div class="col-md-4">		
																	<span class="btn green fileinput-button" id="buttonV" onclick="addVarianta()">
																	<i class="fa fa-plus"></i>
																	<span>
																	Adauga varianta... </span>
																	
																	</span>
															</div>
															
														</div>
														<div class="form-group">
															<label class="control-label col-md-3"> Valoare V1
															</label>
															<div class="col-md-4">
																<input type="text" class="form-control" name="oferta_valoareV1" id="oferta_valoareV1" onchange="updateMedieOferta()"/>
															</div>
														</div>
														<div class="form-group">
															<label class="control-label col-md-3"> Descriere oferta V1
															</label>
															<div class="col-md-4">
																<input type="text" class="form-control" name="oferta_descriereOfertaV1" id="oferta_descriereOfertaV1"/>
															</div>
														</div>	
													</div>
													<div id="ofertaV2" style="display: none;">
														<div class="form-group">
															<label class="control-label col-md-3">Asigurator/Furnizor V2
															</label>
															<div class="col-md-4">
																	<select class="form-control" name="oferta_asiguratorFurnizorV2" id="oferta_asiguratorFurnizorV2">
																		<option value="">Alege...</option>
																		<?foreach ($asiguratoriData as $value)
																				{
																					echo "<option value='".$value["asiguratorFurnizorId"]."'>" . $value["dateAsiguratorFurnizor_denumire"] . "</option>";
																																		
																			}
																			?>
																	</select>
															</div>
														</div>
														<div class="form-group">
															<label class="control-label col-md-3"> Valoare V2
															</label>
															<div class="col-md-4">
																<input type="text" class="form-control" name="oferta_valoareV2" id="oferta_valoareV2" onchange="updateMedieOferta()"/>
															</div>
														</div>
														<div class="form-group">
															<label class="control-label col-md-3"> Descriere oferta V2
															</label>
															<div class="col-md-4">
																<input type="text" class="form-control" name="oferta_descriereOfertaV2" id="oferta_descriereOfertaV2"/>
															</div>
														</div>	
													</div>
													<div id="ofertaV3"></div>
													<div id="ofertaV4"></div>
													<div id="ofertaV5"></div>
													<div id="ofertaV6"></div>
													<div id="ofertaV7"></div>
													<div id="ofertaV8"></div>
													<div id="ofertaV9"></div>
													<div id="ofertaV10"></div>
												</div>
											</div>
											<div class="tab-pane" id="tab5">
												<h3 class="block">Decizie oferta</h3>	
												<div class="form-group">
													<label class="control-label col-md-3"> Decizie oferta
													</label>
													<div class="col-md-4">
														<select class="form-control" name="decizieOferta_decizieOferta" id="decizieOferta_decizieOferta">
															<option value="">Alege...</option>
															<?
																	showModuleSettings($ofertaSettings, 'decisionOffer');
																	?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Data decizie
													</label>
													<div class="col-md-4">
													<a href="javascript:;" id="decizieOferta_dataDecizieDtP" data-type="datetime" data-pk="1" data-url="/post" data-placement="right" title="Set date & time"><? echo date("d/m/Y H:i"); ?></a>
														<input type="hidden" name="decizieOferta_dataDecizie" id="decizieOferta_dataDecizie" value="<? echo date("d/m/Y H:i"); ?>">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Varianta aleasa
													</label>
													<div class="col-md-4">
														<select class="form-control" name="decizieOferta_variantaAleasa" id="decizieOferta_variantaAleasa" onchange="incarcaVarianta()">
															<option value="">Alege...</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Asigurator ales
													</label>
													<div class="col-md-4">
														<select class="form-control" name="decizieOferta_asiguratorAles" id="decizieOferta_asiguratorAles" readonly="true">
															
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Valuta acceptata
													</label>
													<div class="col-md-4">
													<select class="form-control" name="decizieOferta_valutaAcceptata" id="decizieOferta_valutaAcceptata" readonly="true">
															
														</select>
														
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Pretul acceptat
													</label>
													<div class="col-md-4">
													<input type="text" class="form-control" name="decizieOferta_pretulAcceptat" id="decizieOferta_pretulAcceptat" readonly="true"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Reducere WS 
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="decizieOferta_reducereWS" id="decizieOferta_reducereWS" value="0" onchange="incarcaVarianta()"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Pret final 
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="decizieOferta_pretFinal" id="decizieOferta_pretFinal" readonly="true"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Tip plata
													</label>
													<div class="col-md-4">
														<select class="form-control" name="decizieOferta_tipPlata" id="decizieOferta_tipPlata">
															<option value="">Alege...</option>
															<?
															showModuleSettings($ofertaSettings, 'paymentType');
															?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Nr. rate
													</label>
													<div class="col-md-4">
														<select class="form-control" name="decizieOferta_nrRate" id="decizieOferta_nrRate">
															<option value="">Alege...</option>
															<?
															showModuleSettings($ofertaSettings, 'nrRate');
															?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Refuz oferta
													</label>
													<div class="col-md-4">
														<select class="form-control" name="decizieOferta_refuzOferta" id="decizieOferta_refuzOferta">
															<option value="">Alege...</option>
															<?
															showModuleSettings($ofertaSettings, 'offerRejection');
															?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Detalii refuz
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="decizieOferta_detaliiRefuz" id="decizieOferta_detaliiRefuz"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Observatii oferta
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="decizieOferta_observatiiOferta" id="decizieOferta_observatiiOferta"/>
													</div>
												</div>				
											</div>
											
											<div class="tab-pane" id="tab6">
												<h3 class="block">Atasare documente</h3>
											
												<input type="hidden" name="CRM_AddOfferPOSTFORM" id="CRM_AddOfferPOSTFORM" value="submitted">
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
			