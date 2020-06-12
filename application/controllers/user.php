<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
  
  public function __construct(){
    
    parent::__construct();
    
    $this->load->database();
    $this->load->library(['form_validation']);
    $this->load->helper(['url']);
    $this->load->model('UserModel','n_model');
    
    date_default_timezone_set("ASIA/JAKARTA");
  
  }
  
  public function index(){
    $this->render_backend('user/index');
  }

  public function ajax_list()
  {
    $list = $this->n_model->get_datatables();
    // var_dump($list);
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $d) {
      // var_dump($d->id);
      $no++;
      $row = array();
      $row[] = '<center>'.$no.'</center>';
      $row[] = '<center>'.$d->username.'</center>';
      $row[] = '<center>'.$d->nama.'</center>';
      $row[] = '<center>'.$d->role.'</center>';
      //add html for action
      $row[] = '<center><a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_level('."'".$d->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
          <a class="btn btn-sm btn-outline-primary" href="javascript:void(0)" title="Hapus" onclick="delete_level('."'".$d->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a></center>';
    
      $data[] = $row;
    }

    $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->n_model->count_all(),
            "recordsFiltered" => $this->n_model->count_filtered(),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);
  }

  private function username_exists($username,$id)
{
  if($id==null)
  {
    $this->db->where('username', $username);
  }
  else
  {
    $this->db->where('username', $username);
    $this->db->where('id !=', $id);
  }
  $query = $this->db->get('user');
  if( $query->num_rows() > 0 ){ return TRUE; } else { return FALSE; }
}

//---------------------------------
// AJAX REQUEST, IF EMAIL EXISTS
//---------------------------------
function username_check()
{
  if (array_key_exists('username',$_POST)) {
    $id=null;
    if($this->input->post('id')!==null)
    {
      $id=$this->input->post('id');
    }
    if ( $this->username_exists($this->input->post('username'),$id) == TRUE ) {
      echo json_encode(array('msg' => 'false'));
    } else {
      echo json_encode(array('msg' => 'true'));
    }
  }
}

private function password_exists($password,$id)
{
  $this->db->from('user');
  $this->db->where('id', $id);
  $query = $this->db->get();
  if($query->row()->password == $password)
  {
    return TRUE;
  }
  else
  {
    return FALSE;
  }
}

//---------------------------------
// AJAX REQUEST, IF EMAIL EXISTS
//---------------------------------
function password_check()
{
  if (array_key_exists('old_password',$_POST)) {
    $id=null;
    if($this->input->post('id')!==null)
    {
      $id=$this->input->post('id');
    }
    if ( $this->password_exists(md5($this->input->post('old_password')),$id) == TRUE ) {
      echo json_encode(array('msg' => 'true'));
    } else {
      echo json_encode(array('msg' => 'false'));
    }
  }
}

public function ajax_add()
{
  $data = array(
        'nama' => $this->input->post('nama'),
        'username' => $this->input->post('username'),
        'password' => md5($this->input->post('password')),
        'role' => $this->input->post('role'),
      );

    $insert = $this->n_model->save($data);
    echo json_encode(array("status" => TRUE));
}

public function ajax_edit($id)
{
  $data = $this->n_model->get_by_id($id);
    // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
  echo json_encode($data);
}

public function ajax_update()
{
  if($this->input->post('password')!==null)
  {
      $data = array(
        'nama' => $this->input->post('nama'),
        'username' => $this->input->post('username'),
        'password' => md5($this->input->post('password')),
        'role' => $this->input->post('role'),
      );
  }else{
      $data = array(
        'nama' => $this->input->post('nama'),
        'username' => $this->input->post('username'),
        'role' => $this->input->post('role'),
      );
  }
  
    $update=$this->n_model->update(array('id' => $this->input->post('id')), $data);
    // if($update){
    //  helper_log("edit","edit data agama");
    // }
    echo json_encode(array("status" => TRUE));
  }

  public function ajax_delete($id)
  {
    $delete=$this->n_model->delete_by_id($id);
    // helper_log("delete","delete data agama");
    echo json_encode(array("status" => TRUE));
  }


}