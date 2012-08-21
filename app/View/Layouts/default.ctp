<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title><?php echo $title_for_layout; ?></title>
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<?php echo $this->Html->css(array(
		'normalise', 'style'
	)); ?>

	<?php echo $this->fetch('css'); ?>

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<?php echo $this->Html->meta('icon'); ?>
	<link rel="apple-touch-icon" href="../images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="../images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="../images/apple-touch-icon-114x114.png">

	<script>
		var WEBROOT = '<?php echo $this->base; ?>/';
	</script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?php echo $this->webroot; ?>js/jquery-1.7.2.min.js"><\/script>')</script>
</head>
<body>

	<header>
		<h1>Your Application</h1>
	</header>


	<div id="main_content" role="main">

			<div class="container content">
				<?php echo $this->fetch('content'); ?>
			</div><!-- container -->

	</section>

	<footer>

			<div class="container copyright">

			<div class="sixteen columns">

				<p class="c_right">&copy; Copyright Your App <?php echo date('Y'); ?></p>

			</div>

		</div><!-- container -->

	</footer>

	<?php echo $this->fetch('script'); ?>
	<?php echo $this->Html->script(array(
		/* List JS here */
	)); ?>
</body>
</html>
