<?
 $menu = array(
  'order' => array('name'=>'Pedidos','href'=>'sales','attributs' => array()),
  'query' => array('name'=>'Consultas','href'=>'#','attributs' => array()),
  'account' => array('name'=>'Mi cuenta','href'=>'#','attributs' => array()),
  'logoff' => array('name' => 'Salir', 'href' =>'user/logoff','attributs' => array('rel' => 'external', 'data-ajax'=>'false'))
  );
 ?>
<ul>
<? foreach($menu as $key => $value):?>
  <li>
    <? if($controller === $key ):?>
      <? $value['attributs']['class'] = isset($value['attributs']['class']) ? $value['attributs']['class'].' ui-btn-active' : 'ui-btn-active';?> 
    <? endif; ?>
    <?= anchor($value['href'], $value['name'], $value['attributs']);?>
  </li>
<?endforeach;?>
</ul>