<?

checkSession();

$cerereOfertaData = $cerereOferta::CRM_load($_GET["id"]);

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
					<form class="form-horizontal form-row-seperated" action="#" id="CRM_editCerereOfertaPOST" method="POST" enctype="multipart/form-data">
						<div class="portlet">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-shopping-cart"></i>Cerere oferta - <? echo $cerereOfertaData["cerereOfertaId"];?>
								</div>
								<div class="actions btn-set">
									<button type="button" name="back" class="btn default" onclick="goBack()"><i class="fa fa-angle-left"></i> Inapoi</button>
									<button type="button" name="refresh" class="btn default" onclick="refresh()"><i class="fa fa-reply"></i> Reincarca</button>
									<button class="btn green"><i class="fa fa-check"></i> Salveaza</button>
									<button type="button" class="btn blue"  onclick="emiteOferta(<? echo "'" . $cerereOfertaData["cerereOfertaId"] . "','" . basename($_SERVER['PHP_SELF']) . "'";?>)"><i class="fa fa-save"></i> Emite oferta</button>
								</div>
							</div>
							<div class="portlet-body">
								<div class="tabbable">
									<ul class="nav nav-tabs">
										<li class="active">
											<a href="#tab1" data-toggle="tab">
											Date cerere oferta </a>
										</li>
										<li>
											<a href="#tab2" data-toggle="tab">
											Date client </a>
										</li>
										<li>
											<a href="#tab3" data-toggle="tab">
											Date contractant </a>
										</li>
										<li>
											<a href="#tab4" data-toggle="tab">
											Detalii cerere </a>
										</li>
										<li>
											<a href="#tab5" data-toggle="tab">
											Administrare </a>
										</li>
										<li>
											<a href="#tab6" data-toggle="tab">
											Atasare documente </a>
										</li>
										
										
									</ul>
									<div class="tab-content no-space">
										<div class="tab-pane active" id="tab1">
										<h3 class="block">Date cerere oferta</h3>
											<div class="form-body">
												<div class="form-group">
													<label class="col-md-2 control-label">Id:<span class="required">
													* </span>
													</label>
													<div class="col-md-2">
													<label class="col-md-2 control-label"><? echo $cerereOfertaData["cerereOfertaId"];?>
													</label>	
													</div>
												</div>
												<div class="form-group">
														<label class="col-md-2 control-label">Data cerere oferta: <span class="required">
													* </span>
														</label>
														<div class="col-md-2">
															<input type="text" class="form-control" name="dateCerereOferta_dataCerereOferta" id="dateCerereOferta_dataCerereOferta" value="<? echo $cerereOfertaData["dateCerereOferta_dataCerereOferta"];?>">
														</div>
												</div>
												<div class="form-group">
														<label class="col-md-2 control-label">Termen oferta: <span class="required">
													* </span>
														</label>
														<div class="col-md-2">
															<input type="text" class="form-control" name="dateCerereOferta_termenOferta" id="dateCerereOferta_termenOferta" value="<? echo $cerereOfertaData["dateCerereOferta_termenOferta"];?>">
															
														</div>
												</div>
												<div class="form-group">
														<label class="col-md-2 control-label">Status termen raspuns:
														</label>
														<div class="col-md-2">
														<select class="form-control select2me" name="dateCerereOferta_statusTermenRaspuns" id="dateCerereOferta_statusTermenRaspuns" >
																<option value="">Alege...</option>
																<?
																showEditModuleSettings($CereriOferteSettingsData, 'statusOferta', $cerereOfertaData["dateCerereOferta_statusTermenRaspuns"]);
																?>
														</select>
															
														</div>
												</div>
												<div class="form-group">
														<label class="col-md-2 control-label">Id oferta:
														</label>
														<div class="col-md-2">
															<input type="text" class="form-control" name="dateCerereOferta_idOferta" id="dateCerereOferta_idOferta" value="<? echo $cerereOfertaData["dateCerereOferta_idOferta"];?>">
														
														</div>
												</div>
												<div class="form-group">
														<label class="col-md-2 control-label">Data transmitere oferta:
														</label>
														<div class="col-md-2">
															<input type="text" class="form-control" name="dateCerereOferta_dataTransmitereOferta" id="dateCerereOferta_dataTransmitereOferta" value="<? echo $cerereOfertaData["dateCerereOferta_dataTransmitereOferta"];?>">
														</div>
												</div>
												<div class="form-group">
														<label class="col-md-2 control-label">Tip cerere oferta:<span class="required">
													* </span>
														</label>
														<div class="col-md-2">
														<select class="form-control select2me" name="dateCerereOferta_tipCerereOferta" id="dateCerereOferta_tipCerereOferta" >
																<option value="">Alege...</option>
																<?
																showEditModuleSettings($CereriOferteSettingsData, 'tipCerereOferta', $cerereOfertaData["dateCerereOferta_tipCerereOferta"]);
																?>
														</select>
															
														</div>
												</div>
												<div class="form-group">
														<label class="col-md-2 control-label">Tip produs:<span class="required">
													* </span>
														</label>
														<div class="col-md-2">
														<select class="form-control select2me" name="dateCerereOferta_tipProdus" id="dateCerereOferta_tipProdus" onchange='updateFieldData("beneficii")'/>
															<option value="">Alege...</option>
															<?foreach ($produseData as $value){
																
																if ($value["idProduct"] == $cerereOfertaData["dateCerereOferta_tipProdus"]){
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
												<div class="form-group">
														<label class="col-md-2 control-label">Tip oferta:<span class="required">
													* </span>
														</label>
														<div class="col-md-2">
														<select class="form-control select2me" name="dateCerereOferta_tipOferta" id="dateCerereOferta_tipOferta" >
																<option value="">Alege...</option>
																<?
																showEditModuleSettings($CereriOferteSettingsData, 'tipOferta', $cerereOfertaData["dateCerereOferta_tipOferta"]);
																?>
														</select>
														</div>
												</div>
												<div class="form-group">
														<label class="col-md-2 control-label">Data inceput:<span class="required">
													* </span>
														</label>
														<div class="col-md-2">
															<input type="text" class="form-control" name="dateCerereOferta_dataInceput" id="dateCerereOferta_dataInceput" value="<? echo $cerereOfertaData["dateCerereOferta_dataInceput"];?>">
														</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab2">
											<div class="form-body">
												<div class="tab-pane active" id="tab2">
													<h3 class="block">Date client</h3>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Client: <span class="required">	* </span>
															</label>
															
															<div class="col-md-2">
																<select class="form-control select2me" name="dateClient_clientId" id="dateClient_clientId"/>
																<option value="">Client nou...</option>
																
																<? foreach ($clientiData as $value){
																	
																	if ($value["idClient"] == $cerereOfertaData["dateClient_clientId"])
																	{
																		echo "<option value='".$value["idClient"] . "' selected='selected'>".$value["dateClient_denumire"].$value["dateClient_nume"]." " . $value["dateClient_prenume"] . "</option>";
																	
																	}
																else
																{
																	echo "<option value='".$value["idClient"] . "'>".$value["dateClient_denumire"].$value["dateClient_nume"]." " . $value["dateClient_prenume"] . "</option>";
																	
																	
																	
																}
															
																	
																	
																	
																	
																	
																	} ?>
														
																		
															</select>														
															
															
															
															</div>
														</div>


													
														<div class="form-group">
															<label class="col-md-2 control-label">Nume/Denumire: <span class="required">
														* </span>
															</label>
															<div class="col-md-2">
																<input type="text" class="form-control" name="dateClient_numeDenumire" id="dateClient_numeDenumire" value="<? echo $cerereOfertaData["dateClient_numeDenumire"];?>">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-2 control-label">CNP/CUI: <span class="required">
														* </span>
															</label>
															<div class="col-md-2">
																<input type="text" class="form-control" name="dateClient_cnpCui" id="dateClient_cnpCui" value="<? echo $cerereOfertaData["dateClient_cnpCui"];?>">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-2 control-label">Telefon:
															</label>
															<div class="col-md-2">
																<input type="text" class="form-control" name="dateClient_telefon" id="dateClient_telefon" value="<? echo $cerereOfertaData["dateClient_telefon"];?>">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-2 control-label">Email:
															</label>
															<div class="col-md-2">
																<input type="text" class="form-control" name="dateClient_email" id="dateClient_email" value="<? echo $cerereOfertaData["dateClient_email"];?>">
															</div>
														</div>													
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab3">
											<div class="form-body">
												<div class="tab-pane active" id="tab3">
													<h3 class="block">Date contractant</h3>
														<div class="form-group">
															<label class="col-md-2 control-label">Date client(Acelasi cu clientul):<span class="required">
														* </span>
															</label>
															<div class="col-md-2">
															<select class="form-control" name="dateContractant_dateClient" id="dateContractant_dateClient" onChange="dateContractant()">
															<?
															$selectList = array("Da", "Nu");
															
															foreach ($selectList as $value)
																{
																	if($value == $cerereOfertaData["dateContractant_dateClient"])
																	{
																		echo '<option value="'.$value.'" selected="selected">'.$value. '</option>';
																		
																		
																	}
																	else
																		{
																			echo '<option value="'.$value.'">'.$value. '</option>';
														
																		}	
																}
															
															?>
															</select>
														</div>
															</div>
														<div class="form-group">
															<label class="col-md-2 control-label">Nume/Denumire: <span class="required">
														* </span>
															</label>
															<div class="col-md-2">
																<input type="text" class="form-control" name="dateContractant_numeDenumire" id="dateContractant_numeDenumire" value="<? echo $cerereOfertaData["dateContractant_numeDenumire"];?>">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-2 control-label">CNP/CUI: <span class="required">
														* </span>
															</label>
															<div class="col-md-2">
																<input type="text" class="form-control" name="dateContractant_cnpCui" id="dateContractant_cnpCui" value="<? echo $cerereOfertaData["dateContractant_cnpCui"];?>">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-2 control-label">Telefon: <span class="required">	* </span>
															</label>
															<div class="col-md-2">
																<input type="text" class="form-control" name="dateContractant_telefon" id="dateContractant_telefon" value="<? echo $cerereOfertaData["dateContractant_telefon"];?>">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-2 control-label">Email: <span class="required">	* </span>
															</label>
															<div class="col-md-2">
																<input type="text" class="form-control" name="dateContractant_email" id="dateContractant_email" value="<? echo $cerereOfertaData["dateContractant_email"];?>">
															</div>
														</div>												
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab4">
											<div class="form-body">
												<div class="tab-pane active" id="tab4">
													<h3 class="block">Detalii cerere</h3>
														<div class="form-group">
															<label class="col-md-2 control-label">Descriere cerere:
															</label>
															<div class="col-md-2">
																<input type="text" class="form-control" name="detaliiCerere_descriereCerere" id="detaliiCerere_descriereCerere" value="<? echo $cerereOfertaData["detaliiCerere_descriereCerere"];?>">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-2 control-label">Data inceput
															</label>
															<div class="col-md-2">
																<input type="text" class="form-control" name="detaliiCerere_dataInceput" id="detaliiCerere_dataInceput" value="<? echo $cerereOfertaData["detaliiCerere_dataInceput"];?>">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-2 control-label">Tip valabilitate:
															</label>
															<div class="col-md-2">
																<select class="form-control select2me" name="detaliiCerere_tipValabilitate" id="detaliiCerere_tipValabilitate" >
																	<option value="">Alege...</option>
																	<?
																	showEditModuleSettings($CereriOferteSettingsData, 'tipValabilitate', $cerereOfertaData["detaliiCerere_tipValabilitate"]);
																	?>
																</select>
														</div>
														</div>
														<div class="form-group">
															<label class="col-md-2 control-label">Valabilitate:
															</label>
															<div class="col-md-2">
																<input type="text" class="form-control" name="detaliiCerere_valabilitate" id="detaliiCerere_valabilitate" value="<? echo $cerereOfertaData["detaliiCerere_valabilitate"];?>">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-2 control-label">Mentiuni cerere:
															</label>
															<div class="col-md-2">
																<input type="text" class="form-control" name="detaliiCerere_mentiuniCerere" id="detaliiCerere_mentiuniCerere" value="<? echo $cerereOfertaData["detaliiCerere_mentiuniCerere"];?>">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-2 control-label">Serie cod voucher/car membru:
															</label>
															<div class="col-md-2">
																<input type="text" class="form-control" name="detaliiCerere_serieCodVoucher" id="detaliiCerere_serieCodVoucher" value="<? echo $cerereOfertaData["detaliiCerere_serieCodVoucher"];?>">
															</div>
														</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab5">
											<div class="form-body">
												<div class="tab-pane active" id="tab5">
													<h3 class="block">Administrare</h3>
														<div class="form-group">
															<label class="col-md-2 control-label">Status cerere oferta:
															</label>
															<div class="col-md-2">
																<select class="form-control select2me" name="administrare_statusCerereOferta" id="administrare_statusCerereOferta" >
																	<option value="">Alege...</option>
																	<?
																	showEditModuleSettings($CereriOferteSettingsData, 'statusCerere', $cerereOfertaData["administrare_statusCerereOferta"]);
																	?>
																</select>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-2 control-label">Program de beneficii:
															</label>
															<div class="col-md-2">
																<select class="form-control select2me" name="administrare_programBeneficii" id="administrare_programBeneficii">
																	<option value="">Alege...</option>
																	
																	<?foreach ($beneficiiData as $value){
																		
																		if ($value["programBeneficiiId"] == $cerereOfertaData["administrare_programBeneficii"]){
																			echo "<option value='".$value["programBeneficiiId"]."' selected='selected'>" . $value["dateProgramBeneficii_numeProgram"] . "</option>";
																			
																		}
																		else
																		{
																			echo "<option value='".$value["programBeneficiiId"]."'>" . $value["dateProgramBeneficii_numeProgram"] . "</option>";
																		}
																		
																		}
																		
																		
																		?>
																</select>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-2 control-label">Agent:
															</label>
															<div class="col-md-2">
																<select class="form-control select2me" name="administrare_agent" id="administrare_agent">
																	<option value="">Alege...</option>
																	<?foreach ($agentiData as $value){
																		
																		if ($value["agentId"] == $cerereOfertaData["administrare_agent"]){
																			echo "<option value='".$value["agentId"]."' selected='selected'>" . $value["dateAgent_numeDenumire"] . "</option>";
																			
																		}
																		else
																		{
																			echo "<option value='".$value["agentId"]."'>" . $value["dateAgent_numeDenumire"] . "</option>";
																		}
																		
																	}
																		
																		
																		?>
																</select>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-2 control-label">Angajat responsabil:
															</label>
															<div class="col-md-2">
																<select class="form-control select2me" name="administrare_angajatResponsabil" id="administrare_angajatResponsabil">
																	<option value="">Alege...</option>
																	
																	<?foreach ($angajatiData as $value){
																		
																		if ($value["angajatiId"] == $cerereOfertaData["administrare_angajatResponsabil"]){
																			echo "<option value='".$value["angajatiId"]."' selected='selected'>" . $value["dateAngajati_nume"] . "</option>";
																			
																		}
																		else
																		{
																			echo "<option value='".$value["angajatiId"]."'>" . $value["dateAngajati_nume"] . "</option>";
																		}
																		
																	}
																		
																		
																		?>
																</select>												
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-2 control-label">Observatii:
															</label>
															<div class="col-md-2">
																<input type="text" class="form-control" name="administrare_observatii" id="administrare_observatii" value="<? echo $cerereOfertaData["administrare_observatii"];?>">
															</div>
														</div>												
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab6">
											<div class="form-body">
												<div class="tab-pane active" id="tab6">
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