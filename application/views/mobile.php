<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title> Samymotors version Mobile </title>

    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
    <?= link_tag('css/mobile_user.css');?>

    <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>

    <?if(isset($js_array)): ?>
    <? foreach($js_array as $js): ?>
      <script type="text/javascript" src='<?=base_url().'js/'.$js?>'></script>
    <? endforeach; ?>
    <? endif;?>

  </head>
  <body>
    <?php include($page) ?>
  </body>
</html>