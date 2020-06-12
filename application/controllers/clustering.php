<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clustering extends MY_Controller {
  var $table = 'rekap_idskmeans';
  
  public function __construct(){
    
    parent::__construct();
   
    $this->load->library(['form_validation']);
    $this->load->helper(['url']);
    // $this->load->helper('my_helper');
    
    date_default_timezone_set("ASIA/JAKARTA");
  
  }
  
  public function index(){
    $this->render_backend('clustering/index');
  }

  function partial_uri($start = 0) {
    return join('/',array_slice(get_instance()->uri->segment_array(), $start));
}

  public function calculate()
  {
    
    $date=$this->input->post('start_date');
    $start_time=date('H:i:s',strtotime($this->input->post('start_time')));
    $end_time=date('H:i:s',strtotime($this->input->post('end_time')));

    $start = date('Y-m-d', strtotime($date)) . ' ' . $start_time;
    $end = date('Y-m-d', strtotime($date)) . ' ' . $end_time;

       
    $url=explode('/',$this->partial_uri());
    if(isset($url[2]) && isset($url[3])&&isset($url[4]) && isset($url[5]))
    {
        $start = $url[2] . ' ' . $url[3];
        $end = $url[4] . ' ' . $url[5];
    }
   
    $tipe_serangan[1] = 'High';
    $tipe_serangan[2] = 'Medium';
    $tipe_serangan[3] = 'Low';
   
    $loadAlert=$this->loadAlert($start,$end);
    if(empty($loadAlert))
    {
        $this->session->set_flashdata('error', 'Mohon maaf data yang anda cari tidak ditemukan!'); 
        redirect('clustering/index');
    }
    $countAlert=$this->countAlert($loadAlert);
    $intervalDurasi=$this->intervalDurasi($countAlert['x'],$countAlert['max'],$countAlert['min'],$k=3);
    
    $data['loadAlert']=$loadAlert;
    $data['countAlert']=$countAlert;
    $data['intervalDurasi']=$intervalDurasi;
    $data['tipe_serangan']=$tipe_serangan;
    $data['date']=$date;
    $data['start_time']=$start_time;
    $data['end_time']=$end_time;
    $this->render_backend('clustering/rekap',$data);
  }

  public function loadAlert($start,$end)
  {
    $query="SELECT ip_src,"
                                            . " ip_dst,"
                                            . " ip_proto,"
                                            . " layer4_dport,"
                                            . " sig_name as sig,"
                                            . " count(sid) as jumlahalert,"
                                            . " count(DISTINCT(ip_src)) as count_ip_src,"
                                            . " count(DISTINCT(ip_dst)) as count_ip_dst,"
                                            . " MIN(timestamp) as first, "
                                            . " MAX(timestamp) as last"
                                            . " FROM view_acid_event"
                                            . " WHERE timestamp between '$start' and '$end'"
                                            . " GROUP by ip_src,sig_name,ip_dst"
                                            . " ORDER by MIN(timestamp)";
    $query = $this->db->query($query);
   
    return $query->result();
  }

  public function countAlert($loadAlert)
  {
     $max[1] = 0;
     $min[1] = 1000000000;
     $max[2] = 0;
     $min[2] = 1000000000;
   
     foreach($loadAlert as $key=>$r)
     {
        $date = new DateTime($r->first);
        $date2 = new DateTime($r->last);
        $diff = $date2->getTimestamp() - $date->getTimestamp();

        $x[$key+1]['sig'] = $r->sig;
        $x[$key+1]['ip_src'] = long2ip($r->ip_src);
        $x[$key+1][1] = $r->jumlahalert;
        $x[$key+1][2] = $diff;

        if ($max[1] < $x[$key+1][1]) {
            $max[1] = $x[$key+1][1];
        }

        if ($min[1] > $x[$key+1][1]) {
            $min[1] = $x[$key+1][1];
        }
        if ($max[2] < $x[$key+1][2]) {
            $max[2] = $x[$key+1][2];
        }

        if ($min[2] > $x[$key+1][2]) {
            $min[2] = $x[$key+1][2];
        }
     }

     $data=array(
        'x'=>$x,
        'min'=>$min,
        'max'=>$max,
     );

     return $data;
 }

 public function intervalDurasi($x,$max,$min,$k)
 {
    $interval[1] = ($max[1] - $min[1]) / $k;
    $interval[2] = ($max[2] - $min[2]) / $k;

    $xc[1][1] = $min[1] + (2 * $interval[1]);
    $xc[2][1] = $min[2];

    $xc[1][2] = $min[1] + (1 * $interval[1]);
    $xc[2][2] = $min[2] + (1 * $interval[2]);

    $xc[1][3] = $min[1];
    $xc[2][3] = $min[2] + (2 * $interval[2]);

    foreach ($x as $key => $value) {
        $d[$key][1] = sqrt(pow(($x[$key][1] - $xc[1][1]), 2) + pow(($x[$key][2] - $xc[2][1]), 2));
        $d[$key][2] = sqrt(pow(($x[$key][1] - $xc[1][2]), 2) + pow(($x[$key][2] - $xc[2][2]), 2));
        $d[$key][3] = sqrt(pow(($x[$key][1] - $xc[1][3]), 2) + pow(($x[$key][2] - $xc[2][3]), 2));

    }
    // echo '<pre>';
    // print_r($d);
    // echo '</pre>';
    // die;
    $data=array(
        'interval'=>$interval,
        'xc'=>$xc,
        'd'=>$d,
    );
    return $data;
 }

 public function simpan_rekap()
 {
    //  echo '<pre>';
    // print_r(random());
    // echo '</pre>';
    // die;
    $start_date=date('Y-m-d',strtotime($this->input->post('start_date')));
    $end_date=date('Y-m-d',strtotime($this->input->post('end_date')));

    $start_time=$this->input->post('start_time');
    $end_time=$this->input->post('end_time');
    $jumlahalert=$this->input->post('jumlahalert');
    $high=$this->input->post('high');
    $medium=$this->input->post('medium');
    $low =$this->input->post('low');

    $datetime_awal=date('Y-m-d H:i:s',strtotime(''.$start_date.' '.$start_time.''));
    $datetime_akhir=date('Y-m-d H:i:s',strtotime(''.$end_date.' '.$end_time.''));

     $data = array(
        'periode_awal' => $datetime_awal,
        'periode_akhir' => $datetime_akhir,
        'jumlah_alert' => $jumlahalert,
        'high' => $high,
        'medium' => $medium,
        'low' => $low,
    );

    $this->db->from($this->table);
    $this->db->where('DATE(periode_awal)',$start_date);
    $query=$this->db->get();
    if($query->num_rows()>0){
        $act=$this->db->update($this->table, $data, array('id' => $query->row()->id));
    }
    else{
        $act=$this->db->insert($this->table, $data);
    }
    if($act==true)
    {
        $this->session->set_flashdata('success', 'Data rekap berhasil disimpan'); 
    }
    else
    {
        $this->session->set_flashdata('error', 'Data rekap gagal disimpan'); 
    }
     
    // $this->render_backend('clustering/index-rekap');
     redirect('clustering/index_rekap');
 }

 public function index_rekap()
 {
    $this->render_backend('clustering/index-rekap');
 }
}