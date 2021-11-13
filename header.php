<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="format-detection" content="telephone=yes">
        <!-- <link rel="icon" href="<?= get_template_directory_uri() ?>/app/assets/images/favicon.png"> -->

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>

        <?php wp_head(); ?>
    </head>

<body <?php body_class(); ?>>
    <nav class="navbar">
        <div class="container">
            <?php
                $logo       = get_field('logo', 'option');
                $site_title = get_bloginfo('name');
            ?>
            <a class="navbar-brand" href="<?= get_home_url() ?>" title="BPO logo">
                <?php if ( ! empty($logo)): ?>
                    <img src="<?= $logo['url'] ?>" alt="<?= $logo['alt'] ?>"/>
                <?php else: ?>
                    <?= $site_title ?>
                <?php endif ?>
            </a>

            <div class="center-menu d-flex">
                <?php wp_nav_menu(array(
                    'theme_location'    => 'main-menu',
                    'depth'             => 3,
                    'container'         => 'div',
                    'container_id'      => '',
                    'container_class'   => 'navbar-menu d-none d-lg-flex d-md-flex',
                    'menu_class'        => 'nav',
                    'before'            => '',
                    'after'             => '',
                    'fallback_cb'       => '__return_false',
                    'walker'            => new bootstrap_5_wp_nav_menu_walker()
                )); ?>

                <div class="languages d-flex align-items-center">
                    <ul>
                        <?php pll_the_languages(array('hide_if_empty' => 0, 'hide_current' => 1));?>
                    </ul>
                </div>
            </div>

            <?php
                $linkedin = get_field('linkedin_url', 'option');
                $facebook = get_field('facebook_url', 'option');

            ?>
                <div class="soc-icons d-flex">
                    <?php if(!empty($linkedin)): ?>
                        <a href="<?= $linkedin; ?>" target="_blank" class="in-icon">
                            <span class="icon"></span>
                        </a>
                    <?php endif ?>

                    <?php if(!empty($facebook)): ?>
                        <a href="<?= $facebook; ?>" target="_blank" class="fb-icon">
                            <span class="icon"></span>
                        </a>
                    <?php endif; ?>
                </div>
        </div>
        <div class="mobile-menu d-flex d-lg-none d-md-none">
            <?php wp_nav_menu(array(
                'theme_location'    => 'main-menu',
                'depth'             => 3,
                'container'         => 'div',
                'container_id'      => '',
                'container_class'   => 'navbar-menu',
                'menu_class'        => 'nav',
                'before'            => '',
                'after'             => '',
                'fallback_cb'       => '__return_false',
                'walker'            => new bootstrap_5_wp_nav_menu_walker()
            )); ?>
        </div>
    </nav>
