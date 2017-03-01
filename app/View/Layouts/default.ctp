<?php
/**
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

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Sansita" rel="stylesheet">
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('bootstrap');
		echo $this->Html->css('full-slider');
		echo $this->Html->script('bootstrap');
		echo $this->Html->script('jquery');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->fetch('fonts');
		echo $this->Html->css('style');
	?>
</head>
<body>




	<!-- Ashik's code starts here -->


	<div class="top-header">
				<div class="container">
					<div class="col-lg-4">
						<div class="col-md-10">
						<form action="#" role="form">
								<div class="panel-body ">
									<div class="input-group">
									<input type="search" name="search" class="form-control" placeholder="Search">
									<div class="input-group-btn">
										<button class="btn btn-default" name="search_submit" type="submit"><i class="glyphicon glyphicon-search"></i></button>
									</div>
									</div>
								</div>
						</form>
						</div>
					</div>
					<div class="col-lg-4" >
						<div class="text-center">
							<img src="img/logo.png" width="70%" >
						</div>
					</div>
					<div class="col-lg-4">
						<div class="navbar">
							<ul class="nav navbar-nav navbar-right">
								<li><?php
			 				 if (AuthComponent::user('id')){?>
								 <a href="#"><i class="glyphicon glyphicon-user"></i> Profile</a>
							 <?php }
								 else{ ?>
								 	<a href="Users/login"><i class="glyphicon glyphicon-log-in"></i> Login</a>
								<?php } ?>
								</li>
								<li><?php
			 				 if (AuthComponent::user('id')){?>
								 <a href="Users/logout"><i class="glyphicon glyphicon-log-in"></i> Logout</a>
							 <?php }
								 else{ ?>
								 	<a href="Users/add"><i class="glyphicon glyphicon-user"></i> Sign up</a>
								<?php } ?>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
	<nav class="navbar navbar-default">
			<div class="container">

				<div class="navbar-header page-scroll">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>

				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav ">
						<li class="hidden">
							<a href="#page-top"></a>
						</li>
						<li>
							<a class="page-scroll" href="/khabarshabar/">Home</a>
						</li>
						<li>
							<a class="page-scroll" href="#">Foods</a>
						</li>
						<li>
							<a class="page-scroll" href="#">Exercise</a>
						</li>
						<li>
							<a class="page-scroll" href="/khabarshabar/Blogs">Blog</a>
						</li>
						<li>
							<a class="page-scroll" href="#">Shop</a>
						</li>
						<li>
							<a class="page-scroll" href="#">About Us</a>
						</li>

					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</nav>


<!-- It ends here -->




	<div id="container">
		<div id="header">

		</div>
		<div id="content">

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<!-- <?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
				);
			?> -->


		</div>
	</div>
	<!-- <?php echo $this->element('sql_dump'); ?> -->




	<footer class="navbar navbar-default">
		<div class="container">
			<div class="navbar-text pull-left">
				<h5>&copy;G&R Intern Red Team</h5>
			</div>
			<div class="navbar-text pull-right">
				<a href="#"><i class="fa fa-facebook-square fa-2x"></i></a>
				<a href="#"><i class="fa fa-google-plus-square fa-2x"></i></a>
				<a href="#"><i class="fa fa-linkedin-square fa-2x"></i></a>
				<a href="#"><i class="fa fa-twitter-square fa-2x"></i></a>
				<a href="#"><i class="fa fa-instagram fa-2x"></i></a>

			</div>
		</div>
	</footer>


</body>
</html>
