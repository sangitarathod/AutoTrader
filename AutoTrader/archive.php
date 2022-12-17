<?php

get_header(); ?>
<main class="at-main">
    <section class="at-content-area at-content-thin">
        <header class="page-header">
            <?php
            the_archive_title();
            the_archive_description();
            ?>
        </header><!-- .page-header -->
        <?php
        if (have_posts()):

            while (have_posts()):

                the_post();
        ?>

        <article class="at-article-loop">

            <?php the_post_thumbnail(); ?>

            <header class="entry-header">
                <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '">', '</a></h2>'); ?>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php the_excerpt(); ?>
            </div><!-- .entry-content -->

        </article><!-- #post-## -->

        <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()):
                    comments_template();
                endif;

            endwhile;

            the_posts_navigation();
        else:
            get_template_part('content-none');
        endif;
        ?>
        </div><!-- .site-content -->
    </section>
    <?php
    get_sidebar(); ?>

</main>
<?php get_footer(); ?>