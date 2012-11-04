<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller {
    public $user;
    public function __construct()
		{
		  parent::__construct();
      $this->load->model('User_model','user_logged');
      $this->user = $this->session->userdata('user_logged');
		}

    public function index()
    {
    	$data = array(
    		'page' => 'user/log_form.php'
    		);
    	$this->load->view('layout', $data);
    }

    public function login()
    {
      $data = array();
    	$login = $this->input->post('login');
    	$pass = $this->input->post('pass');
      $user = $this->user_logged->login($login,$pass);
      if($user)
        $this->session->set_userdata(array('user_logged' => $this->user_logged->to_array()));
   		if($this->input->is_ajax_request())
   		{
   			$result = array();
   			if($user)
        {
	   			$result['msg'] = 'Inicio Exitoso';
	   			$result['url'] = $user->url() ;
	   			$result['valid'] = 1;
   			}
   			else
   			{
	   			$result['msg'] = 'El usuario o la contraseña no son válidos';
	   			$result['valid'] = 0;
   			}
   			$data = array('json' => $result);
   			$this->load->view('json',$data);
   		}
    	else
    	{
        var_dump($user);
        if($user)
          redirect($this->user_logged->url());
        else
        {
          $data['page'] = 'login/failed.php';
          $data['user'] = false;
          $this->load->view('layout', $data);
        }
    	}
    }
    public function logoff()
    {
     $this->session->sess_destroy();
   	 	if($this->input->is_ajax_request())
   		{

      }
      else
      {
        redirect('');
      }

        /*
   			$result = array();
   			if($user){
	   			$result['msg'] = 'Hasta luego';
	   			$result['valid'] = 1;
   			}
   			else
   			{
	   			$result['msg'] = 'No se pudo eliminar la sessión';
	   			$result['valid'] = 0;
   			}
   			$data = array('json' => $result);
   			$this->load->view('json',$data);
   		}
    	else
    	{
   			$this->load->view('layout', $data);
    	}	
  */
    }
    public function profile(){

      var_dump($this->user);
      $data = array(
        'page' => 'build.php',
        'user' => $this->user
        );
      $this->load->view('layout', $data);
    }
    public function register()
    {
      print_r($this->user);
      $data = array(
        'page' => 'build.php',
        'user' => $this->user
        );
      $this->load->view('layout', $data);
    }
    public function addUser()
    {
      $data = array(
        'page' => 'build.php',
        'user' => $this->user
        );
      $this->load->view('layout', $data);
    }
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */