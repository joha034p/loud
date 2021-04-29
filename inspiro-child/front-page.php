<?php
/**
 * The template for displaying the front page
 */

get_header(); ?>

<?php if ( ( is_page() && ! inspiro_is_frontpage() ) && ! has_post_thumbnail( get_queried_object_id() ) ) : ?>

<div class="inner-wrap">
    <div id="primary" class="content-area">

        <?php endif ?>

        <main id="main" class="site-main" role="main">

            <?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/page/content', 'front' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			endwhile; // End the loop.
			?>

        </main><!-- #main -->

        <?php if ( ( is_page() && ! inspiro_is_frontpage() ) && ! has_post_thumbnail( get_queried_object_id() ) ) : ?>

    </div><!-- #primary -->
</div><!-- .inner-wrap -->

<?php endif ?>

<?php
get_footer();
