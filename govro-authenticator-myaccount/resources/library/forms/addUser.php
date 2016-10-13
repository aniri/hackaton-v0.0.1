<?

checkSession();

?>
<div class="row">
				<div class="col-md-12">
					<!-- BEGIN VALIDATION STATES-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>Adauga utilizator nou
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
							<form action="#"  method="POST" id="addUserForm" class="form-horizontal" enctype="multipart/form-data">
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
										<label class="control-label col-md-3">Nume <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="name" id="name" data-required="1" class="form-control"/>
										</div>
									</div><div class="form-group">
										<label class="control-label col-md-3">Prenume <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="surname" id="surname" data-required="1" class="form-control"/>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Email <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input name="email" id="email" type="text" class="form-control"/>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Telefon
										</label>
										<div class="col-md-4">
											<input name="phone" id="phone" type="text" class="form-control"/>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Imagine profil
										</label>
										<div class="col-md-4">
											<input type="file" class="form-control" name="profileImage" id="profileImage">
											<span class="help-block">
											Imagine de profil (.jpg, .png, .bmp) </span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Parola <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input name="password" id="password" type="password" class="form-control"/>
											
										</div>
									</div><div class="form-group">
										<label class="control-label col-md-3">Repeta parola <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input name="rpassword" id="rpassword" type="password" class="form-control"/>
											<a onclick="showPassword()" ><i class='fa fa-search' style="float:left;"></i><div id="showPass" style="margin-left:20px;">Arata parola</div></a>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Tip utilizator <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<select class="form-control select2me" name="userRights" id="userRights">
												<option value="">Alege...</option>
												<option value="0">Administrator</option>
												<option value="1">Management</option>
												<option value="2">Operator CC 1</option>
												<option value="3">Operator CC 2</option>
												<option value="4">Sales suport 1</option>
												<option value="5">Sales suport 2</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Activ <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<select class="form-control" name="active" id="active">
												<option value="">Alege...</option>
												<option value="1">Da</option>
												<option value="0">Nu</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn green" name="addUser" id="addUser">Submit</button>
											<a href="index.php"><button type="button" class="btn default">Cancel</button></a>
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
			