<?php get_header(); ?>
    <div class="container">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h1 class="entry-title"><?php the_title(); ?></h1>
        <div class="entry-content">
            <?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) ); } ?>
            <?php the_content(); ?>
            <div class="entry-links"><?php wp_link_pages(); ?></div>
        </div>

        <?php endwhile; endif; ?>
    </div>
<?php get_footer(); ?>
