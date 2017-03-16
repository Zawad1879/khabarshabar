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

	<!-- <script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Sansita" rel="stylesheet"> -->


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

	<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "300px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

var get_breakfast_foods = function () {
$('#foodsList').empty();
var baseUrl = '<?php echo $this->Html->url("/food/getBreakfastFoods") ?>';
//var targetUrl = baseUrl + $id;
var targetUrl = baseUrl;
console.log(targetUrl);
$.get( targetUrl, function( data ) {
		console.log(data);
		//$(data).each(function () { $("<option value='" + this.zip_codes.id + "'>" + this.zip_codes.postoffice + "</option>").appendTo('#NewsPostoffice'); });
	});
}
</script>


</head>
<body>

	<div id="mySidenav" style="z-index:2;" class="sidenav">


		<div class="sideNavHeader" style="background: url(img/navbarHeaderImage.jpg);background-size: 100%;" >
	  	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<h1 class="text-center" style="color: white;">Food Bank</h1>
			<div class="sandbox_search">
            <div class="clear_search"><span class="glyphicon glyphicon-remove"></span></div>
            <input class="sb_search_input search-query form-control ignoreEnforceFocus" id="searchFood" placeholder="Search database..." type="text">
      </div>

			<div class="menuButtons">
			<div style="float: left; width: 50%;">
			<button id="BreakfastButton" class="btn btn-primary" onclick="get_breakfast_foods()">Breakfast</button>
			<button id="LunchButton" class="btn btn-primary">Lunch</button>
			<button id="DinnerButton" class="btn btn-primary">Dinner</button>
			</div>
			<div style="float: left; width: 50%;">
				<button id="AllFoodsButton" class="btn btn-primary">All foods</button>
				<button id="FavouritesButton" class="btn btn-primary">Favourites
				<span class="glyphicon glyphicon-heart"></span></button>
			</div>
			</div>
		</div>
<script src="js/global.js"></script>
		<div class="navbarBody" id = "foodsList">
		  <a href="#">About</a>
		  <a href="#">Services</a>
		  <a href="#">Clients</a>
		  <a href="#">Contact</a>
		</div>
	</div>


	<!-- Ashik's code starts here -->


	<div class="top-header" >
		<span id="drawerIcon" style="font-size:30px;cursor:pointer; position:fixed; color:white; z-index:1;" onclick="openNav()">&#9776;</span>
				<div class="container">

					<div class="col-lg-4">
						<div class="col-md-10">
						<form action="#" role="form">
								<div class="panel-body ">
									<div class="input-group">
									<input style="z-index:0;" type="search" name="search" class="form-control" placeholder="Search">
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
							<img src="http://localhost/khabarshabar/img/logo.png" width="70%" >
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
