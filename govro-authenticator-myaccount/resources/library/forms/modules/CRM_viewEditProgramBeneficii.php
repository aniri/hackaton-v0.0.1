<?php

checkSession();

include("../resources/library/modules/CRM_programBeneficii.php");
$beneficii = "Beneficii";
$beneficiiSettingsData = $beneficii::CRM_loadSettings();

include("../resources/library/modules/CRM_agents.php");
$agenti = "Agenti";
$agentiData = $agenti::CRM_loadAll();

?>

<div class="row">
				<div class="col-md-12">
					<form class="form-horizontal form-row-seperated" action="#" method="POST" enctype="multipart/form-data">
						<div class="portlet">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-shopping-cart"></i><?php echo " Nume Program" . " - " . $beneficiiData["dateProgramBeneficii_numeProgram"]; //EDIT?>
								</div>
								<div class="actions btn-set">
									<button type="button" name="back" class="btn default" onclick="goBack()"><i class="fa fa-angle-left"></i> Inapoi</button>
									<button type="button" name="refresh" class="btn default" onclick="refreshForm()"><i class="fa fa-reply"></i> Reincarca</button>
									<button class="btn green"><i class="fa fa-check"></i> Salveaza</button>
								</div>
							</div>
							<div class="portlet-body">
								<div class="tabbable">
									<ul class="nav nav-tabs">
										<li class="active">
											<a href="#tab1" data-toggle="tab">
											Date Program </a>
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
											 Atasare documente</a>
										</li>
									</ul>
									<div class="tab-content no-space">
										<div class="tab-pane active" id="tab1">
										<h3 class="block">Date Program</h3>
											<div class="form-body">
												<div class="form-group">
													<label class="control-label col-md-3">Nume: <span class="required">	* </span></label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dateProgramBeneficii_numeProgram" id="dateProgramBeneficii_numeProgram" value="<?php echo $beneficiiData["dateProgramBeneficii_numeProgram"];?>"></input>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Logo: <span class="required">	* </span></label>
													<div class="col-md-4">
														<input type="file" class="form-control" name="dateProgramBeneficii_logo" id="dateProgramBeneficii_logo" value="<?php echo $beneficiiData["dateProgramBeneficii_logo"];?>"/>
														<span class="help-block">
														Logo-ul programului (.jpg, .png, .bmp) </span>
													</div>
												</div>
											</div>
										</div>	
										<div class="tab-pane" id="tab2">
											<div class="form-body">
												<div class="tab-pane active" id="tab2">
													<h3 class="block">Adresa domiciliu/sediu</h3>
													<div class="form-group">
													<label class="control-label col-md-3">Judet/sector
													</label>
														<div class="col-md-4">
															<select class="form-control select2me" name="adresaDomiciliuSediu_judetSector" onchange="updateLocalitati('adresaDomiciliuSediu_judetSector')" id="adresaDomiciliuSediu_judetSector"/>
																<?phpecho '<option value="'.$beneficiiData["adresaDomiciliuSediu_judetSector"].'" selected="selected">'.$beneficiiData["adresaDomiciliuSediu_judetSector"].'</option>';
																?>
															</select>
														</div>
													</div>
													<div class="form-group">
													<label class="control-label col-md-3"> Localitate:
													</label>
														<div class="col-md-4">
															<select class="form-control select2me" name="adresaDomiciliuSediu_localitate" id="adresaDomiciliuSediu_localitate"/>
															<?phpecho '<option value="'.$beneficiiData["adresaDomiciliuSediu_localitate"].'" selected="selected">'.$beneficiiData["adresaDomiciliuSediu_localitate"].'</option>';
																?>
															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Strada:
														</label>
														<div class="col-md-4">
																<input type="text" class="form-control" name="adresaDomiciliuSediu_strada" id="adresaDomiciliuSediu_strada" value="<?php echo $beneficiiData["adresaDomiciliuSediu_strada"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Numar:
														</label>
														<div class="col-md-4">
																<input type="text" class="form-control" name="adresaDomiciliuSediu_numar" id="adresaDomiciliuSediu_numar" value="<?php echo $beneficiiData["adresaDomiciliuSediu_numar"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Cod postal:
														</label>
														<div class="col-md-4">
																<input type="text" class="form-control" name="adresaDomiciliuSediu_codPostal" id="adresaDomiciliuSediu_codPostal" value="<?php echo $beneficiiData["adresaDomiciliuSediu_codPostal"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Bloc:
														</label>
														<div class="col-md-4">
																<input type="text" class="form-control" name="adresaDomiciliuSediu_bloc" id="adresaDomiciliuSediu_bloc" value="<?php echo $beneficiiData["adresaDomiciliuSediu_bloc"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Scara:
														</label>
														<div class="col-md-4">
																<input type="text" class="form-control" name="adresaDomiciliuSediu_scara" id="adresaDomiciliuSediu_scara" value="<?php echo $beneficiiData["adresaDomiciliuSediu_scara"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Etaj:
														</label>
														<div class="col-md-4">
																<input type="text" class="form-control" name="adresaDomiciliuSediu_etaj" id="adresaDomiciliuSediu_etaj" value="<?php echo $beneficiiData["adresaDomiciliuSediu_etaj"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Apartament numar:
														</label>
														<div class="col-md-4">
																<input type="text" class="form-control" name="adresaDomiciliuSediu_apNr" id="adresaDomiciliuSediu_apNr" value="<?php echo $beneficiiData["adresaDomiciliuSediu_apNr"];?>"></input>
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
														<label class="control-label col-md-3">Telefon:
														</label>
														<div class="col-md-4">
																<input type="text" class="form-control" name="contact_telefon" id="contact_telefon" value="<?php echo $beneficiiData["contact_telefon"];?>"/></input>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Email<span class="required">	* </span>
														</label>
														<div class="col-md-4">
																<input type="text" class="form-control" name="contact_email" id="contact_email" value="<?php echo $beneficiiData["contact_email"];?>"></input>
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
													<label class="control-label col-md-3"> Nume
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="persoanaDeContact_nume" id="persoanaDeContact_nume" value="<?php echo $beneficiiData["persoanaDeContact_nume"];?>"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Telefon
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="persoanaDeContact_telefon" id="persoanaDeContact_telefon" value="<?php echo $beneficiiData["persoanaDeContact_telefon"];?>" />
													</div>
												</div>												
												<div class="form-group">
													<label class="control-label col-md-3"> Email
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="persoanaDeContact_email" id="persoanaDeContact_email" value="<?php echo $beneficiiData["persoanaDeContact_email"];?>"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> In calitate de
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="persoanaDeContact_inCalitate" id="persoanaDeContact_inCalitate" value="<?php echo $beneficiiData["persoanaDeContact_inCalitate"];?>"/>
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
													<label class="control-label col-md-3">Tip beneficiar <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<select class="form-control" name="administrare_tipBeneficiari" id="administrare_tipBeneficiari">
															<option value="">Alege...</option>															
															<?php
															showEditModuleSettings($beneficiiSettingsData, 'benefitsType', $beneficiiData["administrare_tipBeneficiari"]);
															?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Agent <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<select class="form-control" name="administrare_agent" id="administrare_agent">
															<option value="">Alege...</option>
															<?phpforeach ($agentiData  as $value){echo "<option value='".$value["agentId"]."'>" . $value["dateAgent_numeDenumire"] . "</option>";}?>															
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Telefon dedicat <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="administrare_telefonDedicat" id="administrare_telefonDedicat" value="<?php echo $beneficiiData["administrare_telefonDedicat"];?>"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Email dedicat <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="administrare_emailDedicat" id="administrare_emailDedicat" value="<?php echo $beneficiiData["administrare_emailDedicat"];?>"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Site dedicat <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<select class="form-control" name="administrare_siteDedicat" id="administrare_siteDedicat">
															<option value="">Alege...</option>															
															<?php
															showEditModuleSettings($beneficiiSettingsData, 'siteDedicat', $beneficiiData["administrare_siteDedicat"]);
															?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Contract <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<select class="form-control" name="administrare_contract" id="administrare_contract">
															<option value="">Alege...</option>																			
															<?php
															showEditModuleSettings($beneficiiSettingsData, 'contract', $beneficiiData["administrare_contract"]);
															?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Data initiala
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="administrare_dataInitiala" id="administrare_dataInitiala" value="<?php echo $beneficiiData["administrare_dataInitiala"];?>"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Status <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<select class="form-control" name="administrare_status" id="administrare_status">
															<option value="">Alege...</option>																
															<?php
															showEditModuleSettings($beneficiiSettingsData, 'status', $beneficiiData["administrare_status"]);
															?>
														</select>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="tab6">
											<div class="from-body">
												<div class="tab-pane active" id="tab6">
												<h3 class="block">Atasare documente</h3>
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