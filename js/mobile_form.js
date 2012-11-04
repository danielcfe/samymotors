$(document).on('ready',function(){
  var $search = $('.link_search');
  var $form = $('.link_form');
  var $last_row;
  var $jqForm = $('#order_form');
  var $select_discount = $('#select-discount');
  var percent = parseFloat( $select_discount.find('option:selected').data('percent'));

  /*fix bug*/
  $('a[href="#form"]').trigger('click');
  /********/
  $jqForm.on('click','.search',function(){
    var $this = $(this);
    if($this.val().length === 0)
    {
      $last_input = $this.parents('.row');
      $search.trigger('click');
    }
  })
  .on('change','.quantity_change',function(){
    var $this = $(this);
    var $row = $this.parents('.row');
    var quantity = $this.val();
    if (quantity > 0)
    {
      var unit_price = $row.find('#price').val();
      $row.find('#price_total').val(unit_price*quantity);
      $jqForm.trigger('sammymobile.recalculate_order');
    }
    else
    {
      $this.val(0);
      alert('La cantidad debe ser igual o mayor a 1 unidad');
    }
  })
  .on('sammymobile.newprice','#price',change_price_by_discount)
  .on('sammymobile.recalculate_order',recalculate_order);

  $('#searcher').on('click','a',function(e){
    e.preventDefault();
    var $this = $(this);
    $last_input.find('input[name="item_code[]"]').val($this.data('code'));
    $last_input.find('input[name="description[]"]').val($this.data('description'));
    $last_input.find('#price').data({'price':$this.data('price')}).trigger('sammymobile.newprice');
    $form.trigger('click');
  });

  $('.add_item').on('click',function(e){
    e.preventDefault();
    $jqForm.append($("#form_row").html());
  });
  
  $select_discount.on('change',function(){
    percent = $select_discount.find('option:selected').data('percent');
    $('.unit_price').trigger('sammymobile.newprice');
    $jqForm.trigger('sammymobile.recalculate_order');
  });

  function recalculate_order()
  {
    var total = 0;
    $('.total_unit_price').each(function(){
      var number = parseFloat($(this).val());
      number = number ? number : 0;
      total += number;
    });
    $('#order_total').html(total);
  }

  function change_price_by_discount()
  {
    var $this = $(this);
    var price = parseFloat($this.data('price'));
    var $quantity = $this.parents('.row').find('#quantity');
    var quantity;
    price = price ? price : 0;
    price = price * ( 1 - percent);
    $this.val(price);
    quantity = $quantity.val();
    quantity = quantity > 0 ? quantity : 1;
    $quantity.val(quantity).trigger('change');
  }
});



