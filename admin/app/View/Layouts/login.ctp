<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'TESOL Chile');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
 <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>
        <?php echo $cakeDescription ?>:
        <?php echo $this->fetch('title'); ?>
    </title>
    <?php //echo $this->Html->meta('icon'); ?>
    <?php echo $this->Html->meta('icon', '/img/favicon.png', ['type' => 'image/png']) ?>
    <?php //echo $this->Html->css('cake.generic'); ?>
    <?php echo $this->Html->css('https://fonts.googleapis.com/icon?family=Material+Icons'); ?>
    <?php echo $this->Html->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'); ?>
    <?php echo $this->Html->css('materialize'); ?>
    <?php echo $this->Html->css('style'); ?>
</head>
<body>
<div id="header">
    <div class="navbar-fixed">
        <nav class="white" role="navigation">
            <div class="nav-wrapper container">
                <a id="logo-container" href="http://www.tesol.cl" class="brand-logo white-text"><img src="/img/logo.png" style="height: 1.5em;
        margin-top: 4px;"></a>
            </div>
        </nav>
    </div>
</div>
<?php echo $this->Flash->render(); ?>
<?php echo $this->fetch('content'); ?>
<footer class="page-footer blue darken-4">
    <div id="bottom" class="footer-copyright white">
        <div class="container">
            <a class="left" href="#!" onclick="$(this).next().fadeToggle('300');" style="margin-right: 6px;"><img src="/img/acode_min_black.png" style="height: 1.2em; margin-bottom: -3px;"></a>
            <div class="ease-toggle black-text" style="display: none;">Developed by <a href="http://acode.cl" target="_blank"><img src="/img/acode_full_black.png" style="height: 1.2em; margin-bottom: -3px;"></a></div>
        </div>
    </div>
</footer>
<?php echo $this->element('sql_dump'); ?>
<?php echo $this->Html->script('jquery-3.3.1.min'); ?>
<?php echo $this->Html->script('materialize'); ?>
<?php echo $this->Html->script('init'); ?>
</body>
</html>
