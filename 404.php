<?php get_header(); ?>
    <section class="error-page">
        <div class="container">
            <div class="error-text">
                <h1>404</h1>
                <h2><?= __( 'Lapa netika atrasta!', 'gwm_theme' ); ?></h2>
                <p><?= __( 'Radusies kāda tehniska kļūda, vai arī šī lapa vairs nav pieejama.', 'gwm_theme' ); ?></p>
                <a href="<?= get_home_url() ?>" class="btn btn-outline-secondary"><?= __( 'Uz sākumlapu', 'gwm_theme' ); ?></a>
            </div>
        </div>
    </section>
<?php get_footer(); ?>
