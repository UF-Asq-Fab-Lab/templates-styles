<?php

/**
 * _main.php
 * Main markup file
 *
 * This file contains all the main markup for the site and outputs the regions
 * defined in the initialization (_init.php) file. These regions include:
 *
 *   $title: The page title/headline
 *   $content: The markup that appears in the main content/body copy column
 *   $sidebar: The markup that appears in the sidebar column
 *
 * Of course, you can add as many regions as you like, or choose not to use
 * them at all! This _init.php > [template].php > _main.php scheme is just
 * the methodology we chose to use in this particular site profile, and as you
 * dig deeper, you'll find many others ways to do the same thing.
 *
 * This file is automatically appended to all template files as a result of
 * $config->appendTemplateFile = '_main.php'; in /site/config.php.
 *
 * In any given template file, if you do not want this main markup file
 * included, go in your admin to Setup > Templates > [some-template] > and
 * click on the "Files" tab. Check the box to "Disable automatic append of
 * file _main.php". You would do this if you wanted to echo markup directly
 * from your template file or if you were using a template file for some other
 * kind of output like an RSS feed or sitemap.xml, for example.
 *
 * See the README.txt file for more information.
 *
 */
?><!DOCTYPE html>
<html lang="en">
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
	<script type="text/javascript" src="<?php echo $config->urls->templates ?>scripts/d3/d3.min.js"></script>
	<script type="text/javascript" src="<?php echo $config->urls->templates ?>scripts/jquery/dist/jquery.min.js"></script>
</head>
<body class="<?php if($sidebar) echo "has-sidebar "; ?>">

	<!-- top navigation -->
		<div class="container">
    <nav class="navbar">
      <div class="container">
        <div id="logo-col" class="three columns">
					<a href="<?php echo $homepage->url ?>" id="logo-link"><img id="logo-img" src="<?php echo $homepage->logo->httpUrl ?>"></img></a>
          <div class="navbar-toggle"><i class="fa fa-bars"></i></div>
        </div>
        <ul class="mobile-navbar-list">
					<?php
					foreach($homepage->children as $item) {
						if($item->id == $page->rootParent->id) echo "<li class='navbar-item current'>";
							else echo "<li class='navbar-item'>";
						echo "<div class='container'><a class='navbar-link' href='$item->url'>$item->title</a></div></li>";
					}
					?>
        </ul>
      <div class="nine columns">
        <ul class="navbar-list">
					<?php
					// top navigation consists of homepage and its visible children
					foreach($homepage->children as $item) {
						if($item->id == $page->rootParent->id) echo "<li class='navbar-item current'>";
							else echo "<li class='navbar-item'>";
						echo "<a class='navbar-link' href='$item->url'>$item->title</a></li>";
					}
					?>
        </ul>
      </div>
      </div>
    </nav>
    </div>

		<!-- pre-content (big-screen slideshow or video, if present) -->

<?php if($precontent) echo $precontent; ?>

	<div id='main'>

		<!-- main content -->
		<div id='content' class="container">
			<div class="row">
				<?php if($sidebar){
					echo "<div class='two-thirds column'>";
				} else {
					echo "<div class='twelve columns'>";
				}?>
					<div id="title"><div id="title-text"><h1><?php echo $title; ?></h1></div></div>
				<?php echo $content; ?>
			</div>
			<div class="one-third column">
				<!-- sidebar content -->
				<?php if($sidebar): ?>
				<div id='sidebar'>
					<?php echo $sidebar; ?>
				</div>
				<?php endif; ?>
			</div>
			</div>
		</div>

	</div>

	<!-- footer -->
	<footer id='footer'>
		<div id='footer-container' class="container">
		<p>"A²" comes from the collaboration of the two schools which formed the lab,
			the College of Design, Construction and Planning's School of Architecture and
			the College of Fine Art's School of Art and Art History. However, as of Fall 2012,
			the lab is open to the ALL at the University of Florida!</p>
	</div>
	</footer>

</body>
<script type="text/javascript" src="<?php echo $config->urls->templates ?>scripts/main.js"></script>
<script type="text/javascript" src="<?php echo $config->urls->templates ?>scripts/faq.js"></script>

</html>
