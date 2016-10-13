<?php
checkSession();

include("../resources/library/modules/CRM_products.php");
$produse = "Produse";
$produseSettings = $produse::CRM_loadSettings();
?>
<div class="row">
				<div class="col-md-4">
					<!-- BEGIN VALIDATION STATES-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>Adauga setari produse
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="#"  method="POST" id="addSProductSettingsForm" class="form-horizontal" enctype="multipart/form-data">
								<div class="form-body">
									<div class="alert alert-danger display-hide">
										<button class="close" data-close="alert"></button>
										Sunt cateva erori de completare. Te rugam sa le verifici.
									</div>
									<div class="alert alert-success display-hide">
										<button class="close" data-close="alert"></button>
										Formularul a fost completat cu succes!
									</div>
									<div class="form-group">
										<label class="control-label col-md-3"> Tip Setare  <span class="required">	* </span>
										</label>
										<div class="col-md-8">
											<select class="form-control" name="type" id="type">
												<option value="">Alege...</option>
													<?php
														$i=0;
														foreach ($produseSettings as $name => $value)
														{
															$settingList["type"][$i] = $name;
															foreach($value as $name2 => $data)
															{
																$settingList["name"][$i] = $data["name"];
															}
															echo "<option value='".$settingList["type"][$i]."'>" . $settingList["name"][$i] . "</option>";
															$i++;
														}
														
													?>
											</select>
										</div>
									</div>	
									<div class="form-group">
										<label class="control-label col-md-3">Alias <span class="required">
										* </span>
										</label>
										<div class="col-md-8">
											<input type="text" name="alias" id="alias" data-required="1" class="form-control"/>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Valoare <span class="required">
										* </span>
										</label>
										<div class="col-md-8">
											<input type="text" name="value" id="value" data-required="1" class="form-control"/>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3"> Is default <span class="required">	* </span>
										</label>
										<div class="col-md-8">
											<select class="form-control" name="isDefault" id="isDefault">
											<option value="">Alege...</option>
											<option value="true">Da</option>
											<option value="">Nu</option>
											</select>
										</div>
									</div>
																
								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-4 col-md-9">
											<button type="submit" class="btn green" name="CRM_addProdactSettings" id="CRM_addProdactSettings">Trimite</button>
										</div>
									</div>
								</div>
							</form>
							<!-- END FORM-->
						</div>
					</div>
					<!-- END VALIDATION STATES-->
				</div>
			</div>