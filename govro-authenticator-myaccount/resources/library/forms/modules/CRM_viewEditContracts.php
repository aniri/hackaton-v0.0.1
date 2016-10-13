<?

checkSession();
include("../resources/library/modules/CRM_ofertas.php");
$Oferte = "Oferte";
$OferteData = $Oferte::CRM_loadAll();

include("../resources/library/modules/CRM_products.php");
$produse = "Produse";
$produseData = $produse::CRM_loadAll();

include("../resources/library/modules/CRM_asiguratorFurnizors.php");
$furnizori = "Asigurator";
$furnizoriData = $furnizori::CRM_loadAll();


include("../resources/library/modules/CRM_sucursaleFurnizors.php");
$sucursale = "Sucursale";
$sucursaleData = $sucursale::CRM_loadAll();

include("../resources/library/modules/CRM_brokers.php");
$brokeri = "Broker";
$brokeriData = $brokeri::CRM_loadAll();

include("../resources/library/modules/CRM_contracts.php");
$contracte = "Contract";
$contracteSettingsData = $contracte::CRM_loadSettings();

include("../resources/library/modules/CRM_products.php");
$produse = "Produse";
$produseSettingsData = $produse::CRM_loadSettings();

include("../resources/library/modules/CRM_programBeneficiis.php");
$beneficii = "Beneficii";
$beneficiiData = $beneficii::CRM_loadAll();

include("../resources/library/modules/CRM_agents.php");
$agenti = "Agenti";
$agentiData = $agenti::CRM_loadAll();

include("../resources/library/modules/CRM_angajatis.php");
$angajati = "Angajati";
$angajatiData = $angajati::CRM_loadAll();

include("../resources/library/modules/CRM_distribuitors.php");
$distribuitori = "Distribuitor";
$distribuitorData = $distribuitori::CRM_loadAll();

include("../resources/library/modules/CRM_contracts.php");
$contracte = "Contract";
$contracteSettingsData = $contracte::CRM_loadSettings();
?>

