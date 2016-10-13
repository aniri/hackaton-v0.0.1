<?

checkSession();

$userRights = getRights();
include("../resources/library/modules/CRM_angajatis.php");
$angajati = "Angajati";
$angajatSettingsData = $angajati::CRM_loadSettings();


?>

<div class="row">
				<div class="col-md-12">
					<form class="form-horizontal form-row-seperated" action="#" id="CRM_editAngajatPOST" method="POST" enctype="multipart/form-data">
						<div class="portlet">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-shopping-cart"></i><? echo "Nume Angajat" . " - " . $angajatData["dateAngajati_nume"]; //EDIT?>
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
											Date Angajat </a>
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
											Administrare angajati </a>
										</li>
										<li>
											<a href="#tab5" data-toggle="tab">
											Alte detalii </a>
										</li>
										<li>
											<a href="#tab6" data-toggle="tab">
											Documente scanate </a>
										</li>
									</ul>
									<div class="tab-content no-space">
										<div class="tab-pane active" id="tab1">
										<h3 class="block">Date Angajat</h3>
											<div class="form-body">
												<div class="form-group">
														<label class="col-md-2 control-label">Departament: <span class="required"> * </span>
														</label>
														<div class="col-md-2">
															<select class="form-control select2me" name="dateAngajati_departament" id="dateAngajati_departament">
																<option value="">Alege...</option>
																<?
																showEditModuleSettings($angajatSettingsData, 'departament', $angajatData["dateAngajati_departament"]);
																?>
															</select>															
														</div>
												</div>
												<div class="form-group">
														<label class="col-md-2 control-label">Nume <span class="required">	* </span>
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="dateAngajati_nume" id="dateAngajati_nume" value="<? echo $angajatData["dateAngajati_nume"];?>"></input>
														</div>
												</div>
												<div class="form-group">
														<label class="col-md-2 control-label">CNP <span class="required">	* </span>
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="dateAngajati_cnp" id="dateAngajati_cnp" value="<? echo $angajatData["dateAngajati_cnp"];?>"></input>
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
															<select class="form-control select2me" name="adresaDomiciliu_judetSector" onchange="updateLocalitati('adresaDomiciliu_judetSector')" id="adresaDomiciliu_judetSector"/>
																<?echo '<option value="'.$angajatData["adresaDomiciliu_judetSector"].'" selected="selected">'.$angajatData["adresaDomiciliu_judetSector"].'</option>';
																?>
															</select>
														</div>
													</div>
													<div class="form-group">
													<label class="col-md-2 control-label"> Localitate:
													</label>
														<div class="col-md-2">
															<select class="form-control select2me" name="adresaDomiciliu_localitate" id="adresaDomiciliu_localitate"/>
															<?echo '<option value="'.$angajatData["adresaDomiciliu_localitate"].'" selected="selected">'.$angajatData["adresaDomiciliu_localitate"].'</option>';
																?>
															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Strada:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="adresaDomiciliu_strada" id="adresaDomiciliu_strada" value="<? echo $angajatData["adresaDomiciliu_strada"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Numar:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="adresaDomiciliu_numar" id="adresaDomiciliu_numar" value="<? echo $angajatData["adresaDomiciliu_numar"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Cod postal:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="adresaDomiciliu_codPostal" id="adresaDomiciliu_codPostal" value="<? echo $angajatData["adresaDomiciliu_codPostal"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Bloc:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="adresaDomiciliu_bloc" id="adresaDomiciliu_bloc" value="<? echo $angajatData["adresaDomiciliu_bloc"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Scara:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="adresaDomiciliu_scara" id="adresaDomiciliu_scara" value="<? echo $angajatData["adresaDomiciliu_scara"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Etaj:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="adresaDomiciliu_etaj" id="adresaDomiciliu_etaj" value="<? echo $angajatData["adresaDomiciliu_etaj"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Apartament numar:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="adresaDomiciliu_apNr" id="adresaDomiciliu_apNr" value="<? echo $angajatData["adresaDomiciliu_apNr"];?>"></input>
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
														<label class="col-md-2 control-label">Telefon 1:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="contact_telefon1" id="contact_telefon1" value="<? echo $angajatData["contact_telefon1"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Telefon 2:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="contact_telefon2" id="contact_telefon2" value="<? echo $angajatData["contact_telefon2"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Email 1:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="contact_email1" id="contact_email1" value="<? echo $angajatData["contact_email1"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Email 2: 
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="contact_email2" id="contact_email2" value="<? echo $angajatData["contact_email2"];?>"></input>
														</div>
													</div>
												</div>	
											</div>
										</div>
										<div class="tab-pane" id="tab4">
											<div class="from-body">
												<div class="tab-pane active" id="tab4">
												<h3 class="block">Administrare angajati</h3>
													<div class="form-group">
														<label class="col-md-2 control-label">Status: <span class="required"> * </span>
														</label>
														<div class="col-md-2">
															<select class="form-control select2me" name="administrareAngajati_status" id="administrareAngajati_status">
																<option value="">Alege...</option>
																<?
																showEditModuleSettings($angajatSettingsData, 'status', $angajatData["administrareAngajati_status"]);
																?>
															</select>															
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label"> Rol <span class="required">	* </span>
														</label>
														<div class="col-md-2">
															<select class="form-control" name="administrareAngajati_rol" id="administrareAngajati_rol">
																<option value="">Alege...</option>
																<?foreach ($userRights as $name => $value){
																	
																		if($value["id"] == $angajatData["administrareAngajati_rol"])
																		{
																	echo '<option value="'.$value["id"].'" selected="selected">'.$value["value"].'</option>';
																		}		
																		else{
																			
																			echo '<option value="'.$value["id"].'">'.$value["value"].'</option>';
																			
																		}		
																			
																		
																	}
																?>	
															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Data initiala: 
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="administrareAngajati_dataInitiala" id="administrareAngajati_dataInitiala" readonly="true "value="<? echo $angajatData["administrareAngajati_dataInitiala"];?>"></input>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab5">
											<div class="from-body">
												<div class="tab-pane active" id="tab5">
												<h3 class="block">Alte detalii</h3>
													<div class="form-group">
														<label class="col-md-2 control-label">Banca: 
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="alteDetalii_banca" id="alteDetalii_banca" value="<? echo $angajatData["alteDetalii_banca"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">IBAN: 
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="alteDetalii_iban" id="alteDetalii_iban" value="<? echo $angajatData["alteDetalii_iban"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Observatii: 
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="alteDetalii_observatii" id="alteDetalii_observatii" value="<? echo $angajatData["alteDetalii_observatii"];?>"></input>
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
						</div>
						<input type="hidden" name="viewEdit" value="submited">
					</form>
				</div>
			</div>