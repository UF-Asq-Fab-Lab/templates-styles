<?php

// basic-page.php template file
// See README.txt for more information

// Primary content is the page's body copy
$content = $page->body;

// if the rootParent (section) page has more than 1 child, then render
// section navigation in the sidebar
if($page->rootParent->hasChildren > 0) {
	$sidebar = renderNav($page->rootParent, 3) . $sidebar;
}
