<?php

get_header(); ?>
<main class="at-main">
    <section class="at-content-area at-content-thin">
        <article class="at-article-full">
            <header class="entry-header">
                <h1 class="page-title">
                    <?php esc_html_e('Nothing Found Here', 'my-custom-theme'); ?>
                </h1>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <p>
                    <?php esc_html_e('It looks like nothing was found at this location.', 'my-custom-theme'); ?>
                </p>
            </div><!-- .entry-content -->

        </article><!-- .no-results -->
    </section><!-- .site-content -->
    <?php
    get_sidebar(); ?>
</main>

<?php get_footer();