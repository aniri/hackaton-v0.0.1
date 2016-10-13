<?

checkSession();
include("../resources/library/modules/CRM_asiguratorFurnizors.php");
$furnizori = "Asigurator";
$furnizoriData = $furnizori::CRM_loadAll();

include("../resources/library/modules/CRM_products.php");
$produse = "Produse";
$produseDataSettings = $produse::CRM_loadSettings();
?>

<div class="row">
				<div class="col-md-12">
					<form class="form-horizontal form-row-seperated" action="#" id="CRM_editProductPOST" method="POST" enctype="multipart/form-data">
						<div class="portlet">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-shopping-cart"></i><? echo $productData["dateProdus_denumire"] . " - " . $productData["idProduct"]; //EDIT?>
								</div>
								<div class="actions btn-set">
									<button type="button" name="back" class="btn default" onclick="goBack()"><i class="fa fa-angle-left"></i> Inapoi</button>
									<button type="button" name="refresh" class="btn default" onclick="refresh()"><i class="fa fa-reply"></i> Reincarca</button>
									<button type="submit" class="btn green" ><i class="fa fa-check"></i> Salveaza</button>
								</div>
							</div>
							<div class="portlet-body">
								<div class="tabbable">
									<ul class="nav nav-tabs">
										<li class="active">
											<a href="#tab1" data-toggle="tab">
											Date produs </a>
										</li>
										<li>
											<a href="#tab2" data-toggle="tab">
											Atasare documente </a>
										</li>
										
									</ul>
									<div class="tab-content no-space">
										<div class="tab-pane active" id="tab1">
										<h3 class="block">Date produs</h3>
											<div class="form-body">
												<div class="form-group">
													<label class="col-md-2 control-label">Id:
													</label>
													<div class="col-md-2">
													<label class="col-md-2 control-label"><? echo $productData["idProduct"];?>
													</label>	
													</div>
												</div>
												<div class="form-group">
													<div class="form-group">
														<label class="col-md-2 control-label">Categorie: <span class="required"> * </span> </label>
														<div class="col-md-2">
															<select class="form-control select2me" name="dateProdus_categorie" id="dateProdus_categorie" >
																<option value="">Alege...</option>
																<?
																showEditModuleSettings($produseDataSettings, 'categoriiProduse', $productData["dateProdus_categorie"]);
																?>
															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Tip produs:</label>
														<div class="col-md-2">
															<select class="form-control select2me" name="dateProdus_tipProdus" id="dateProdus_tipProdus" >
																<option value="">Alege...</option>
																<?
																showEditModuleSettings($produseDataSettings, 'tipuriProduse', $productData["dateProdus_tipProdus"]);
																?>
															</select>
														</div>														
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Furnizor:</label>
														<div class="col-md-2">
														<select class="form-control select2me" name="dateProdus_furnizor" id="dateProdus_furnizor" onchange='updateFieldData("beneficii")'/>
															<option value="">Alege...</option>
															<?foreach ($furnizoriData as $value){
																
																if ($value["asiguratorFurnizorId"] == $productData["dateProdus_furnizor"]){
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
														<label class="col-md-2 control-label">Denumire: <span class="required"> * </span></label>
														<div class="col-md-2">
															<input type="text" class="form-control" name="dateProdus_denumire" id="dateProdus_denumire" value="<? echo $productData["dateProdus_denumire"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Tip pret:<span class="required"> * </span> </label>
														<div class="col-md-2">
															<select class="form-control select2me" name="dateProdus_tipPret" id="dateProdus_tipPret" >
																<option value="">Alege...</option>
																<?
																showEditModuleSettings($produseDataSettings, 'tipPret', $productData["dateProdus_tipPret"]);
																?>
															</select>
															
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Pret standard:</label>
														<div class="col-md-2">
															<input type="text" class="form-control" name="dateProdus_pretStandardMediu" id="dateProdus_pretStandardMediu" value="<? echo $productData["dateProdus_pretStandardMediu"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Tip comision: <span class="required"> * </span></label>
														<div class="col-md-2">
															<select class="form-control select2me" name="dateProdus_tipComision" id="dateProdus_tipComision" >
																<option value="">Alege...</option>
																<?
																showEditModuleSettings($produseDataSettings, 'tipComision', $productData["dateProdus_tipComision"]);
																?>
															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Valoare comision: <span class="required"> * </span></label>
														<div class="col-md-2">
															<input type="text" class="form-control" name="dateProdus_valoareComision" id="dateProdus_valoareComision" value="<? echo $productData["dateProdus_valoareComision"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Observatii:</label>
														<div class="col-md-2">
															<input type="text" class="form-control" name="dateProdus_observatii" id="dateProdus_observatii" value="<? echo $productData["dateProdus_observatii"];?>"></input>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Status: <span class="required"> * </span></label>
														<div class="col-md-2">
															<select class="form-control select2me" name="dateProdus_status" id="dateProdus_status" >
																<option value="">Alege...</option>
																<?
																showEditModuleSettings($produseDataSettings, 'status', $productData["dateProdus_status"]);
																?>
															</select>															
														</div>
													</div>
												</div>
											</div>
										</div>	
										<div class="tab-pane" id="tab2">
											<div class="form-body">
												<div class="tab-pane active" id="tab2">
													<h3 class="block">Atasare documente</h3>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<input type="hidden" name="viewEditProduct" value="submited">
					</form>
				</div>
			</div>