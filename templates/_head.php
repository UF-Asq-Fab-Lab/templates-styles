<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title; ?></title>
	<meta name="description" content="<?php echo $page->summary; ?>" />
	<link href='http://fonts.googleapis.com/css?family=Quicksand:400,300,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $config->urls->templates?>styles/normalize.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $config->urls->templates?>styles/skeleton.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $config->urls->templates?>styles/main.css" />
	<?php
		foreach ($config->styles->unique() as $file) {
			echo "<link rel='stylesheet' type='text/css' href='$file'/>";
		}
	?>
	<script type="text/javascript" src="<?php echo $config->urls->templates ?>scripts/d3/d3.min.js"></script>
	<script type="text/javascript" src="<?php echo $config->urls->templates ?>scripts/jquery/dist/jquery.min.js"></script>
	<?php
		foreach ($config->scripts->unique() as $file) {
			echo "<script type='text/javascript' src='$file'></script>";
		}
	?>
</head>
