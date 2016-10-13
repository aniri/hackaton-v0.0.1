<?

checkSession();
$asiguratorSettingsData = $asigurator::CRM_loadSettings();
?>
<div class="row">
				<div class="col-md-12">
					<div class="portlet box blue" id="addBeneficiiForm">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Adaugare Asigurator/Furnizor - <span class="step-title">
								Pas 1 din 7 </span>
							</div>
							<div class="tools hidden-xs">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body form">
							<form action="#" class="form-horizontal" id="CRM_addAsiguratorFurnizorPOST" method="POST" enctype="multipart/form-data">
								<div class="form-wizard">
									<div class="form-body">
										<ul class="nav nav-pills nav-justified steps">
											<li>
												<a href="#tab1" data-toggle="tab" class="step">
												<span class="number">
												1 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Date Furnizor </span>
												</a>
											</li>
											<li>
												<a href="#tab2" data-toggle="tab" class="step">
												<span class="number">
												2</span>
												<span class="desc">
												<i class="fa fa-check"></i> Adresa sediu </span>
												</a>
											</li>
											<li>
												<a href="#tab3" data-toggle="tab" class="step">
												<span class="number">
												3</span>
												<span class="desc">
												<i class="fa fa-check"></i> Contact </span>
												</a>
											</li>											
											<li>
												<a href="#tab4" data-toggle="tab" class="step">
												<span class="number">
												4</span>
												<span class="desc">
												<i class="fa fa-check"></i> Persoana de contact</span>
												</a>
											</li>
											<li>
												<a href="#tab5" data-toggle="tab" class="step">
												<span class="number">
												5</span>
												<span class="desc">
												<i class="fa fa-check"></i> Adresa de corespondenta </span>
												</a>
											</li>
											<li>
												<a href="#tab6" data-toggle="tab" class="step">
												<span class="number">
												6</span>
												<span class="desc">
												<i class="fa fa-check"></i> Alte detalii </span>
												</a>
											</li>
											<li>
												<a href="#tab7" data-toggle="tab" class="step">
												<span class="number">
												7</span>
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
												<h3 class="block"> Date Furnizor </h3>
												<div class="form-group">
													<label class="control-label col-md-3">Categorie produs<span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<select class="form-control"  name="dateAsiguratorFurnizor_categorieProdus" id="dateAsiguratorFurnizor_categorieProdus"/>
															<option value="">Alege...</option>
															<?
																foreach ($asiguratorSettingsData as $name => $value)
																{
																	if ($name == "categoriiProduse")
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
													<label class="control-label col-md-3"> Denumire <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dateAsiguratorFurnizor_denumire" id="dateAsiguratorFurnizor_denumire"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Status<span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<select class="form-control"  name="dateAsiguratorFurnizor_status" id="dateAsiguratorFurnizor_status"/>
															<option value="">Alege...</option>
															<option value="Activ" selected="selected">Activ</option>	
															<option value="Inactiv">Inactiv</option>															
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">CUI <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dateAsiguratorFurnizor_cui" id="dateAsiguratorFurnizor_cui"/>
													</div>
												</div>																							
											</div>
											<div class="tab-pane" id="tab2">
												<h3 class="block">Adresa Sediu</h3>	
												<div class="form-group">
													<label class="control-label col-md-3"> Judet/Sector <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<select class="form-control select2me" name="adresaSediu_judetSector" id="adresaSediu_judetSector" onchange="updateLocalitati('adresaSediu_judetSector')" >
															<option value="">Alege...</option>															
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Localitatea <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<select class="form-control select2me" name="adresaSediu_localitate" id="adresaSediu_localitate"/>
															<option value="">Alege...</option>															
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Strada <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresaSediu_strada" id="adresaSediu_strada"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Numar <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresaSediu_numar" id="adresaSediu_numar"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Cod postal
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresaSediu_codPostal" id="adresaSediu_codPostal"/>
													</div>
												</div>												
												<div class="form-group">
													<label class="control-label col-md-3"> Bloc
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresaSediu_bloc" id="adresaSediu_bloc"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Scara
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresaSediu_scara" id="adresaSediu_scara"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Etaj
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresaSediu_etaj" id="adresaSediu_etaj"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Apartament numar
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresaSediu_numarApartament" id="adresaSediu_numarApartament"/>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab3">
												<h3 class="block">Contact</h3>	
												<div class="form-group">
													<label class="control-label col-md-3"> Telefon
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="contact_telefon" id="contact_telefon"/>
													</div>
												</div>												
												<div class="form-group">
													<label class="control-label col-md-3"> Email
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="contact_email" id="contact_email"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Web site
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="contact_webSite" id="contact_webSite"/>
														<span class="help-block">
														Website (Ex. http://www.whiz.ro). </span>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab4">
												<h3 class="block">Persoana de contact</h3>	
												<div class="form-group">
													<label class="control-label col-md-3"> Nume
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="persoanaContact_nume" id="persoanaContact_nume"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Telefon
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="persoanaContact_telefon" id="persoanaContact_telefon"/>
													</div>
												</div>												
												<div class="form-group">
													<label class="control-label col-md-3"> Email
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="persoanaContact_email" id="persoanaContact_email"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> In calitate de
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="persoanaContact_calitate" id="persoanaContact_calitate"/>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab5">
												<h3 class="block">Adresa Corespondenta</h3>
												<div class="form-group">
													<label class="control-label col-md-3"> Sediu social <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<select class="form-control"  name="adresaCorespondenta_adresa" id="adresaCorespondenta_adresa" onChange="adresaCorespondenta()">	
															<option value="">Alege...</option>															
															<option value="1">Da</option>	
															<option value="0">Nu</option>	
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Judet/Sector <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<select class="form-control select2me" name="adresaCorespondenta_judetSector" id="adresaCorespondenta_judetSector" onchange="updateLocalitati('adresaCorespondenta_judetSector')">
															<option value="">Alege...</option>															
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Localitatea <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<select class="form-control select2me" name="adresaCorespondenta_localitate" id="adresaCorespondenta_localitate"/>
															<option value="">Alege...</option>															
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Strada <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresaCorespondenta_strada" id="adresaCorespondenta_strada"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Numar <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresaCorespondenta_numar" id="adresaCorespondenta_numar"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Cod postal
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresaCorespondenta_codPostal" id="adresaCorespondenta_codPostal"/>
													</div>
												</div>												
												<div class="form-group">
													<label class="control-label col-md-3"> Bloc
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresaCorespondenta_bloc" id="adresaCorespondenta_bloc"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Scara
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresaCorespondenta_scara" id="adresaCorespondenta_scara"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Etaj
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresaCorespondenta_etaj" id="adresaCorespondenta_etaj"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Apartament numar
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresaCorespondenta_numarApartament" id="adresaCorespondenta_numarApartament"/>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab6">												
												<h3 class="block">Alte detalii</h3>
												<div class="form-group">
													<label class="control-label col-md-3"> Numar Registrul Comertului
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="alteDetalii_nrRegCom" id="alteDetalii_nrRegCom"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> RO <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<select class="form-control" name="alteDetalii_RO" id="alteDetalii_RO">
															<option value="">Alege...</option>
															<option value="Da">Da</option>
															<option value="Nu">Nu</option>															
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Banca
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="alteDetalii_banca" id="alteDetalii_banca"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> IBAN
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="alteDetalii_IBAN" id="alteDetalii_IBAN"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Observatii
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="alteDetalii_observatii" id="alteDetalii_observatii"/>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab7">
												<h3 class="block">Atasare documente</h3>												
												<input type="hidden" name="CRM_addAsiguratorFurnizor" id="CRM_addAsiguratorFurnizor" value="submitted">
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