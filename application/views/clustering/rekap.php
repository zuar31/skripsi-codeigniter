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
				<h4>Tabel Alert</h4>
				<hr/>
				<div class="example-wrap">
					<div class="example datepair-wrap" data-plugin="datepair">
						<!-- <form action="<?php echo base_url('index.php/clustering/calculate'); ?>" id="form" method="POST"> 
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
						</form> -->
						<table class="table table-hover table-bordered w-full" >
							<thead>
								<tr>
									<th>No</th>
									<th>IP Source</th>
									<th>IP Destination</th>
									<th>Signature Name</th>
									<th>Port Destination</th>
									<th>Jumlah Alert</th>
									<th>Durasi(s)</th>
									<th>Layer Protokol</th>

								</tr>
							</thead>
							<tbody>
								<?php 
								if(isset($loadAlert) && !empty($loadAlert)){
									foreach($loadAlert as $key=>$r){
										$date = new DateTime($r->first);
										$date2 = new DateTime($r->last);
										$diff = $date2->getTimestamp() - $date->getTimestamp();
										?>
										<tr>
											<td><?php echo $key+1?></td>
											<td><?php echo long2ip($r->ip_src)?></td>
											<td><?php echo long2ip($r->ip_dst)?></td>
											<td><?php echo $r->sig?></td>
											<td><?php echo $r->layer4_dport?></td>
											<td><?php echo $r->jumlahalert?></td>
											<td><?php echo $diff?></td>
											<td><?php echo getprotobynumber($r->ip_proto)?></td>
											<!--<td></td>-->
										</tr>
									<?php }
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- End Panel Basic -->
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
				<div class="row ">
					<div class="col-md-4 col-xl-4">

						<div class="example-wrap">
							<h4 class="example-title">Jumlah Alert</h4>

							<ul class="list-group list-group-gap">
								<li class="list-group-item list-group-item-info">max : <?php echo $countAlert['max'][1]; ?></li>
								<li class="list-group-item list-group-item-success">min <?php echo $countAlert['min'][1]; ?></li>                     
							</ul>

						</div>

					</div>
					<div class="col-md-4 col-xl-4">

						<div class="example-wrap">

							<h4 class="example-title">Durasi</h4>

							<ul class="list-group list-group-gap">
								<li class="list-group-item list-group-item-info">max : <?php echo $countAlert['max'][2]; ?></li>
								<li class="list-group-item list-group-item-success">min : <?php echo $countAlert['min'][2]; ?></li>                     
							</ul>
						</div>

					</div>
					<div class="col-md-4 col-xl-4">

						<div class="example-wrap">
							<h4 class="example-title">Interval </h4>

							<ul class="list-group list-group-gap">
								<li class="list-group-item list-group-item-info">Jumlah Alert : <?php echo $intervalDurasi['interval'][1]; ?></li>               

								<li class="list-group-item list-group-item-success">Durasi : <?php echo $intervalDurasi['interval'][2]; ?></li>                     
							</ul>
						</div>

					</div>

				</div>
			</div>

		</div>
	</div>
	<!--interval-->

	<div class="page-content">

		<div class="panel">
			<header class="panel-heading">
				<div class="panel-actions"></div>
				<h3 class="panel-title">Table Centroid</h3> 
				<div class="row col-md-12">
					<div class="col-md-6"></div>                         
				</div>
			</header>
			<!--                    <br/>-->
			<div class="panel-body">
				<table class="table table-hover dataTable table-bordered w-full" id="tabel">
					<thead>
						<tr>
							<th>No</th>
							<th>Centroid Jumlah Alert</th>
							<th>Centroid Durasi</th>
							<th>Centroid Pada Cluster</th>
							<th>Keterangan</th>

						</tr>
					</thead>
					<tbody>
						<?php
						$no = 2;

						for ($i = 1; $i <= 3; $i++) {
							echo'<tr>';
							echo'<td>' . $i . '</td>';
							echo'<td>Cluster ' . $i . '&nbsp&nbsp&nbsp&nbspK' . $no . '=&nbsp&nbsp&nbsp&nbsp' . $intervalDurasi['xc'][1][$i] . '</td>';
							echo'<td>Cluster ' . $i . '&nbsp&nbsp&nbsp&nbspK' . $no . '=&nbsp&nbsp&nbsp&nbsp' .$intervalDurasi['xc'][2][$i] . '</td>';
							echo'<td>(' .$intervalDurasi['xc'][1][$i] . '&nbsp&nbsp&nbsp&nbsp,&nbsp&nbsp&nbsp&nbsp' . $intervalDurasi['xc'][2][$i] . ')</td>';
							echo '<td>' . $tipe_serangan[$i] . '</td>';
							echo'</tr>';
							$no--;
						}
						?>
					</tbody>
				</table>
			</div>

		</div>
	</div>
	<!--cluster d-->
	<!--start copy-->
	<div class="col-md-12" style="display: none">
		<!-- Example Continuous Accordion -->
		<div class="examle-wrap">
			<div class="example">
				<div class="panel-group panel-group-continuous" id="exampleAccordionContinuous"
				aria-multiselectable="true" role="tablist">
				<div class="panel">
					<div class="panel-heading" id="exampleHeadingContinuousOne" role="tab">
						<a class="panel-title" data-parent="#exampleAccordionContinuous" data-toggle="collapse"
						href="#exampleCollapseContinuousOne" aria-controls="exampleCollapseContinuousOne"
						aria-expanded="false">
						<b>Pembangkitan Cluster Centroid</b>
					</a>
				</div>
				<div class="panel-collapse collapse" id="exampleCollapseContinuousOne" aria-labelledby="exampleHeadingContinuousOne"
				role="tabpanel">
				<div class="panel-body">
					<div class="panel">
						<header class="panel-heading">
							<div class="panel-actions"></div>


						</header>



						<?php
						foreach ($intervalDurasi['d'] as $key => $value) {
							?>
							<div class="panel-body">
								<h4>Data <?= $key ?></h4>
								<table class="table table-hover dataTable table-bordered w-full" id="tabel">
									<thead>
										<tr>
											<th style="width: 20px">Cluster</th>
											<th>Centroid </th>
											<th>Jarak</th>


										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>(<?= $intervalDurasi['xc'][1][1] ?> , <?= $intervalDurasi['xc'][2][1] ?>) </td>
											<td><?= $intervalDurasi['d'][$key][1] ?></td>
										</tr>
										<tr>
											<td>2</td>
											<td>(<?= $intervalDurasi['xc'][1][2] ?> , <?= $intervalDurasi['xc'][2][2] ?>) </td>
											<td><?= $intervalDurasi['d'][$key][2] ?></td>
										</tr>
										<tr>
											<td>3</td>
											<td>(<?= $intervalDurasi['xc'][1][3] ?> , <?= $intervalDurasi['xc'][2][3] ?>) </td>
											<td><?= $intervalDurasi['d'][$key][3] ?></td>
										</tr>
									</tbody>
								</table>
							</div>
							<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="panel">
			<div class="panel-heading" id="exampleHeadingContinuousTwo" role="tab">
				<a class="panel-title collapsed" data-parent="#exampleAccordionContinuous" data-toggle="collapse"
				href="#exampleCollapseContinuousTwo" aria-controls="exampleCollapseContinuousTwo"
				aria-expanded="false">
				<b> Rangking Pembangkitan</b>
			</a>
		</div>
		<div class="panel-collapse collapse" id="exampleCollapseContinuousTwo" aria-labelledby="exampleHeadingContinuousTwo"
		role="tabpanel">
		<div class="panel-body">
			<?php
//pembangkit
			foreach ($countAlert['x'] as $key => $value) {
				asort($intervalDurasi['d'][$key]);
			}

			$cluster[1][1] = 0;
			$cluster[1][2] = 0;
			$cluster[1][3] = 0;

			$cluster_s[1][1][1] = 0;
			$cluster_s[1][2][1] = 0;
			$cluster_s[1][3][1] = 0;


			$cluster_s[1][1][2] = 0;
			$cluster_s[1][2][2] = 0;
			$cluster_s[1][3][2] = 0;

			foreach ($intervalDurasi['d'] as $key => $value) {

				$no = 1;
				foreach ($value as $key2 => $value2) {
					if ($no == 1) {
						$result[$key]['cluster'] = $key2;
						$result[$key]['nilai'] = $value2;

						if ($key2 == 1) {
							$cluster[1][1] += 1;

							$cluster_s[1][1][1] += $countAlert['x'][$key][1];
							$cluster_s[1][1][2] += $countAlert['x'][$key][2];
						} else if ($key2 == 2) {
							$cluster[1][2] += 1;

							$cluster_s[1][2][1] += $countAlert['x'][$key][1];
							$cluster_s[1][2][2] += $countAlert['x'][$key][2];
						} else if ($key2 == 3) {
							$cluster[1][3] += 1;

							$cluster_s[1][3][1] += $countAlert['x'][$key][1];
							$cluster_s[1][3][2] += $countAlert['x'][$key][2];
						}
					}
					$no++;
				}
			}

                                        //  echo '<pre>';
                                        // print_r($cluster_s);
                                        // echo '</pre>';
                                        // die;


//echo '<pre>';
//print_r($result);
//echo '</pre>';
			?>
			<table class="table table-hover dataTable table-bordered w-full" id="tabel">
				<thead>
					<tr>
						<th>No</th>
						<th>Ip Source</th>
						<th>Jumlah Alert</th>
						<th>Durasi</th>
						<th>K2</th>
						<th>K1</th>
						<th>K0</th>
						<th>Keterangan </th>         

					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($intervalDurasi['d'] as $key => $value) {
						$c1 = NULL;
						$c2 = NULL;
						$c3 = NULL;

						if ($result[$key]['cluster'] == 1) {
							$c1 = 'red';
						}

						if ($result[$key]['cluster'] == 2) {
							$c2 = 'red';
						}

						if ($result[$key]['cluster'] == 3) {
							$c3 = 'red';
						}
						?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $countAlert['x'][$key]['ip_src'] ?></td>
							<td><?= $countAlert['x'][$key][1] ?></td>
							<td><?= $countAlert['x'][$key][2] ?></td>
							<td style="color: <?= $c1 ?>"><?= $value[1] ?></td>
							<td style="color: <?= $c2 ?>"><?= $value[2] ?></td>
							<td style="color: <?= $c3 ?>" ><?= $value[3] ?></td>
							<td><?= $tipe_serangan[$result[$key]['cluster']] ?> </td>
						</tr>
						<?php
					}
					?>

				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
</div>
</div>
<!-- End Example Continuous Accordion -->
</div>

	<div class="col-md-12">
		<!-- Example Continuous Accordion -->
		<div class="examle-wrap">
			<div class="example">
				<div class="panel-group panel-group-continuous" id="exampleAccordionContinuous"
				aria-multiselectable="true" role="tablist">
				<div class="panel">
					<div class="panel-heading" id="exampleHeadingContinuousTwo1" role="tab">
						<a class="panel-title collapsed" data-parent="#exampleAccordionContinuous" data-toggle="collapse"
						href="#exampleCollapseContinuousTwo1" aria-controls="exampleCollapseContinuousTwo1"
						aria-expanded="false">
						<b>Pembangkitan Cluster Centroid</b>
					</a>
				</div>
				<div class="panel-collapse collapse" id="exampleCollapseContinuousTwo1" aria-labelledby="exampleHeadingContinuousTwo1"
					role="tabpanel">
					<div class="panel-body">
						<?php
						foreach ($intervalDurasi['d'] as $key => $value) {
							?>
							<div class="panel-body">
								<h4>Data <?= $key ?></h4>
								<table class="table table-hover dataTable table-bordered w-full" id="tabel">
									<thead>
										<tr>
											<th style="width: 20px">Cluster</th>
											<th>Centroid </th>
											<th>Jarak</th>


										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>(<?= $intervalDurasi['xc'][1][1] ?> , <?= $intervalDurasi['xc'][2][1] ?>) </td>
											<td><?= $intervalDurasi['d'][$key][1] ?></td>
										</tr>
										<tr>
											<td>2</td>
											<td>(<?= $intervalDurasi['xc'][1][2] ?> , <?= $intervalDurasi['xc'][2][2] ?>) </td>
											<td><?= $intervalDurasi['d'][$key][2] ?></td>
										</tr>
										<tr>
											<td>3</td>
											<td>(<?= $intervalDurasi['xc'][1][3] ?> , <?= $intervalDurasi['xc'][2][3] ?>) </td>
											<td><?= $intervalDurasi['d'][$key][3] ?></td>
										</tr>
									</tbody>
								</table>
							</div>
							<?php
						}
						?>
					</div>
				</div>
			</div>
			<div class="panel">
				<div class="panel-heading" id="exampleHeadingContinuousThree" role="tab">
					<a class="panel-title collapsed" data-parent="#exampleAccordionContinuous" data-toggle="collapse"
					href="#exampleCollapseContinuousThree" aria-controls="exampleCollapseContinuousThree"
					aria-expanded="false">
					<b> Rangking Pembangkitan</b>
				</a>
			</div>
			<div class="panel-collapse collapse" id="exampleCollapseContinuousThree" aria-labelledby="exampleHeadingContinuousThree"
				role="tabpanel">
				<div class="panel-body">
					<?php
//pembangkit
			foreach ($countAlert['x'] as $key => $value) {
				asort($intervalDurasi['d'][$key]);
			}

			$cluster[1][1] = 0;
			$cluster[1][2] = 0;
			$cluster[1][3] = 0;

			$cluster_s[1][1][1] = 0;
			$cluster_s[1][2][1] = 0;
			$cluster_s[1][3][1] = 0;


			$cluster_s[1][1][2] = 0;
			$cluster_s[1][2][2] = 0;
			$cluster_s[1][3][2] = 0;

			foreach ($intervalDurasi['d'] as $key => $value) {

				$no = 1;
				foreach ($value as $key2 => $value2) {
					if ($no == 1) {
						$result[$key]['cluster'] = $key2;
						$result[$key]['nilai'] = $value2;

						if ($key2 == 1) {
							$cluster[1][1] += 1;

							$cluster_s[1][1][1] += $countAlert['x'][$key][1];
							$cluster_s[1][1][2] += $countAlert['x'][$key][2];
						} else if ($key2 == 2) {
							$cluster[1][2] += 1;

							$cluster_s[1][2][1] += $countAlert['x'][$key][1];
							$cluster_s[1][2][2] += $countAlert['x'][$key][2];
						} else if ($key2 == 3) {
							$cluster[1][3] += 1;

							$cluster_s[1][3][1] += $countAlert['x'][$key][1];
							$cluster_s[1][3][2] += $countAlert['x'][$key][2];
						}
					}
					$no++;
				}
			}

                                        //  echo '<pre>';
                                        // print_r($cluster_s);
                                        // echo '</pre>';
                                        // die;


//echo '<pre>';
//print_r($result);
//echo '</pre>';
			?>
			<table class="table table-hover dataTable table-bordered w-full" id="tabel">
				<thead>
					<tr>
						<th>No</th>
						<th>Ip Source</th>
						<th>Jumlah Alert</th>
						<th>Durasi</th>
						<th>K2</th>
						<th>K1</th>
						<th>K0</th>
						<th>Keterangan </th>         

					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($intervalDurasi['d'] as $key => $value) {
						$c1 = NULL;
						$c2 = NULL;
						$c3 = NULL;

						if ($result[$key]['cluster'] == 1) {
							$c1 = 'red';
						}

						if ($result[$key]['cluster'] == 2) {
							$c2 = 'red';
						}

						if ($result[$key]['cluster'] == 3) {
							$c3 = 'red';
						}
						?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $countAlert['x'][$key]['ip_src'] ?></td>
							<td><?= $countAlert['x'][$key][1] ?></td>
							<td><?= $countAlert['x'][$key][2] ?></td>
							<td style="color: <?= $c1 ?>"><?= $value[1] ?></td>
							<td style="color: <?= $c2 ?>"><?= $value[2] ?></td>
							<td style="color: <?= $c3 ?>" ><?= $value[3] ?></td>
							<td><?= $tipe_serangan[$result[$key]['cluster']] ?> </td>
						</tr>
						<?php
					}
					?>

				</tbody>
			</table>
				</div>
			</div>
		</div>

</div>
</div>
</div>
<!-- End Example Continuous Accordion -->
</div>

<?php
$target = 2;
for ($ulang = 1; $ulang <= $target; $ulang++) {
//echo 'perulangan' . $ulang;
//echo '<br>';
	?>
	<div class="col-md-12">
		<!-- Example Continuous Accordion -->
		<div class="examle-wrap">
			<div class="example">
				<div class="panel-group panel-group-continuous" id="exampleAccordionContinuous"
				aria-multiselectable="true" role="tablist">
				<div class="panel">
					<div class="panel-heading" id="exampleHeadingContinuousTwo1<?= $ulang ?>" role="tab">
						<a class="panel-title collapsed" data-parent="#exampleAccordionContinuous" data-toggle="collapse"
						href="#exampleCollapseContinuousTwo1<?= $ulang ?>" aria-controls="exampleCollapseContinuousTwo1<?= $ulang ?>"
						aria-expanded="false">
						<b>Jumlah Cluster Perulangan ke <?= $ulang ?></b>
					</a>
				</div>
				<div class="panel-collapse collapse" id="exampleCollapseContinuousTwo1<?= $ulang ?>" aria-labelledby="exampleHeadingContinuousTwo1"
					role="tabpanel">
					<div class="panel-body">
						<?php
						foreach ($cluster[$ulang] as $key => $value) {
							@$intervalDurasi['xc'][1][$key] = $cluster_s[$ulang][$key][1] / $value;
							@$intervalDurasi['xc'][2][$key] = $cluster_s[$ulang][$key][2] / $value;

						}


						?>
						<div class="col-md-6 col-xl-4">
							<div class="example-wrap">
								<h5>Jumlah Cluster</h5>
								<ul class="list-group list-group-gap">
									<li class="list-group-item list-group-item-danger">Cluster 1 = <?php echo $cluster[$ulang][1]; ?></li>                                   
									<li class="list-group-item list-group-item-info">Cluster 2 = <?php echo $cluster[$ulang][2]; ?></li>
									<li class="list-group-item list-group-item-success">Cluster 3 = <?php echo $cluster[$ulang][3]; ?></li>

								</ul>
							</div>
						</div>
						<h5>Table Centroid Perulangan ke <?= $ulang ?></h5> 
						<table class="table table-hover dataTable table-bordered w-full" id="tabel">
							<thead>
								<tr>
									<th>No</th>
									<th>Centroid Jumlah Alert</th>
									<th>Centroid Durasi</th>
									<th>Centroid Pada Cluster</th>
									<th>Keterangan</th>

								</tr>
							</thead>
							<tbody>
								<?php
								$no = 2;
//                                                    $tipe_serangan[1] = 'High';
//                                                    $tipe_serangan[2] = 'Medium';
//                                                    $tipe_serangan[3] = 'Low';
								for ($i = 1; $i <= 3; $i++) {
									echo'<tr>';
									echo'<td>' . $i . '</td>';
									echo'<td>Cluster ' . $i . '&nbsp&nbsp&nbsp&nbspK' . $no . '=&nbsp&nbsp&nbsp&nbsp' . $intervalDurasi['xc'][1][$i] . '</td>';
									echo'<td>Cluster ' . $i . '&nbsp&nbsp&nbsp&nbspK' . $no . '=&nbsp&nbsp&nbsp&nbsp' . $intervalDurasi['xc'][2][$i] . '</td>';
									echo'<td>(' . $intervalDurasi['xc'][1][$i] . '&nbsp&nbsp&nbsp&nbsp,&nbsp&nbsp&nbsp&nbsp' . $intervalDurasi['xc'][2][$i] . ')</td>';
									echo '<td>' . $tipe_serangan[$i] . '</td>';
									echo'</tr>';
									$no--;
								}

								$d=$intervalDurasi['d'];
								$xc=$intervalDurasi['xc'];
								$x=$countAlert['x'];
								?>
							</tbody>
						</table>

					</div>
				</div>
			</div>
			<div class="panel">
				<div class="panel-heading" id="exampleHeadingContinuousThree<?= $ulang ?>" role="tab">
					<a class="panel-title collapsed" data-parent="#exampleAccordionContinuous" data-toggle="collapse"
					href="#exampleCollapseContinuousThree<?= $ulang ?>" aria-controls="exampleCollapseContinuousThree<?= $ulang ?>"
					aria-expanded="false">
					<b>Data Cluster</b>
				</a>
			</div>
			<div class="panel-collapse collapse" id="exampleCollapseContinuousThree<?= $ulang ?>" aria-labelledby="exampleHeadingContinuousThree"
				role="tabpanel">
				<div class="panel-body">
					<?php
					foreach ($x as $key => $value) {
						$d[$key][1] = sqrt(pow(($x[$key][1] - $xc[1][1]), 2) + pow(($x[$key][2] - $xc[2][1]), 2));
						$d[$key][2] = sqrt(pow(($x[$key][1] - $xc[1][2]), 2) + pow(($x[$key][2] - $xc[2][2]), 2));
						$d[$key][3] = sqrt(pow(($x[$key][1] - $xc[1][3]), 2) + pow(($x[$key][2] - $xc[2][3]), 2));
					}
					?>

					<?php
					foreach ($d as $key2 => $value) {
						?>
						<div class="panel-body">
							<h4>Data <?= $key2 ?></h4>
							<table class="table table-hover dataTable table-bordered w-full" id="tabel">
								<thead>
									<tr>
										<th style="width: 20px">Cluster</th>
										<th>Centroid </th>
										<th>Jarak</th>


									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>(<?= $xc[1][1] ?> , <?= $xc[2][1] ?>) </td>
										<td><?= $d[$key2][1] ?></td>
									</tr>
									<tr>
										<td>2</td>
										<td>(<?= $xc[1][2] ?> , <?= $xc[2][2] ?>) </td>
										<td><?= $d[$key2][2] ?></td>
									</tr>
									<tr>
										<td>3</td>
										<td>(<?= $xc[1][3] ?> , <?= $xc[2][3] ?>) </td>
										<td><?= $d[$key2][3] ?></td>
									</tr>
								</tbody>
							</table>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
		<div class="panel">
			<div class="panel-heading" id="exampleHeadingContinuousFour<?= $ulang ?>" role="tab">
				<a class="panel-title collapsed" data-parent="#exampleAccordionContinuous" data-toggle="collapse"
				href="#exampleCollapseContinuousFour<?= $ulang ?>" aria-controls="exampleCollapseContinuousFour<?= $ulang ?>"
				aria-expanded="false">
				<b>Rangking Perulangan ke <?= $ulang ?></b>
			</a>
		</div>
		<div class="panel-collapse collapse" id="exampleCollapseContinuousFour<?= $ulang ?>" aria-labelledby="exampleHeadingContinuousFour"
			role="tabpanel">
			<div class="panel-body">
				<?php
//pertama
				foreach ($x as $key => $value) {
					asort($d[$key]);
				}

				$cluster[$ulang + 1][1] = 0;
				$cluster[$ulang + 1][2] = 0;
				$cluster[$ulang + 1][3] = 0;

				$cluster_s[$ulang + 1][1][1] = 0;
				$cluster_s[$ulang + 1][2][1] = 0;
				$cluster_s[$ulang + 1][3][1] = 0;


				$cluster_s[$ulang + 1][1][2] = 0;
				$cluster_s[$ulang + 1][2][2] = 0;
				$cluster_s[$ulang + 1][3][2] = 0;


				foreach ($d as $key => $value) {

					$no = 1;
					foreach ($value as $key2 => $value2) {
						if ($no == 1) {
							$result[$key]['cluster'] = $key2;

							$result[$key]['nilai'] = $value2;

                                                        //rekap
							$history[$ulang][$key] = $key2;

							if ($key2 == 1) {
								$cluster[$ulang + 1][1] += 1;

								$cluster_s[$ulang + 1][1][1] += $x[$key][1];
								$cluster_s[$ulang + 1][1][2] += $x[$key][2];
							} else if ($key2 == 2) {
								$cluster[$ulang + 1][2] += 1;

								$cluster_s[$ulang + 1][2][1] += $x[$key][1];
								$cluster_s[$ulang + 1][2][2] += $x[$key][2];
							} else if ($key2 == 3) {
								$cluster[$ulang + 1][3] += 1;

								$cluster_s[$ulang + 1][3][1] += $x[$key][1];
								$cluster_s[$ulang + 1][3][2] += $x[$key][2];
							}
						}
						$no++;
					}
				}

//            echo '<pre>';
//            print_r($result);
//            echo '</pre>';
				?>

				<table class="table table-hover dataTable table-bordered w-full" id="tabel">
					<thead>
						<tr>
							<th>No</th>
							<th>Ip Source</th>
							<th>Jumlah Alert</th>
							<th>Durasi</th>
							<th>K2</th>
							<th>K1</th>
							<th>K0</th>
							<th>Keterangan </th>         

						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						$lanjut_ulang = FALSE;
						foreach ($d as $key => $value) {
							$c1 = NULL;
							$c2 = NULL;
							$c3 = NULL;

							if ($result[$key]['cluster'] == 1) {
								$c1 = 'red';
							}

							if ($result[$key]['cluster'] == 2) {
								$c2 = 'red';
							}

							if ($result[$key]['cluster'] == 3) {
								$c3 = 'red';
							}


							if ($ulang == $target) {
								if ($history[$ulang][$key] != $history[$ulang - 1][$key]) {
									$lanjut_ulang = TRUE;
								}
							}
							?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $x[$key]['ip_src'] ?></td>
								<td><?= $x[$key][1] ?></td>
								<td><?= $x[$key][2] ?></td>
								<td style="color: <?= $c1 ?>"><?= $value[1] ?></td>
								<td style="color: <?= $c2 ?>"><?= $value[2] ?></td>
								<td style="color: <?= $c3 ?>" ><?= $value[3] ?></td>
								<td><?= $tipe_serangan[$result[$key]['cluster']] ?> </td>
							</tr>
							<?php
						}
						?>

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<!-- End Example Continuous Accordion -->
</div>

<?php
                //cek

if ($lanjut_ulang) {
	$target++;
}
}
?>


</div>
<?php
$total_serangan = count($x);
$persentase_high = $cluster[$ulang][1] / $total_serangan * 100;
$persentase_medium = $cluster[$ulang][2] / $total_serangan * 100;
$persentase_low = $cluster[$ulang][3] / $total_serangan * 100;
//            echo $total_serangan;
?>
<hr>


<div class="page-content">
	<!-- Panel Basic -->
	<div class="panel">
		<header class="panel-heading">
			<div class="panel-actions"></div>
			<!-- <h3 class="panel-title">Basic</h3> -->
			<div class="row col-md-12-center">
				<div class="col-md-6"></div>                         
			</div>
		</header>
		<br/>
		<div class="panel-body">
			<div class="row ">
				<div class="col-md-4 col-xl-4">

					<div class="example-wrap m-md-0">
						<!--                                <h4 class="example-title">Pie</h4>-->
						<div>
							<!--                            <div class="example text-center max-width">-->
								<canvas id="exampleChartjsPie" height="250"></canvas>
							</div>
						</div>
					</div>  

					<div class="col-md-4 col-xl-4">

						<div class="example-wrap">

							<h4 class="example-title">Hasil</h4>

							<p>Dari Analis diperoleh bahwa :</p> 
							<p><b><?= round($persentase_high,2) ?>%</b> level serangan high,</p>
							<p><b><?= round($persentase_medium,2) ?>%</b> level serangan medium,</p>
							<p><b><?= round($persentase_low,2) ?>%</b> level serangan low.</p>
							<form class="col-md-12" id="form" action="<?php echo base_url('index.php/clustering/simpan_rekap'); ?>" method="POST">

								<div class="row">

								</div>
								
								<div class="row" style="display:none">
									<div class="form-group col-md-12">
										<input type="text" class="form-control" value="<?php echo $date->format('Y-m-d') ?>" name="start_date" placeholder="tanggal awal" autocomplete="off">
									</div>
								</div>

								<div class="row" style="display: none">
									<div class="form-group col-md-12">
										<input type="text" class="form-control" value="<?php echo $date->format('Y-m-d') ?>" name="end_date" placeholder="tanggal awal" autocomplete="off">
									</div>
								</div>

								<div class="row" style="display: none">
									<div class="form-group col-md-12">
										<input type="text" class="form-control" value="<?php echo $start_time ?>" name="start_time" placeholder="waktu awal" autocomplete="off">
									</div>
								</div>

								<div class="row" style="display:none">
									<div class="form-group col-md-12">
										<input type="text" class="form-control" value="<?php echo $end_time ?>" name="end_time" placeholder="waktu akhir" autocomplete="off">
									</div>
								</div>

								<div class="row" style="display:none">
									<div class="form-group col-md-12">
										<input type="text" class="form-control" value="<?= count($x) ?>" name="jumlahalert" placeholder="Jumlah alert" autocomplete="off">
									</div>
								</div>

								<div class="row" style="display:none">
									<div class="form-group col-md-12">
										<input type="text" class="form-control" value="<?= $persentase_high ?>" name="high" placeholder="high" autocomplete="off">
									</div>
								</div>

								<div class="row" style="display:none">
									<div class="form-group col-md-12">
										<input type="text" class="form-control" value="<?= $persentase_medium ?>" name="medium" placeholder="medium" autocomplete="off">
									</div>
								</div>

								<div class="row" style="display:none">
									<div class="form-group col-md-12">
										<input type="text" class="form-control" value="<?= $persentase_low ?>" name="low" placeholder="low" autocomplete="off">
									</div>
								</div>

								<div class="row">
									<button type="submit" class="btn btn-success">Simpan Rekap Harian Clustering K-Means</button>
									&nbsp;
									<a class="btn btn-outline-success " href="<?php echo base_url('index.php/page/clustering'); ?>" id="batal">Kembali</a>
								</div>
							</form>
						</div>

					</div>


				</div>



			</div>
		</div>

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

		var pieData = {
			labels: ["High", "Medium", "Low"],
			datasets: [{
				data: [<?= isset($cluster[3][1])?$cluster[3][1]:0 ?>, <?= isset($cluster[3][2])?$cluster[3][2]:0 ?>, <?= isset($cluster[3][3])?$cluster[3][3]:0 ?>],
				backgroundColor: [Config.colors("red", 400), Config.colors("yellow", 400), Config.colors("green", 400)],
				hoverBackgroundColor: [Config.colors("red", 600), Config.colors("yellow", 600), Config.colors("green", 600)]
			}]
		};

		var myPie = new Chart(document.getElementById("exampleChartjsPie").getContext("2d"), {
			type: 'pie',
			data: pieData,
			options: {
				responsive: true
			}
		});
	})
</script>
