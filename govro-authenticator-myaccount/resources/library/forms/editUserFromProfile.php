<?

checkSession();

?>

<div class="row">
				<div class="col-md-10">
					<form class="form-horizontal form-row-seperated" action="#" id="editUserFromProfileForm" method="POST"  enctype="multipart/form-data">
						<div class="portlet">
							<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>Modifica profil - <?echo $getUserById["surname"] . " " . $getUserById["name"];?>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
							<div class="portlet-body">
								<div class="tabbable">
									<ul class="nav nav-tabs">
										<li class="active">
											<a href="#tab_general" data-toggle="tab">
											General </a>
										</li>
									</ul>
									<div class="tab-content no-space">
										<div class="tab-pane active" id="tab_general">
											<div class="form-body">
												<div class="form-group">
													<label class="col-md-2 control-label">Id utilizator:
													</label>
													<div class="col-md-10">
													<label class="col-md-5 control-label"><? echo $getUserById["id"];?>
													</label>
														
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">Inregistrat la data de:
													</label>
													<div class="col-md-10">
													<label class="col-md-5 control-label"><? echo $getUserById["joinDate"];?>
													</label>
														
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">Nume:
													</label>
													<div class="col-md-10">
														<input type="text" class="form-control" name="name" id="name" value="<? echo $getUserById["name"];?>">
													</label>
														
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">Prenume:
													</label>
													<div class="col-md-10">
														<input type="text" class="form-control" name="surname" id="surname" value="<? echo $getUserById["surname"];?>">
													</label>
														
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">E-mail:
													</label>
													<div class="col-md-10">
														<input type="text" class="form-control" name="email" id="email" value="<? echo $getUserById["email"];?>">
													</label>
														
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">Telefon:
													</label>
													<div class="col-md-10">
														<input type="text" class="form-control" name="phone" id="phone" value="<? echo $getUserById["phone"];?>">
													</label>
														
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">Parola noua:
													</label>
													<div class="col-md-10">
														<input type="password" class="form-control" name="password" id="password">
													</label>
														
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">Repeta parola:
													</label>
													<div class="col-md-10">
														<input type="password" class="form-control" name="rpassword" id="rpassword">
														<a onclick="showPassword()" ><i class='fa fa-search' style="float:left;"></i><div id="showPass" style="margin-left:20px;">Arata parola</div></a>
													</label>
														
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">Imagine profil:
													</label>
													<div class="col-md-10">
														<img src= "<? echo $getUserById["profileImage"];?>" style="width:100px;"/>
														<div class="col-md-4">
														<input type="file" class="form-control" name="imageProfile" id="imageprofile"/>
														<span class="help-block">
														Imagine profil (.jpg, .png, .bmp) </span>
													</div>
													</label>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn green" name="editUser" id="editUser">Submit</button>
											<a href="index.php"><button type="button" class="btn default">Cancel</button></a>
										</div>
									</div>
								</div>
							</div>
						</div>
							
					</form>
				</div>
			</div>