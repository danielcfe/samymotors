<div date-role='page' id='form' role='main'>
  <? include('header.php');?>
  <div date-role ='content'>
    <div data-role="controlgroup" data-type="horizontal">
      <a href="#" data-role="button" data-icon="plus" class='add_item'>Agregar Item</a>
      <a href="index.html" data-role="button" data-icon="delete">Eliminar Ultimo Item</a>
      <a href="index.html" data-role="button">Maybe</a>
    </div>
    <form action="sales/created_order" method='post' id='order_form'>
      <div  class='row'>
        <div data-role="fieldcontain" class="ui-hide-label">
          <label for="code">Código</label>
          <input type="text" class='search' id='code' name="item_code[]" placeholder="Código"/>
        </div>
        <div data-role="fieldcontain" class="ui-hide-label description">
          <label for="description">Descripción</label>
          <input type="text"  class='search'id='description' name="description[]" placeholder="Descripción" />
        </div>
        <div data-role="fieldcontain" class="quantity ui-hide-label">
          <label for="quantity">Cantidad</label>
          <input type="number" class='quantity_change' id='quantity' name="quantity[]" placeholder="Cantidad"/>
        </div>
        <div data-role="fieldcontain" class="price ui-hide-label">
          <label for="price">Precio Por Unidad</label>
          <input type="text" id='price' placeholder="Precio por unidad" title='Precio por unidad' readonly='readonly' class='unit_price'/>
        </div>
        <div data-role="fieldcontain" class="price ui-hide-label">
          <label for="price_total">Precio Total</label>
          <input type="text" class='total_unit_price' id='price_total' placeholder="Precio del pedido" title='Precio por unidad' readonly='readonly'/>
        </div>
      </div>
      <script type="template/javascript" rel='template' id='form_row'>
      <div class="row">
        <div data-role="fieldcontain" class="ui-hide-label ui-field-contain ui-body ui-br"><label for="code" class="ui-input-text">Código</label><input type="text" class="search ui-input-text ui-body-c ui-corner-all ui-shadow-inset" id="code" name="item_code[]" placeholder="Código"></div>
        <div data-role="fieldcontain" class="ui-hide-label description ui-field-contain ui-body ui-br"><label for="description" class="ui-input-text">Descripción</label><input type="text" class="search ui-input-text ui-body-c ui-corner-all ui-shadow-inset" id="description" name="description[]" placeholder="Descripción"></div>
        <div data-role="fieldcontain" class="quantity ui-hide-label ui-field-contain ui-body ui-br"><label for="quantity" class="ui-input-text">Cantidad</label><input type="number" id="quantity" name="quantity[]" placeholder="Cantidad" class="quantity_change ui-input-text ui-body-c ui-corner-all ui-shadow-inset"></div>
        <div data-role="fieldcontain" class="price ui-hide-label ui-field-contain ui-body ui-br"><label for="price" class="ui-input-text">Precio Por Unidad</label><input type="text" id="price" placeholder="Precio por unidad" title="Precio por unidad" readonly="readonly" class="unit_price ui-input-text ui-body-c ui-corner-all ui-shadow-inset"></div>
        <div data-role="fieldcontain" class="price ui-hide-label ui-field-contain ui-body ui-br"><label for="price_total" class="ui-input-text">Precio Por Unidad</label><input type="text" id="price_total" placeholder="Precio del pedido" title="Precio total" readonly="readonly" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset total_unit_price"></div>
      </div>
      </script>
    </form>
  </div>
  <div data-theme="a" data-role="footer" data-position="fixed">
    <div class="h3 discount">
      <?include ('discount.php'); ?>
    </div>
    <div class='h3 form'>
      Total: <span>Bs</span> <span id='order_total'>0</span>
    </div>
  </div>
</div>
<div data-role='page' id='review'>
  <? include('header.php');?>
  <div data-role='content'>
    <ul data-role="listview" data-inset="true" data-filter="true" id='searcher'>
    <li > 
      <a class='item_filter' date-role='button'data-code='022125' data-description='Rolinera' data-price='100'>022125 Rolinera</a>
    </li>
    <li > 
      <a class='item_filter' date-role='button'data-code='022126' data-description='Radiadores' data-price='200'>022126 Radiadores</a>
    </li>
    <li> 
      <a class='item_filter' date-role='button'data-code='022128' data-description='Gomas' data-price='300'>022128 Gomas</a>
    </li>
    <li> 
      <a class='item_filter' date-role='button'data-code='0fasd' data-description='Bujias' data-price='400'>0fasd Bujias</a>
    </li>
  </ul>
  </div>
  <a style='display:none' class='link_form' href="#form"> Carga de pedidos</a>
  <a style='display:none' class='link_search' href="#review"> Carga de pedidos</a>
</div>

<div data-role='page' id=''>
  <? include('header.php');?>
  <a href="#form"> Carga de pedidos</a>
</div>