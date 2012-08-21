<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<html lang="en">
  <head>
	<meta charset="utf-8">
	<title><?php echo $title_for_layout; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Author <author@domain.tld>">

	<?php echo $this->Html->css(array('admin/bootstrap.min', 'admin/style', 'admin/bootstrap-responsive.min')); ?>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>

  <body>

	  <div class="navbar navbar-fixed-top">
		  <div class="navbar-inner">
			  <div class="container-fluid">
				  <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
				  </a>
				  <?php echo $this->Html->link('Your Application', '/admin', array('class' => 'brand')); ?>
				  <div class="btn-group pull-right">
					  <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						  <i class="icon-user"></i> <?php echo $this->Session->read('Auth.User.name'); ?>
						  <span class="caret"></span>
					  </a>
					  <ul class="dropdown-menu">
						  <li><?php echo $this->Html->link('Edit Profile', '/admin/users/edit/'.$this->Session->read('Auth.User.id')); ?></li>
						  <li class="divider"></li>
						  <li><?php echo $this->Html->link('Sign out', array('admin' => true, 'controller' => 'home', 'action' => 'logout')); ?></li>
					  </ul>
				  </div>
				  <div class="nav-collapse">
					  <?php echo $this->element('admin/navigation'); ?>
				  </div>
			  </div>
		  </div>
	  </div>

	  <div class="container-fluid">
		  <div class="row-fluid" id="main-content">
			  <?php echo $this->fetch('content'); ?>
		  </div><!--/row-->

		  <hr>

		  <footer>
			  <p>&copy; Author <?php echo date('Y'); ?></p>
		  </footer>

	  </div><!--/.fluid-container-->

	<?php echo $this->Html->script(array(
		'admin/jquery-1.7.2.min',
		'admin/bootstrap.min'
	)); ?>
	<?php echo $this->fetch('script'); ?>
	<?php if(isset($this->Js)) echo $this->Js->writeBuffer(); ?>
	<script type="text/javascript">
		$('form').bind('click', function(e){
			var target = $(e.target);
			if(target.is('.form-submit')) {
				e.preventDefault();
				if(target.hasClass('confirm') && !confirm(target.data('message'))) {
					return true;
				}
				$(this).submit();
			}
		});

		$('.back').click(function(e){
			e.preventDefault();
			window.history.go(-1);
		});
	</script>

  </body>
</html>
