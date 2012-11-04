<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
  private $login;
  private $name;
  private $email;
  private $type;
  private $pass;
  private $clients;

  const SUPERADMIN = 0;
  const SUPERVISOR = 1;
  const VENDEDOR = 2;
  const CLIENTE = 3;

  public function __construct()
  {
     parent::__construct();
  }

  /**
  */
  public function getClients()
  {
    if($this->type != self::VENDEDOR)
    {
      $rs = $this->db->query(self::$sql['getClients'], array($this->login));
    }
    else
    {
      $rs = $this->db->query(self::$sql['getClientsSales'], array($this->login));
    }
    $this->clients = array();
    foreach ($rs->result_array() as $client) {
      $this->clients[] = $client;
    }
    return $this->clients;
  }

  public function to_array()
  {
    return array(
      'login' => $this -> login,
      'name' => $this -> name,
      'email' => $this -> email,
      'type' => $this -> type,
      'clients' => json_encode($this->clients)
    );
  }
  /**
  * @param $param must be a array, however can be an id User.
  * @return boolean, true if the user was loaded. Otherwise
  */
  public function load($param)
  {
    if(is_array($param))
    {
      $this -> login = $param['login'];
      $this -> name = $param['name'];
      $this -> email = $param['email'];
      $this -> type = $param['type'];
      $this -> clients = $this -> getClients();
      return true;
    }
    else
    {
      $rs = $this->db->query(self::$sql['loadById'], array($param));
      if($rs->num_rows() > 0)
      {
        $val = $this -> load($rs->row_array());
        return $val;
      }
    }
    return false;
  }

  public function login($login,$pass)
  {
    $this -> setPassword($pass);
    $rs = $this->db->query(self::$sql['login'], array($login,$this->pass));
    var_dump($rs->num_rows());
    if ($rs->num_rows() > 0)
    {
      $row = $rs->row_array();
      return $this -> load($row);
    }
    else
      return false;
  }

  /**
  *
  */
  public function setPassword($pass,$encript = true)
  {
    if($encript)
    {
      $this -> pass = md5($pass);
    }
    else
    {
      $this -> pass = $pass;
    }
  }

  public function setName($name)
  {
    $this -> name = $name;
  }

  public function setEmail($email)
  {
    $this -> email = $email;
  }

  public function url()
  {
    return base_url().self::$url_init[$this->type];
  }

  private static $type_user = array('superadmin','supervisor','vendedor','cliente');

  private static $url_init = array('','','sales','');

  private static $sql = array(
    'login' => 'SELECT name,email,type,login FROM users WHERE login = ?  AND password = ?',
    'loadById' => 'SELECT name,email,type,login FROM users WHERE login = ?',
    /* This query are over the view */
    'getClientsSales' => 'SELECT login, client_name, idcliente, zone, idzone FROM clients_sales WHERE login = ?',
    'getClients' => 'SELECT login, client_name, idcliente, zone, idzone FROM clients_sales'
    );
}
/* End of file sammy_user.php */
/* Location: ./application/controllers/sammy_user.php */