<div class="row">
				<div class="col-md-12">
					<form class="form-horizontal form-row-seperated" action="#" method="POST" enctype="multipart/form-data">
						<div class="portlet">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-shopping-cart"></i><? echo " Numar Contract" . " - " . $contractData["dateContract_numarContract"]; //EDIT?>
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
											Date contract </a>
										</li>
										<li> 
											<a href="#tab2" data-toggle="tab">
											Date client </a>
										</li>
										<li>
											<a href="#tab3" data-toggle="tab">
											Administrare </a>
										</li>
										<li>
											<a href="#tab4" data-toggle="tab">
											Date plata </a>
										</li>
										<li>
											<a href="#tab5" data-toggle="tab">
											Atasare documente </a>
										</li>
									</ul>
									<div class="tab-content no-space">
										<div class="tab-pane active" id="tab1">
										<h3 class="block">Date contract</h3>
											<div class="form-body">
												<div class="form-group">
														<label class="col-md-2 control-label">Id oferta: <span class="required">	* </span></label>
														<div class="col-md-2">
															<select class="form-control select2me" name="dateContract_idOferta" id="dateContract_idOferta">
																<option value="">Alege...</option>
																<?foreach ($OferteData as $value)
																	{
																	if ($value["idOferta"] == $contractData["dateContract_idOferta"])
																	{
																		echo "<option value='".$value["idOferta"]."' selected='selected'>" . $value["idOferta"] . "</option>";
																	}
																	else
																	{
																		echo "<option value='".$value["idOferta"]."'>" . $value["idOferta"] . "</option>";
																	}															
																}
																?>
															</select>															
														</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">Serie contract: <span class="required"> * </span> 
													</label>
													<div class="col-md-2">
															<input type="text" class="form-control" name="dateContract_serieContract" id="dateContract_serieContract" value="<? echo $contractData["dateContract_serieContract"];?>"></input>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">Numar contract: <span class="required"> * </span> 
													</label>
													<div class="col-md-2">
															<input type="text" class="form-control" name="dateContract_numarContract" id="dateContract_numarContract" value="<? echo $contractData["dateContract_numarContract"];?>"></input>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">Data emitere: <span class="required"> * </span> 
													</label>
													<div class="col-md-2">
															<input type="text" class="form-control" name="dateContract_dataEmitere" id="dateContract_dataEmitere" value="<? echo $contractData["dateContract_dataEmitere"];?>" readonly="true"></input>
													</div>
												</div>
												<div class="form-group">
														<label class="col-md-2 control-label">Tip produs:</label>
														<div class="col-md-2">
															<select class="form-control select2me" name="dateContract_tipProdus" id="dateContract_tipProdus" readonly="true">
																<option value="">Alege...</option>
																<?foreach ($produseData as $value)
																	{
																	if ($value["idProduct"] == $contractData["dateContract_tipProdus"])
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
												<div class="form-group">
														<label class="col-md-2 control-label">Asigurator furnizor:</label>
														<div class="col-md-2">
															<select class="form-control select2me" name="dateContract_asiguratorFurnizor" id="dateContract_asiguratorFurnizor" readonly="true">
																<option value="">Alege...</option>
																<?foreach ($furnizoriData as $value)
																	{
																	if ($value["asiguratorFurnizorId"] == $contractData["dateContract_asiguratorFurnizor"])
																	{
																		echo "<option value='".$value["asiguratorFurnizorId"]."' selected='selected'>" . $value["dateAsiguratorFurnizor_denumire"] . "</option>";
																	}
																	else
																	{
																		echo "<option value='".$value["asiguratorFurnizorId"]."'>" . $value["dateAsiguratorFurnizor_denumire"] . "</option>";
																	}															
																}
																?>
															</select>															
														</div>
												</div>
												<div class="form-group">
														<label class="col-md-2 control-label">Produs:</label>
														<div class="col-md-2">
															<select class="form-control select2me" name="dateContract_produs" id="dateContract_produs">
																<option value="">Alege...</option>
																<?foreach ($produseData as $value)
																	{
																	if ($value["idProduct"] == $contractData["dateContract_produs"])
																	{
																		echo "<option value='".$value["idProduct"]."' selected='selected'>" . $value["dateProdus_denumire"] . "</option>";
																	}
																	else
																	{
																		echo "<option value='".$value["idProduct"]."'>" . $value["dateProdus_denumire"] . "</option>";
																	}															
																}
																?>
															</select>															
														</div>
												</div>
												<div class="form-group">
														<label class="col-md-2 control-label">Sucursala: <span class="required">	* </span></label>
														<div class="col-md-2">
															<select class="form-control select2me" name="dateContract_sucursala" id="dateContract_sucursala">
																<option value="">Alege...</option>
																<?foreach ($sucursaleData as $value)
																	{
																	if ($value["sucursaleFurnizorId"] == $contractData["dateContract_sucursala"])
																	{
																		echo "<option value='".$value["sucursaleFurnizorId"]."' selected='selected'>" . $value["dateSucursaleFurnizor_denumire"] . "</option>";
																	}
																	else
																	{
																		echo "<option value='".$value["sucursaleFurnizorId"]."'>" . $value["dateSucursaleFurnizor_denumire"] . "</option>";
																	}															
																}
																?>
															</select>															
														</div>
												</div>
												<div class="form-group">
														<label class="col-md-2 control-label">Broker:</label>
														<div class="col-md-2">
															<select class="form-control select2me" name="dateContract_broker" id="dateContract_broker">
																<option value="">Alege...</option>
																<?foreach ($brokeriData as $value)
																	{
																	if ($value["brokerId"] == $contractData["dateContract_broker"])
																	{
																		echo "<option value='".$value["brokerId"]."' selected='selected'>" . $value["dateBroker_denumire"] . "</option>";
																	}
																	else
																	{
																		echo "<option value='".$value["brokerId"]."'>" . $value["dateBroker_denumire"] . "</option>";
																	}															
																}
																?>
															</select>															
														</div>
												</div>
											</div>
										</div>	
										<div class="tab-pane" id="tab2">
											<div class="form-body">
												<div class="tab-pane active" id="tab2">
													<h3 class="block">Date client</h3>
													<div class="form-group">
														<label class="col-md-2 control-label">Nume/Denumire: 
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="dateClient_numeDenumire" id="dateClient_numeDenumire" value="<? echo $contractData["dateClient_numeDenumire"];?>" readonly="true"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">CNP/CUI:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="dateClient_cnpCui" id="dateClient_cnpCui" value="<? echo $contractData["dateClient_cnpCui"];?>" readonly="true"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Telefon:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="dateClient_telefon" id="dateClient_telefon" value="<? echo $contractData["dateClient_telefon"];?>" readonly="true"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Email:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="dateClient_email" id="dateClient_email" value="<? echo $contractData["dateClient_email"];?>" readonly="true"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Nume/Denumire Contract:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="dateClient_numeDenumireContractant" id="dateClient_numeDenumireContractant" value="<? echo $contractData["dateCliet_numeDenumireContractant"];?>" readonly="true"></input>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab3">
											<div class="from-body">
												<div class="tab-pane active" id="tab3">
												<h3 class="block">Administrare</h3>
													<div class="form-group">
														<label class="col-md-2 control-label">Program de beneficii:</label>
															<div class="col-md-2">
																<select class="form-control" name="administrare_programDeBeneficii" id="administrare_programDeBeneficii" readonly="true">
																	<?foreach ($beneficiiData as $value)
																		{
																		if ($value["programBeneficiiId"] == $contractData["administrare_programDeBeneficii"])
																		{
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
														<label class="col-md-2 control-label">Agent:</label>
															<div class="col-md-2">
																<select class="form-control" name="administrare_agent" id="administrare_agent" readonly="true">
																	<?foreach ($agentiData as $value)
																		{
																		if ($value["agentId"] == $contractData["administrare_agent"])
																		{
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
														<label class="col-md-2 control-label">Distribuitor:</label>
															<div class="col-md-2">
																<select class="form-control" name="administrare_distribuitor" id="administrare_distribuitor" readonly="true">
																	<?foreach ($distribuitorData as $value)
																		{
																		if ($value["distribuitorId"] == $contractData["administrare_distribuitor"])
																		{
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
														<label class="col-md-2 control-label">Angajat </label>
															<div class="col-md-2">
																<select class="form-control" name="administrare_angajat" id="administrare_angajat" readonly="true">
																	<?foreach ($angajatiData as $value){
																		
																		if ($value["angajatiId"] == $cerereOfertaData["administrare_angajat"]){
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
														<label class="col-md-2 control-label">Status contract:</label>
															<div class="col-md-2">
																<select class="form-control" name="administrare_statusContract" id="administrare_statusContract">
																	<option value="">Alege..</option>
																	<?
																	showEditModuleSettings($contracteSettingsData, 'statusContract', $contractData["administrare_statusContract"]);
																	?>
																</select>															
															</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Tip comision:</label>
														<div class="col-md-2">
															<select class="form-control" name="administrare_tipComision" id="administrare_tipComision" readonly="true">
																<?foreach ($produseData as $value)
																	{
																	if ($value["dateProdus_tipComision"] == $contractData["administrare_tipComision"])
																	{
																		echo "<option value='".$value["dateProdus_tipComision"]."' selected='selected'>" . $value["dateProdus_tipComision"] . "</option>";
																	}
																	else
																	{
																		echo "<option value='".$value["dateProdus_tipComision"]."'>" . $value["dateProdus_tipComision"] . "</option>";
																	}															
																}
																?>
															</select>															
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Valoare comision:</label>
														<div class="col-md-2">
															<select class="form-control" name="administrare_valoareComision" id="administrare_valoareComision" readonly="true">
																<?foreach ($produseData as $value)
																	{
																	if ($value["dateProdus_valoareComision"] == $contractData["administrare_valoareComision"])
																	{
																		echo "<option value='".$value["dateProdus_valoareComision"]."' selected='selected'>" . $value["dateProdus_valoareComision"] . "</option>";
																	}
																	else
																	{
																		echo "<option value='".$value["dateProdus_valoareComision"]."'>" . $value["dateProdus_valoareComision"] . "</option>";
																	}															
																}
																?>
															</select>															
														</div>
													</div>
													<div class="form-group">
													<label class="col-md-2 control-label"> Tip comision negociat
													</label>
														<div class="col-md-2">
															<select class="form-control" name="administrare_tipComisionNegociat" id="administrare_tipComisionNegociat">
																<option value="">Alege..</option>
																<?
																showEditModuleSettings($contracteSettingsData, 'tipComisionNegociat', $contractData["administrare_tipComisionNegociat"]);
																?>											
															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Valoare comision negociat:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="administrare_valoareComisionNegociat" id="administrare_valoareComisionNegociat" value="<? echo $contractData["administrare_valoareComisionNegociat"];?>"/></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Comision contract(Ron):
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="administrare_comisionContract" id="administrare_comisionContract" value="<? echo $contractData["administrare_comisionContract"];?>"></input>
														</div>
													</div>
												</div>	
											</div>
										</div>
										<div class="tab-pane" id="tab4">
											<div class="from-body">
												<div class="tab-pane active" id="tab4">
												<h3 class="block">Data plata</h3>
													<div class="form-group">
														<label class="col-md-2 control-label">Tip valabilitate: <span class="required">	* </span></label>
														<div class="col-md-2">
															<select class="form-control" name="dataPlata_tipValabilitate" id="dataPlata_tipValabilitate" readonly="true">
																<?foreach ($OferteData as $value)
																	{
																	if ($value["oferta_tipValabilitate"] == $contractData["dataPlata_tipValabilitate"])
																	{
																		echo "<option value='".$value["oferta_tipValabilitate"]."' selected='selected'>" . $value["oferta_tipValabilitate"] . "</option>";
																	}
																	else
																	{
																		echo "<option value='".$value["oferta_tipValabilitate"]."'>" . $value["oferta_tipValabilitate"] . "</option>";
																	}															
																}
																?>
															</select>															
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Valabilitate:<span class="required">	* </span>
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="dataPlata_valabilitate" id="dataPlata_valabilitate" value="<? echo $contractData["dataPlata_valabilitate"];?>" readonly="true"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Data inceput:<span class="required">	* </span>
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="dataPlata_dataInceput" id="dataPlata_dataInceput" value="<? echo $contractData["dataPlata_dataInceput"];?>" readonly="true"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Data sfarsit:<span class="required">	* </span>
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="dataPlata_dataSfarsit" id="dataPlata_dataSfarsit" value="<? echo $contractData["dataPlata_dataSfarsit"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Descriere obiect asigurat:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="dataPlata_descriereObiectAsigurat" id="dataPlata_descriereObiectAsigurat" value="<? echo $contractData["dataPlata_descriereObiectAsigurat"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Valuta contract:<span class="required">	* </span></label>
															<div class="col-md-2">
																<select class="form-control" name="dataPlata_valutaContract" id="dataPlata_valutaContract" readonly="true">
																	<?
																	showEditModuleSettings($contracteSettingsData, 'currency', $contractData["dataPlata_valutaContract"]);
																	?>
																</select>															
															</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label"> Pret contract: <span class="required">	* </span>
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="dataPlata_pretContract" id="dataPlata_pretContract" value="<? echo $contractData["dataPlata_pretContract"];?>" readonly="true"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label"> Pret final: 
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="dataPlata_pretFinal" id="dataPlata_pretFinal" value="<? echo $contractData["dataPlata_pretFinal"];?>" readonly="true"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label"> Reducere WS:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="dataPlata_pretFinal" id="dataPlata_pretFinal" value="<? echo $contractData["dataPlata_pretFinal"];?>" readonly="true"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Tip plata: 
														</label> 
															<div class="col-md-2">
																<select class="form-control" name="dataPlata_tipPlata" id="dataPlata_tipPlata" readonly="true">
																	<?
																	showEditModuleSettings($contracteSettingsData, 'paymentType', $contractData["dataPlata_tipPlata"]);
																	?>
																</select>															
															</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label"> Numar rate: 
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="dataPlata_nrRate" id="dataPlata_nrRate" value="<? echo $contractData["dataPlata_nrRate"];?>" readonly="true"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label"> Valoare R1:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="dataPlata_valoareR1" id="dataPlata_valoareR1" value="<? echo $contractData["dataPlata_valoareR1"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label"> Valoare reducere R1
													</label>:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="dataPlata_valoareReducereR1" id="dataPlata_valoareReducereR1" value="<? echo $contractData["dataPlata_valoareReducereR1"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label"> Valoare finala R1:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="dataPlata_valoareFinalaR1" id="dataPlata_valoareFinalaR1" value="<? echo $contractData["dataPlata_valoareFinalaR1"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label"> Scadenta R1:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="dataPlata_scadentaR1" id="dataPlata_scadentaR1" value="<? echo $contractData["dataPlata_scadentaR1"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label"> Data plata:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="dataPlata_dataDePlata" id="dataPlata_dataDePlata" value="<? echo $contractData["dataPlata_dataDePlata"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label"> Tip plata R1:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="dataPlata_tipPlataR1" id="dataPlata_tipPlataR1" value="<? echo $contractData["dataPlata_tipPlataR1"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label"> Valoare plata R1(RON)
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="dataPlata_valoarePlataR1" id="dataPlata_valoarePlataR1" value="<? echo $contractData["dataPlata_valoarePlataR1"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label"> Observatii R1:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="dataPlata_observatiiR1" id="dataPlata_observatiiR1" value="<? echo $contractData["dataPlata_observatiiR1"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label"> Mentiuni contract:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="dataPlata_mentiuniContract" id="dataPlata_mentiuniContract" value="<? echo $contractData["dataPlata_mentiuniContract"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label"> Observatii contract:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="dataPlata_observatiiContract" id="dataPlata_observatiiContract" value="<? echo $contractData["dataPlata_observatiiContract"];?>"></input>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab5">
											<div class="from-body">
												<div class="tab-pane active" id="tab5">
												<h3 class="block">Atasare documente</h3>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<input type="hidden" name="viewEditProduct" value="submited">
					</form>
				</div>
			</div>