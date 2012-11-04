<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
  This just have method static
*/
class Product_model extends CI_Model {
  private $code;
  private $description;
  private $price;
  private static $db;

  public function __construct()
  {
    parent::__construct();
    self::$db = &get_instance()->db;
  }

  /**
  * @return array all products in the database
  */
  public static function all()
  {
    return self::query('all');
  }

  public static function allDiscounts()
  {
    return self::query('discounts');
  }

  private static function query($name_sql,$param = null){
    $result = array();
    $rs = self::$db->query(self::$sql[$name_sql],$param);
    foreach ($rs->result_array() as $row) {
      $result[] = $row;
    }
    return $result; 
  }
  private static $sql = array(
    'all' => 'SELECT * FROM items',
    'discounts' => 'SELECT concat(name, \' (\', porcent*100 ,\'% )\') as name,porcent,iddiscounts as id FROM discounts'
  );
}

/* End of file Products_model.php */
/* Location: ./application/models/Products_model.php */
