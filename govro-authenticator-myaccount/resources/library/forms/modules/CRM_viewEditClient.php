<?

checkSession();

include("../resources/library/modules/CRM_programBeneficiis.php");
$beneficii = 'Beneficii';


include("../resources/library/modules/CRM_agents.php");
$agenti = "Agenti";


include("../resources/library/modules/CRM_recomandators.php");
$recomandatori = "Recomandatori";


$beneficiiData = $beneficii::CRM_load($clientData["administrare_programBeneficii"]);
$agentiData = $agenti::CRM_load($clientData["administrare_agentId"]);
$recomandatoriData = $recomandatori::CRM_load($clientData["administrare_recomandator"]);	

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
					<form class="form-horizontal form-row-seperated" action="#"  id="CRM_editClientPOST" method="POST" enctype="multipart/form-data">
						<div class="portlet">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-shopping-cart"></i><? echo $clientData["dateClient_denumire"] . $clientData["dateClient_nume"] . " " . $clientData["dateClient_prenume"] . " - " . $clientData["idClient"];?>
								</div>
								<div class="actions btn-set">
									<button type="button" name="back" class="btn default" onclick="goBack()"><i class="fa fa-angle-left"></i> Inapoi</button>
									<button type="button" name="refresh" class="btn default" onclick="refresh()"><i class="fa fa-reply"></i> Reincarca</button>
									<button  type="submit" class="btn green" ><i class="fa fa-check"></i> Salveaza</button>
								</div>
							</div>
							<div class="portlet-body">
								<div class="tabbable">
									<ul class="nav nav-tabs">
										<li class="active">
											<a href="#tab1" data-toggle="tab">
											Date client </a>
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
											Adresa corespondenta </a>
										</li>
										<li>
											<a href="#tab6" data-toggle="tab">
											Administrare </a>
										</li>
										<li>
											<a href="#tab7" data-toggle="tab">
											Alte detalii </a>
										</li>
										<li>
											<a href="#tab8" data-toggle="tab">
											Atasare documente </a>
										</li>
										<li>
											<a href="#tab9" data-toggle="tab">
											Portofoliu </a>
										</li>
										
									</ul>
									<div class="tab-content no-space">
										<div class="tab-pane active" id="tab1">
										<h3 class="block">Date client</h3>
											<div class="form-body">
												<div class="form-group">
													<label class="col-md-2 control-label">Id:
													</label>
													<div class="col-md-2">
													<label class="col-md-2 control-label"><? echo $clientData["idClient"];?>
													</label>	
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">Tip client <span class="required"> * </span>
													</label>
													<div class="col-md-2">
														<select class="form-control" name="dateClient_tipClient" id="dateClient_tipClient" onchange="CRM_clientTypeChange()">
														<?
														showEditModuleSettings($clientiSettingsData, 'clientType', $clientData["dateClient_tipClient"]);
														?>
														</select>
													</div>
												</div>
												<div id="dateClientPFCT">
												<div class="form-group">
															
																	<label class="col-md-2 control-label">Nume: <span class="required"> * </span></label>
																	<div class="col-md-2">
																		<input type="text" class="form-control" name="dateClient_nume" id="dateClient_nume" value="<? echo $clientData["dateClient_nume"];?>">
																	</div>
																	</div>
																	<div class="form-group">
																	<label class="col-md-2 control-label">Prenume: <span class="required"> * </span></label>
																	<div class="col-md-2">
																		<input type="text" class="form-control" name="dateClient_prenume" id="dateClient_prenume" value="<? echo $clientData["dateClient_prenume"];?>">
																	</div>
																	</div>
																	<div class="form-group">
																	<label class="col-md-2 control-label">CNP:
																	</label>
																	<div class="col-md-2">
																		<input type="text" class="form-control" name="dateClient_cnp" id="dateClient_cnp" value="<? echo $clientData["dateClient_cnp"];?>">
																	</label>
																</div>
																</div>
																</div>
																
															<div id="dateClientPJCT"><div class="form-group">
																	<label class="col-md-2 control-label">Denumire: <span class="required"> * </span></label>
																	<div class="col-md-2">
																		<input type="text" class="form-control" name="dateClient_denumire" id="dateClient_denumire" value="<? echo $clientData["dateClient_denumire"];?>">
																	</div>
																</div>
																<div class="form-group">
																<label class="col-md-2 control-label">CUI:
																</label>
																<div class="col-md-2">
																	<input type="text" class="form-control" name="dateClient_cui" id="dateClient_cui" value="<? echo $clientData["dateClient_cui"];?>">
																</label>
																	
																</div>
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
														<select class="form-control select2me" name="adresa_judetSector" onchange="updateLocalitati('adresa_judetSector')" id="adresa_judetSector"/>
															<?echo '<option value="'.$clientData["adresa_judetSector"].'" selected="selected">'.$clientData["adresa_judetSector"].'</option>';
															?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">Localitate
													</label>
													<div class="col-md-2">
														<select class="form-control select2me" name="adresa_localitate" id="adresa_localitate"/>
														<?echo '<option value="'.$clientData["adresa_localitate"].'" selected="selected">'.$clientData["adresa_localitate"].'</option>';
															?>
														</select>
													</div>
												</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Strada
														</label>
														<div class="col-md-2">
															<input type="text" class="form-control" name="adresa_strada" id="adresa_strada" value="<? echo $clientData["adresa_strada"];?>">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Numar
														</label>
														<div class="col-md-2">
															<input type="text" class="form-control" name="adresa_numar" id="adresa_numar" value="<? echo $clientData["adresa_numar"];?>">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Cod postal
														</label>
														<div class="col-md-2">
															<input type="text" class="form-control" name="adresa_codPostal" id="adresa_codPostal" value="<? echo $clientData["adresa_codPostal"];?>">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Bloc
														</label>
														<div class="col-md-2">
															<input type="text" class="form-control" name="adresa_bloc" id="adresa_bloc" value="<? echo $clientData["adresa_bloc"];?>">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Scara
														</label>
														<div class="col-md-2">
															<input type="text" class="form-control" name="adresa_scara" id="adresa_scara" value="<? echo $clientData["adresa_scara"];?>">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Etaj
														</label>
														<div class="col-md-2">
															<input type="text" class="form-control" name="adresa_etaj" id="adresa_etaj" value="<? echo $clientData["adresa_etaj"];?>">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Numar apartament
														</label>
														<div class="col-md-2">
															<input type="text" class="form-control" name="adresa_apartament" id="adresa_apartament" value="<? echo $clientData["adresa_apartament"];?>">
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab3">
											<div class="form-body">
												<div class="tab-pane active" id="tab3">
													<h3 class="block">Contact</h3>
													<div class="form-group">
														<label class="col-md-2 control-label">Telefon <span class="required"> * </span>
														</label>
														<div class="col-md-2">
															<input type="text" class="form-control" name="contact_telefon" id="contact_telefon" value="<? echo $clientData["contact_telefon"];?>">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Email <span class="required"> * </span>
														</label>
														<div class="col-md-2">
															<input type="text" class="form-control" name="contact_email" id="contact_email" value="<? echo $clientData["contact_email"];?>">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Web site
														</label>
														<div class="col-md-2">
															<input type="text" class="form-control" name="contact_webSite" id="contact_webSite" value="<? echo $clientData["contact_webSite"];?>">
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab4">
											<div class="form-body">
												<div class="tab-pane active" id="tab4">
													<h3 class="block">Persoana de contact</h3>
													<div class="form-group">
														<label class="col-md-2 control-label">Nume
														</label>
														<div class="col-md-2">
															<input type="text" class="form-control" name="persoanaContact_nume" id="persoanaContact_nume" value="<? echo $clientData["persoanaContact_nume"];?>">
														</div>
													</div>	
													<div class="form-group">
														<label class="col-md-2 control-label">Prenume
														</label>
														<div class="col-md-2">
															<input type="text" class="form-control" name="persoanaContact_prenume" id="persoanaContact_prenume" value="<? echo $clientData["persoanaContact_prenume"];?>">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Telefon
														</label>
														<div class="col-md-2">
															<input type="text" class="form-control" name="persoanaContact_telefon" id="persoanaContact_telefon" value="<? echo $clientData["persoanaContact_telefon"];?>">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Email
														</label>
														<div class="col-md-2">
															<input type="text" class="form-control" name="persoanaContact_email" id="persoanaContact_email" value="<? echo $clientData["persoanaContact_email"];?>">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">In calitate de
														</label>
														<div class="col-md-2">
															<input type="text" class="form-control" name="persoanaContact_calitate" id="persoanaContact_calitate" value="<? echo $clientData["persoanaContact_calitate"];?>">
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab5">
											<div class="form-body">
												<div class="tab-pane active" id="tab5">
													<h3 class="block">Adresa corespondenta</h3>
													<div class="form-group">
													<label class="col-md-2 control-label">Foloseste adresa de domiciliu <span class="required"> * </span>
													</label>
													<div class="col-md-2">
														<select class="form-control" name="adresaCorespondenta_adresa" id="adresaCorespondenta_adresa" onchange="adresaCorespondenta()">
														<?	switch($clientData["adresaCorespondenta_adresa"]){case "1": echo '<option value="1" selected="selected">Da</option>
															<option value="0">Nu</option>'; break; case "0": echo '<option value="1">Da</option>
															<option value="0" selected="selected">Nu</option>'; break; }?>
															
														</select>
													</div>
													</div>
													<div class="form-group">
													<label class="col-md-2 control-label">Judet/sector <span class="required"> * </span>
													</label>
													<div class="col-md-2">
														<select class="form-control select2me" name="adresaCorespondenta_judetSector" onchange="updateLocalitati('adresaCorespondenta_judetSector')" id="adresaCorespondenta_judetSector"/>
															<?echo '<option value="'.$clientData["adresaCorespondenta_judetSector"].'" selected="selected">'.$clientData["adresaCorespondenta_judetSector"].'</option>';
															?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">Localitate <span class="required"> * </span>
													</label>
													<div class="col-md-2">
														<select class="form-control select2me" name="adresaCorespondenta_localitate" id="adresaCorespondenta_localitate"/>
														<?echo '<option value="'.$clientData["adresaCorespondenta_localitate"].'" selected="selected">'.$clientData["adresaCorespondenta_localitate"].'</option>';
															?>
														</select>
													</div>
												</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Strada <span class="required"> * </span>
														</label>
														<div class="col-md-2">
															<input type="text" class="form-control" name="adresaCorespondenta_strada" id="adresaCorespondenta_strada" value="<? echo $clientData["adresaCorespondenta_strada"];?>">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Numar <span class="required"> * </span>
														</label>
														<div class="col-md-2">
															<input type="text" class="form-control" name="adresaCorespondenta_numar" id="adresaCorespondenta_numar" value="<? echo $clientData["adresaCorespondenta_numar"];?>">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Cod postal
														</label>
														<div class="col-md-2">
															<input type="text" class="form-control" name="adresaCorespondenta_codPostal" id="adresaCorespondenta_codPostal" value="<? echo $clientData["adresaCorespondenta_codPostal"];?>">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Bloc
														</label>
														<div class="col-md-2">
															<input type="text" class="form-control" name="adresaCorespondenta_bloc" id="adresaCorespondenta_bloc" value="<? echo $clientData["adresaCorespondenta_bloc"];?>">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Scara
														</label>
														<div class="col-md-2">
															<input type="text" class="form-control" name="adresaCorespondenta_scara" id="adresaCorespondenta_scara" value="<? echo $clientData["adresaCorespondenta_scara"];?>">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Etaj
														</label>
														<div class="col-md-2">
															<input type="text" class="form-control" name="adresaCorespondenta_etaj" id="adresaCorespondenta_etaj" value="<? echo $clientData["adresaCorespondenta_etaj"];?>">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Apartament
														</label>
														<div class="col-md-2">
															<input type="text" class="form-control" name="adresaCorespondenta_apartament" id="adresaCorespondenta_apartament" value="<? echo $clientData["adresaCorespondenta_apartament"];?>">
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab6">
											<div class="form-body">
												<div class="tab-pane active" id="tab6">
													<h3 class="block">Administrare</h3>
													<div class="form-group">
														<label class="col-md-2 control-label">Categorie <span class="required"> * </span>
														</label>
														<div class="col-md-2">
														<select class="form-control" name="administrare_categorie" id="administrare_categorie"/>
															<option value="">Alege...</option>
															<?
															showEditModuleSettings($clientiSettingsData, 'clientCategory', $clientData["administrare_categorie"]);
															?>
														</select>
													</div>
														</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Status
														</label>
														<div class="col-md-2">
															<select class="form-control" name="administrare_status" id="administrare_status"/>
																<option value="">Alege...</option>
																<?
																showEditModuleSettings($clientiSettingsData, 'status', $clientData["administrare_status"]);
																?>																
															</select>
														</div>	
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Program de beneficii
														</label>
														<div class="col-md-2">
														<select class="form-control select2me" name="administrare_programBeneficii" id="administrare_programBeneficii" onchange='updateFieldData("beneficii")'/>
															<option value="">Alege...</option>
															<?foreach ($beneficiiData as $value){
																
																if ($value["programBeneficiiId"] == $clientData["administrare_programBeneficii"]){
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
														<label class="col-md-2 control-label">Agent
														</label>
														<div class="col-md-2">
														<select class="form-control select2me" name="administrare_agentId" id="administrare_agentId" onchange='updateFieldData("agent")'/>
															<option value="">Alege...</option>
															<?foreach ($agentiData as $value){
																
																if ($value["agentId"] == $clientData["administrare_agentId"]){
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
														<label class="col-md-2 control-label">Recomandator
														</label>
														<div class="col-md-2">
															<select class="form-control select2me" name="administrare_recomandator" id="administrare_recomandator">
																<option value="">Alege...</option>
																<?foreach ($recomandatoriData as $value){
																
																if ($value["recomandatorId"] == $clientData["administrare_recomandator"]){
																	echo "<option value='".$value["recomandatorId"]."' selected='selected'>" . $value["dateRecomandator_numeDenumire"] . "</option>";
																	
																}
																else
																{
																	echo "<option value='".$value["recomandatorId"]."'>" . $value["dateRecomandator_numeDenumire"] . "</option>";
																}
																
																}
																
																
																?>
															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Notificari automate
														</label>
														<div class="col-md-2">
														<select class="form-control" name="administrare_automaticNotifications" id="administrare_automaticNotifications">
															<option value="">Alege...</option>
																<?
																showEditModuleSettings($clientiSettingsData, 'automaticNotifications', $clientData["administrare_automaticNotifications"]);
																?>																
														</select>
													</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Newsletter
														</label>
														
														<div class="col-md-2">
														<select class="form-control" name="administrare_newsletter" id="administrare_newsletter">
															<option value="">Alege...</option>
															<?
															showEditModuleSettings($clientiSettingsData, 'newsletter', $clientData["administrare_newsletter"]);
															?>
														</select>
													</div>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab7">
											<div class="form-body">
												<div class="tab-pane active" id="tab7">
													<h3 class="block">Alte detalii</h3>
													<div class="form-group">
														<label class="col-md-2 control-label">Societate de leasing <span class="required"> * </span>
														</label>
														<div class="col-md-2">
														
														
															<select class="form-control" name="alteDetalii_societateLeasing" id="alteDetalii_societateLeasing">
																<option value="">Alege...</option>
																<?
																showEditModuleSettings($clientiSettingsData, 'societateLeasing', $clientData["alteDetalii_societateLeasing"]);
																?>
															</select>
															
														</div>
														</div>
														<?
														
														if ($clientData["dateClient_tipClient"] == "pj")
														{
															echo '<div class="form-group">
														<label class="col-md-2 control-label">Nr reg com
														</label>
														<div class="col-md-2">
															<input type="text" class="form-control" name="alteDetalii_nrRegCom" id="alteDetalii_nrRegCom" value="'.$clientData["alteDetalii_nrRegCom"].'">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Ro <span class="required"> * </span>
														</label>
														<div class="col-md-2">
															<input type="text" class="form-control" name="alteDetalii_RO" id="alteDetalii_RO" value="' . $clientData["alteDetalii_RO"].'">
														</div>
													</div>';	
														}
													?>
													<div class="form-group">
														<label class="col-md-2 control-label">Banca
														</label>
														<div class="col-md-2">
															<input type="text" class="form-control" name="alteDetalii_banca" id="alteDetalii_banca" value="<? echo $clientData["alteDetalii_banca"];?>">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">IBAN
														</label>
														<div class="col-md-2">
															<input type="text" class="form-control" name="alteDetalii_IBAN" id="alteDetalii_IBAN" value="<? echo $clientData["alteDetalii_IBAN"];?>">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Observatii
														</label>
														<div class="col-md-2">
															<input type="text" class="form-control" name="alteDetalii_observatii" id="alteDetalii_observatii" value="<? echo $clientData["alteDetalii_observatii"];?>">
														</div>
													</div>													
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab8">
											<div class="form-body">
												<div class="tab-pane active" id="tab8">
													<h3 class="block">Atasare documente</h3>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab9">
											<div class="form-body">
												<div class="tab-pane active" id="tab9">
													<h3 class="block">Portofoliu</h3>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<input type="hidden" name="viewEditClient" value="submited">
					</form>
				</div>
			</div>