<?

checkSession();

$ofertaData = $oferte::CRM_load($_GET["id"]);
$ofertaSettingsData = $oferte::CRM_loadSettings();

include("../resources/library/modules/CRM_cerereOfertas.php");
$cerereOferta = "CerereOferta";
$cerereOfertaData = $cerereOferta::CRM_loadAll();

include("../resources/library/modules/CRM_products.php");
$produse = "Produse";
$produseData = $produse::CRM_loadAll();

include("../resources/library/modules/CRM_programBeneficiis.php");
$programBeneficii = "Beneficii";
$programBeneficiiData = $programBeneficii::CRM_loadAll();

include("../resources/library/modules/CRM_agents.php");
$agenti = "Agenti";
$agentiData = $agenti::CRM_loadAll();

include("../resources/library/modules/CRM_angajatis.php");
$angajati = "Angajati";
$angajatiData = $angajati::CRM_loadAll();

include("../resources/library/modules/CRM_asiguratorFurnizors.php");
$furnizor = "Asigurator";
$furnizorData = $furnizor::CRM_loadAll();

?>

<div class="row">
				<div class="col-md-12">
					<form class="form-horizontal form-row-seperated" action="#" id="CRM_editOfertaPOST" method="POST" enctype="multipart/form-data">
						<div class="portlet">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-shopping-cart"></i>Id oferta - <? echo $ofertaData["ofertaId"];?>
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
											Date oferta </a>
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
											Oferta </a>
										</li>
										<li>
											<a href="#tab5" data-toggle="tab">
											Decizie oferta </a>
										</li>
										<li>
											<a href="#tab6" data-toggle="tab">
											Atasare documente </a>
										</li>
									</ul>
									<div class="tab-content no-space">
										<div class="tab-pane active" id="tab1">
										<h3 class="block">Date oferta</h3>
											<div class="form-body">
												<div class="form-group">
													<label class="col-md-2 control-label">Id cerere oferta: <span class="required">
													* </span>
													</label>
													<div class="col-md-2">
														<select class="form-control select2me" name="dateOferta_idCerereOferta" id="dateOferta_idCerereOferta"/>
															<option value="">Alege...</option>
															<?foreach ($cerereOfertaData as $value){
																
																if ($value["cerereOfertaId"] == $ofertaData["dateOferta_idCerereOferta"]){
																	echo "<option value='".$value["cerereOfertaId"]."' selected='selected'>" . $value["cerereOfertaId"] . "</option>";
																	
																}
																else
																{
																	echo "<option value='".$value["cerereOfertaId"]."'>" . $value["cerereOfertaId"] . "</option>";
																}
																
																}
																
																
																?>
														</select>
													</div>
												</div>
												<div class="form-group">
														<label class="col-md-2 control-label">Data cerere oferta:<span class="required">
													* </span>
														</label>
														<div class="col-md-2">
															<input type="text" class="form-control" name="dateOferta_dataCerereOferta" id="dateOferta_dataCerereOferta" value="<? echo $ofertaData["dateOferta_dataCerereOferta"];?>">
														</div>
												</div>
												<div class="form-group">
														<label class="col-md-2 control-label">Data transmitere oferta:<span class="required">
													* </span>
														</label>
														<div class="col-md-2">
															<input type="text" class="form-control" name="dateOferta_dataTransmitereOferta" id="dateOferta_dataTransmitereOferta" value="<? echo $ofertaData["dateOferta_dataTransmitereOferta"];?>">
														</div>
												</div>
												<div class="form-group">
														<label class="col-md-2 control-label">Tip produs<span class="required">
													* </span>
														</label>
														<div class="col-md-2">
														<select class="form-control select2me" name="dateOferta_tipProdus" id="dateOferta_tipProdus"/>
															<option value="">Alege...</option>
															<?foreach ($produseData as $value){
																
																if ($value["idProduct"] == $ofertaData["dateOferta_tipProdus"]){
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
										</div>
										<div class="tab-pane" id="tab2">
											<div class="form-body">
												<div class="tab-pane active" id="tab2">
													<h3 class="block">Date client</h3>
														<div class="form-group">
															<label class="col-md-2 control-label">Nume/Denumire:
													
															</label>
															<div class="col-md-2">
																<input type="text" class="form-control" name="dateClient_numeDenumire" id="dateClient_numeDenumire" value="<? echo $ofertaData["dateClient_numeDenumire"];?>">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-2 control-label">CNP/CUI:
													
															</label>
															<div class="col-md-2">
																<input type="text" class="form-control" name="dateClient_cnpCui" id="dateClient_cnpCui" value="<? echo $ofertaData["dateClient_cnpCui"];?>">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-2 control-label">Telefon:
															</label>
															<div class="col-md-2">
																<input type="text" class="form-control" name="dateClient_telefon" id="dateClient_telefon" value="<? echo $ofertaData["dateClient_telefon"];?>">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-2 control-label">Email:
															</label>
															<div class="col-md-2">
																<input type="text" class="form-control" name="dateClient_email" id="dateClient_email" value="<? echo $ofertaData["dateClient_email"];?>">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-2 control-label">Nume/Denumire Contractant:
															</label>
															<div class="col-md-2">
																<input type="text" class="form-control" name="dateClient_numeDenumireContractant" id="dateClient_numeDenumireContractant" value="<? echo $ofertaData["dateClient_numeDenumireContractant"];?>">
															</div>
														</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab3">
											<div class="form-body">
												<div class="tab-pane active" id="tab3">
													<h3 class="block">Administrare</h3>
														<div class="form-group">
															<label class="col-md-2 control-label">Program de beneficii:
															</label>
															<div class="col-md-2">
																<select class="form-control select2me" name="administrare_programDeBeneficii" id="administrare_programDeBeneficii"/>
																	<option value="">Alege...</option>
																	<?foreach ($programBeneficiiData as $value){
																		
																		if ($value["programBeneficiiId"] == $ofertaData["administrare_programDeBeneficii"]){
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
																<select class="form-control select2me" name="administrare_agent" id="administrare_agent"/>
																	<option value="">Alege...</option>
																	<?foreach ($agentiData as $value){
																		
																		if ($value["agentId"] == $ofertaData["administrare_agent"]){
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
															<label class="col-md-2 control-label">Angajat:
															</label>
															<div class="col-md-2">
																<select class="form-control select2me" name="administrare_angajat" id="administrare_angajat"/>
																	<option value="">Alege...</option>
																	<?foreach ($angajatiData as $value){
																		
																		if ($value["angajatiId"] == $ofertaData["administrare_angajat"]){
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
															<label class="col-md-2 control-label">Status oferta:
															</label>
															<div class="col-md-2">
																<select class="form-control select2me" name="administrare_statusOferta" id="administrare_statusOferta" >
																	<option value="">Alege...</option>
																	<?
																	showEditModuleSettings($ofertaSettingsData, 'offerStatus', $ofertaData["administrare_statusOferta"]);
																	?>
																</select>
															</div>
														</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab4">
											<div class="form-body">
												<div class="tab-pane active" id="tab4">
													<h3 class="block">Oferta</h3>
														<div class="form-group">
															<label class="col-md-2 control-label">Descriere oferta:
															</label>
															<div class="col-md-2">
																<input type="text" class="form-control" name="oferta_descriereOferta" id="oferta_descriereOferta" value="<? echo $ofertaData["oferta_descriereOferta"];?>">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-2 control-label">Valuta:
															</label>
															<div class="col-md-2">
																<select class="form-control select2me" name="oferta_valuta" id="oferta_valuta" >
																	<option value="">Alege...</option>
																	<?
																	showEditModuleSettings($ofertaSettingsData, 'currency', $ofertaData["oferta_valuta"]);
																	?>
																</select>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-2 control-label">Data inceput:
															</label>
															<div class="col-md-2">
																<input type="text" class="form-control" name="oferta_dataInceput" id="oferta_dataInceput" value="<? echo $ofertaData["oferta_dataInceput"];?>">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-2 control-label">Tip valabilitate:
															</label>
															<div class="col-md-2">
																<select class="form-control select2me" name="oferta_tipValabilitate" id="oferta_tipValabilitate" >
																	<option value="">Alege...</option>
																	<?
																	showEditModuleSettings($ofertaSettingsData, 'validityType', $ofertaData["oferta_tipValabilitate"]);
																	?>
																</select>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-2 control-label">Valabilitate:
															</label>
															<div class="col-md-2">
																<input type="text" class="form-control" name="oferta_valabilitate" id="oferta_valabilitate" value="<? echo $ofertaData["oferta_valabilitate"];?>">
															</div>
														</div>
														
														<?
														$j = 1;
															for ($i = 1; $i <= 10; $i++) {
														
																if ($ofertaData["oferta_asiguratorFurnizorV" . (String)$i] != null || $ofertaData["oferta_valoareV" . (String)$i] != null || $ofertaData["oferta_descriereOfertaV" . (String)$i] != null)
																{
																	echo ('<div class="form-group">
															<label class="col-md-2 control-label">Asigurator Furnizor V'.(String)$i.':
															</label>
															<div class="col-md-2">
																<select class="form-control select2me" name="oferta_asiguratorFurnizorV'.(String)$i.'" id="oferta_asiguratorFurnizorV'.(String)$i.'"/>
																	<option value="">Alege...</option>');
																	foreach ($furnizorData as $value){
																		
																		if ($value["asiguratorFurnizorId"] == $ofertaData["oferta_asiguratorFurnizorV" . (String)$i]){
																			echo "<option value='".$value["asiguratorFurnizorId"]."' selected='selected'>" . $value["dateAsiguratorFurnizor_denumire"] . "</option>";
																			
																		}
																		else
																		{
																			echo "<option value='".$value["asiguratorFurnizorId"]."'>" . $value["dateAsiguratorFurnizor_denumire"] . "</option>";
																		}
																		
																		}
																	
																
														
															
																echo '</select>	</div> </div>';
																echo '<div class="form-group">
															<label class="col-md-2 control-label">Valoare V'.(String)$i.':
															</label>
															<div class="col-md-2">
																<input type="text" class="form-control" name="oferta_valoareV'.(String)$i.'" id="oferta_valoareV'.(String)$i.'" value="' . $ofertaData["oferta_valoareV". (String)$i].'">
															</div>
														</div>';
															echo '<div class="form-group">
															<label class="col-md-2 control-label">Descriere oferta V'.(String)$i.':
															</label>
															<div class="col-md-2">
																<input type="text" class="form-control" name="oferta_descriereOfertaV'.(String)$i.'" id="oferta_descriereOfertaV'.(String)$i.'" value="' . $ofertaData["oferta_descriereOfertaV" . (String)$i].'">
															</div>
														</div>';
															$variante[$j] = $i;
															$j++;
															
															}
															
															}
														
														
														?>
														
														
														
														
														
														<div class="form-group">
															<label class="col-md-2 control-label">Prima medie oferta(Ron):
															</label>
															<div class="col-md-2">
																<input type="text" class="form-control" name="oferta_primaMedieOferta" id="oferta_primaMedieOferta" value="<? echo $ofertaData["oferta_primaMedieOferta"];?>">
															</div>
														</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab5">
											<div class="form-body">
												<div class="tab-pane active" id="tab5">
													<h3 class="block">Decizie Oferta</h3>
														<div class="form-group">
															<label class="col-md-2 control-label">Decizie oferta:
															</label>
															<div class="col-md-2">
																<select class="form-control select2me" name="decizieOferta_decizieOferta" id="decizieOferta_decizieOferta" >
																	<option value="">Alege...</option>
																	<?
																	showEditModuleSettings($ofertaSettingsData, 'decisionOffer', $ofertaData["decizieOferta_decizieOferta"]);
																	?>
																</select>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-2 control-label">Prima medie oferta(Ron):
															</label>
															<div class="col-md-2">
																<input type="text" class="form-control" name="decizieOferta_dataDecizie" id="decizieOferta_dataDecizie" value="<? echo $ofertaData["decizieOferta_dataDecizie"];?>">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-2 control-label">Varianta aleasa:
															</label>
															<div class="col-md-2">
																<select class="form-control select2me" name="decizieOferta_variantaAleasa" id="decizieOferta_variantaAleasa" onchange="incarcaVarianta()">
																	<option value="">Alege...</option>
																	<?
																	foreach ($variante as $name => $value)
																	{
																		if (("V" . (string)$value) == $ofertaData["decizieOferta_variantaAleasa"])
																		{
																			echo '<option value="V'.$value.'" selected="selected">V'.$value.'</option>';
																		}
																		else
																		{
																			echo '<option value="V'.$value.'">V'.$value.'</option>';
																			
																		}
																	}
																	
																	?>
																</select>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-2 control-label"> Asigurator ales:
															</label>
															<div class="col-md-2">
																<select class="form-control" name="decizieOferta_asiguratorAles" id="decizieOferta_asiguratorAles" readonly="true" >
																	<?foreach ($furnizorData as $value){
																		
																		if ($value["asiguratorFurnizorId"] == $ofertaData["decizieOferta_asiguratorAles"]){
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
															<label class="col-md-2 control-label"> Valuta acceptata:
															</label>
															<div class="col-md-2">
															<select class="form-control" name="decizieOferta_valutaAcceptata" id="decizieOferta_valutaAcceptata" readonly="true">
																	<?
																	showEditModuleSettings($ofertaSettingsData, 'currency', $ofertaData["valutaAcceptata"]);
																	?>
																</select>
																
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-2 control-label"> Pretul acceptat:
															</label>
															<div class="col-md-2">
															<input type="text" class="form-control" name="decizieOferta_pretulAcceptat" id="decizieOferta_pretulAcceptat"  readonly="true" value="<? echo $ofertaData["decizieOferta_pretulAcceptat"];?>">
															</div>
														</div>	
														<div class="form-group">
															<label class="col-md-2 control-label"> Reducere WS:
															</label>
															<div class="col-md-2">
															<input type="text" class="form-control" name="decizieOferta_reducereWS" id="decizieOferta_reducereWS"  readonly="true" value="<? echo $ofertaData["decizieOferta_reducereWS"];?>">
															</div>
														</div>	
														<div class="form-group">
															<label class="col-md-2 control-label"> Pretul final:
															</label>
															<div class="col-md-2">
															<input type="text" class="form-control" name="decizieOferta_pretFinal" id="decizieOferta_pretFinal"  readonly="true" value="<? echo $ofertaData["decizieOferta_pretFinal"];?>">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-2 control-label">Tip plata:
															</label>
															<div class="col-md-2">
																<select class="form-control select2me" name="decizieOferta_tipPlata" id="decizieOferta_tipPlata" >
																	<option value="">Alege...</option>
																	<?
																	showEditModuleSettings($ofertaSettingsData, 'paymentType', $ofertaData["decizieOferta_tipPlata"]);
																	?>
																</select>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-2 control-label">Nr. rate:
															</label>
															<div class="col-md-2">
																<select class="form-control select2me" name="decizieOferta_nrRate" id="decizieOferta_nrRate" >
																	<option value="">Alege...</option>
																	<?
																	showEditModuleSettings($ofertaSettingsData, 'nrRate', $ofertaData["decizieOferta_nrRate"]);
																	?>
																</select>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-2 control-label">Refuz oferta:
															</label>
															<div class="col-md-2">
																<select class="form-control select2me" name="decizieOferta_refuzOferta" id="decizieOferta_refuzOferta" >
																	<option value="">Alege...</option>
																	<?
																	showEditModuleSettings($ofertaSettingsData, 'offerRejection', $ofertaData["decizieOferta_refuzOferta"]);
																	?>
																</select>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-2 control-label"> Detalii refuz:
															</label>
															<div class="col-md-2">
															<input type="text" class="form-control" name="decizieOferta_detaliiRefuz" id="decizieOferta_detaliiRefuz" value="<? echo $ofertaData["decizieOferta_detaliiRefuz"];?>">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-2 control-label">Observatii oferta:
															</label>
															<div class="col-md-2">
															<input type="text" class="form-control" name="decizieOferta_observatiiOferta" id="decizieOferta_observatiiOferta" value="<? echo $ofertaData["decizieOferta_observatiiOferta"];?>">
															</div>
														</div>						
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab6">
											<div class="form-body">
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
						<input type="hidden" name="dateOferta_tipCerereOferta" id="dateOferta_tipCerereOferta" value="<? echo $ofertaData["dateOferta_tipCerereOferta"];?>">
						<input type="hidden" name="dateClient_idClientExistent" id="dateClient_idClientExistent" value="<? echo $ofertaData["dateClient_idClientExistent"];?>">
						<input type="hidden" name="viewEdit" value="submited">
					</form>
				</div>
			</div>