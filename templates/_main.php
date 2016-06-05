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
?>
<!DOCTYPE html>
<html lang="en">

<?php include_once('./_head.php') ?>

<body>

	<!-- top navigation -->
	<?php include_once('./_nav.php'); ?>

		<!-- pre-content (big-screen slideshow or video, if present) -->

	<?php if($precontent) echo $precontent; ?>

	<div id='main'>
		<!-- main content -->
		<div id='content' class="container">
			<div class="row">
			<?php
				if($sidebar){
					include_once('./_two-column.php');
				} else {
					include_once('./_one-column.php');
				}
			?>
			</div>
		</div>
	</div>

	<!-- footer -->
	<footer id='footer'>
		<div id='footer-container' class="container">

		</div>
	</footer>

</body>

<script type="text/javascript" src="<?php echo $config->urls->templates ?>scripts/main.js"></script>
<script type="text/javascript" src="<?php echo $config->urls->templates ?>scripts/faq.js"></script>

</html>
