<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'SuFO: Student Feedback Online');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
            echo $this->Html->meta('icon');

            echo $this->Html->css('cake.generic');
            echo $this->Html->css('bootstrap');

            //Bootstrap :D
            echo $this->Html->css('bootstrap.min');
            echo $this->Html->css('bootstrap-responsive');
            echo $this->Html->css('bootstrap-responsive.min');
            
            echo $this->Html->script('bootstrap');
            echo $this->Html->script('bootstrap.min');
            echo $this->Html->script('bootstrap-button');
            echo $this->Html->script('bootstrap-collapse');

            echo $this->fetch('meta');
            echo $this->fetch('css');
            echo $this->fetch('script');
	?>
</head>

<body style="background-color: #eee;">

	<div id="container">
		<div id="header">
                        <?php //echo "<img src='img/uitm_logo.gif'/> <img src='img/ilearn_logo2.jpg'/>"; ?>
                        <h4> <?php echo $cakeDescription; ?> </h4>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			footer
		</div>
	</div>
	
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
