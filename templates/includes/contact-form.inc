<form method='post' action='./' enctype='multipart/formdata'>
  <div class='row'>
    <div class='one-half column'>
      <label for='name'>Name</label>
      <input type='text' id='name' name='name'>
    </div>

    <div class='one-half column'>
      <label for='email'>Email</label>
      <input type='email' id='email' name='email'>
    </div>
  </div>

  <div class='contact-form-field'>
    <label for='subject'>Subject</label>
    <input type='text' id='contact-subject' name='subject'>
  </div>

  <div class='contact-form-field'>
    <label for='body'>Message</label>
    <textarea rows='10' id='contact-body' name='body'></textarea>
  </div>

  <button class='button-primary' type='submit' id='contact-submit' name='submit' value='Submit'>
    <i class='fa fa-paper-plane-o'></i> Submit
  </button>

</form>
