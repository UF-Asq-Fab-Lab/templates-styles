<?php

// home.php (homepage) template file.
// See README.txt for more information
if(count($page->demo_video)){
	$demovideo = $page->demo_video;
	$precontent = "<div class='section demo-video'>";
	$precontent .= "<video autoplay loop muted poster='".$demovideo->eq(2)->httpUrl."' id='bgvid' style='background: url(".$demovideo->eq(2)->httpUrl.") no-repeat;'>";
	$precontent .= "<source src='".$demovideo->eq(1)->httpUrl."' type='video/mp4'>";
	$precontent .= "<source src='".$demovideo->eq(0)->httpUrl."' type='video/webm'>";
	$precontent .= "</video></div>";
} else if(count($page->images)){
	$images = $page->images;
	$precontent = "<div class='section demo-slideshow'>";
	foreach ($images as $image) {
		$precontent .= "<img class='demo-slideshow-image' src='$image->url' alt='$image->description' />";
	}
	$precontent .= "</div>";
}

// if there are images, lets choose one to output in the sidebar
if(count($page->images)) {
	// if the page has images on it, grab one of them randomly...
	$image = $page->images->getRandom();
	// resize it to 400 pixels wide
	$image = $image->width(400);
	// output the image at the top of the sidebar...
	$imageMarkup = "<img class='u-max-full-width' src='$image->url' alt='$image->description' />";
	// ...and append sidebar text under the image
	$sidebar = $sidebar.$imageMarkup;
}
