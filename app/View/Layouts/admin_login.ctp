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

    <?php echo $this->Html->css('admin/bootstrap.min'); ?>
    <style type="text/css">
		html, body {
			background-color: #eee;
		}

		body {
			padding-top: 40px;
		}

		.container {
			width: 270px;
		}

		.container > .content {
			background-color: #fff;
			padding: 20px;
			margin: 0 -20px;
			-webkit-border-radius: 10px 10px 10px 10px;
			-moz-border-radius: 10px 10px 10px 10px;
			border-radius: 10px 10px 10px 10px;
			-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.15);
			-moz-box-shadow: 0 1px 2px rgba(0,0,0,.15);
			box-shadow: 0 1px 2px rgba(0,0,0,.15);
		}

		.login-form {
			padding: 0 40px;
		}

		legend {
			margin-right: -50px;
			font-weight: bold;
			color: #404040;
		}
    </style>

</head>
<body>
  <div class="container">
      <div class="content">
          <div class="row">
              <?php echo $this->fetch('content'); ?>
          </div>
      </div>
  </div>
</body>
</html>