<?

checkSession();

include("../resources/library/modules/CRM_products.php");
$produse = "Produse";
$produseData = $produse::CRM_loadAll();

include("../resources/library/modules/CRM_clients.php");
$clienti = "Clienti";
$clientiData = $clienti::CRM_loadAllClients();

include("../resources/library/modules/CRM_programBeneficiis.php");
$beneficii = "Beneficii";
$beneficiiData = $beneficii::CRM_loadAll();

include("../resources/library/modules/CRM_agents.php");
$agenti = "Agenti";
$agentiData = $agenti::CRM_loadAll();

include("../resources/library/modules/CRM_angajatis.php");
$angajati = "Angajati";
$angajatiData = $angajati::CRM_loadAll();

include("../resources/library/modules/CRM_cerereOfertas.php");
$CereriOferte = "CerereOferta";
$CereriOferteData = $CereriOferte::CRM_loadAll();

?>
<div class="row">
				<div class="col-md-12">
					<div class="portlet box blue" id="addBeneficiiForm">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Adaugare setari cerere oferta - <span class="step-title">
								Pas 1 </span>
							</div>
							<div class="tools hidden-xs">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body form">
							<form action="#" class="form-horizontal" id="CRM_addRequestsListOfferPOST" method="POST" enctype="multipart/form-data">
								<div class="form-wizard">
									<div class="form-body">
										<ul class="nav nav-pills nav-justified steps">
											<li>
												<a href="#tab1" data-toggle="tab" class="step">
												<span class="number">
												1 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Setari cerere oferta </span>
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
												<h3 class="block">Date cerere oferta</h3>	
												
												<div class="form-group">
													<label class="control-label col-md-3"> Setari transmitere oferta
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="dateCerereOferta_dataTransmitereOferta" id="dateCerereOferta_dataTransmitereOferta" disabled="disabled"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Tip cerere oferta <span class="required">	* </span>
													</label>
													<div class="col-md-4">
														<select class="form-control" name="dateCerereOferta_tipCerereOferta" id="dateCerereOferta_tipCerereOferta">
															<option value="">Alege...</option>
															<option value="email">Email</option>
															<option value="telefon">Telefon</option>
															<option value="reinnoire">Reinnoire</option>
															<option value="direct">Direct</option>
															<option value="altele">Altele</option>															
														</select>
													</div>
												</div>																							
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