<div class="page">
	<div class="page-header">
		<h1 class="page-title">Rekap</h1>
		<div class="page-header-actions">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo base_url()?>">Home</a></li>
				<li class="breadcrumb-item active">Rekap</li>
			</ol>
		</div>
	</div>
	<div class="page-content">
		<!-- Panel Basic -->
		<div class="panel">
			<header class="panel-heading">
				<div class="panel-actions"></div>
				<!-- <h3 class="panel-title">Basic</h3> -->
				<div class="row col-md-12">
					<div class="col-md-6"></div>                         
				</div>
			</header>
			<br/>
			<div class="panel-body">
				<table class="table table-hover dataTable table-bordered w-full" id="tabel">
					<thead>
						<tr>
							<th>No</th>
							<th>Periode Awal </th>
							<th>Periode Akhir</th>
							<th>Jumlah Alert</th>
							<th>High</th>
							<th>Medium</th>
							<th>Low</th>
							<th>Detail</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$this->db->from('rekap_idskmeans');
						// $this->db->where('DATE(periode_awal)',$start_date);
						$data=$this->db->get();
						$no=1;
						?>

						<?php foreach($data->result() as $key=>$val):?>
							<tr>
								<td><?=$key+1?></td>
								<td><?=date('d M Y H:i:s',strtotime($val->periode_awal))?></td>
								<td><?=date('d M Y H:i:s',strtotime($val->periode_akhir))?></td>
								<td><?=$val->jumlah_alert?></td>
								<td><?=round($val->high,2)?> %</td>
								<td><?=round($val->medium,2)?> %</td>
								<td><?=round($val->low,2)?> %</td>
								<td>
									<a class="btn btn-sm btn-primary" href='<?php echo base_url('index.php/clustering/calculate'); ?>/<?php echo date('Y-m-d/H:i:s',strtotime($val->periode_awal)) ?>/<?php echo date('Y-m-d/H:i:s',strtotime($val->periode_akhir)) ?>'><i class="icon glyphicon glyphicon-edit" aria-hidden="true"></i> Detail</a> &nbsp&nbsp
								</td>
							</tr>
						<?php endforeach;?>
					</tbody>
				</div>
			</div>