<div class="row" style="margin-bottom:25px;">
				<div class="col-md-11 col-sm-11">
					<!-- BEGIN PORTLET-->
					<div class="pull-right">
						<div id="dashboard-report-range" class="tooltips btn btn-sm btn-default" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
							<i class="icon-calendar"></i>&nbsp; <span class="thin uppercase visible-lg-inline-block"></span>&nbsp; <i class="fa fa-angle-down"></i>
						</div>
						<div class="btn-group">
							<button type="button" class="btn btn-default btn-left dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-ellipsis-horizontal"></i> Toti <i class="fa fa-angle-down"></i>
							</button>
							<ul class="dropdown-menu">
								<li>
									<a href="javascript:;">
									Distribuitor 1</a>
								</li>
								<li>
									<a href="javascript:;">
									Distribuitor 2 </a>
								</li>
							</ul>
						</div>
					</div>	
					<!-- END PORTLET-->
				</div>
				
			</div>
			<div class="row">
				<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue-madison">
						<div class="visual">
							<i class="fa fa-comments"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php echo $dashboardController[0]["T1"];?>
							</div>
							<div class="desc">
								Nr. cereri
							</div>
						</div>
						
					</div>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
					<div class="dashboard-stat red-intense">
						<div class="visual">
							<i class="fa fa-bar-chart-o"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php echo $dashboardController[0]["T2"];?>
							</div>
							<div class="desc">
								 Nr. cereri in asteptare
							</div>
						</div>
						
					</div>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
					<div class="dashboard-stat green">
						<div class="visual">
							<i class="fa fa-globe"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php echo $dashboardController[0]["T3"];?>
							</div>
							<div class="desc">
								  Nr. oferte in asteptare
							</div>
						</div>
						
					</div>
				</div>
				
				<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
					<div class="dashboard-stat green-haze">
						<div class="visual">
							<i class="fa fa-shopping-cart"></i>
						</div>
						<div class="details">
							<div class="number">
								  <?php echo $dashboardController[0]["T4"];?> RON
							</div>
							<div class="desc">
								 Nr. polite emise
							</div>
						</div>
						
					</div>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
					<div class="dashboard-stat purple-plum">
						<div class="visual">
							<i class="fa fa-globe"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php echo ($dashboardController[0]["T5full"] +  $dashboardController[0]["T5r1"]);?>
							</div>
							<div class="desc">
								 Val. prime incasate
							</div>
						</div>
						
					</div>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
					<div class="dashboard-stat yellow">
						<div class="visual">
							<i class="fa fa-comments"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php echo ($dashboardController[0]["T6neg"] +  $dashboardController[0]["T6full"]);?>
							</div>
							<div class="desc">
								Valoare comision
							</div>
						</div>
						
					</div>
				</div>
				
			</div>
			<!-- END DASHBOARD STATS -->
			<div class="clearfix">
			</div>
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<!-- BEGIN PORTLET-->
					<div class="portlet light ">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-bar-chart font-green-haze"></i>
								<span class="caption-subject bold  font-green-haze"> Polite noi</span>
								<span class="caption-helper">(6 luni)</span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="fullscreen">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div id="z2g1" class="chart" style="height: 500px;">
							</div>
						</div>
					</div>
					<!-- END PORTLET-->
				</div>
				<div class="col-md-6 col-sm-6">
                           <div class="portlet light ">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-bar-chart font-green-haze"></i>
								<span class="caption-subject bold uppercase font-green-haze"> Reinoiri</span>
								<span class="caption-helper">(6 luni)</span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="fullscreen">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div id="z2g2" class="chart" style="height: 500px;">
							</div>
						</div>
					</div>
                        </div>
			</div>
			<div class="row">
				<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
					<div class="dashboard-stat2 ">
						<div class="display">
							<div class="number">
								<h3 class="font-green-sharp">
									<span data-counter="counterup" data-value=""><?php echo $dashboardController[1]["T1"];?></span>
								
								</h3>
								<small>Rata raspuns</small>
							</div>
							<div class="icon">
								<i class="icon-pie-chart"></i>
							</div>
						</div>
						<div class="progress-info">
							<div class="progress">
								<span style="width: <?php echo $dashboardController[2]["T1"];?>%;" class="progress-bar progress-bar-success green-sharp">
									<span class="sr-only"><?php echo $dashboardController[2]["T1"];?>% progress</span>
								</span>
							</div>
							<div class="status">
								<div class="status-title"> progress </div>
								<div class="status-number"> <?php echo $dashboardController[2]["T1"];?>% </div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
					<div class="dashboard-stat2 ">
						<div class="display">
							<div class="number">
								<h3 class="font-green-sharp">
									<span data-counter="counterup" data-value=""><?php echo $dashboardController[1]["T2"];?></span>
									
								</h3>
								<small>Rata de conversie</small>
							</div>
							<div class="icon">
								<i class="icon-pie-chart"></i>
							</div>
						</div>
						<div class="progress-info">
							<div class="progress">
								<span style="width: <?php echo $dashboardController[2]["T2"];?>%;" class="progress-bar progress-bar-success green-sharp">
									<span class="sr-only"><?php echo $dashboardController[2]["T2"];?>% progress</span>
								</span>
							</div>
							<div class="status">
								<div class="status-title"> progress </div>
								<div class="status-number"> <?php echo $dashboardController[2]["T2"];?>% </div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
					<div class="dashboard-stat2 ">
						<div class="display">
							<div class="number">
								<h3 class="font-red-haze">
									<span data-counter="counterup" data-value="1349"><?php echo $dashboardController[1]["T3"];?></span>
								</h3>
								<small>Rata de reinoire	</small>
							</div>
							<div class="icon">
								<i class="icon-like"></i>
							</div>
						</div>
						<div class="progress-info">
							<div class="progress">
								<span style="width: <?php echo $dashboardController[2]["T3"];?>%;" class="progress-bar progress-bar-success red-haze">
									<span class="sr-only"><?php echo $dashboardController[2]["T3"];?>% progress</span>
								</span>
							</div>
							<div class="status">
								<div class="status-title"> progress </div>
								<div class="status-number"> <?php echo $dashboardController[2]["T3"];?>% </div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
					<div class="dashboard-stat2 ">
						<div class="display">
							<div class="number">
								<h3 class="font-blue-sharp">
									<span data-counter="counterup" data-value="5267"><?php echo $dashboardController[1]["T4"];?></span>
								</h3>
								<small>Polite emise </small>
							</div>
							
						</div>
						<div class="progress-info">
							<div class="progress">
								<span style="width: <?php echo $dashboardController[2]["T4"];?>%;" class="progress-bar progress-bar-success blue-sharp">
									<span class="sr-only"><?php echo $dashboardController[2]["T4"];?>% progress</span>
								</span>
							</div>
							<div class="status">
								<div class="status-title"> progress </div>
								<div class="status-number"> <?php echo $dashboardController[2]["T4"];?>% </div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
					<div class="dashboard-stat2 ">
						<div class="display">
							<div class="number">
								<h3 class="font-purple-soft">
									<span data-counter="counterup" data-value="276"><?php echo $dashboardController[1]["T5"];?></span>
								</h3>
								<small>Val. prime incasate</small>
							</div>
							<div class="icon">
								<i class="icon-user"></i>
							</div>
						</div>
						<div class="progress-info">
							<div class="progress">
								<span style="width: <?php echo $dashboardController[2]["T5"];?>%;" class="progress-bar progress-bar-success purple-soft">
									<span class="sr-only"><?php echo $dashboardController[2]["T5"];?>% progress</span>
								</span>
							</div>
							<div class="status">
								<div class="status-title"> progress </div>
								<div class="status-number"> <?php echo $dashboardController[2]["T5"];?>% </div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
					<div class="dashboard-stat2 ">
						<div class="display">
							<div class="number">
								<h3 class="font-green-sharp">
									<span data-counter="counterup" data-value=""><?php echo $dashboardController[1]["T6"];?></span>
									<small class="font-green-sharp">RON</small>
								</h3>
								<small>Valoare comision</small>
							</div>
							<div class="icon">
								<i class="icon-pie-chart"></i>
							</div>
						</div>
						<div class="progress-info">
							<div class="progress">
								<span style="width: <?php echo $dashboardController[2]["T6"];?>%;" class="progress-bar progress-bar-success green-sharp">
									<span class="sr-only"><?php echo $dashboardController[2]["T6"];?>% progress</span>
								</span>
							</div>
							<div class="status">
								<div class="status-title"> progress </div>
								<div class="status-number"> <?php echo $dashboardController[2]["T6"];?>% </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<!-- BEGIN PORTLET-->
					<div class="portlet light ">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-bar-chart font-green-sharp hide"></i>
								<span class="caption-subject font-green-sharp bold uppercase">Prime</span>
								<span class="caption-helper">(12 luni)</span>
							</div>
							<div class="actions">
								<div class="btn-group btn-group-devided" data-toggle="buttons">
									<label class="btn btn-transparent grey-salsa btn-circle btn-sm active">
									<input type="radio" name="options" class="toggle" id="option1">New</label>
									<label class="btn btn-transparent grey-salsa btn-circle btn-sm">
									<input type="radio" name="options" class="toggle" id="option2">Returning</label>
								</div>
							</div>
						</div>
						<div class="portlet-body">
							<div id="site_statistics_loading">
								<img src="../../assets/admin/layout/img/loading.gif" alt="loading"/>
							</div>
							<div id="site_statistics_content" class="display-none">
								<div id="site_statistics" class="chart">
								</div>
							</div>
						</div>
					</div>
					<!-- END PORTLET-->
				</div>
				<div class="col-md-6 col-sm-6">
					<!-- BEGIN PORTLET-->
					<div class="portlet light ">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-share font-red-sunglo hide"></i>
								<span class="caption-subject font-red-sunglo bold uppercase">Comisioane</span>
								<span class="caption-helper">(12 luni)</span>
							</div>
							<div class="actions">
								<div class="btn-group">
									<a href="" class="btn grey-salsa btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
									Filter Range<span class="fa fa-angle-down">
									</span>
									</a>
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="javascript:;">
											Q1 2014 <span class="label label-sm label-default">
											past </span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
											Q2 2014 <span class="label label-sm label-default">
											past </span>
											</a>
										</li>
										<li class="active">
											<a href="javascript:;">
											Q3 2014 <span class="label label-sm label-success">
											current </span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
											Q4 2014 <span class="label label-sm label-warning">
											upcoming </span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="portlet-body">
							<div id="site_activities_loading">
								<img src="../../assets/admin/layout/img/loading.gif" alt="loading"/>
							</div>
							<div id="site_activities_content" class="display-none">
								<div id="site_activities" style="height: 228px;">
								</div>
							</div>
							<div style="margin: 20px 0 10px 30px">
								<div class="row">
									<div class="col-md-3 col-sm-3 col-xs-6 text-stat">
										<span class="label label-sm label-success">
										Revenue: </span>
										<h3>$13,234</h3>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-6 text-stat">
										<span class="label label-sm label-info">
										Tax: </span>
										<h3>$134,900</h3>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-6 text-stat">
										<span class="label label-sm label-danger">
										Shipment: </span>
										<h3>$1,134</h3>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-6 text-stat">
										<span class="label label-sm label-warning">
										Orders: </span>
										<h3>235090</h3>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END PORTLET-->
				</div>
			</div>