<div class="page" style="font-family: sans-serif;">
    <div class="page-header">
        <h1 class="page-title">Halaman Utama</h1>
        <div class="page-header-actions">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url()?>">Home</a></li>
                <li class="breadcrumb-item active">Pengaturan Pengguna</li>
            </ol>
        </div>
    </div>
    <div class="page-content container-fluid">
        <div class="row">
          <div class="col-xxl-12 col-lg-12">
            <!-- Example Panel With Heading -->
            <div class="panel panel-bordered">
              <div class="panel-heading">
                <h3 class="panel-title">Selamat Datang <?php echo $this->session->userdata('nama') ?></h3>
            </div>
            <div class="panel-body">
                <h4>Data System Alert</h4>
                <table class="table table-hover dataTable table-bordered w-full" id="tabel">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>IP Source</th>
                            <th>IP Destination</th>
                            <th>Signature Name</th>
                            <th>Port Destination</th>
                            <th>Jumlah Alert</th>
                            <th>Layer Protokol</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($tabel) && !empty($tabel)){ 
                            foreach($tabel as $key=>$val){?>
                                <tr>
                                    <td><?= $key+1 ?></td>
                                    <td><?= long2ip($val->ip_src) ?></td>
                                    <td><?= long2ip($val->ip_dst) ?></td>
                                    <td><?= $val->sig ?></td>
                                    <td><?= $val->layer4_dport ?></td>
                                    <td><?= $val->jumlahalert ?></td>
                                    <td><?= getprotobynumber($val->ip_proto) ?></td>
                                </tr>
                            <?php }}?>
                        </tbody>
                    </table>
                    <br/>
                    <h4>Grafik 1</h4>
                    <div class="row col-lg">

                        <div class="col-lg-12">
                            <!-- Example Horizontal Bar -->
                            <div class="example-wrap m-md-0">
                                <!-- <h4 class="example-title">Horizontal Bar Chart</h4> -->
                                <div class="example">
                                    <div class="ct-chart" id="exampleHorizontalBar"></div>
                                </div>
                            </div>
                            <!-- End Example Horizontal Bar -->
                        </div>

                    </div>

                    <h4>Grafik 2</h4>
                    <div class="row col-lg">

                        <div class="col-lg-12">
                            <!-- Example Horizontal Bar -->
                            <div class="example-wrap m-md-0">
                                <!-- <h4 class="example-title">Horizontal Bar Chart</h4> -->
                                <div class="example">
                                    <div class="ct-chart" id="exampleHorizontalBar1"></div>
                                </div>
                            </div>
                            <!-- End Example Horizontal Bar -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#tabel').DataTable();

            var l1=<?= json_encode($label) ?>;
           new Chartist.Bar('#exampleHorizontalBar', {
                labels: <?= json_encode($label) ?>,
                series: [<?= json_encode($y) ?>]
            }, {
                seriesBarDistance: 10,
                reverseData: false,
                horizontalBars: true,
                height:(l1.length*40+40)+'px',
                axisY: {
                    offset: 90
                }
            });

           var l2=<?= json_encode($label1) ?>;

           new Chartist.Bar('#exampleHorizontalBar1', {
                labels: <?= json_encode($label1) ?>,
                series: [<?= json_encode($y1) ?>]
            }, {
                seriesBarDistance: 10,
                reverseData: false,
                horizontalBars: true,
                height:(l2.length*40+40)+'px',
                axisY: {
                    offset: 90
                }
            });
    })
</script>