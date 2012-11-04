<? include('header.php');?>

<div data-role='content'>
  <ul data-role="listview" data-inset="true" data-filter="true">
    <?php foreach($clients as $client):?>
    <li>  
      <?= anchor('sales/order/'.$client['idcliente'].'/'.$client['client_name'],$client['client_name'].' '.$client['zone'],
       array('rel'=>'external','data-ajax'=>'false'));?>
    </li>
    <?php endforeach;?>
    <?php if (count($clients) === 0):?>
      <li> No tiene clientes asignados.</li>
    <?php endif;?>
  </ul>
</div>
