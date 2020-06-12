<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
  
  public function __construct(){
    
    parent::__construct();
   
    $this->load->library(['form_validation']);
    $this->load->helper(['url']);
    
    date_default_timezone_set("ASIA/JAKARTA");
  
  }
  
  public function index(){

    //Hasil Query Untuk Tabel
    $query="SELECT ip_src ,ip_dst, ip_proto,layer4_dport,sig_name as sig,count(sid) as jumlahalert,count(DISTINCT(ip_src)) as count_ip_src, count(DISTINCT(ip_dst)) as count_ip_dst,MIN(timestamp) as first, MAX(timestamp)as last FROM view_acid_event GROUP BY sig_name, ip_src ORDER BY MIN(timestamp)";
    $query = $this->db->query($query);
    $data['tabel']=$query->result();
    //End

   

    //Hasil Query Untuk Grafik Horisontal 1
    $label = array();
    $y = array();

    $query="SELECT *,COUNT(sig_name) as jumlah_alert FROM `view_acid_event`group by sig_name order by jumlah_alert asc";
    $query = $this->db->query($query);

    if($query->num_rows()>0)
    {
      foreach($query->result() as $key=>$val)
      {
        array_push($label, $val->sig_name);
        array_push($y, $val->jumlah_alert);
      }
    }
    $data['label']=$label;
    $data['y']=$y;
    //End

    //Hasil Query Untuk Grafik Horisontal 2
    $label1 = array();
    $y1 = array();

    $query="SELECT *,COUNT(ip_src) as jumlah_alert FROM `view_acid_event`group by ip_src order by jumlah_alert asc";
    $query = $this->db->query($query);

    if($query->num_rows()>0)
    {
      foreach($query->result() as $key=>$val)
      {
        array_push($label1, $val->ip_src);
        array_push($y1, $val->jumlah_alert);
      }
    }
    $data['label1']=$label1;
    $data['y1']=$y1;
    //End

    // echo '<pre>';
    // print_r($label1);
    // echo '</pre>';
    // die;

    $this->render_backend('home',$data);
  }
}