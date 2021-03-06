<div class="page" style="font-family: sans-serif;">
    <div class="page-header">
        <h1 class="page-title">Monitoring IDS</h1>
        <div class="page-header-actions">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url()?>">Home</a></li>
                <li class="breadcrumb-item active">Monitor IDS</li>
            </ol>
        </div>
    </div>
    <div class="page-content container-fluid">
        <div class="row">
          <div class="col-xxl-12 col-lg-12">
            <!-- Example Panel With Heading -->
            <div class="panel panel-bordered">
              <div class="panel-heading">
            </div>
            <div class="panel-body">
                <h4>Monitoring Table</h4>
                <table style="margin-left:1em" width="100%">
                  <tr>
                    <td width="10%">Tanggal</td>
                    <td>:</td>
                    <td>  
                       <div class="col-sm-4">
                        <div class="input-daterange" data-plugin="datepicker">
                          <div class="input-group">
                            <span class="input-group-addon">
                              <i class="icon wb-calendar" aria-hidden="true"></i>
                          </span>
                          <input type="text" class="form-control tanggal" name="start" id="start" value="<?= date('d-m-Y')?>"/>
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon">to</span>
                        <input type="text" class="form-control tanggal" name="end" id="end" value="<?= date('d-m-Y')?>" />
                    </div>
                </div>
                    </div> 
                </td>
            </tr>
            <tr>
                <td width="10%"></td>
                <td></td>
                <td colspan="3"> 
                    <br>
                    <div class="col-sm-4 text-right">
                    <a href="#" class="btn btn-sm btn-primary" id="cari">Cari</a>
                    <a href="#" class="btn btn-sm btn-outline-primary" id="reset">Reset</a>
                </div>
                </td>
            </tr>
        </table> 
        <hr/>
                <table class="table table-hover dataTable table-bordered w-full" id="tabel">
                    <thead>
                        <tr>
                            <th>SID</th>
                            <th>CID</th>
                            <th>Signature</th>
                            <th>SIG Name</th>
                            <th>IP Proto</th>
                            <th>IP SRC</th>
                            <th>IP DST</th>
                            <th>Port Src</th>
                            <th>Port Dst</th>
                            <th>Timestamp</th>
                        </tr>
                    </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
var table;
    $(document).ready(function(){
       $('.tanggal').datepicker({
        format: "dd-mm-yyyy",
        align: 'left',
        autoclose: true,
        orientation: "right bottom"
    })

       table=$('#tabel').DataTable({
          processing : true,
          serverSide : true,
          pageLength : 10,
          lengthMenu: [[10,25, 50, 75, 100], [10,25, 50, 75, 100]],
          order:[],
          ajax: {
            url: "<?php echo site_url('monitor/showEmployees')?>",
              type: "POST",
              dataType:"JSON",
              data:function ( data ) {
                data.start_date = $('#start').val();
                data.end_date = $('#end').val();
                // console.log(data.tgl);
            }
        },
        iDisplayLength: -1,
        aoColumnDefs: [{
          bSortable: false,
          aTargets: [-1]
      },
      {
          targets: [2],
          className: "dt-body-right",
      }
      ],
      iDisplayLength: 5,
      aLengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
       // sDom: '<"dt-panelmenu clearfix"Bfr>t<"dt-panelfooter clearfix"ip>',
       // buttons: ['copy', 'excel', 'csv', 'pdf', 'print'],
   });

       $("#reset").click(function () {
         // $('#nama_depan').val("");
        // $('#nama_belakang').val("");
        table.ajax.reload();
        });

       $('#cari').click(function(){
           table.ajax.reload( null, false );
       });

 })
</script>