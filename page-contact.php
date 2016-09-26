<? get_header();

$send = true;

if(isset($_POST["send-contact"])) {
  sendMail($_POST["name-contact"], $_POST["email-contact"], $_POST["subject-contact"], $_POST["message-contact"]);
}
?>
  <main class="mdl-layout__content page-contact">
    <div class="wrapper">
    <div class="mdl-layout__header" style="height: 194px;">
    </div>
    <div class="page-content">
 <?php while (have_posts()) {
            the_post(); ?>
      <div class="mdl-grid">
        <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col">
          <div class="mdl-card__title">
            <h2 class="mdl-card__title-text"><?php the_title(); ?></h2>
          </div>
          <div class="mdl-card__supporting-text">
              <p><?php the_content(); ?></p>
              <form method="post" action="">
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                      <input class="mdl-textfield__input" pattern="[A-zÀ-ÿ, ]*" type="text" id="name" name="name-contact"<? if(!$send) { ?> value="<? echo $_POST["name-contact"]; ?>"<? } ?>>
                      <label class="mdl-textfield__label" for="name"><?php echo $en ? "Name" : "Nome"; ?></label>
                      <span class="mdl-textfield__error"><?php echo $en ? "Letter and spaces only" : "Apenas letras e espaços"; ?></span>
                  </div>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                      <input class="mdl-textfield__input" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" type="email" id="email" name="email-contact"<? if(!$send) { ?> value="<? echo $_POST["email-contact"]; ?>"<? } ?>>
                      <label class="mdl-textfield__label" for="email">Email</label>
                      <span class="mdl-textfield__error"><?php echo $en ? "Invalid email address" : "Digite um email válido"; ?></span>
                  </div>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                      <input class="mdl-textfield__input" type="text" id="subject" name="subject-contact"<? if(!$send) { ?> value="<? echo $_POST["subject-contact"]; ?>"<? } ?>>
                      <label class="mdl-textfield__label" for="subject"><?php echo $en ? "Subject" : "Assunto"; ?></label>
                  </div>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                      <textarea class="mdl-textfield__input" type="text" rows="5" id="message" name="message-contact"><? if(!$send) { echo $_POST["message-contact"]; } ?></textarea>
                      <label class="mdl-textfield__label" for="message"><?php echo $en ? "Message" : "Mensagem"; ?></label>
                  </div>
                  <p>
                      <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" name="send-contact">
                          <?php echo $en ? "Submit" : "Enviar"; ?>
                      </button>
                  </p>
              </form>
          </div>
        </div>
      </div>
 <?php }
  
  get_footer(); ?>