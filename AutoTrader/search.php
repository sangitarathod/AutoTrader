<?php

get_header(); ?>
<div class="at-main at-search">
    <header>
        <h1>
            <?php
            /* translators: %s: the search query */
            printf(esc_html__('Search Results for: %s', 'scaffold'), '<span>' . get_search_query() . '</span>');
            ?>
        </h1>
    </header><!-- .page-header -->
    <section class="at-content-area at-content-thin">
        <?php if (have_posts()):
            while (have_posts()):
                the_post(); ?>
        <article class="at-article-loop">
            <header>
                <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <?php the_title(); ?>
                    </a></h2>
                By:
                <?php the_author(); ?>
            </header>

        </article>
        <?php endwhile; else: ?>
        <article>
            <p>Sorry, no posts were found!</p>
        </article>
        <?php endif; ?>
    </section>
    <?php get_sidebar(); ?>
</div>
<?php get_footer();