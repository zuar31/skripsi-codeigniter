<div class="page">
	<div class="page-header">
		<h1 class="page-title">Clustering K-Means</h1>
		<div class="page-header-actions">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo base_url()?>">Home</a></li>
				<li class="breadcrumb-item active">Clustering K-Means</li>
			</ol>
		</div>
	</div>
	<div class="page-content">

		<!-- Panel Basic -->
		<div class="panel">
			<header class="panel-heading">
				<div class="panel-actions"></div>
				<!-- <h3 class="panel-title">Basic</h3> -->
			<!-- 	<div class="row col-md-12">
					<div class="col-md-6">
					</div>
					<div class="col-md-6" style="text-align: right">
						<br/>
						<a class="btn btn-primary " style="color:white" onclick="add_data()"><i class="icon glyphicon glyphicon-plus" aria-hidden="true"></i>Add</a>
						<a class="btn btn-outline-primary" onclick="refresh()"><i class="icon glyphicon glyphicon-refresh" aria-hidden="true"></i>Refresh</a>
					</div> 
				</div> -->
			</header>
			<br/>
			<div class="panel-body">
				<div class="example-wrap">
					<div class="example datepair-wrap" data-plugin="datepair">
						<form action="<?php echo base_url('index.php/clustering/calculate'); ?>" id="form" method="POST"> 
							<div class="form-group row">
								<div class="col-sm-2" ><b>Filter Pencarian</b></div>
								<div class="col-md-2" style="text-align:left;">
									<div class="input-daterange-wrap">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="icon wb-calendar" aria-hidden="true"></i>
											</span>
											<input type="text" value="<?php echo isset($start_date)?date('m/d/Y',strtotime($start_date)):date('m/d/Y'); ?>" class="form-control datepair-date datepair-start" name="start_date" data-plugin="datepicker" id="tanggal">
										</div>
									</div>
								</div>
								<div class="col-md-4" style="text-align:left;">
									<div class="input-daterange-wrap">
										<div class="input-daterange">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="icon wb-time" aria-hidden="true"></i>
												</span>
												<input type="text" value="<?php echo isset($start_date)?date('00:00:00',strtotime($start_date)):date('00:00:00'); ?>" class="form-control datepair-time datepair-start" name="start_time" data-plugin="timepicker"
												/>
											</div>
											<div class="input-group">
												<span class="input-group-addon">
													<i class="icon wb-time" aria-hidden="true"></i>
												</span>
												<input type="text" value="<?php echo isset($end_time)?date('23:59:00',strtotime($end_time)):date('23:59:00'); ?>" class="form-control datepair-time datepair-end" name="end_time" data-plugin="timepicker"
												/>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4" style="text-align:left;">
									<div class="col-md-8 text-left">
										<button type="submit" id="submit" class="btn btn-primary btn-md">Proses</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

		</div>
		<!-- End Panel Basic -->
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tanggal').datepicker({
                        // placement: 'button',
                        format: "mm/dd/yyyy",
                        align: 'left',
                        autoclose: true,
                        orientation: "right bottom"
                    })
		$('#form').one('submit',function(e){
			if(!confirm("Apakah anda yakin lanjutn ke proses berikutnya?")){
				event.preventDefault();
			}
		})
	})
</script>
