<?php

function renderQuestion($qa){
	$answer = $qa->answer;
	$question = $qa->question;
	$out = "<div class='faq-question'><p>";
	$out .= $question."</p></div><div class='faq-answer'><p>";
	$out .= $answer."</p></div>";
	return $out;
}

function renderFAQ($page){
	$markup = "<div class='faq-container'>";
	foreach ($page->faq as $key => $qa) {
		$markup .= renderQuestion($qa);
	}
	$markup .= "</div>";
	return $markup;
}

$content = renderFAQ($page);

?>
