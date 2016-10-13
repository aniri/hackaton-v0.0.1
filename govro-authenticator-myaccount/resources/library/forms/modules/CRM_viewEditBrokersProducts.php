<?

checkSession();

?>

<div class="row">
				<div class="col-md-12">
					<form class="form-horizontal form-row-seperated" action="#" id="CRM_editBrokerPOST" method="POST" enctype="multipart/form-data">
						<div class="portlet">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-shopping-cart"></i><? echo $brokerData["dateBroker_denumire"] . " - " . $brokerData["brokerId"]; //EDIT?>
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
											Date Broker </a>
										</li>
										<li>
											<a href="#tab2" data-toggle="tab">
											Adresa sediu </a>
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
											Adresa de corespondenta </a>
										</li>
										<li>
											<a href="#tab6" data-toggle="tab">
											Alte detalii </a>
										</li>
										<li>
											<a href="#tab7" data-toggle="tab">
											Atasare documente </a>
										</li>
										
									</ul>
									<div class="tab-content no-space">
										<div class="tab-pane active" id="tab1">
										<h3 class="block">Date Broker</h3>
											<div class="form-body">
												<div class="form-group">
													<label class="col-md-2 control-label">Denumire: <span class="required"> * </span> 
													</label>
													<div class="col-md-2">
															<input type="text" class="form-control" name="dateBroker_denumire" id="dateBroker_denumire" value="<? echo $brokerData["dateBroker_denumire"];?>"></input>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">CUI: <span class="required"> * </span> 
													</label>
													<div class="col-md-2">
															<input type="text" class="form-control" name="dateBroker_cui" id="dateBroker_cui" value="<? echo $brokerData["dateBroker_cui"];?>"></input>
													</div>
												</div>												
											</div>
										</div>	
										<div class="tab-pane" id="tab2">
											<div class="form-body">
												<div class="tab-pane active" id="tab2">
													<h3 class="block">Adresa Sediu</h3>
													<div class="form-group">
														<label class="col-md-2 control-label">Judet/sector: <span class="required"> * </span> 
														</label>
														<div class="col-md-2">
														<select class="form-control select2me" name="adresaSediu_judetSector" id="adresaSediu_judetSector"  onchange="updateLocalitati('adresaSediu_judetSector')">
															<?echo '<option value="'.$brokerData["adresaSediu_judetSector"].'" selected="selected">'.$brokerData["adresaSediu_judetSector"].'</option>';
																?>														
														</select>
													</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Localitate: <span class="required"> * </span> 
														</label>
														<div class="col-md-2">
															<select class="form-control select2me" name="adresaSediu_localitate" id="adresaSediu_localitate">
															<?echo '<option value="'.$brokerData["adresaSediu_localitate"].'" selected="selected">'.$brokerData["adresaSediu_localitate"].'</option>';
																?>
															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Strada: <span class="required"> * </span> 
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="adresaSediu_strada" id="adresaSediu_strada" value="<? echo $brokerData["adresaSediu_strada"];?>"></input>
														</div>
													</div>	
													<div class="form-group">
														<label class="col-md-2 control-label">Numar: <span class="required"> * </span> 
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="adresaSediu_numar" id="adresaSediu_numar" value="<? echo $brokerData["adresaSediu_numar"];?>"></input>
														</div>
													</div>	
													<div class="form-group">
														<label class="col-md-2 control-label">Cod Postal: 
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="adresaSediu_codPostal" id="adresaSediu_codPostal" value="<? echo $brokerData["adresaSediu_codPostal"];?>"></input>
														</div>
													</div>	
													<div class="form-group">
														<label class="col-md-2 control-label">Bloc:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="adresaSediu_bloc" id="adresaSediu_bloc" value="<? echo $brokerData["adresaSediu_bloc"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Scara:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="adresaSediu_scara" id="adresaSediu_scara" value="<? echo $brokerData["adresaSediu_scara"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Etaj: 
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="adresaSediu_etaj" id="adresaSediu_etaj" value="<? echo $brokerData["adresaSediu_etaj"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Apartament numar:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="adresaSediu_numarApartament" id="adresaSediu_numarApartament" value="<? echo $brokerData["adresaSediu_numarApartament"];?>"></input>
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
														<label class="col-md-2 control-label">Telefon:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="contact_telefon" id="contact_telefon" value="<? echo $brokerData["contact_telefon"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Email:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="contact_email" id="contact_email" value="<? echo $brokerData["contact_email"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Web site:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="contact_webSite" id="contact_webSite" value="<? echo $brokerData["contact_webSite"];?>"></input>
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
																<input type="text" class="form-control" name="persoanaContact_nume" id="persoanaContact_nume" value="<? echo $brokerData["persoanaContact_nume"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Telefon:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="persoanaContact_telefon" id="persoanaContact_telefon" value="<? echo $brokerData["persoanaContact_telefon"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Email:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="persoanaContact_email" id="persoanaContact_email" value="<? echo $brokerData["persoanaContact_email"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">In calitate de:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="persoanaContact_calitate" id="persoanaContact_calitate" value="<? echo $brokerData["persoanaContact_calitate"];?>"></input>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab5">
											<div class="from-body">
												<div class="tab-pane active" id="tab5">
												<h3 class="block">Adresa de corespondenta</h3>
													<div class="form-group">
														<label class="control-label col-md-2 control-label"> Sediu social <span class="required">	* </span>
														</label>
														<div class="col-md-2">														
															<select class="form-control" name="adresaCorespondenta_adresa" id="adresaCorespondenta_adresa" onchange="adresaCorespondenta()">
															<?	switch($brokerData["adresaCorespondenta_adresa"]){case "1": echo '<option value="1" selected="selected">Da</option>
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
																<?echo '<option value="'.$brokerData["adresaCorespondenta_judetSector"].'" selected="selected">'.$brokerData["adresaCorespondenta_judetSector"].'</option>';
																?>
															</select>
														</div>
													</div>
													<div class="form-group">
													<label class="col-md-2 control-label">Localitate <span class="required"> * </span>
														</label>
														<div class="col-md-2">
															<select class="form-control select2me" name="adresaCorespondenta_localitate" id="adresaCorespondenta_localitate"/>
															<?echo '<option value="'.$brokerData["adresaCorespondenta_localitate"].'" selected="selected">'.$brokerData["adresaCorespondenta_localitate"].'</option>';
																?>
															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Strada: <span class="required"> * </span> 
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="adresaCorespondenta_strada" id="adresaCorespondenta_strada" value="<? echo $brokerData["adresaCorespondenta_strada"];?>"></input>
														</div>
													</div>	
													<div class="form-group">
														<label class="col-md-2 control-label">Numar: <span class="required"> * </span> 
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="adresaCorespondenta_numar" id="adresaCorespondenta_numar" value="<? echo $brokerData["adresaCorespondenta_numar"];?>"></input>
														</div>
													</div>	
													<div class="form-group">
														<label class="col-md-2 control-label">Cod Postal: 
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="adresaCorespondenta_codPostal" id="adresaCorespondenta_codPostal" value="<? echo $brokerData["adresaCorespondenta_codPostal"];?>"></input>
														</div>
													</div>	
													<div class="form-group">
														<label class="col-md-2 control-label">Bloc:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="adresaCorespondenta_bloc" id="adresaCorespondenta_bloc" value="<? echo $brokerData["adresaCorespondenta_bloc"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Scara:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="adresaCorespondenta_scara" id="adresaCorespondenta_scara" value="<? echo $brokerData["adresaCorespondenta_scara"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Etaj: 
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="adresaCorespondenta_etaj" id="adresaCorespondenta_etaj" value="<? echo $brokerData["adresaCorespondenta_etaj"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Apartament numar:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="adresaCorespondenta_numarApartament" id="adresaCorespondenta_numarApartament" value="<? echo $brokerData["adresaCorespondenta_numarApartament"];?>"></input>
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
																<input type="text" class="form-control" name="alteDetalii_nrRegCom" id="alteDetalii_nrRegCom" value="<? echo $brokerData["alteDetalii_nrRegCom"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-2 control-label"> RO <span class="required">	* </span>
														</label>
														<div class="col-md-2">														
															<select class="form-control" name="alteDetalii_RO" id="alteDetalii_RO">
															<?	switch($brokerData["alteDetalii_RO"]){case "Da": echo '<option value="Da" selected="selected">Da</option>
																<option value="Nu">Nu</option>'; break; case "Nu": echo '<option value="Da">Da</option>
																<option value="Nu" selected="selected">Nu</option>'; break; }?>
															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Banca: 
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="alteDetalii_banca" id="alteDetalii_banca" value="<? echo $brokerData["alteDetalii_banca"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">IBAN: 
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="alteDetalii_IBAN" id="alteDetalii_IBAN" value="<? echo $brokerData["alteDetalii_IBAN"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Observatii: 
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="alteDetalii_observatii" id="alteDetalii_observatii" value="<? echo $brokerData["alteDetalii_observatii"];?>"></input>
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