<label for="select-discount" class="select">Modo de Pago</label>
<select name="select-discount" id="select-discount" data-mini="true">
  <?php foreach ($discounts as $value): ?>
    <option value='<?= $value['id']?>' data-percent= '<?= $value['porcent'] ?>'  > <?= $value['name'] ?></option>
  <?php endforeach ?> 
</select>
