<?
checkSession();

include("../resources/library/modules/CRM_asiguratorFurnizors.php");
$furnizori = "Asigurator";
$furnizoriData = $furnizori::CRM_loadAll();
?>

<div class="row">
				<div class="col-md-12">
					<form class="form-horizontal form-row-seperated" action="#" id="CRM_editSucursaleFurnizorPOST" method="POST" enctype="multipart/form-data">
						<div class="portlet">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-shopping-cart"></i><? echo $sucursaleData["dateSucursaleFurnizor_denumire"] . " - " . $sucursaleData["dateSucursaleFurnizor_furnizor"]; //EDIT?>
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
											Date Sucursale Furnizor </a>
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
											Alte detalii </a>
										</li>
										<li>
											<a href="#tab6" data-toggle="tab">
											Atasare documente </a>
										</li>
										
									</ul>
									<div class="tab-content no-space">
										<div class="tab-pane active" id="tab1">
										<h3 class="block">Date Sucursale Furnizor</h3>
											<div class="form-body">
												<div class="form-group">
														<label class="col-md-2 control-label">Furnizor: <span class="required"> * </span> </label>
														<div class="col-md-2">
															<select class="form-control select2me" name="dateSucursaleFurnizor_furnizor" id="dateSucursaleFurnizor_furnizor">
															<option value="">Alege...</option>
															<?foreach ($furnizoriData as $value){
																
																if ($value["asiguratorFurnizorId"] == $sucursaleData["dateSucursaleFurnizor_furnizor"]){
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
													<label class="col-md-2 control-label">Denumire: <span class="required"> * </span> 
													</label>
													<div class="col-md-2">
															<input type="text" class="form-control" name="dateSucursaleFurnizor_denumire" id="dateSucursaleFurnizor_denumire" value="<? echo $sucursaleData["dateSucursaleFurnizor_denumire"];?>"></input>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-2 control-label"> Status <span class="required">	* </span>
													</label>
													<div class="col-md-2">														
														<select class="form-control" name="dateSucursaleFurnizor_status" id="dateSucursaleFurnizor_status">
														<?	switch($sucursaleData["dateSucursaleFurnizor_status"]){case "Activ": echo '<option value="Activ" selected="selected">Activ</option>
															<option value="Inactiv">Inactiv</option>'; break; case "Inactiv": echo '<option value="Activ">Activ</option>
															<option value="Inactiv" selected="selected">Inactiv</option>'; break; }?>
														</select>
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
															<?echo '<option value="'.$sucursaleData["adresaSediu_judetSector"].'" selected="selected">'.$sucursaleData["adresaSediu_judetSector"].'</option>';
																?>														
														</select>
													</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Localitate: <span class="required"> * </span> 
														</label>
														<div class="col-md-2">
															<select class="form-control select2me" name="adresaSediu_localitate" id="adresaSediu_localitate">
															<?echo '<option value="'.$sucursaleData["adresaSediu_localitate"].'" selected="selected">'.$sucursaleData["adresaSediu_localitate"].'</option>';
																?>
															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Strada: <span class="required"> * </span> 
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="adresaSediu_strada" id="adresaSediu_strada" value="<? echo $sucursaleData["adresaSediu_strada"];?>"></input>
														</div>
													</div>	
													<div class="form-group">
														<label class="col-md-2 control-label">Numar: <span class="required"> * </span> 
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="adresaSediu_numarApartament" id="adresaSediu_numarApartament" value="<? echo $sucursaleData["adresaSediu_numarApartament"];?>"></input>
														</div>
													</div>	
													<div class="form-group">
														<label class="col-md-2 control-label">Cod Postal: 
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="adresaSediu_codPostal" id="adresaSediu_codPostal" value="<? echo $sucursaleData["adresaSediu_codPostal"];?>"></input>
														</div>
													</div>	
													<div class="form-group">
														<label class="col-md-2 control-label">Bloc:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="adresaSediu_bloc" id="adresaSediu_bloc" value="<? echo $sucursaleData["adresaSediu_bloc"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Scara:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="adresaSediu_scara" id="adresaSediu_scara" value="<? echo $sucursaleData["adresaSediu_scara"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Etaj: 
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="adresaSediu_etaj" id="adresaSediu_etaj" value="<? echo $sucursaleData["adresaSediu_etaj"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Apartament numar:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="adresaSediu_apNr" id="adresaSediu_apNr" value="<? echo $sucursaleData["adresaSediu_numarApartament"];?>"></input>
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
																<input type="text" class="form-control" name="contact_telefon" id="contact_telefon" value="<? echo $sucursaleData["contact_telefon"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Email:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="contact_email" id="contact_email" value="<? echo $sucursaleData["contact_email"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Web site:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="contact_webSite" id="contact_webSite" value="<? echo $sucursaleData["contact_webSite"];?>"></input>
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
																<input type="text" class="form-control" name="persoanaContact_nume" id="persoanaContact_nume" value="<? echo $sucursaleData["persoanaContact_nume"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Telefon:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="persoanaContact_telefon" id="persoanaContact_telefon" value="<? echo $sucursaleData["persoanaContact_telefon"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Email:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="persoanaContact_email" id="persoanaContact_email" value="<? echo $sucursaleData["persoanaContact_email"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">In calitate de:
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="persoanaContact_calitate" id="persoanaContact_calitate" value="<? echo $sucursaleData["persoanaContact_calitate"];?>"></input>
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
														<label class="col-md-2 control-label">Observatii: 
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="alteDetalii_observatii" id="alteDetalii_observatii" value="<? echo $sucursaleData["alteDetalii_observatii"];?>"></input>
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