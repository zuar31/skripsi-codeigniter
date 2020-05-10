<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitor extends MY_Controller {

	public function __construct(){

		parent::__construct();

		ini_set('memory_limit', '-1');
		$this->load->database();
		$this->load->library(['form_validation']);
		$this->load->helper(['url']);

		date_default_timezone_set("ASIA/JAKARTA");

	}
	public function index(){
		$this->render_backend('monitor_ids/index');
	}

	public function ajax_list()
	{
		$db=$this->load->database('snort', TRUE);
		$db->select('*');
		$db->from('view_acid_event');

		if(!empty($this->input->post('start_date')))
		{
			$db->where('timestamp >=',date('Y-m-d',strtotime($this->input->post('start_date'))).' 00:00:00' );
		}
		if(!empty($this->input->post('end_date')))
		{
			$db->where('timestamp <=',date('Y-m-d',strtotime($this->input->post('end_date'))).' 23:59:59' );
		}

		if($_POST['length'] != -1)
		$db->limit($_POST['length'], $_POST['start']);

		$list=$db->get();

		// echo '<pre>';
		// print_r($list->result());
		// echo '</pre>';
		// die;

		$list1=$list->result();
		// var_dump($list);
		$data = array();
		$no = $_POST['start'];
		foreach ($list1 as $d) {
			// var_dump($d->id);
			$no++;
			$row = array();
			$row[] = '<center>'.isset($d->sid)?$d->sid:''.'</center>';
			$row[] = '<center>'.isset($d->cid)?$d->cid:''.'</center>';
			$row[] = '<center>'.isset($d->signature)?$d->signature:''.'</center>';
			$row[] = '<center>'.isset($d->sig_name)?$d->sig_name	:''.'</center>';
			$row[] = '<center>'.isset($d->ip_proto)?$d->ip_proto:''.'</center>';
			$row[] = '<center>'.isset($d->ip_src)?long2ip($d->ip_src):''.'</center>';
			$row[] = '<center>'.isset($d->ip_dst)?long2ip($d->ip_dst):''.'</center>';
			$row[] = '<center>'.isset($d->layer4_sport)?$d->layer4_sport:''.'</center>';
			$row[] = '<center>'.isset($d->layer4_dport)?$d->layer4_dport:''.'</center>';
			$row[] = '<center>'.isset($d->timestamp)?date('d-m-Y H:i:s',strtotime($d->timestamp)):''.'</center>';

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $db->count_all_results(),
			"recordsFiltered" => $list->num_rows(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	   public function showEmployees()
    {
        $draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search= $this->input->post("search");
        $search = $search['value'];
        $col = 0;
        $dir = "";

        if(!empty($this->input->post('start_date')))
		{
			$this->db->where('timestamp >=',date('Y-m-d',strtotime($this->input->post('start_date'))).' 00:00:00' );
		}
		if(!empty($this->input->post('end_date')))
		{
			$this->db->where('timestamp <=',date('Y-m-d',strtotime($this->input->post('end_date'))).' 23:59:59' );
		}

        if(!empty($order))
        {
            foreach($order as $o)
            {
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }

        if($dir != "asc" && $dir != "desc")
        {
            $dir = "desc";
        }
        $valid_columns = array(
            0=>'sid',
            1=>'cid',
            2=>'signature',
            3=>'sig_name',
            4=>'ip_proto',
            5=>'ip_src',
            6=>'ip_dst',
            7=>'layer4_sport',
            8=>'layer4_dport',
            9=>'timestamp',
        );
        if(!isset($valid_columns[$col]))
        {
            $order = null;
        }
        else
        {
            $order = $valid_columns[$col];
        }

        
        if($order !=null)
        {
            $this->db->order_by($order, $dir);
        }
        
        if(!empty($search))
        {
            $x=0;
            foreach($valid_columns as $sterm)
            {
                if($x==0)
                {
                    $this->db->like($sterm,$search);
                }
                else
                {
                    $this->db->or_like($sterm,$search);
                }
                $x++;
            }                 
        }
        if($length!==-1)
        $this->db->limit($length,$start);


        $employees = $this->db->get("view_acid_event");
        $data = array();
        foreach($employees->result() as $rows)
        {

            $data[]= array(
                $rows->sid,
                $rows->cid,
                $rows->signature,
                $rows->sig_name,
                $rows->ip_proto,
                long2ip($rows->ip_src),
                long2ip($rows->ip_dst),
                $rows->layer4_sport,
                $rows->layer4_dport,
                date('d-m-Y H:i:s',strtotime($rows->timestamp)),
            );     
        }
        $total_employees = $this->totalEmployees($this->input->post('start_date'),$this->input->post('end_date'));
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $total_employees,
            "recordsFiltered" => $total_employees,
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }
    public function totalEmployees($mulai,$end)
    {
        $query = $this->db->select("COUNT(*) as num");
         if(!empty($mulai))
		{
			$this->db->where('timestamp >=',date('Y-m-d',strtotime($mulai)).' 00:00:00' );
		}
		if(!empty($end))
		{
			$this->db->where('timestamp <=',date('Y-m-d',strtotime($end)).' 23:59:59' );
		}
        $query=$this->db->get("view_acid_event");
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
    }

}