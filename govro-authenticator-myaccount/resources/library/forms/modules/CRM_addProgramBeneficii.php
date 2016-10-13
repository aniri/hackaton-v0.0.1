<?

checkSession();

?>
<div class="row">
				<div class="col-md-12">
					<div class="portlet box blue" id="addBeneficiiForm">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Adaugare Progam de Beneficii - <span class="step-title">
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
							<form action="#" class="form-horizontal" id="CRM_addProgramBeneficiiPOST" method="POST" enctype="multipart/form-data">
								<div class="form-wizard">
									<div class="form-body">
										<ul class="nav nav-pills nav-justified steps">
											<li>
												<a href="#tab1" data-toggle="tab" class="step">
												<span class="number">
												1 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Date Program </span>
												</a>
											</li>
											<li>
												<a href="#tab2" data-toggle="tab" class="step">
												<span class="number">
												2</span>
												<span class="desc">
												<i class="fa fa-check"></i> Adresa domiciliu/sediu </span>
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
												<h3 class="block">Date Program</h3>
												<div class="form-group">
													<label class="control-label col-md-3"> Nume <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dateProgramBeneficii_numeProgram" id="dateProgramBeneficii_numeProgram"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Logo  
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dateProgramBeneficii_logo" id="dateProgramBeneficii_logo"/>
													</div>
												</div>																							
											</div>
											<div class="tab-pane" id="tab2">
												<h3 class="block">Adresa domiciliu/sediu</h3>	
												<div class="form-group">
													<label class="control-label col-md-3"> Judet/Sector 
													</label>
													<div class="col-md-4">
														<select class="form-control select2me" name="adresaDomiciliuSediu_judetSector" id="adresaDomiciliuSediu_judetSector"/>
															<option value="">Alege...</option>															
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Localitatea 
													</label>
													<div class="col-md-4">
														<select class="form-control select2me" name="adresaDomiciliuSediu_localitate" id="adresaDomiciliuSediu_localitate"/>
															<option value="">Alege...</option>															
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Strada
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresaDomiciliuSediu_strada" id="adresaDomiciliuSediu_strada"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Numar
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresaDomiciliuSediu_numar" id="adresaDomiciliuSediu_numar"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Cod postal
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresaDomiciliuSediu_codPostal" id="adresaDomiciliuSediu_codPostal"/>
													</div>
												</div>												
												<div class="form-group">
													<label class="control-label col-md-3"> Bloc
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresaDomiciliuSediu_bloc" id="adresaDomiciliuSediu_bloc"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Scara
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresaDomiciliuSediu_scara" id="adresaDomiciliuSediu_scara"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Etaj
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresaDomiciliuSediu_etaj" id="adresaDomiciliuSediu_etaj"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Apartament numar
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="adresaDomiciliuSediu_apNr" id="adresaDomiciliuSediu_apNr"/>
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
													<label class="control-label col-md-3"> Email<span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="contact_email" id="contact_email"/>
													</div>
												</div>												
											</div>
											<div class="tab-pane" id="tab4">
												<h3 class="block">Persoana de contact</h3>	
												<div class="form-group">
													<label class="control-label col-md-3"> Nume
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="persoanaDeContact_nume" id="persoanaDeContact_nume"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Telefon
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="persoanaDeContact_telefon" id="persoanaDeContact_telefon"/>
													</div>
												</div>												
												<div class="form-group">
													<label class="control-label col-md-3"> Email
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="persoanaDeContact_email" id="persoanaDeContact_email"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> In calitate de
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="persoanaDeContact_inCalitate" id="persoanaDeContact_inCalitate"/>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab5">
												<h3 class="block">Administrare</h3>												
												<div class="form-group">
													<label class="control-label col-md-3">Tip beneficiar <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<select class="form-control" name="administrare_tipBeneficiari" id="administrare_tipBeneficiari">
															<option value="">Alege...</option>
															<option value="Angajati">Angajati</option>
															<option value="Utilizatori">Utilizatori</option>
															<option value="Parteneri">Parteneri</option>																													
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Agent <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<select class="form-control" name="administrare_agent" id="administrare_agent">
															<option value="">Alege...</option>
															<option value="1">1</option>
															<option value="2">2</option>															
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Telefon dedicat <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="administrare_telefonDedicat" id="administrare_telefonDedicat"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Email dedicat <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="administrare_emailDedicat" id="administrare_emailDedicat"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Site dedicat <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<select class="form-control" name="administrare_siteDedicat" id="administrare_siteDedicat">
															<option value="">Alege...</option>
															<option value="Nu">Nu</option>
															<option value="Simplu">Simplu</option>
															<option value="Extins">Extins</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Contract <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<select class="form-control" name="administrare_contract" id="administrare_contract">
															<option value="">Alege...</option>
															<option value="Da">Da</option>
															<option value="Nu">Nu</option>															
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Data initiala
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="administrare_dataInitiala" id="administrare_dataInitiala"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Status <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<select class="form-control" name="administrare_status" id="administrare_status">
															<option value="">Alege...</option>
															<option value="Da">Activ</option>
															<option value="Nu">Inactiv</option>															
														</select>
													</div>
												</div>
											</div>											
											<div class="tab-pane" id="tab6">
												<h3 class="block">Atasare documente</h3>												
												<input type="hidden" name="CRM_addProgramBeneficii" id="CRM_addProgramBeneficii" value="submitted">
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