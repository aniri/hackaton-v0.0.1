<?php
checkSession();
?>
<div class="row">
				<div class="col-md-4">
					<!-- BEGIN VALIDATION STATES-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>Adauga setari generale
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
							<form action="#"  method="POST" id="addIconForm" class="form-horizontal" enctype="multipart/form-data">
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
											<select class="form-control" name="tip_setare" id="tip_setare">
												<option value="">Alege...</option>
												
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
										<label class="control-label col-md-3"> Is default</label> 
										<div class="col-md-8"> 
											<div class="icheck-inline">
												<label><input type="checkbox" class="icheck">Da</label>
												<label><input type="checkbox" class="icheck">Nu</label>
											</div>
										</div>
									</div>						
																
								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-4 col-md-9">
											<button type="submit" class="btn green" name="addIcon" id="addIcon">Trimite</button>
											
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