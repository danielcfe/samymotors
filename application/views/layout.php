<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="<?=base_url()?>css/bootstrap.min.css">
        <style>
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>
        <link rel="stylesheet" href="<?=base_url()?>css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="<?=base_url()?>css/main.css">
        <script src="<?=base_url()?>js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <?= anchor('','Samymotors',array( 'class' => 'brand'));?>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li class="active"><a href="#">Inicio</a></li>
                            <li><a href="#about">Productos</a></li>
                            <li><a href="#contact">Contactenos</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li class="nav-header">Nav header</li>
                                    <li><a href="#">Separated link</a></li>
                                    <li><a href="#">One more separated link</a></li>
                                </ul>
                            </li>
                        </ul>
                        <?php if ($user): ?>
                        <div class="navbar-form pull-right" action='<?= base_url().'user/login'; ?>' method='POST'>
                            <div class="btn-group">
                                <?=anchor('user/profile/'.$user['login'], $user['name'], array('class'=>'btn  btn-success'));?>
                                <?=anchor('user/logoff/', 'Salir', array('class'=>'btn btn-link'));?>

                            </div>
                        </div>
                        <?else:?>
                        <form class="navbar-form pull-right" action='<?= base_url().'user/login'; ?>' method='POST'>
                            <input class="span2" type="text" placeholder="Login" name='login' id='login'>
                            <input class="span2" type="password" placeholder="Password" name='pass' id='pass'>
                            <button type="submit" class="btn">Sign in</button>
                        </form>
                        <?php endif ?>

                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div class="container">

            <?include $page; ?>

        </div> <!-- /container -->
        <footer>
            <p>&copy; Company 2012</p>
        </footer>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.js"></script>
        <script>window.jQuery || document.write('<script src="<?=base_url()?>js/vendor/jquery-1.8.1.js"><\/script>')</script>
        <script src="<?=base_url()?>js/vendor/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        <?php if (isset($js)): ?>
            <?php foreach ($js as $name): ?>
                <script type="text/javascript" src="<?=base_url().'js/$name'?>"> </script>
            <?php endforeach ?>
        <?php endif ?>
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
