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

  function renderContactForm(){
    $out = "<form method='post' action='./' enctype='multipart/formdata'>";
    $out .= "<div class='row'>";
    $out .= "<div class='one-half column'><label for='name'>Name</label>";
    $out .= "<input type='text' id='name' name='name'></div>";

    $out .= "<div class='one-half column'><label for='email'>Email</label>";
    $out .= "<input type='email' id='email' name='email'></div>";
    $out .= "</div>";
    $out .= "<div class='contact-form-field'><label for='subject'>Subject</label>";
    $out .= "<input type='text' id='contact-subject' name='subject'></div>";

    $out .= "<div class='contact-form-field'><label for='body'>Message</label>";
    $out .= "<textarea rows='10' id='contact-body' name='body'></textarea></div>";

    $out .= "<button class='button-primary' type='submit' id='contact-submit' name='submit' value='Submit'><i class='fa fa-paper-plane-o'></i> Submit</button>";

    $out .= "</form>";
    return $out;
  }

  $message = handleContactForm(wire('input'), wire('sanitizer'), wire('page'));
  $form = renderContactForm();
  $content = $message.$page->body.$form;
?>
