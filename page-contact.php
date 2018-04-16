<?php get_header();

$send = true;

if(isset($_POST['send-contact'])) {
  sendMail($_POST['name-contact'], $_POST['email-contact'], $_POST['subject-contact'], $_POST['message-contact']);
}
?>
<main class="mdl-layout__content page-contact">
    <div class="wrapper">
    <div class="mdl-layout__header" style="height: 194px;"></div>
    <div class="page-content">
    <?php
        while (have_posts()) {
            the_post();
        ?>
        <div class="mdl-grid">
            <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col">
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text"><?php the_title(); ?></h2>
            </div>
            <div class="mdl-card__supporting-text">
                <p><?php the_content(); ?></p>
                <form method="post" action="">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" pattern="[A-zÀ-ÿ, ]*" type="text" id="name" name="name-contact"<?php if(!$send) { ?> value="<?= $_POST['name-contact']; ?>"<?php } ?>>
                        <label class="mdl-textfield__label" for="name"><?= $en ? "Name" : "Nome"; ?></label>
                        <span class="mdl-textfield__error"><?= $en ? "Letter and spaces only" : "Apenas letras e espaços"; ?></span>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" type="email" id="email" name="email-contact"<?php if(!$send) { ?> value="<?= $_POST['email-contact']; ?>"<?php } ?>>
                        <label class="mdl-textfield__label" for="email">Email</label>
                        <span class="mdl-textfield__error"><?= $en ? "Invalid email address" : "Digite um email válido"; ?></span>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" id="subject" name="subject-contact"<?php if(!$send) { ?> value="<?= $_POST['subject-contact']; ?>"<?php } ?>>
                        <label class="mdl-textfield__label" for="subject"><?= $en ? "Subject" : "Assunto"; ?></label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <textarea class="mdl-textfield__input" type="text" rows="5" id="message" name="message-contact"><?php if(!$send) { echo $_POST['message-contact']; } ?></textarea>
                        <label class="mdl-textfield__label" for="message"><?= $en ? "Message" : "Mensagem"; ?></label>
                    </div>
                    <p>
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" name="send-contact">
                            <?= $en ? 'Submit' : 'Enviar'; ?>
                        </button>
                    </p>
                </form>
            </div>
        </div>
    </div>
    <script type="application/ld+json">
    <?= json_encode([
        '@context' => 'http://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [[
        '@type' => 'ListItem',
        'position' => 1,
        'item' => [
            '@id' => get_site_url() . '/' . $wp->request,
            'name' => get_the_title()
            ]
        ]]
    ]);
    ?>
    </script>
<?php }

get_footer();
