<?php

/**
 * /site/templates/_func.php
 *
 * Example of shared functions used by template files
 *
 * This file is currently included by _init.php
 *
 * For more information see README.txt
 *
 */

/**
 * Given a group of pages, render a <ul> navigation
 *
 * This is here to demonstrate an example of a shared function and usage is completely optional.
 *
 * @param array|PageArray $items
 * @param int $maxDepth How many levels of navigation below current should it go?
 * @param string $fieldNames Any extra field names to display (separate multiple fields with a space)
 * @param string $class CSS class name for containing <ul>
 * @return string
 *
 */
function renderNav($items, $maxDepth = 0, $fieldNames = '', $class = 'nav') {

	// if we were given a single Page rather than a group of them, we'll pretend they
	// gave us a group of them (a group/array of 1)
	if($items instanceof Page) $items = array($items);

	// $out is where we store the markup we are creating in this function
	$out = '';

	// cycle through all the items
	foreach($items as $item) {

		// markup for the list item...
		// if current item is the same as the page being viewed, add a "current" class to it
		$out .= $item->id == wire('page')->id ? "<li class='current'><i class='fa fa-angle-double-right'></i> " : "<li><i class='fa fa-angle-right'></i> ";

		// markup for the link
		$out .= "<a href='$item->url'>$item->title</a>";

		// if there are extra field names specified, render markup for each one in a <div>
		// having a class name the same as the field name
		if($fieldNames) foreach(explode(' ', $fieldNames) as $fieldName) {
			$value = $item->get($fieldName);
			if($value) $out .= " <div class='$fieldName'>$value</div>";
		}

		// if the item has children and we're allowed to output tree navigation (maxDepth)
		// then call this same function again for the item's children
		if($item->hasChildren() && $maxDepth) {
			if($class == 'nav') $class = 'nav nav-tree';
			$out .= renderNav($item->children, $maxDepth-1, $fieldNames, $class);
		}

		// close the list item
		$out .= "</li>";
	}

	// if output was generated above, wrap it in a <ul>
	if($out) $out = "<ul class='$class'>$out</ul>";

	// return the markup we generated above
	return $out;
}

function renderAccount(){
	$markup = "";
	if(wire('modules')->isInstalled("LabUser")) {
		$luData = wire('modules')->getModuleConfigData("LabUser");
		$registerPage = wire('pages')->get($luData["register_page_id"]);
		$loginPage = wire('pages')->get($luData["login_page_id"]);
		$accountPage = wire('pages')->get($luData["account_page_id"]);
		$resetPage = wire('pages')->get($luData["reset_page_id"]);
		$username = " " . wire('user')->name;
		$pageurl = wire('page')->httpUrl;
		$markup .= "<div id='account-control'>";
    if(wire('user')->isLoggedIn()){
			$markup .= "<p id='account-name'><i class='fa fa-user'></i>{$username} | ";
			$markup .= "<a id='account-link' href='{$accountPage->httpUrl}'>Account</a> | ";
			$markup .= "<a id='logout-link' href='{$pageurl}?logout=1'>";
			$markup .= "<i class='fa fa-sign-out'></i>Log-out</a></p>";
		} else {
			$markup .= "<p id='login-register'><a id='login-link' href='{$loginPage->url}'>";
			$markup .= "<i class='fa fa-sign-in'></i>Log-In</a> | ";
			$markup .= "<a id='register-link' href='{$registerPage->url}'>Register</a>";
			$markup .= " | <a id='forgot-password-link' href='{$resetPage->url}'>Forgot Password?</a></p>";
		}
		$markup .= "</div>";
	}
	return $markup;
}

function renderModulesControls(){
	$markup = "";
	$markup .= "<div id='modules-control'>";
	if(wire('modules')->isInstalled("Uploader")) {
		$uploaderConfig = wire('modules')->getModuleConfigData("Uploader");
		$uploadPageUrl = wire('pages')->get($uploaderConfig['uploader_page_id'])->httpUrl;
		$markup .= "<a href='{$uploadPageUrl}' class='button button-primary'><i class='fa fa-upload'></i> Upload</a>";
	}
	if(wire('modules')->isInstalled("Scheduler")) {
		$schedulerConfig = wire('modules')->getModuleConfigData("Scheduler");
		$schedulerPageUrl = wire('pages')->get($schedulerConfig['scheduler_page_id'])->httpUrl;
		$markup .= "<a href='{$schedulerPageUrl}' class='button button-primary'><i class='fa fa-calendar'></i> Schedule</a>";
	}
	$markup .= "</div>";
	return $markup;
}
