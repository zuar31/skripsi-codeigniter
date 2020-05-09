<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends MY_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model('UserModel');
  }
  public function index(){
    if($this->session->userdata('authenticated')){
    	redirect('page/home'); 
    } 
    $this->render_login('login');
  }
  public function login(){
    $username = $this->input->post('username'); 
    $password = md5($this->input->post('password')); 
    $user = $this->UserModel->get($username); 
    if(empty($user)){ 
      $this->session->set_flashdata('message', 'Username tidak ditemukan'); 
      redirect('auth'); 
    }else{
      if($password == $user->password){ 
        $session = array(
          'authenticated'=>true, 
          'username'=>$user->username,  
          'nama'=>$user->nama, 
          'role'=>$user->role 
        );
        $this->session->set_userdata($session); 
        redirect('page/home'); 
      }else{
        $this->session->set_flashdata('message', 'Password salah'); 
        redirect('auth'); 
      }
    }
  }
  public function logout(){
    $this->session->sess_destroy(); 
    redirect('auth');
  }
}