<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Website extends CI_Controller {
  public $user;
  public function __construct()
  {
     parent::__construct();
      $this -> user = $this->session->userdata('user_logged');
  }
  /**
   * Index Page for this controller.
   */
  public function index()
  {
    $data = array(
      'page' => 'website/index.php',
      'user' => $this->user ? $this->user : false
      );
    $this->load->view('layout',$data);
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */