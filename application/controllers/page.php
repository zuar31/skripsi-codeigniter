<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Page extends MY_Controller {
  public function home(){
    // function render_backend tersebut dari file core/MY_Controller.php
     // load view home.php
    redirect('home'); 
  }
  public function monitor(){
    // function render_backend tersebut dari file core/MY_Controller.php
    redirect('monitor'); 
  }
  public function pengguna(){
    if($this->session->userdata('role') != 'admin') // Jika user yg login bukan admin
      show_404(); // Redirect ke halaman 404 Not found
    // function render_backend tersebut dari file core/MY_Controller.php
    $this->render_backend('pengguna'); // load view pengguna.php
  }
  public function kontak(){
    // function render_backend tersebut dari file core/MY_Controller.php
    $this->render_backend('kontak'); // load view kontak.php
  }
  public function user()
  {
    redirect('user'); 
  }
}