<?php

  function sendEmail($to, $toName, $from, $fromName, $subject, $body){
    $mailer = wireMail();
    $mailer->to($to, $toName)->from($from, $fromName);
    $mailer->subject($subject)->body($body);
    $recipients = $mailer->send();
    return $recipients;
  }

  function handleContactForm($input, $sanitizer, $page){
    $message = "";
    if($input->post->submit){
      $post = $input->post;

    	$fromName = $sanitizer->text($post->name);
    	$from = $sanitizer->email($post->email);
      $subject = $sanitizer->text($post->subject)."(via Fab Lab Contact Page)";
    	$body = $sanitizer->textarea($post->body);
      $recipients = sendEmail($page->email, "Fab Lab Contact", $from, $fromName, $subject, $body);
      if($recipients > 0){
          $message .= "<p class='message'>Message sent. We will get back to you shortly. Thanks for getting in touch!</p>";
      } else {
        $message .= "<p class='message'>Sending message failed! Sorry, please try again later.</p>";
      }
    }
    return $message;
  }

  $message = handleContactForm(wire('input'), wire('sanitizer'), wire('page'));
  $form = include_render('./includes/contact-form.inc');
  $content = $message.$page->body.$form;
?>
