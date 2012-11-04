<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sales extends CI_Controller {
  private $Objuser;
  private $user;
  private $user_logged;
  public function __construct()
  {
    parent::__construct();
    $this -> load -> model('User_model');
    $this -> user_logged = $this->session->userdata('user_logged');
    $this -> User_model->load($this -> user_logged);
    $this -> user = $this -> User_model;
  }
  public function index()
  {
    redirect('sales/client_select');
  }

  public function client_select()
  {
    $data = array(
    'page' => 'movil/client_select.php',
    'user' => $this -> user_logged,
    'controller' => 'order',
    'clients' => $this -> user -> getClients()
    );
    $this->load->view('mobile', $data, FALSE);
  }

  public function order($idClient,$nameCliente)
  {
    $this->load->model('Product_model');
    $data = array(
      'header' => $nameCliente,
      'discounts' => Product_model::allDiscounts(),
      'page' => 'movil/order.php',
      'user' => $this -> user_logged,
      'controller' => 'order',
      'js_array' => array('mobile_form.js')
    );   
    $this->load->view('mobile', $data, FALSE);
  }
  public function add_order_item()
  {

  }

  public function save_order()
  {

  }

}

/* End of file sales.php */
/* Location: ./application/controllers/sales.php */
