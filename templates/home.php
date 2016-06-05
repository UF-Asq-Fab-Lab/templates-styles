<?php

// home.php (homepage) template file.
// See README.txt for more information
if( count($page->precontent_video) ) {
	$precontent = include_render("./includes/precontent-video.inc");
} else if( count($page->precontent_images) ){
	$precontent = include_render("./includes/precontent-images.inc");
}
