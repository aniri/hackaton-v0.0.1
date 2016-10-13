<?

checkSession();

include("../resources/library/modules/CRM_products.php");
$produse = "Produse";
$produseData = $produse::CRM_loadAll();

include("../resources/library/modules/CRM_clients.php");
$clienti = "Clienti";
$clientiData = $clienti::CRM_loadAllClients();

include("../resources/library/modules/CRM_programBeneficiis.php");
$beneficii = "Beneficii";
$beneficiiData = $beneficii::CRM_loadAll();

include("../resources/library/modules/CRM_agents.php");
$agenti = "Agenti";
$agentiData = $agenti::CRM_loadAll();

include("../resources/library/modules/CRM_angajatis.php");
$angajati = "Angajati";
$angajatiData = $angajati::CRM_loadAll();

include("../resources/library/modules/CRM_cerereOfertas.php");
$CereriOferte = "CerereOferta";
$CereriOferteData = $CereriOferte::CRM_loadAll();
$CereriOferteSettingsData = $CereriOferte::CRM_loadSettings();
?>
<div class="row">
				<div class="col-md-12">
					<div class="portlet box blue" id="addBeneficiiForm">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Adaugare oferta - <span class="step-title">
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
							<form action="#" class="form-horizontal" id="CRM_addRequestsListOfferPOST" method="POST" enctype="multipart/form-data">
								<div class="form-wizard">
									<div class="form-body">
										<ul class="nav nav-pills nav-justified steps">
											<li>
												<a href="#tab1" data-toggle="tab" class="step">
												<span class="number">
												1 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Date cerere oferta </span>
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
												<i class="fa fa-check"></i> Date contractant </span>
												</a>
											</li>
											<li>
												<a href="#tab4" data-toggle="tab" class="step">
												<span class="number">
												4</span>
												<span class="desc">
												<i class="fa fa-check"></i> Detalii cerere </span>
												</a>
											</li>
											<li>
												<a href="#tab5" data-toggle="tab" class="step">
												<span class="number">
												5</span>
												<span class="desc">
												<i class="fa fa-check"></i> Administrare </span>
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
												<h3 class="block">Date cerere oferta</h3>	
												<div class="form-group">
													<label class="control-label col-md-3"> Data cerere oferta <span class="required">	* </span>
													</label>
													<div class="col-md-4">
													<p><?echo date("d/m/Y H:i"); ?></p>
														<input type="hidden" name="dateCerereOferta_dataCerereOferta" id="dateCerereOferta_dataCerereOferta" <?echo 'value="' . date("d/m/Y H:i") . '"'; ?>>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Termen oferta <span class="required">	* </span>
													</label>
													<div class="col-md-4">
															<?
															
															$startDate = time();
															$date = date('Y-m-d H:i', strtotime('+1 day', $startDate));
															$dateFinal = (string)date("d/m/Y H:i", strtotime($date));
															echo $dateFinal;
															?>
														<input type="hidden" name="dateCerereOferta_termenOferta" id="dateCerereOferta_termenOferta" <? echo 'value="' . $dateFinal . '"'; ?>>
													</div>
												</div>											
												<div class="form-group">
													<label class="control-label col-md-3"> Status termen raspuns 
													</label>
													<div class="col-md-4">
														<select class="form-control" name="dateCerereOferta_statusTermenRaspuns" id="dateCerereOferta_statusTermenRaspuns">
															<option value="">Alege...</option>
															<?
																foreach ($CereriOferteSettingsData as $name => $value)
																{
																	if ($name == "statusOferta")
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
											<!--	<div class="form-group">
													<label class="control-label col-md-3"> ID oferta 
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dateCerereOferta_idOferta" id="dateCerereOferta_idOferta"/>
													</div>
												</div>-->
											<!--	<div class="form-group">
													<label class="control-label col-md-3"> Data transmitere oferta
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dateCerereOferta_dataTransmitereOferta" id="dateCerereOferta_dataTransmitereOferta" disabled="disabled"/>
													</div>
												</div>-->
												<div class="form-group">
													<label class="control-label col-md-3"> Tip cerere oferta <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<select class="form-control" name="dateCerereOferta_tipCerereOferta" id="dateCerereOferta_tipCerereOferta">
															<option value="">Alege...</option>
															<?
																foreach ($CereriOferteSettingsData as $name => $value)
																{
																	if ($name == "tipCerereOferta")
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
													<label class="control-label col-md-3">Tip produs <span class="required"> * </span>
													</label>
													<div class="col-md-4">
														<select class="form-control select2me" name="dateCerereOferta_tipProdus" id="dateCerereOferta_tipProdus"/>
															<option value="">Alege...</option>
															<?foreach ($produseData as $value){echo "<option value='".$value["idProduct"]."'>" . $value["dateProdus_tipProdus"] . "</option>";}?>
														</select>
													</div>
													
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Tip oferta <span class="required"> * </span>
													</label>
													<div class="col-md-4">
														<select class="form-control" name="dateCerereOferta_tipOferta" id="dateCerereOferta_tipOferta">
															<option value="">Alege...</option>
															<?
																foreach ($CereriOferteSettingsData as $name => $value)
																{
																	if ($name == "tipOferta")
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
													<label class="control-label col-md-3"> Data inceput <span class="required"> * </span>
													</label>
													<div class="col-md-4">
													<a href="javascript:;" id="dateCerereOferta_dataInceputDtP" data-type="datetime" data-pk="1" data-url="/post" data-placement="right" title="Set date & time"><?echo date("d/m/Y H:i"); ?></a>
														<input type="hidden" name="dateCerereOferta_dataInceput" id="dateCerereOferta_dataInceput" value="<?echo date("d/m/Y H:i"); ?>">
													</div>
												</div>																							
											</div>
											<div class="tab-pane" id="tab2">
												<h3 class="block">Date client</h3>	
												<div class="form-group">
													<label class="control-label col-md-3">Client
													</label>
													<div class="col-md-4">
														<select class="form-control select2me" name="dateClient_clientId" id="dateClient_clientId" <? echo 'onChange="tipClientFunction(this.value)"'; ?>>
															<option value="clientNou" selected="selected">Client nou...</option>
															<? foreach ($clientiData as $value){echo "<option value='".$value["idClient"] . "'>".$value["dateClient_denumire"].$value["dateClient_nume"]." " . $value["dateClient_prenume"] . "</option>";} ?>
														</select>
														<input type="hidden" name="clientiDataJSON" value="<?php echo htmlspecialchars(objToJSON($clientiData),ENT_QUOTES); ?>" id="clientiDataJSON">
													
													</div>
													
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Nume/Denumire <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dateClient_numeDenumire" id="dateClient_numeDenumire"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> CNP/CUI <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dateClient_cnpCui" id="dateClient_cnpCui"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Telefon
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dateClient_telefon" id="dateClient_telefon"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Email
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dateClient_email" id="dateClient_email"/>
													</div>
												</div>																																		
											</div>
											<div class="tab-pane" id="tab3">
												<h3 class="block">Date contractant</h3>	
												<div class="form-group">
													<label class="control-label col-md-3"> Acelasi cu clientul <span class="required"> * </span>
													</label>
													<div class="col-md-4">
														<select class="form-control" name="dateContractant_dateClient" id="dateContractant_dateClient" onChange="dateContractant()">
															<option value="Da">Da</option>
															<option value="Nu">Nu</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Nume/Denumire <span class="required"> * </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dateContractant_numeDenumire" id="dateContractant_numeDenumire"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> CNP/CUI <span class="required"> * </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dateContractant_cnpCui" id="dateContractant_cnpCui"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Telefon
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dateContractant_telefon" id="dateContractant_telefon"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Email
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dateContractant_email" id="dateContractant_email"/>
													</div>
												</div>																																			
											</div>
											<div class="tab-pane" id="tab4">
												<h3 class="block">Detalii cerere</h3>	
												<div class="form-group">
													<label class="control-label col-md-3"> Descriere cerere
													</label>
													<div class="col-md-4">
														​<textarea id="txtArea" rows="5" cols="70" class="form-control" name="detaliiCerere_descriereCerere" id="detaliiCerere_descriereCerere"></textarea>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Data inceput
													</label>
													<div class="col-md-4">
													<a href="javascript:;" id="detaliiCerere_dataInceputDtP" data-type="datetime" data-pk="1" data-url="/post" data-placement="right" title="Set date & time"><?echo date("d/m/Y H:i"); ?></a>
														<input type="hidden" name="detaliiCerere_dataInceput" id="detaliiCerere_dataInceput" value="<?echo date("d/m/Y H:i"); ?>">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Tip valabilitate 
													</label>
													<div class="col-md-4">
														<select class="form-control" name="detaliiCerere_tipValabilitate" id="detaliiCerere_tipValabilitate">
															<option value="">Alege...</option>
															<?
																foreach ($CereriOferteSettingsData as $name => $value)
																{
																	if ($name == "tipValabilitate")
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
													<label class="control-label col-md-3"> Valabilitate
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="detaliiCerere_valabilitate" id="detaliiCerere_valabilitate"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Mentiuni cerere
													</label>
													<div class="col-md-4">
														​<textarea id="txtArea" rows="5" cols="70" class="form-control" name="detaliiCerere_mentiuniCerere" id="detaliiCerere_mentiuniCerere"></textarea>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Serie cod voucher/card membru
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="detaliiCerere_serieCodVoucher" id="detaliiCerere_serieCodVoucher"/>
													</div>
												</div>																																			
											</div>
											<div class="tab-pane" id="tab5">
												<h3 class="block">Administrare</h3>	
												<div class="form-group">
													<label class="control-label col-md-3"> Status cerere oferta
													</label>
													<div class="col-md-4">
														<select class="form-control" name="administrare_statusCerereOferta" id="administrare_statusCerereOferta">
															<option value="">Alege...</option>
														<?
																foreach ($CereriOferteSettingsData as $name => $value)
																{
																	if ($name == "statusCerere")
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
													<label class="control-label col-md-3">Program de beneficii
													</label>
													<div class="col-md-4">
														<select class="form-control select2me" name="administrare_programBeneficii" id="administrare_programBeneficii" <? echo 'onChange="agentFromBeneficii(this.value)"'; ?>>
															<option value="">Alege...</option>
															<?foreach ($beneficiiData as $value){echo "<option value='".$value["programBeneficiiId"]."'>" . $value["dateProgramBeneficii_numeProgram"] . "</option>";}?>
															
															
														</select>
														<input type="hidden" name="beneficiiDataJSON" value="<?php echo htmlspecialchars(objToJSON($beneficiiData),ENT_QUOTES); ?>" id="beneficiiDataJSON">
													</div>
													
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Agent
													</label>
													<div class="col-md-4">
														<select class="form-control select2me" name="administrare_agent" id="administrare_agent">
															<option value="">Alege...</option>
															<?foreach ($agentiData as $value){echo "<option value='".$value["agentId"]."'>" . $value["dateAgent_numeDenumire"] . "</option>";}?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Angajat responsabil
													</label>
													<div class="col-md-4">
														<select class="form-control select2me" name="administrare_angajatResponsabil" id="administrare_angajatResponsabil">
															<option value="">Alege...</option>
															<?foreach ($angajatiData as $value){echo "<option value='".$value["angajatiId"]."'>" . $value["dateAngajati_nume"] . "</option>";}?>
															<option value=<? echo '"'.$userDetails["name"]. '"';?> selected="selected"><? echo $userDetails["name"];?></option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Observatii
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="administrare_observatii" id="administrare_observatii"/>
													</div>
												</div>																																															
											</div>
											<div class="tab-pane" id="tab6">
												<h3 class="block">Atasare documente</h3>
												<input type="hidden" name="CRM_addRequestsListOfferPOST" id="CRM_addRequestsListOfferPOST" value="submitted">
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