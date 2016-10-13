
<?

checkSession();

include("../resources/library/modules/CRM_distribuitors.php");

$distribuitorSettingsData = $distribuitor::CRM_loadSettings();

include("../resources/library/modules/CRM_recomandators.php");
$recomandatori = "Recomandatori";
$recomandatoriData = $recomandatori::CRM_loadAll();
$recomandatoriSettingsData = $recomandatori::CRM_loadSettings();

include("../resources/library/modules/CRM_contracts.php");
$contracte = "Contract";
$contracteData = $contracte::CRM_loadAll();
$contracteSettingsData = $contracte::CRM_loadSettings();


?>

<div class="row">
				<div class="col-md-12">
					<form class="form-horizontal form-row-seperated" action="#"  id="CRM_editDistribuitorPOST" method="POST" enctype="multipart/form-data">
						<div class="portlet">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-shopping-cart"></i><? echo " Nume distribuitor" . " - " . $distribuitorData["dateDistribuitor_numeDenumire"]; //EDIT?>
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
											Date Distribuitor </a>
										</li>
										<li> 
											<a href="#tab2" data-toggle="tab">
											Contact </a>
										</li>
										<li>
											<a href="#tab3" data-toggle="tab">
											Administrare </a>
										</li>
										<li>
											<a href="#tab4" data-toggle="tab">
											Alte detalii </a>
										</li>
										<li>
											<a href="#tab5" data-toggle="tab">
											Atasare documente </a>
										</li>
										
									</ul>
									<div class="tab-content no-space">
										<div class="tab-pane active" id="tab1">
										<h3 class="block">Date Recomandator</h3>
											<div class="form-body">
												<div class="form-group">
														<label class="col-md-2 control-label">Nume/Denumire:  <span class="required">	* </span>
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="dateDistribuitor_numeDenumire" id="dateDistribuitor_numeDenumire" value="<? echo $distribuitorData["dateDistribuitor_numeDenumire"];?>"></input>
														</div>
												</div>
												<div class="form-group">
												<label class="col-md-2 control-label">Judet/sector
												</label>
													<div class="col-md-2">
														<select class="form-control select2me" name="dateDistribuitor_judetSector" onchange="updateLocalitati('dateDistribuitor_judetSector')" id="dateDistribuitor_judetSector"/>
															<?echo '<option value="'.$distribuitorData["dateDistribuitor_judetSector"].'" selected="selected">'.$distribuitorData["dateDistribuitor_judetSector"].'</option>';
															?>
														</select>
													</div>
												</div>
												<div class="form-group">
												<label class="col-md-2 control-label"> Localitate:
												</label>
													<div class="col-md-2">
														<select class="form-control select2me" name="dateDistribuitor_localitate" id="dateDistribuitor_localitate"/>
														<?echo '<option value="'.$distribuitorData["dateDistribuitor_localitate"].'" selected="selected">'.$distribuitorData["dateDistribuitor_localitate"].'</option>';
															?>
														</select>
													</div>
												</div>
												
											</div>
										</div>	
										<div class="tab-pane" id="tab2">
											<div class="form-body">
												<div class="tab-pane active" id="tab2">
													<h3 class="block">Contact</h3>
													<div class="form-group">
														<label class="col-md-2 control-label">Telefon:  <span class="required">	* </span>
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="contact_telefon" id="contact_telefon" value="<? echo $distribuitorData["contact_telefon"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Email:  <span class="required">	* </span>
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="contact_email" id="contact_email" value="<? echo $distribuitorData["contact_email"];?>"></input>
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
														<label class="col-md-2 control-label">Comision Asigurari:  <span class="required">	* </span>
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="administrare_comisionAsigurari" id="administrare_comisionAsigurari" value="<? echo $distribuitorData["administrare_comisionAsigurari"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Comision asistenta rutiera:  <span class="required">	* </span>
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="administrare_comisionAsistentaRutiera" id="administrare_comisionAsistentaRutiera" value="<? echo $distribuitorData["administrare_comisionAsistentaRutiera"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Comision alte produse:  <span class="required">	* </span>
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="administrare_comisionAlteProduse" id="administrare_comisionAlteProduse" value="<? echo $distribuitorData["administrare_comisionAlteProduse"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Status: <span class="required"> * </span>
														</label>
														<div class="col-md-2">
															<select class="form-control select2me" name="administrare_status" id="administrare_status">
																<option value="">Alege...</option>
																<?
																showEditModuleSettings($distribuitorSettingsData, 'status', $distribuitorData["administrare_status"]);
																?>
															</select>															
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Contract: <span class="required"> * </span>
														</label>
														<div class="col-md-2">
															<select class="form-control select2me" name="administrare_contract" id="administrare_contract">
																<option value="">Alege...</option>
																<?
																showEditModuleSettings($distribuitorSettingsData, 'contract', $distribuitorData["administrare_contract"]);
																?>
															</select>															
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Data initiala: 
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="administrare_dataInitiala" id="administrare_dataInitiala" readonly="true" value="<? echo $distribuitorData["administrare_dataInitiala"];?>"></input>
														</div>
													</div>
												</div>
											</div>
										</div>
										
										<div class="tab-pane" id="tab4">
											<div class="from-body">
												<div class="tab-pane active" id="tab4">
												<h3 class="block">Alte detalii</h3>
													<div class="form-group">
														<label class="col-md-2 control-label">Observatii: 
														</label>
														<div class="col-md-2">
																<input type="text" class="form-control" name="alteDetalii_observatii" id="alteDetalii_observatii" value="<? echo $distribuitorData["alteDetalii_observatii"];?>"></input>
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
						<input type="hidden" name="viewEdit" value="submited">
					</form>
				</div>
			</div>